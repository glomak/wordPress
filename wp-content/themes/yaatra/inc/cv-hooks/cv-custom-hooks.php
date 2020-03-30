<?php
/**
 * File to define the custom hook functions 
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 *
 */

if( ! function_exists( 'yaatra_main_content_start' ) ):
	/**
	 * function to start main content
	 */
	function yaatra_main_content_start(){
	?>
		<div class="main-content-wrapper">
			<div id="content" class="site-content">
<?php	
	}
endif;
add_action( 'yaatra_before_main_content', 'yaatra_main_content_start', 5 );

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'yaatra_inner_pages_header_element' ) ):
	/**
	 * function to start main content
	 */
	function yaatra_inner_pages_header_element(){

			if( is_page() && !is_front_page() ) {
				$inner_header_attribute = '';
				$inner_header_attribute = apply_filters( 'yaatra_inner_header_style_attribute', $inner_header_attribute );
				if( !empty( $inner_header_attribute ) ) {
					$header_class = 'has-bg-img';
				} else {
					$header_class = 'no-bg-img';
				}
		?>
				<div class="custom-header <?php echo esc_attr( $header_class ); ?>" <?php echo ( ! empty( $inner_header_attribute ) ) ? ' style="' . esc_attr( $inner_header_attribute ) . '" ' : ''; ?>>
					<div class="cv-container">
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header><!-- .entry-header -->
					</div><!-- .cv-container -->
				</div><!-- .custom-header -->
		<?php	
			}
	}
endif;
add_action( 'yaatra_inner_pages_header', 'yaatra_inner_pages_header_element', 5 );

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'yaatra_main_content_end' ) ):
	/**
	 * function to start main content
	 */
	function yaatra_main_content_end(){
	?>
		</div><!-- #content -->
<?php	
	}
endif;
add_action( 'yaatra_after_main_content', 'yaatra_main_content_end', 5 );

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( ! function_exists( 'yaatra_front_banner_content' ) ):
	/**
	 * function to define banner section
	 */
	function yaatra_front_banner_content() {
		$yaatra_front_banner_option = get_theme_mod( 'yaatra_front_banner_option', true );
		if( $yaatra_front_banner_option === false ) {
			return;
		}
		$yaatra_front_banner_image = get_theme_mod( 'yaatra_front_banner_image', '' );
		$yaatra_banner_title 		= get_theme_mod( 'yaatra_banner_title', __( 'Banner Title', 'yaatra' ) );
		$yaatra_banner_content 	= get_theme_mod( 'yaatra_banner_content', '' );
		$yaatra_banner_btn_text 	= get_theme_mod( 'yaatra_banner_btn_text', __( 'Discover', 'yaatra' ) );
		$yaatra_banner_btn_link 	= get_theme_mod( 'yaatra_banner_btn_link', '' );
		if( !empty( $yaatra_front_banner_image ) ) {
?>
			<div class="cv-banner-wrapper">
				<figure>
					<img src="<?php echo esc_url( $yaatra_front_banner_image ); ?>">
				</figure>
				<div class="banner-content-wrapper">
					<div class="banner-content">
						<h2 class="banner-title"><?php echo esc_html( $yaatra_banner_title ); ?></h2>
						<div class="banner-info"><?php echo wp_kses_post( $yaatra_banner_content ); ?></div>
						<div class="banner-btn"><a href="<?php echo esc_url( $yaatra_banner_btn_link ); ?>"><?php echo esc_html( $yaatra_banner_btn_text ); ?> <i class="fa fa-plane"></i></a> </div>
					</div>
				</div><!-- banner-content-wrapper -->
			</div><!-- .cv-banner-wrapper -->
<?php
		}
	}
endif;

add_action( 'yaatra_front_banner', 'yaatra_front_banner_content', 10 );

/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * author avatar box
 *
 * @since 1.0.0
 */
if( ! function_exists( 'yaatra_author_box_section' ) ) :
    function yaatra_author_box_section() {
        global $post;
        $author_id = $post->post_author;
        $author_nickname = get_the_author_meta( 'display_name', $author_id );
        $np_author_website = get_the_author_meta( 'user_url', $author_id );
?>
        <div class="cv-author-box-wrapper clearfix">
            <div class="author-avatar">
                <a class="author-image" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>">
                    <?php echo get_avatar( $author_id, '132' ); ?>
                </a>
            </div><!-- .author-avatar -->

            <div class="author-desc-wrapper">                
                <a class="author-title" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php echo esc_html( $author_nickname ); ?></a>
                <div class="author-description"><?php echo wp_kses_post( wpautop( get_the_author_meta( 'description', $author_id ) ) ); ?></div>
                <div class="author-social">
                    <?php yaatra_social_media(); ?>
                </div><!-- .author-social -->
                <?php if( !empty( $np_author_website ) ) { ?>
                    <a href="<?php echo esc_url( $np_author_website ); ?>" target="_blank" class="admin-dec"><?php echo esc_url( $np_author_website ); ?></a>
                <?php } ?>
            </div><!-- .author-desc-wrapper-->
        </div><!-- .cv-author-box-wrapper -->
<?php
    }
endif;

add_action( 'yaatra_author_box', 'yaatra_author_box_section', 10 );