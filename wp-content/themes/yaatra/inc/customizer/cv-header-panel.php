<?php
/**
 * Yaatra Header Settings panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

add_action( 'customize_register', 'yaatra_header_settings_register' );

function yaatra_header_settings_register( $wp_customize ) {

	$wp_customize->get_section( 'header_image' )->panel = 'yaatra_header_settings_panel';
	$wp_customize->get_section( 'header_image' )->title = __( 'Innerpages Header Image', 'yaatra' );
    $wp_customize->get_section( 'header_image' )->priority = '25';

    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'yaatra_header_settings_panel',
	    array(
	        'priority'       => 10,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Header Settings', 'yaatra' ),
	    )
    );

}