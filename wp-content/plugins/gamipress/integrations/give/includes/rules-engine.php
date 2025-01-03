<?php
/**
 * Rules Engine
 *
 * @package GamiPress\Give\Rules_Engine
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Checks if an user is allowed to work on a given requirement related to a minimum amount
 *
 * @since  1.0.0
 *
 * @param bool $return          The default return value
 * @param int $user_id          The given user's ID
 * @param int $requirement_id   The given requirement's post ID
 * @param string $trigger       The trigger triggered
 * @param int $site_id          The site id
 * @param array $args           Arguments of this trigger
 *
 * @return bool True if user has access to the requirement, false otherwise
 */
function gamipress_give_user_has_access_to_achievement( $return = false, $user_id = 0, $requirement_id = 0, $trigger = '', $site_id = 0, $args = array() ) {

    // If we're not working with a requirement, bail here
    if ( ! in_array( get_post_type( $requirement_id ), gamipress_get_requirement_types_slugs() ) )
        return $return;

    // Check if user has access to the achievement ($return will be false if user has exceed the limit or achievement is not published yet)
    if( ! $return )
        return $return;

    // If is minimum amount trigger, rules engine needs to check the minimum amount
    if( $trigger === 'gamipress_give_new_donation_min_amount' ) {

        $amount = floatval( $args[3] );

        $required_amount = floatval( get_post_meta( $requirement_id, '_gamipress_give_amount', true ) );

        // True if there is donated amount is bigger than required amount
        $return = (bool) ( $amount >= $required_amount );
    }

    // Send back our eligibility
    return $return;

}
add_filter( 'user_has_access_to_achievement', 'gamipress_give_user_has_access_to_achievement', 10, 6 );