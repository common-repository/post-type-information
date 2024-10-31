<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://grandslambert.com
 * @since             1.0.0
 * @package           Gs_Post_Type_Information
 *
 * @wordpress-plugin
 * Plugin Name:       Post Type Information
 * Plugin URI:        http://grandslambert.com/plugin/post-type-information
 * Description:       Adds custom post types and taxonomies to the "At a Glance" section of the Dashboard.
 * Version:           1.0.1
 * Author:            GrandSlambert
 * Author URI:        http://grandslambert.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gs-post-type-information
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gs-post-type-information-activator.php
 */
function activate_gs_post_type_information() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gs-post-type-information-activator.php';
	Gs_Post_Type_Information_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gs-post-type-information-deactivator.php
 */
function deactivate_gs_post_type_information() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gs-post-type-information-deactivator.php';
	Gs_Post_Type_Information_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gs_post_type_information' );
register_deactivation_hook( __FILE__, 'deactivate_gs_post_type_information' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gs-post-type-information.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gs_post_type_information() {

	$plugin = new Gs_Post_Type_Information();
	$plugin->run();

}
run_gs_post_type_information();
