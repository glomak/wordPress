<?php 
/**
 * Easy Mart manage the Customizer options of general settings.
 *
 * @package Code Vibrant
 * @subpackage Easy Mart
 * @since 1.0.0
 */

// Checkbox for latest posts at frontpage
Kirki::add_field( 'easy_mart_config', array(
	'type'        => 'checkbox',
	'settings'    => 'frontpage_latest_post_view_opt',
	'label'       => esc_html__( 'Hide latest posts in frontpage.', 'easy-mart' ),
	'description' => esc_html__( 'Option to show/hide latest posts in frontpage', 'easy-mart' ),
	'section'     => 'static_front_page',
	'default'     => false,
	'priority'    => 5,
) );

// Site Layout Setting Custom Text
Kirki::add_field( 'easy_mart_config', array(
	'type'        => 'custom',
	'settings'    => 'site_layout_heading',
	'section'     => 'site_setting',
	'default'     => '<div style="padding: 20px;background-color: #333; color: #fff;">' . esc_html__( 'Site Layout Setting', 'easy-mart' ) . '</div>',
	'priority'    => 40,
 ) );

// Site Layout Setting
Kirki::add_field( 'easy_mart_config', array(
	'type'        => 'radio-image',
	'settings'    => 'site_layout_setting',
	'label'       => esc_html__( 'Site layout', 'easy-mart' ),
	'section'     => 'site_setting',
	'default'     => 'full-width',
	'priority'    => 50,
	'choices'     => array(
		'boxed-layout'   => get_template_directory_uri() . '/assets/images/box-layout.png',
		'full-width'  => get_template_directory_uri() . '/assets/images/full-width.png',
	),
) );