<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			/**
		     * yaatra_author_box hook
		     *
		     * @hooked - yaatra_author_box_section - 10
		     *
		     * @since 1.0.0
		     */
			do_action( 'yaatra_author_box' );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		/**
		 * Related posts
		 */
		do_action( 'yaatra_after_single_page' );
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php
	yaatra_get_sidebar();
get_footer();
