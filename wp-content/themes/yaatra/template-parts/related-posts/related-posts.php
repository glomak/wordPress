<?php
/**
 * Related posts template after single page
 * 
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

global $post;
$current_post_id = $post->ID;

$related_posts_count = get_theme_mod( 'yaatra_related_posts_count', 3 );
$related_posts_title = get_theme_mod( 'related_posts_title', __( 'Related Posts', 'yaatra' ) );
$related_posts_args = array(
    'posts_per_page' => absint( $related_posts_count ),
    'post__not_in'   => array( $current_post_id ),
);

$get_categories = get_the_terms( $current_post_id, 'category' );
    if ( $get_categories && is_array( $get_categories ) ) {
        $selected_cat = array();
        foreach( $get_categories as $category ) {
            $selected_cat[] = $category->term_id;
        }
        $related_posts_args['category__in'] = $selected_cat;
    }

$related_posts_orderby = get_theme_mod( 'yaatra_related_posts_orderby', 'rp_default' );
if( 'rp_rand' === $related_posts_orderby ) {
    $related_posts_args['orderby'] = 'rand';
}

$related_posts_query = new WP_Query( $related_posts_args );

if( $related_posts_query->have_posts() ) {
    ?>
        <section class="yaatra-single-related-posts">
            
            <h2 class="yaatra-related-post-title"><?php echo esc_html( $related_posts_title ); ?></h2>
    
                <div class="yaatra-related-posts-wrapper clearfix">
                    <?php
                        while ( $related_posts_query->have_posts() ) {
                            $related_posts_query->the_post();
                            get_template_part( 'template-parts/related-posts/content', 'related' );
                        }
                    ?>
                </div><!-- .yaatra-related-posts-wrapper -->
    
        </section><!-- .yaatra-single-related-posts -->
    
<?php } ?>