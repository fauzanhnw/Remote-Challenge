<?php
/**
 * Requirements
 *
 * @package GamiPress\HappyForms\Requirements
 * @since 1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Add the custom field to the requirement object
 *
 * @since 1.0.0
 *
 * @param $requirement
 * @param $requirement_id
 *
 * @return array
 */
function gamipress_happyforms_requirement_object( $requirement, $requirement_id ) {

    if( isset( $requirement['trigger_type'] )
        && ( $requirement['trigger_type'] === 'gamipress_happyforms_field_value_submission'
            || $requirement['trigger_type'] === 'gamipress_happyforms_specific_field_value_submission' ) ) {

        // Field name and value
        $requirement['happyforms_field_name'] = get_post_meta( $requirement_id, '_gamipress_happyforms_field_name', true );
        $requirement['happyforms_field_value'] = get_post_meta( $requirement_id, '_gamipress_happyforms_field_value', true );
    }

    return $requirement;
}
add_filter( 'gamipress_requirement_object', 'gamipress_happyforms_requirement_object', 10, 2 );

/**
 * Custom field on requirements UI
 *
 * @since 1.0.0
 *
 * @param $requirement_id
 * @param $post_id
 */
function gamipress_happyforms_requirement_ui_fields( $requirement_id, $post_id ) {

    $field_name = get_post_meta( $requirement_id, '_gamipress_happyforms_field_name', true );
    $field_value = get_post_meta( $requirement_id, '_gamipress_happyforms_field_value', true );
    ?>

    <span class="happyforms-field-name"><input type="text" value="<?php echo $field_name; ?>" placeholder="<?php echo __( 'Field name', 'gamipress' ); ?>" /></span>
    <span class="happyforms-field-value"><input type="text" value="<?php echo $field_value; ?>" placeholder="<?php echo __( 'Field value', 'gamipress' ); ?>" /></span>

    <?php
}
add_action( 'gamipress_requirement_ui_html_after_achievement_post', 'gamipress_happyforms_requirement_ui_fields', 10, 2 );

/**
 * Custom handler to save the custom field on requirements UI
 *
 * @since 1.0.0
 *
 * @param $requirement_id
 * @param $requirement
 */
function gamipress_happyforms_ajax_update_requirement( $requirement_id, $requirement ) {

    if( isset( $requirement['trigger_type'] )
        && ( $requirement['trigger_type'] === 'gamipress_happyforms_field_value_submission'
            || $requirement['trigger_type'] === 'gamipress_happyforms_specific_field_value_submission' ) ) {

        // Field name and value
        update_post_meta( $requirement_id, '_gamipress_happyforms_field_name', $requirement['happyforms_field_name'] );
        update_post_meta( $requirement_id, '_gamipress_happyforms_field_value', $requirement['happyforms_field_value'] );
    }
}
add_action( 'gamipress_ajax_update_requirement', 'gamipress_happyforms_ajax_update_requirement', 10, 2 );