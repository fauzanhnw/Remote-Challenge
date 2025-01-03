(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).val();
        var field_value_input = $(this).siblings('.acf-field-value');

        if( trigger_type === 'gamipress_acf_update_any_post_field_specific_value' 
            || trigger_type === 'gamipress_acf_update_any_user_field_specific_value'
            || trigger_type === 'gamipress_acf_update_specific_post_field_specific_value'
            || trigger_type === 'gamipress_acf_update_specific_user_field_specific_value' ) {
            field_value_input.show();
        } else {
            field_value_input.hide();
        }

    });

    // Loop requirement list items to show/hide amount input on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).find('.select-trigger-type').val();
        var field_value_input = $(this).find('.acf-field-value');

        if( trigger_type === 'gamipress_acf_update_any_post_field_specific_value'
        || trigger_type === 'gamipress_acf_update_any_user_field_specific_value'
        || trigger_type === 'gamipress_acf_update_specific_post_field_specific_value'
        || trigger_type === 'gamipress_acf_update_specific_user_field_specific_value' ) {
            field_value_input.show();
        } else {
            field_value_input.hide();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if( requirement_details.trigger_type === 'gamipress_acf_update_any_post_field_specific_value'
        || requirement_details.trigger_type === 'gamipress_acf_update_any_user_field_specific_value'
        || requirement_details.trigger_type === 'gamipress_acf_update_specific_post_field_specific_value'
        || requirement_details.trigger_type === 'gamipress_acf_update_specific_user_field_specific_value' ) {
            requirement_details.acf_field_value_condition = requirement.find( '.acf-field-value select' ).val();
            requirement_details.acf_field_value = requirement.find( '.acf-field-value input' ).val();
        }

    });

})( jQuery );