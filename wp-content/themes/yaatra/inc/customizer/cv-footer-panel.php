<?php
/**
 * Yaatra Footer panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

add_action( 'customize_register', 'yaatra_footer_settings_register' );

function yaatra_footer_settings_register( $wp_customize ) {


/*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Footer section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_footer_section',
        array(
        	'priority'       => 35,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Footer Section', 'yaatra' )
        )
    );


    /**
     * Image upload field for banner image
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_footer_logo_image',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control (
        $wp_customize,
        'yaatra_footer_logo_image',
	        array(
	            'label'         => __( 'Footer Logo', 'yaatra' ),
	            'section'       => 'yaatra_footer_section',
	            'settings'      => 'yaatra_footer_logo_image',
	            'type'          => 'upload',
	            'priority'      => 5
	        )
    	)
	);

	/**
     * Text field for copyright
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_copyright_text',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => __( 'yaatra', 'yaatra' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'yaatra_copyright_text',
        array(
            'label'         => __( 'Copyright Text', 'yaatra' ),
            'section'       => 'yaatra_footer_section',
            'settings'      => 'yaatra_copyright_text',
            'type'          => 'text',
            'priority'      => 10
        )
    );

}