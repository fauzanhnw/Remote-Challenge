(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type
        var trigger_type = $(this).val();
        var id_field = $(this).siblings('.select-wishlist-member-level-id');

        id_field.hide();

        if( trigger_type === 'gamipress_wishlist_member_add_specific_level'
            || trigger_type === 'gamipress_wishlist_member_remove_specific_level'
            || trigger_type === 'gamipress_wishlist_member_approve_specific_level'
            || trigger_type === 'gamipress_wishlist_member_unapprove_specific_level'
            || trigger_type === 'gamipress_wishlist_member_cancel_specific_level'
            || trigger_type === 'gamipress_wishlist_member_uncancel_specific_level' ) {
            id_field.show();
        }

    });

    // Loop requirement list items to show/hide inputs on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type
        var trigger_type = $(this).find('.select-trigger-type').val();
        var id_field = $(this).find('.select-wishlist-member-level-id');

        id_field.hide();

        if( trigger_type === 'gamipress_wishlist_member_add_specific_level'
            || trigger_type === 'gamipress_wishlist_member_remove_specific_level'
            || trigger_type === 'gamipress_wishlist_member_approve_specific_level'
            || trigger_type === 'gamipress_wishlist_member_unapprove_specific_level'
            || trigger_type === 'gamipress_wishlist_member_cancel_specific_level'
            || trigger_type === 'gamipress_wishlist_member_uncancel_specific_level' ) {
            id_field.show();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if( requirement_details.trigger_type === 'gamipress_wishlist_member_add_specific_level'
        || requirement_details.trigger_type === 'gamipress_wishlist_member_remove_specific_level'
        || requirement_details.trigger_type === 'gamipress_wishlist_member_approve_specific_level'
        || requirement_details.trigger_type === 'gamipress_wishlist_member_unapprove_specific_level'
        || requirement_details.trigger_type === 'gamipress_wishlist_member_cancel_specific_level'
        || requirement_details.trigger_type === 'gamipress_wishlist_member_uncancel_specific_level' ) {
            requirement_details.wishlist_member_level_id = requirement.find( '.select-wishlist-member-level-id' ).val();
        }

    });

})( jQuery );