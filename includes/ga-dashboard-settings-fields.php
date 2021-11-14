<?php

function gadashboard_settings() {

  // If plugin settings don't exist, then create them
  if( !get_option( 'gadashboard_settings' ) ) {
      add_option( 'gadashboard_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'gadashboard_settings_section',
    // Section Title
    __( 'Google Analytics ID' ),
    // Callback for an optional description
    'gadashboard_settings_section_callback',
    // Admin page to add section to
    'gadashboard'
  );

  add_settings_field(
    // Unique identifier for field
    'gadashboard_settings_ga_id',
    // Field Title
    __( 'GA ID'),
    // Callback for field markup
    'gadashboard_settings_ga_id_callback',
    // Page to go on
    'gadashboard',
    // Section to go in
    'gadashboard_settings_section'
  );

  register_setting(
    'gadashboard_settings',
    'gadashboard_settings'
  );

}
add_action( 'admin_init', 'gadashboard_settings' );

function gadashboard_settings_section_callback() {

  esc_html_e( 'Enter your Google Analytics ID' );

}

function gadashboard_settings_ga_id_callback() {

  $options = get_option( 'gadashboard_settings' );

	$propertyID = '';
	if( isset( $options[ 'ga_id' ] ) ) {
		$propertyID = esc_html( $options['ga_id'] );
	}

  echo '<input type="text" id="gadashboard_ga_id" name="gadashboard_settings[ga_id]" /> <span>' . $propertyID . '</span>';

}
