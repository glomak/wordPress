<?php
/**
 * custom function and work related to widgets.
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yaatra_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Header Sidebar', 'yaatra' ),
		'id'            => 'header-sidebar',
		'description'   => esc_html__( 'Add widgets here for header left area.', 'yaatra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-wrap"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yaatra' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yaatra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-wrap"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'yaatra' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'Add widgets here for left sidebar.', 'yaatra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-wrap"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'yaatra' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here for footer widget area.', 'yaatra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title-wrap"><h4 class="widget-title">',
		'after_title'   => '</h4></div>',
	) );
}
add_action( 'widgets_init', 'yaatra_widgets_init' );

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Register different widgets
 *
 * @since 1.0.1
 */
add_action( 'widgets_init', 'yaatra_register_widgets' );

function yaatra_register_widgets() {

	// Author Info
	register_widget( 'Yaatra_Author_Info' );

	// Latest Posts
	register_widget( 'Yaatra_Latest_Posts' );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Load widget required files
 *
 * @since 1.0.0
 */

require get_template_directory() . '/inc/widgets/cv-widget-fields.php';    // Widget fields

require get_template_directory() . '/inc/widgets/cv-author-info.php';    // Author Info
require get_template_directory() . '/inc/widgets/cv-latest-posts.php';    // Author Info