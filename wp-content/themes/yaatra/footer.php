<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */


	/**
	 * hook - yaatra_after_main_content
	 *  
	 * @hooked - yaatra_main_content_end 5
	 */
	do_action( 'yaatra_after_main_content' );


	/**
	 * hook - yaatra_footer_section
	 * 
	 * @hooked - yaatra_footer_start - 5
	 * @hooked - yaatra_footer_sidebar - 5
	 * @hooked - yaatra_footer_logo - 5
	 * @hooked - yaatra_footer_menu - 5
	 * @hooked - yaatra_footer_copyright - 5
	 * @hooked - yaatra_footer_end - 5
	 */
	do_action( 'yaatra_footer_section' );

	$scroll_top_label = apply_filters( 'yaatra_scroll_top_label', __( 'Back To Top', 'yaatra' ) );
?>

				<div id="cv-scrollup" class="animated arrow-hide"><?php echo esc_html( $scroll_top_label ); ?></div>
			</div><!-- .main-content-wrapper -->

		</div><!-- #site-main-content -->
	</div><!-- .cv-container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
