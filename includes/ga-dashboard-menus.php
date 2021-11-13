<?php

function gadashboard_settings_page_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  include( GADASHBOARD_DIR . 'templates/admin/settings-page.php');
}

function gadashboard_settings_pages()
{
  add_menu_page(
    __( 'Google Analytics Dashboard' ),
    __( 'GA Dashboard' ),
    'manage_options',
    'gadashboard',
    'gadashboard_settings_page_markup',
    'dashicons-analytics',
    100
  );

}
add_action( 'admin_menu', 'gadashboard_settings_pages' );
