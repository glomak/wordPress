<?php
/**
 * Template part for displaying related posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

if( has_post_thumbnail() ) {
    $post_class = 'has-thumbnail wow fadeInUp';
} else {
    $post_class = 'no-thumbnail wow fadeInUp';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?> data-wow-delay="0.5s">
	
	<?php yaatra_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>

        <div class="entry-meta">
            <?php 
                yaatra_posted_on();
            ?>
        </div><!-- .entry-meta -->
        
	</header><!-- .entry-header -->

</article><!-- #post-<?php the_ID(); ?> -->
