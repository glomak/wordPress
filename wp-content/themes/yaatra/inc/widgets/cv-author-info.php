<?php
/**
 * CV: Author Info
 *
 * Widget show the author information
 *
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

class Yaatra_Author_Info extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname'     => 'yaatra_author_info',
            'description'   => __( 'Select the user to display the author info.', 'yaatra' ),
            'customize_selective_refresh'   => true,
        );
        parent::__construct( 'yaatra_author_info', __( 'CV: Author Info', 'yaatra' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'widget_title' => array(
                'yaatra_widgets_name'         => 'widget_title',
                'yaatra_widgets_title'        => __( 'Widget title', 'yaatra' ),
                'yaatra_widgets_field_type'   => 'text'
            ),

            'user_id' => array(
                'yaatra_widgets_name'         => 'user_id',
                'yaatra_widgets_title'        => __( 'Select Author', 'yaatra' ),
                'yaatra_widgets_default'      => '',
                'yaatra_widgets_field_type'   => 'user_dropdown'
            ),

        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $yaatra_widget_title = empty( $instance['widget_title'] ) ? '' : $instance['widget_title'];
        $yaatra_user_id      = empty( $instance['user_id'] ) ? '' : $instance['user_id'];

        echo $before_widget;
    ?>
            <div class="cv-author-info-wrapper">
                <?php
                    if( !empty( $yaatra_widget_title ) ) {
                        echo $before_title . esc_html( $yaatra_widget_title ) . $after_title;
                    }
                ?>
                <div class="author-bio-wrap">
                    <div class="author-avatar"><?php echo get_avatar( $yaatra_user_id, '132' ); ?></div>
                    <div class="author-description"><?php echo wp_kses_post( wpautop( get_the_author_meta( 'description', $yaatra_user_id ) ) ); ?></div>
                    <div class="author-social">
                        <?php yaatra_social_media(); ?>
                    </div><!-- .author-social -->
                </div><!-- .author-bio-wrap -->
            </div><!-- .cv-author-info-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    yaatra_widgets_updated_field_value()     defined in cv-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$yaatra_widgets_name] = yaatra_widgets_updated_field_value( $widget_field, $new_instance[$yaatra_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    yaatra_widgets_show_widget_field()       defined in cv-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $yaatra_widgets_field_value = !empty( $instance[$yaatra_widgets_name] ) ? wp_kses_post( $instance[$yaatra_widgets_name] ) : '';
            yaatra_widgets_show_widget_field( $this, $widget_field, $yaatra_widgets_field_value );
        }
    }
}