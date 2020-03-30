<?php
/**
 * Define custom fields for widgets
 * 
 * @package CodeVibrant
 * @subpackage Yaatra
 * @since 1.0.0
 */

function yaatra_widgets_show_widget_field( $instance = '', $widget_field = '', $yaatra_widget_field_value = '' ) {
    
    extract( $widget_field );

    switch ( $yaatra_widgets_field_type ) {

        /**
         * text widget field
         */
        case 'text'
        ?>
            <p>
                <span class="field-label"><label for="<?php echo esc_attr( $instance->get_field_id( $yaatra_widgets_name ) ); ?>"><?php echo esc_html( $yaatra_widgets_title ); ?></label></span>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $yaatra_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $yaatra_widgets_name ) ); ?>" type="text" value="<?php echo esc_html( $yaatra_widget_field_value ); ?>" />

                <?php if ( isset( $yaatra_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $yaatra_widgets_description ); ?></em>
                <?php } ?>
            </p>
        <?php
            break;

        /**
         * user dropdown widget field
         */
        case 'user_dropdown' :
            if( empty( $yaatra_widget_field_value ) ) {
                $yaatra_widget_field_value = $yaatra_widgets_default;
            }
            $select_field = 'name="'. esc_attr( $instance->get_field_name( $yaatra_widgets_name ) ) .'" id="'. esc_attr( $instance->get_field_id( $yaatra_widgets_name ) ) .'" class="widefat"';
        ?>
                <p>
                    <label for="<?php echo esc_attr( $instance->get_field_id( $yaatra_widgets_name ) ); ?>"><?php echo esc_html( $yaatra_widgets_title ); ?>:</label>
                    <?php
                        $dropdown_args = wp_parse_args( array(
                            'show_option_none'  => __( '- - Select User - -', 'yaatra' ),
                            'selected'          => esc_attr( $yaatra_widget_field_value ),
                        ) );

                        $dropdown_args['echo'] = false;

                        $dropdown = wp_dropdown_users( $dropdown_args );
                        $dropdown = str_replace( '<select', '<select ' . $select_field, $dropdown );
                        echo $dropdown;
                    ?>
                </p>
        <?php
            break;

        /**
         * number widget field
         */
        case 'number' :
            if( empty( $yaatra_widget_field_value ) ) {
                $yaatra_widget_field_value = $yaatra_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $yaatra_widgets_name ) ); ?>"><?php echo esc_html( $yaatra_widgets_title ); ?></label>
                <input name="<?php echo esc_attr( $instance->get_field_name( $yaatra_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $yaatra_widgets_name ) ); ?>" value="<?php echo esc_html( $yaatra_widget_field_value ); ?>" class="small-text" />

                <?php if ( isset( $yaatra_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $yaatra_widgets_description ); ?></em>
                <?php } ?>
            </p>
        <?php
            break;

        default:
            
            break;

    }
}

function yaatra_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );
    
    if ( $yaatra_widgets_field_type == 'number') {
        return absint( $new_field_value );
    } else {
        return sanitize_text_field( $new_field_value );
    }
}