<?php

/**
 * @link       https://www.codetic.net
 * @since      1.0.0
 *
 * @package    Flexia_Core
 * @subpackage Flexia_Core/admin
 */

function flexia_core_customize_register( $wp_customize ) {

  if( class_exists( 'WP_Customize_Code_Editor_Control') ) {
    // Header Script section
    $wp_customize->add_section( 'flexia_core_header_script_section' , array(
    'title'      => __('Header Script','flexia-core'), 
    'priority'   => 10    
    ) );  

    $wp_customize->add_setting( 'flexia_core_header_script' );

      $control = new WP_Customize_Code_Editor_Control( $wp_customize, 'flexia_core_header_script', array(
              'label'          => __( 'Add your header script without script tag', 'flexia-core' ),
              'section' => 'flexia_core_header_script_section',
              'code_type' => 'text/javascript',
              'settings'       => 'flexia_core_header_script',
      ) );
      $wp_customize->add_control( $control );

    // Footer Script section

    $wp_customize->add_section( 'flexia_core_footer_script_section' , array(
    'title'      => __('Footer Script','flexia-core'), 
    'priority'   => 20    
    ) );  

    $wp_customize->add_setting( 'flexia_core_footer_script' );
      $control = new WP_Customize_Code_Editor_Control( $wp_customize, 'flexia_core_footer_script', array(
              'label'          => __( 'Add your footer script without script tag', 'flexia-core' ),
              'section' => 'flexia_core_footer_script_section',
              'code_type' => 'text/javascript',
              'settings'       => 'flexia_core_footer_script',
      ) );
      $wp_customize->add_control( $control );

    // Google Analytics section

    $wp_customize->add_section( 'flexia_core_ga_script_section' , array(
    'title'      => __('Google Analytics','flexia-core'), 
    'priority'   => 30    
    ) );  

    $wp_customize->add_setting( 'flexia_core_ga_script' );
      $control = new WP_Customize_Code_Editor_Control( $wp_customize, 'flexia_core_ga_script', array(
              'label'          => __( 'Paste your Google Analytics code as is.', 'flexia-core' ),
              'section' => 'flexia_core_ga_script_section',
              'code_type' => 'text/html',
              'settings'       => 'flexia_core_ga_script',
      ) );
      $wp_customize->add_control( $control );

    // Create custom panels
    $wp_customize->add_panel( 'flexia_core_custom_scripts', array(
        'priority' => 999,
        'theme_supports' => '',
        'title' => __( 'Custom JavaScripts', 'flexia-core' ),
        'description' => __( 'Add custom header/footer scripts or Google Analytics', 'flexia-core' ),
    ) );

    // Assign sections to panels
    $wp_customize->get_section('flexia_core_header_script_section')->panel = 'flexia_core_custom_scripts';      
    $wp_customize->get_section('flexia_core_footer_script_section')->panel = 'flexia_core_custom_scripts';
    $wp_customize->get_section('flexia_core_ga_script_section')->panel = 'flexia_core_custom_scripts';

  }
}
add_action( 'customize_register', 'flexia_core_customize_register' );

require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/flexia-core-customizer-admin-display.php';
