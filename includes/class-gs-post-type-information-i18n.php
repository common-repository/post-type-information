<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://grandslambert.net
 * @since      1.0.0
 *
 * @package    Gs_Post_Type_Information
 * @subpackage Gs_Post_Type_Information/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Gs_Post_Type_Information
 * @subpackage Gs_Post_Type_Information/includes
 * @author     GrandSlambert <shane@grandslambert.com>
 */
class Gs_Post_Type_Information_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'gs-post-type-information',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
