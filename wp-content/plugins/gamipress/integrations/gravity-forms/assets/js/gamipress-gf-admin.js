(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).val();
        var field_name_input = $(this).siblings('.gf-field-name');
        var field_value_input = $(this).siblings('.gf-field-value');

        if( trigger_type === 'gamipress_gf_field_value_submission'
            || trigger_type === 'gamipress_gf_specific_field_value_submission' ) {
            field_name_input.show();
            field_value_input.show();
        } else {
            field_name_input.hide();
            field_value_input.hide();
        }

    });

    // Loop requirement list items to show/hide amount input on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).find('.select-trigger-type').val();
        var field_name_input = $(this).find('.gf-field-name');
        var field_value_input = $(this).find('.gf-field-value');

        if( trigger_type === 'gamipress_gf_field_value_submission'
            || trigger_type === 'gamipress_gf_specific_field_value_submission' ) {
            field_name_input.show();
            field_value_input.show();
        } else {
            field_name_input.hide();
            field_value_input.hide();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if( requirement_details.trigger_type === 'gamipress_gf_field_value_submission'
            || requirement_details.trigger_type === 'gamipress_gf_specific_field_value_submission' ) {
            requirement_details.gf_field_name = requirement.find( '.gf-field-name input' ).val();
            requirement_details.gf_field_value = requirement.find( '.gf-field-value input' ).val();
        }

    });

})( jQuery );