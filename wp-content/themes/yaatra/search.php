<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

get_header();
?>
<div class="cv-content-wrapper">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'yaatra' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

		<?php
			$total_post_count = $wp_query->found_posts;
			$post_count = 1;
			$yaatra_archive_layout = get_theme_mod( 'yaatra_archive_layout', 'classic' );
				/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						if( $yaatra_archive_layout == 'classic-grid' ) {
							if( $post_count == 1 ) {
			                	echo '<div class="archive-grid-post-wrapper">';
			                } elseif ( $post_count == 5 ) {
			                	echo '<div class="archive-classic-post-wrapper">';
			                }
						}

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

						if( $yaatra_archive_layout == 'classic-grid' ) {
							if( $post_count == 4 || $post_count == 5 || $post_count == $total_post_count ) {
								echo '</div>';
							}
							if( $post_count == 5 ) { $post_count = 0; }
							$post_count++;
						}

					endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

    <?php yaatra_get_sidebar(); ?>
</div><!-- .cv-content-wrapper -->

<?php
get_footer();