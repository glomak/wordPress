<?php
/**
 * Yaatra Design Settings panel at Theme Customizer
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

add_action( 'customize_register', 'yaatra_design_settings_register' );

function yaatra_design_settings_register( $wp_customize ) {

    $wp_customize->register_control_type( 'Yaatra_Customize_Control_Radio_Image' );

    /**
     * Add Design Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
	    'yaatra_design_settings_panel',
	    array(
	        'priority'       => 20,
	        'capability'     => 'edit_theme_options',
	        'theme_supports' => '',
	        'title'          => __( 'Design Settings', 'yaatra' ),
	    )
    );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Archive section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_archive_section',
        array(
        	'priority'       => 5,
        	'panel'          => 'yaatra_design_settings_panel',
        	'capability'     => 'edit_theme_options',
        	'theme_supports' => '',
            'title'          => __( 'Archive Section', 'yaatra' )
        )
    );

    /**
     * Radio image field for archive sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_archive_sidebar',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'yaatra_sanitize_select',
        )
    );
    $wp_customize->add_control( new Yaatra_Customize_Control_Radio_Image(
        $wp_customize,
        'yaatra_archive_sidebar',
            array(
                'label'         => __( 'Archive Sidebars', 'yaatra' ),
                'description'   => __( 'Choose sidebar from available layouts', 'yaatra' ),
                'section'       => 'yaatra_archive_section',
                'settings'      => 'yaatra_archive_sidebar',
                'priority'      => 5,
                'choices'       => array(
                    'left_sidebar'      => array(
                        'label'         => __( 'Left Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/left-sidebar.png'
                    ),
                    'right_sidebar'     => array(
                        'label'         => __( 'Right Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/right-sidebar.png'
                    ),
                    'no_sidebar'        => array(
                        'label'         => __( 'No Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/no-sidebar.png'
                    )
                )
            )
        )
    );

    /**
     * Image Radio field for archive layout
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_archive_layout',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'grid',
            'sanitize_callback' => 'yaatra_sanitize_select',
        )
    );
    $wp_customize->add_control( new Yaatra_Customize_Control_Radio_Image(
        $wp_customize,
        'yaatra_archive_layout',
            array(
                'label'         => __( 'Archive Layouts', 'yaatra' ),
                'description'   => __( 'Choose layout from available layouts', 'yaatra' ),
                'section'       => 'yaatra_archive_section',
                'settings'      => 'yaatra_archive_layout',
                'priority'      => 10,
                'choices'       => array(
                    'grid'   => array(
                        'label' => __( 'Grid', 'yaatra' ),
                        'url'   => '%s/assets/images/archive-layout2.png'
                    ),
                    'classic-grid' => array(
                        'label' => __( 'Classic Grid', 'yaatra' ),
                        'url'   => '%s/assets/images/archive-layout1.png'
                    )
                ),
                
            )
        )
    );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Page Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_page_section',
        array(
            'priority'       => 10,
            'panel'          => 'yaatra_design_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Page Settings', 'yaatra' )
        )
    );      

    /**
     * Radio image field for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_global_page_sidebar',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'yaatra_sanitize_select',
        )
    );
    $wp_customize->add_control( new Yaatra_Customize_Control_Radio_Image(
        $wp_customize,
        'yaatra_global_page_sidebar',
            array(
                'label'         => __( 'Page Sidebars', 'yaatra' ),
                'description'   => __( 'Choose sidebar from available layouts', 'yaatra' ),
                'section'       => 'yaatra_page_section',
                'settings'      => 'yaatra_global_page_sidebar',
                'priority'      => 5,
                'choices'       => array(
                    'left_sidebar'      => array(
                        'label'         => __( 'Left Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/left-sidebar.png'
                    ),
                    'right_sidebar'     => array(
                        'label'         => __( 'Right Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/right-sidebar.png'
                    ),
                    'no_sidebar'        => array(
                        'label'         => __( 'No Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/no-sidebar.png'
                    )
                )
            )
        )
    );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     * Post Settings
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'yaatra_post_section',
        array(
            'priority'       => 15,
            'panel'          => 'yaatra_design_settings_panel',
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Post Settings', 'yaatra' )
        )
    );      

    /**
     * Radio image field for page sidebar
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_global_post_sidebar',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'right_sidebar',
            'sanitize_callback' => 'yaatra_sanitize_select',
        )
    );
    $wp_customize->add_control( new Yaatra_Customize_Control_Radio_Image(
        $wp_customize,
        'yaatra_global_post_sidebar',
            array(
                'label'         => __( 'Post Sidebars', 'yaatra' ),
                'description'   => __( 'Choose sidebar from available layouts', 'yaatra' ),
                'section'       => 'yaatra_post_section',
                'settings'      => 'yaatra_global_post_sidebar',
                'priority'      => 5,
                'choices'       => array(
                    'left_sidebar'      => array(
                        'label'         => __( 'Left Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/left-sidebar.png'
                    ),
                    'right_sidebar'     => array(
                        'label'         => __( 'Right Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/right-sidebar.png'
                    ),
                    'no_sidebar'        => array(
                        'label'         => __( 'No Sidebar', 'yaatra' ),
                        'url'           => '%s/assets/images/no-sidebar.png'
                    )
                )
            )
        )
    );

    /**
     * Checkbox for related posts section at post page
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_enable_related_posts',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => true,
            'sanitize_callback' => 'yaatra_sanitize_checkbox',
        )
    );
    $wp_customize->add_control( new Yaatra_Toggle_Checkbox_Custom_Control(
        $wp_customize, 
        'yaatra_enable_related_posts',
            array(
                'label'         => __( 'Related Posts Option', 'yaatra' ),
                'description'   => __( 'Option to show/hide related posts.', 'yaatra' ),
                'section'       => 'yaatra_post_section',
                'settings'      => 'yaatra_enable_related_posts',
                'priority'      => 10
            )
        )
    );
    
    /**
     * Text field for related posts section at post page
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'related_posts_title',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => __( 'Related Posts', 'yaatra' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'related_posts_title',
            array(
                'label'         => __( 'Related Posts Title', 'yaatra' ),
                'type'          => 'text',
                'section'       => 'yaatra_post_section',
                'settings'      => 'related_posts_title',
                'priority'      => 15,
                'active_callback'   => 'yaatra_enable_related_posts_active_callback'
            )
        );

    /**
     * Number for related posts section at post page
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_related_posts_count',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 3,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'yaatra_related_posts_count',
            array(
                'label'         => __( 'No.of Related Posts to display', 'yaatra' ),
                'type'          => 'number',
                'section'       => 'yaatra_post_section',
                'settings'      => 'yaatra_related_posts_count',
                'priority'      => 20,
                'active_callback'   => 'yaatra_enable_related_posts_active_callback'
            )
        );

    /**
     * Select field for related post orderby
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
        'yaatra_related_posts_orderby',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => 'rp_default',
            'sanitize_callback' => 'yaatra_sanitize_select',
        )
    );
    $wp_customize->add_control(
        'yaatra_related_posts_orderby',
        array(
            'label'         => __( 'Post orderby', 'yaatra' ),
            'section'       => 'yaatra_post_section',
            'settings'      => 'yaatra_related_posts_orderby',
            'type'          => 'select',
            'priority'      => 25,
            'choices'       => array(
                'rp_default'     => __( 'Default', 'yaatra' ),
                'rp_rand' => __( 'Random', 'yaatra' )
            ),
            'active_callback'   => 'yaatra_enable_related_posts_active_callback'
        )
    );

}