<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yaatra' ); ?></a>
	<?php
		/**
	     * hook - yaatra_before_header
	     *
	     * @since 1.0.7
	     */
	    do_action( 'yaatra_before_header' );
	?>
<div class="cv-container">
	<div id="site-main-content">

	<?php
		/**
		 * hook - yaatra_main_header_sec
		 *   
		 * @hooked - yaatra_main_header_start 5 
		 * @hooked - yaatra_main_header_site_branding 10
		 * @hooked - yaatra_main_header_nav_menu 15 
		 * @hooked - yaatra_main_header_sidebar 20
		 * @hooked - yaatra_main_header_end 25 
		 */ 
		do_action( 'yaatra_main_header_sec' );



		/**
		 * hook - yaatra_before_main_content
		 * 
		 * @hooked - yaatra_main_content_start 5
		 */
		do_action( 'yaatra_before_main_content' );


		/**
		 * hook - yaatra_inner_pages_header
		 * 
		 * @hooked - yaatra_inner_pages_header_element - 5
		 */
		do_action( 'yaatra_inner_pages_header' );


		if( is_front_page() ) {
			/**
			 * yaatra_front_banner hook
			 */
			do_action( 'yaatra_front_banner' );
		}

