<?php
/*
Plugin Name:  GA Dashboard Plugin
Plugin URI:   https://github.com/Nadia89M/ga-dashboard-plugin
Description:  GA Dashboard Plugin is a plugin that help administrators integrate GA
Version:      1.0
Contributors: Nadia89M
Author:       Nadia
Author URI:   https://nadiamohamed.me
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  ga-dashboard
Domain Path:  /languages
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define plugin paths and URLs
define( 'GADASHBOARD_URL', plugin_dir_url( __FILE__ ) );
define( 'GADASHBOARD_DIR', plugin_dir_path( __FILE__ ) );

// Create Settings Fields
include( plugin_dir_path( __FILE__ ) . 'includes/ga-dashboard-settings-fields.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/ga-dashboard-menus.php');

// Add GA JS
include( plugin_dir_path( __FILE__ ) . 'includes/ga-script.php');

?>
