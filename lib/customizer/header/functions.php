<?php

/*
 * Create the controls in the customizer.
 */
function shoestrap_header_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_extra_header',      'title' => __( 'Extra Header', 'shoestrap' ),     'priority' => 5 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  // Compatibility hack for previous versions of Shoestrap.
  if ( get_theme_mod( 'shoestrap_header_mode' ) == 'header' ) {
    $shoestrap_extra_branding = 1;
  } else {
    $shoestrap_extra_branding = 0;
  }

  $settings   = array();
  
  // Extra Header Settings
  $settings[] = array( 'slug' => 'shoestrap_extra_branding',            'default' => $shoestrap_extra_branding );
  $settings[] = array( 'slug' => 'shoestrap_header_loginlink',          'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_header_backgroundcolor',    'default' => '#0066bb' );
  $settings[] = array( 'slug' => 'shoestrap_header_textcolor',          'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_header_social',             'default' => '0' );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  /*
   * Color Controls
   */
  $color_controls   = array();
  
  // Header Background
  $color_controls[] = array( 'setting' => 'shoestrap_header_backgroundcolor', 'label' => 'Header Region Background Color',  'section' => 'shoestrap_extra_header',  'priority' => 3 );
  // Header textcolor
  $color_controls[] = array( 'setting' => 'shoestrap_header_textcolor',       'label' => 'Header Region Text Color',        'section' => 'shoestrap_extra_header',  'priority' => 4 );
  
  /*
   * Checkbox Controls
   */
  $checkbox_controls = array();
  // Extra header on/off
  $checkbox_controls[] = array( 'setting' => 'shoestrap_extra_branding',      'label' => 'Display Extra Header',                  'section' => 'shoestrap_extra_header',      'priority' => 1 );
  // Show/Hide the login link
  $checkbox_controls[] = array( 'setting' => 'shoestrap_header_loginlink',    'label' => 'Show Login/Logout Link',                'section' => 'shoestrap_primary_navbar',  'priority' => 5 );
  // Display Social Links on the Header
  $checkbox_controls[] = array( 'setting' => 'shoestrap_header_social',       'label' => 'Display Social Links',                  'section' => 'shoestrap_extra_header',      'priority' => 5 );
  
  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority'],
      )
    ));
  }

  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }
  
}
add_action( 'customize_register', 'shoestrap_header_customize' );
