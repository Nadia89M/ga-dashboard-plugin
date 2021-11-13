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

function ga_dashboard_settings_page()
{
    add_menu_page(
        'GA Dashboard',
        'GA Dashboard',
        'manage_options',
        'ga-dashboard',
        'ga_dashboard_settings_page_markup',
        'dashicons-analytics',
        100
    );

}
add_action( 'admin_menu', 'ga_dashboard_settings_page' );


function ga_dashboard_settings_page_markup()
{
    // Double check user capabilities
    if ( !current_user_can('manage_options') ) {
      return;
    }
    ?>
    <div class="wrap">
      <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
      <p><?php esc_html_e( 'Some content.'); ?></p>
    </div>
    <?php
}

?>
