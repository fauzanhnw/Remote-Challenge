(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).val();
        var score_input = $(this).siblings('.sensei-quiz-score');

        if(
            trigger_type === 'gamipress_sensei_complete_quiz_grade'
            || trigger_type === 'gamipress_sensei_complete_specific_quiz_grade'
            || trigger_type === 'gamipress_sensei_complete_quiz_max_grade'
            || trigger_type === 'gamipress_sensei_complete_specific_quiz_max_grade'
        ) {
            score_input.show();
        } else {
            score_input.hide();
        }

    });

    // Loop requirement list items to show/hide score input on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).find('.select-trigger-type').val();
        var score_input = $(this).find('.sensei-quiz-score');

        if(
            trigger_type === 'gamipress_sensei_complete_quiz_grade'
            || trigger_type === 'gamipress_sensei_complete_specific_quiz_grade'
            || trigger_type === 'gamipress_sensei_complete_quiz_max_grade'
            || trigger_type === 'gamipress_sensei_complete_specific_quiz_max_grade'
        ) {
            score_input.show();
        } else {
            score_input.hide();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if(
            requirement_details.trigger_type === 'gamipress_sensei_complete_quiz_grade'
            || requirement_details.trigger_type === 'gamipress_sensei_complete_specific_quiz_grade'
            || requirement_details.trigger_type === 'gamipress_sensei_complete_quiz_max_grade'
            || requirement_details.trigger_type === 'gamipress_sensei_complete_specific_quiz_max_grade'
        ) {
            requirement_details.sensei_score = requirement.find( '.sensei-quiz-score input' ).val();
        }

    });

})( jQuery );