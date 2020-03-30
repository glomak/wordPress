<?php
/**
 * Yaatra Additional Features panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

add_action( 'customize_register', 'yaatra_additional_features_register' );

function yaatra_additional_features_register( $wp_customize ) {

    /**
     * Add Additional Features Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'yaatra_additional_features_panel',
	    array(
	        'priority'       => 30,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Additional Features', 'yaatra' ),
	    )
    );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Social Media section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_social_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'yaatra_additional_features_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Social Media Section', 'yaatra' )
        )
    );

    /**
     * Repeater field for social media
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'social_media_icons', 
        array(
            'capability'       => 'edit_theme_options',
            'default'          => json_encode(array(
                    array(
                        'cv_icons_list' => 'fa fa-twitter',
                    	'cv_url_field'  => '',
                    )
                )
            ),
            'sanitize_callback' => 'yaatra_sanitize_repeater'
        )
    );
    $wp_customize->add_control( new Yaatra_Repeater_Controler(
        $wp_customize, 
            'social_media_icons', 
            array(
                'label'           => __( 'Social Media', 'yaatra' ),
                'section'         => 'yaatra_social_section',
                'settings'        => 'social_media_icons',
                'priority'        => 5,
                'yaatra_box_label'       => __( 'Social Media Icons','yaatra' ),
                'yaatra_box_add_control' => __( 'Add Icon','yaatra' )
            ),
            array(
                'cv_icons_list' => array(
                    'type'        => 'social_icon',
                    'label'       => __( 'Social Media Logo', 'yaatra' ),
                    'description' => __( 'Choose social media icon.', 'yaatra' )
                ),
                'cv_url_field' => array(
                    'type'        => 'url',
                    'label'       => __( 'Social Icon Url', 'yaatra' ),
                    'description' => __( 'Enter social media url.', 'yaatra' )
                )
            )
        ) 
    );
/*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Extra Features Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_extra_features_section',
        array(
            'priority'       => 10,
            'panel'          => 'yaatra_additional_features_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Extra Features', 'yaatra' )
        )
    );

    /**
     * Checkbox for wow animation
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_wow_option',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'yaatra_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new Yaatra_Toggle_Checkbox_Custom_Control(
        $wp_customize, 
        'yaatra_wow_option',
            array(
                'label'         => __( 'WoW Animation', 'yaatra' ),
                'description'   => __( 'Option to control wow animation effects.', 'yaatra' ),
                'section'       => 'yaatra_extra_features_section',
                'settings'      => 'yaatra_wow_option',
                'priority'      => 15
            )
        )
    );
}