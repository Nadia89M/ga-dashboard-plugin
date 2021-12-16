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

  add_settings_section(
    // Unique identifier for the section
    'gadashboard_settings_view_section',
    // Section Title
    __( 'Google Analytics VIEW ID' ),
    // Callback for an optional description
    'gadashboard_settings_view_section_callback',
    // Admin page to add section to
    'gadashboard'
  );

  add_settings_section(
    // Unique identifier for the section
    'gadashboard_settings_report_section',
    // Section Title
    __( 'Google Analytics Report' ),
    // Callback for an optional description
    'gadashboard_settings_report_section_callback',
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

  add_settings_field(
    // Unique identifier for field
    'gadashboard_settings_ga_view_id',
    // Field Title
    __( 'VIEW ID'),
    // Callback for field markup
    'gadashboard_settings_ga_view_id_callback',
    // Page to go on
    'gadashboard',
    // Section to go in
    'gadashboard_settings_view_section'
  );

  add_settings_field(
    // Unique identifier for field
    'gadashboard_settings_ga_report',
    // Field Title
    __( 'Google Analytics Report'),
    // Callback for field markup
    'gadashboard_settings_ga_report_callback',
    // Page to go on
    'gadashboard',
    // Section to go in
    'gadashboard_settings_report_section'
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

function gadashboard_settings_view_section_callback() {

  esc_html_e( 'Enter your View ID' );

}

function gadashboard_settings_report_section_callback() {

  esc_html_e( 'Website report for the last 365 days' );

}

function gadashboard_settings_ga_id_callback() {

  $options = get_option( 'gadashboard_settings' );

	$propertyID = '';
	if( isset( $options[ 'ga_id' ] ) ) {
		$propertyID = esc_html( $options['ga_id'] );
	}

  echo '<input type="text" id="gadashboard_ga_id" name="gadashboard_settings[ga_id]" value="' . $propertyID . '" />';

}

function gadashboard_settings_ga_view_id_callback() {

  $options = get_option( 'gadashboard_settings' );

	$viewID = '';
	if( isset( $options[ 'view_id' ] ) ) {
		$viewID = esc_html( $options['view_id'] );
	}

  echo '<input type="text" id="gadashboard_ga_view_id" name="gadashboard_settings[view_id]" value="' . $viewID . '" />';

}

//Print Google Analytics Report
function gadashboard_settings_ga_report_callback() {
  $options = get_option( 'gadashboard_settings' );
    if($options[ 'view_id' ]) {
      $analytics = initializeAnalytics();
      $response = getReport($analytics);
      $result = printResults($response);
      echo '<div>' . $result . '</div>';
    } else {
      echo '<p>Google Analytics Report API not connected</p>';
    }
}
