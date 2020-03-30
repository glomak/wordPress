<?php
/**
 * Define callback functions for active_callback.
 * 
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

if( ! function_exists( 'yaatra_front_banner_option_active_callback' ) ):

    /**
	 * Check if banner section is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function yaatra_front_banner_option_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'yaatra_front_banner_option' )->value() ){
            return true;
        } else {
            return false;
        }
    }
    
endif; 

if( ! function_exists( 'yaatra_enable_related_posts_active_callback' ) ):

    /**
	 * Check if related posts toggle option is enabled.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
    function yaatra_enable_related_posts_active_callback( $control ) {
        if( false !== $control->manager->get_setting( 'yaatra_enable_related_posts' )->value() ){
            return true;
        } else {
            return false;
        }
    }
    
endif; 