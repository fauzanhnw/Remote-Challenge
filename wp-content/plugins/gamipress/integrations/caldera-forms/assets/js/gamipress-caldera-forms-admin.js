(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).val();
        var form_selector = $(this).siblings('.select-caldera-form');

        if( trigger_type === 'gamipress_cf_specific_new_form_submission'
            || trigger_type === 'gamipress_cf_specific_field_value_submission' ) {
            form_selector.show();
        } else {
            form_selector.hide();
        }

        var field_name_input = $(this).siblings('.cf-field-name');
        var field_value_input = $(this).siblings('.cf-field-value');

        if( trigger_type === 'gamipress_cf_field_value_submission'
            || trigger_type === 'gamipress_cf_specific_field_value_submission' ) {
            field_name_input.show();
            field_value_input.show();
        } else {
            field_name_input.hide();
            field_value_input.hide();
        }

    });

    // Loop requirement list items to show/hide form select on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).find('.select-trigger-type').val();
        var form_selector = $(this).find('.select-caldera-form');

        if( trigger_type === 'gamipress_cf_specific_new_form_submission'
            || trigger_type === 'gamipress_cf_specific_field_value_submission') {
            form_selector.show();
        } else {
            form_selector.hide();
        }

        var field_name_input = $(this).find('.cf-field-name');
        var field_value_input = $(this).find('.cf-field-value');

        if( trigger_type === 'gamipress_cf_field_value_submission'
            || trigger_type === 'gamipress_cf_specific_field_value_submission' ) {
            field_name_input.show();
            field_value_input.show();
        } else {
            field_name_input.hide();
            field_value_input.hide();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if( requirement_details.trigger_type === 'gamipress_cf_specific_new_form_submission'
            || requirement_details.trigger_type === 'gamipress_cf_specific_field_value_submission') {
            requirement_details.caldera_form = requirement.find( '.select-caldera-form' ).val();
        }

        if( requirement_details.trigger_type === 'gamipress_cf_field_value_submission'
            || requirement_details.trigger_type === 'gamipress_cf_specific_field_value_submission' ) {
            requirement_details.cf_field_name = requirement.find( '.cf-field-name input' ).val();
            requirement_details.cf_field_value = requirement.find( '.cf-field-value input' ).val();
        }

    });

})( jQuery );