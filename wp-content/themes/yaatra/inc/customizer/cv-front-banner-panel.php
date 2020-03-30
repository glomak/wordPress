<?php
/**
 * Yaatra Front Page Settings panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

add_action( 'customize_register', 'yaatra_frontpage_settings_register' );

function yaatra_frontpage_settings_register( $wp_customize ) {

/*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Banner Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_front_banner_section',
        array(
        	'priority'       => 10,
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Banner Settings', 'yaatra' ),
            'description'    => __( 'Managed the banner at frontpage.', 'yaatra' ),
        )
    );

    /**
     * Checkbox for banner section at frontpage
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_front_banner_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'yaatra_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new Yaatra_Toggle_Checkbox_Custom_Control(
        $wp_customize, 
        'yaatra_front_banner_option',
            array(
                'label'         => __( 'Banner Option', 'yaatra' ),
                'description'   => __( 'Option to control banner section at frontpage.', 'yaatra' ),
                'section'       => 'yaatra_front_banner_section',
                'settings'      => 'yaatra_front_banner_option',
                'priority'      => 5
            )
        )
    );

    /**
     * Image upload field for banner image
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_front_banner_image',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control (
        $wp_customize,
        'yaatra_front_banner_image',
	        array(
	            'label'         => __( 'Banner Image', 'yaatra' ),
	            'section'       => 'yaatra_front_banner_section',
	            'settings'      => 'yaatra_front_banner_image',
	            'type'          => 'upload',
                'priority'      => 10,
                'active_callback'   => 'yaatra_front_banner_option_active_callback'
	        )
    	)
	);

	/**
     * Text field for banner title
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_banner_title',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => __( 'Banner Title', 'yaatra' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'yaatra_banner_title',
        array(
            'label'         => __( 'Banner Title', 'yaatra' ),
            'section'       => 'yaatra_front_banner_section',
            'settings'      => 'yaatra_banner_title',
            'type'          => 'text',
            'priority'      => 15,
            'active_callback'   => 'yaatra_front_banner_option_active_callback'
        )
    );

    /**
     * Textarea field for banner content
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_banner_content',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    $wp_customize->add_control(
        'yaatra_banner_content',
        array(
            'label'         => __( 'Banner Content', 'yaatra' ),
            'description'   => __( 'Add banner info.', 'yaatra' ),
            'section'       => 'yaatra_front_banner_section',
            'settings'      => 'yaatra_banner_content',
            'type'          => 'textarea',
            'priority'      => 20,
            'active_callback'   => 'yaatra_front_banner_option_active_callback'
        )
    );

    /**
     * Text field for banner button text
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_banner_btn_text',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => __( 'Discover', 'yaatra' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'yaatra_banner_btn_text',
        array(
            'label'         => __( 'Banner Button Text', 'yaatra' ),
            'section'       => 'yaatra_front_banner_section',
            'settings'      => 'yaatra_banner_btn_text',
            'type'          => 'text',
            'priority'      => 25,
            'active_callback'   => 'yaatra_front_banner_option_active_callback'
        )
    );

    /**
     * Text field for banner button text
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_banner_btn_link',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'yaatra_banner_btn_link',
        array(
            'label'         => __( 'Banner Button Link', 'yaatra' ),
            'section'       => 'yaatra_front_banner_section',
            'settings'      => 'yaatra_banner_btn_link',
            'type'          => 'text',
            'priority'      => 30,
            'active_callback'   => 'yaatra_front_banner_option_active_callback'
        )
    );

}