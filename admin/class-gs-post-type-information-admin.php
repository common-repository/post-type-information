<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://grandslambert.net
 * @since      1.0.0
 *
 * @package    Gs_Post_Type_Information
 * @subpackage Gs_Post_Type_Information/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Gs_Post_Type_Information
 * @subpackage Gs_Post_Type_Information/admin
 * @author     GrandSlambert <shane@grandslambert.com>
 */
class Gs_Post_Type_Information_Admin {

    /**
     * The options name to be used in this plugin
     *
     * @since  	1.0.0
     * @access 	private
     * @var  	string 		$option_name 	Option name of this plugin
     */
    private $option_name = 'gs_post_type_information';

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Gs_Post_Type_Information_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gs_Post_Type_Information_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/gs-post-type-information-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Gs_Post_Type_Information_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Gs_Post_Type_Information_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/gs-post-type-information-admin.js', array('jquery'), $this->version, false);
    }

    /**
     * Add a configuration link to the plugins list.
     *
     * @since 1.0.0
     * @staticvar object $this_plugin
     * @param array $links
     * @param array $file
     * @return array
     */
    function plugin_action_links($links, $file) {
        static $this_plugin;

        if (!$this_plugin) {
            $this_plugin = dirname(dirname(plugin_basename(__FILE__)));
        }

        if (dirname($file) == $this_plugin) {
            $settings_link = '<a href="' . admin_url('options-general.php?page=' . $this->plugin_name) . '">' . __('Settings', 'gs-post-type-information') . '</a>';
            array_unshift($links, $settings_link);
        }

        return $links;
    }

    /**
     * Register the settings
     *
     * @since  1.0.0
     */
    public function register_setting() {
        // Add a General section
        add_settings_section(
                $this->option_name . '_general', __('General', 'gs-post-type-information'), array($this, $this->option_name . '_general_cb'), $this->plugin_name
        );

        add_settings_field(
                $this->option_name . '_types', __('Include Post Types', 'gs-post-type-information'), array($this, $this->option_name . '_types_cb'), $this->plugin_name, $this->option_name . '_general', array('label_for' => $this->option_name . '_types')
        );

        add_settings_field(
                $this->option_name . '_taxonomies', __('Include Taxonomies', 'gs-post-type-information'), array($this, $this->option_name . '_taxonomies_cb'), $this->plugin_name, $this->option_name . '_general', array('label_for' => $this->option_name . '_taxonomies')
        );

        register_setting($this->plugin_name, $this->option_name . '_types');
        register_setting($this->plugin_name, $this->option_name . '_taxonomies');
    }

    /**
     * Add an options page under the Settings submenu
     *
     * @since  1.0.0
     */
    public function add_options_page() {

        $this->plugin_screen_hook_suffix = add_options_page(
                __('Post Type Information Settings', 'gs-post-type-information'), __('Post Type Information', 'gs-post-type-information'), 'manage_options', $this->plugin_name, array($this, 'display_options_page')
        );
    }

    /**
     * Render the options page for plugin
     *
     * @since  1.0.0
     */
    public function display_options_page() {
        include_once 'partials/gs-post-type-information-admin-display.php';
    }

    /**
     * Render the text for the general section
     *
     * @since  1.0.0
     */
    public function gs_post_type_information_general_cb() {
        echo '<p>' . __('Please change the settings accordingly.', 'gs-post-type-information') . '</p>';
    }

    /**
     * Render the checkboxes for the Post Types selection.
     *
     * @since  1.0.0
     */
    public function gs_post_type_information_types_cb() {
        $types = (array) get_option($this->option_name . '_types');
        $post_types = get_post_types(array(), 'objects');
        ?>
        <fieldset>
            <?php
            foreach ($post_types as $slug => $type) :
                if (!$type->_builtin) :
                    ?>
                    <label>
                        <input type="checkbox" name="<?php echo $this->option_name . '_types[]' ?>" id="<?php echo $this->option_name . '_types' ?>" value="<?php echo $slug; ?>" <?php if (in_array($slug, $types)) echo 'checked="checked"'; ?>>
                        <?php echo $type->label ?>
                    </label>
                    <br>
                    <?php
                endif;
            endforeach;
            ?>
        </fieldset>
        <?php
    }

    /**
     * Render the checkboxes for the Taxonomies Selection
     *
     * @since  1.0.0
     */
    public function gs_post_type_information_taxonomies_cb() {
        $selected = (array) get_option($this->option_name . '_taxonomies');
        $taxonomies = get_taxonomies(array(), 'objects');
        ?>
        <fieldset>
            <?php
            foreach ($taxonomies as $slug => $type) :
                if (!$type->_builtin) :
                    ?>
                    <label>
                        <input type="checkbox" name="<?php echo $this->option_name . '_taxonomies[]' ?>" id="<?php echo $this->option_name . '_taxonomies' ?>" value="<?php echo $slug; ?>" <?php if (in_array($slug, $selected)) echo 'checked="checked"'; ?>>
                        <?php echo $type->label ?>
                    </label>
                    <br>
                    <?php
                endif;
            endforeach;
            ?>
        </fieldset>
        <?php
    }

    /**
     * Adds the selected items to the "At a Glance" section of the dashboard.
     * 
     * @since 1.0.0
     */
    public function dashboard_glance_items() {
        $this->dashaboard_glance_post_types();
        $this->dashboard_glance_taxonomies();
    }

    /**
     * Add the selected post types to the dashboard.
     * 
     * @since 1.0.0
     */
    public function dashaboard_glance_post_types() {
        $types = get_option($this->option_name . '_types');
        $post_types = get_post_types(array(), 'objects');

        if (is_array($types)) {
            foreach ($types as $type) {
                $num_posts = wp_count_posts($type);
                $num = number_format_i18n($num_posts->publish);
                $text = _n($post_types[$type]->labels->singular_name, $post_types[$type]->labels->name, $num_posts->publish);

                if (current_user_can('edit_posts')) {
                    $output = '<a href="edit.php?post_type=' . $type . '">' . $num . ' ' . $text . '</a>';
                    echo '<li class="page-count ' . $type . '-count">' . $output . '</td>';
                }
            }
        }
    }

    /**
     * Adds the selected taxonomies to the dashboard.
     * 
     * @since 1.0.0
     */
    public function dashboard_glance_taxonomies() {

        $selected = get_option($this->option_name . '_taxonomies');
        $taxonomies = get_taxonomies(array(), 'objects');

        if (is_array($selected)) {
            foreach ($selected as $type) {

                $num_posts = wp_count_terms($type);
                $num = number_format_i18n($num_posts);
                $text = _n($taxonomies[$type]->labels->singular_name, $taxonomies[$type]->labels->name, $num_posts);

                if (current_user_can('manage_categories')) {
                    $output = '<a href="edit-tags.php?taxonomy=' . $type . '&post_type=' . $taxonomies[$type]->object_type[0] . '">' . $num . ' ' . $text . '</a>';
                    echo '<li class="page-count ' . $type . '-count">' . $output . '</td>';
                }
            }
        }
    }

}
