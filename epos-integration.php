<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   Epos_Integration
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 *
 * @wordpress-plugin
 * Plugin Name:       Epos Integration
 * Plugin URI:        --
 * Description:       Integration with SIMPLE EPOS system
 * Version:           1.0.0
 * Author:            Nick Woodland
 * Author URI:        --
 * Text Domain:       epos-integration-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/<owner>/<repo>
 * WordPress-Plugin-Boilerplate: v2.6.1
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-epos-integration.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-epos-integration.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace Epos_Integration with the name of the class defined in
 *   `class-epos-integration.php`
 */
register_activation_hook( __FILE__, array( 'Epos_Integration', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Epos_Integration', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace Epos_Integration with the name of the class defined in
 *   `class-epos-integration.php`
 */
add_action( 'plugins_loaded', array( 'Epos_Integration', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-epos-integration-admin.php` with the name of the plugin's admin file
 * - replace Epos_Integration_Admin with the name of the class defined in
 *   `class-epos-integration-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-epos-integration-admin.php' );
	add_action( 'plugins_loaded', array( 'Epos_Integration_Admin', 'get_instance' ) );

}
