<?php
/**
 * File to define the header custom hook functions 
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 *
 */

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_main_header_start' ) ):
    /**
     * function for header start
     * 
     */
    function yaatra_main_header_start(){
    ?>
		<header id="masthead" class="site-header">
<?php 
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_main_header_end' ) ):
    /**
     * function for header end
     * 
     */
    function yaatra_main_header_end(){
    ?>
        </header><!-- #masthead -->
<?php
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_main_header_site_branding' ) ):
    /**
     * function for header site branding
     * 
     */
    function yaatra_main_header_site_branding(){
    ?>
        <div class="site-branding">
            <?php
            the_custom_logo();
            if ( is_front_page() || is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            endif;
                $yaatra_description = get_bloginfo( 'description', 'display' );
                if ( $yaatra_description || is_customize_preview() ) :
            ?>
                    <p class="site-description"><?php echo $yaatra_description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->
<?php
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_main_header_nav_menu' ) ):
    /**
     * function for header nav menu
     * 
     */
    function yaatra_main_header_nav_menu(){
    ?>
        <div id="stickyNav" class="cv-menu-wrapper">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-navicon"></i></button>
            <nav id="site-navigation" class="main-navigation">
                <?php 
                    wp_nav_menu( array( 
                        'theme_location' => 'yaatra_primary_menu', 
                        'menu_id' => 'primary-menu',
                    ) );
                    ?>
            </nav><!-- #site-navigation -->
        </div><!-- .cv-menu-wrapper -->
<?php
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------*/
if( !function_exists( 'yaatra_main_header_sidebar' ) ):
    /**
     * function for header sidebar
     * 
     */
    function yaatra_main_header_sidebar(){

        if( !is_active_sidebar( 'header-sidebar' ) ){
            return;
        }
        dynamic_sidebar( 'header-sidebar' );
    }
endif;

add_action( 'yaatra_main_header_sec', 'yaatra_main_header_start', 5 );
add_action( 'yaatra_main_header_sec', 'yaatra_main_header_site_branding', 10 );
add_action( 'yaatra_main_header_sec', 'yaatra_main_header_nav_menu', 15 );
add_action( 'yaatra_main_header_sec', 'yaatra_main_header_sidebar', 20 );
add_action( 'yaatra_main_header_sec', 'yaatra_main_header_end', 25 );