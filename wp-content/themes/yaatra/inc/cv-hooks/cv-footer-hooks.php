<?php
/**
 * File to define the footer custom hook functions 
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 *
 */

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_footer_start' ) ):
    /**
     * function for footer start 
     */
    function yaatra_footer_start(){
    ?>
        <footer id="colophon" class="site-footer">
<?php    
    }
endif;
/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_footer_sidebar' ) ):
    /**
     * function for footer sidebar 
     */
    function yaatra_footer_sidebar(){
        if ( !is_active_sidebar( 'sidebar-footer' ) ){
            return;
        }
    ?>
        <div class="footer-widget-area">
            <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div><!-- .footer-widget-area -->
<?php    
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_footer_logo' ) ):
    /**
     * function for footer logo 
     */
    function yaatra_footer_logo(){
        $yaatra_footer_logo = get_theme_mod( 'yaatra_footer_logo_image', '' );
        if( empty( $yaatra_footer_logo ) ) {
            return;
        }
    ?>
        <div class="cv-footer-logo">
            <figure><img src="<?php echo esc_url( $yaatra_footer_logo ); ?>" /></figure>
        </div><!-- .cv-footer-logo -->
<?php    
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_footer_menu' ) ):
    /**
     * function for footer menu 
     */
    function yaatra_footer_menu(){
    ?>
        <div class="cv-footer-right-wrapper">
            <nav id="site-footer-navigation" class="footer-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'yaatra_footer_menu', 'menu_id' => 'footer-menu', 'fallback_cb' => false ) ); ?>
            </nav><!-- #site-navigation -->
<?php    
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_footer_copyright' ) ):
    /**
     * function for footer copyright 
     */
    function yaatra_footer_copyright(){
    ?>
            <div class="cv-bottom-wrapper clearfix">
                <?php yaatra_social_media(); ?>
                <div class="site-info">
                    <span class="cv-copyright-text">
                        <?php 
                            $yaatra_copyright_text = get_theme_mod( 'yaatra_copyright_text', __( 'yaatra', 'yaatra' ) );
                            echo esc_html( $yaatra_copyright_text );
                        ?>
                    </span>
                    <span class="sep"> | </span>
                        <?php
                        /* translators: 1: Theme name, 2: Theme author. */
                        printf( esc_html__( 'Theme: %1$s by %2$s.', 'yaatra' ), 'yaatra', '<a href="https://codevibrant.com/">CodeVibrant</a>' );
                        ?>
                </div><!-- .site-info -->
            </div><!-- .cv-bottom-wrapper -->
        </div><!-- .cv-footer-right-wrapper -->
<?php    
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_footer_end' ) ):
    /**
     * function for footer end 
     */
    function yaatra_footer_end(){
    ?>
        </footer><!-- #colophon -->
<?php    
    }
endif;


add_action( 'yaatra_footer_section', 'yaatra_footer_start', 5 );
add_action( 'yaatra_footer_section', 'yaatra_footer_sidebar', 10 );
add_action( 'yaatra_footer_section', 'yaatra_footer_logo', 15 );
add_action( 'yaatra_footer_section', 'yaatra_footer_menu', 20 );
add_action( 'yaatra_footer_section', 'yaatra_footer_copyright', 25 );
add_action( 'yaatra_footer_section', 'yaatra_footer_end', 50 );