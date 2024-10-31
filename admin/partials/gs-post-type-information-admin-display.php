<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://grandslambert.net
 * @since      1.0.0
 *
 * @package    Gs_Post_Type_Information
 * @subpackage Gs_Post_Type_Information/admin/partials
 */
?>

<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <div style="width:49%; float:left"><form action="options.php" method="post">
            <?php
            settings_fields($this->plugin_name);
            do_settings_sections($this->plugin_name);
            submit_button();
            ?>
        </form>
    </div>
    <div style="width:49%; float:right">
        <div class="postbox">
            <h3 class="handl" style="margin:0; padding:3px;cursor:default;">
                <?php _e('Plugin Information', 'gs-post-type-information'); ?>
            </h3>
            <div style="padding:5px;">
                <p>
                    <?php _e('This page allows you to select which post types and taxonomies to display on the dashboard.', 'gs-post-type-information'); ?>
                </p>
                <p>
                    <?php _e('You are using', 'gs-post-type-information'); ?> <strong> <a href="http://grandslambert.com/plugin/post-type-information/" target="_blank"><?php _e('Post Type Information', 'gs-post-type-information'); ?> <?php echo $this->version; ?></a></strong> by <a href="http://grandslambert.com" target="_blank">GrandSlambert</a>.
                </p>
                <p>
                    <?php
                    printf(__('Thank you for trying the %1$s plugin - I hope you find it useful. For the latest updates on this plugin, vist the %2$s. If you have problems with this plugin, please use our %3$s.', 'gs-post-type-information'), _e('Post Type Information', 'gs-post-type-information'), '<a href="http://grandslambert.com/plugin/gs-post-type-information/" target="_blank">' . __('official site', 'gs-post-type-information') . '</a>', '<a href="https://wordpress.org/support/plugin/gs-post-type-information" target="_blank">' . __('Support Forum', 'gs-post-type-information') . '</a>');
                    ?>
                </p>
                <p>
                    <?php
                    printf(__('This plugin is &copy; %1$s by %2$s and is released under the %3$s', 'gs-post-type-information'), '2015-' . date("Y"), '<a href="http://grandslambert.com" target="_blank">GrandSlambert</a>', '<a href="http://www.gnu.org/licenses/gpl.html" target="_blank">' . __('GNU General Public License', 'gs-post-type-information') . '</a>'
                    );
                    ?>
                </p>
            </div>
            <h3 class="handl" style="margin:0; padding:3px;cursor:default;"><?php _e('Donate', 'gs-post-type-information'); ?></h3>
            <div style="padding:8px">
                <p>
                    <?php printf(__('If you find this plugin useful, please consider supporting this and our other great %1$s.', 'gs-post-type-information'), '<a href="http://grandslambert.com/plugin/" target="_blank">' . __('plugins', 'gs-post-type-information') . '</a>'); ?>
                    <a href="https://www.paypal.com/donate/?business=ZELD6TZ4T8KAL&no_recurring=0&item_name=Post+Type+Information+Plugin&currency_code=USD" target="_blank"><?php _e('Donate a few bucks!', 'gs-post-type-information'); ?></a>
                </p>
                <div style="text-align: center;">
					<form action="https://www.paypal.com/donate" method="post" target="_blank">
						<input type="hidden" name="business" value="ZELD6TZ4T8KAL" />
						<input type="hidden" name="no_recurring" value="0" />
						<input type="hidden" name="item_name" value="Post Type Information Plugin" />
						<input type="hidden" name="currency_code" value="USD" />
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
					</form>

				</div>
            </div>
        </div>
    </div>
</div>