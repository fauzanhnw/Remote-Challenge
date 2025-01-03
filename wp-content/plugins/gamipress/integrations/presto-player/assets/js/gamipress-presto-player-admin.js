(function( $ ) {

    // Listen for our change to our trigger type selectors
    $('.requirements-list').on( 'change', '.select-trigger-type', function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).val();
        var percent_input = $(this).siblings('.presto-player-percent');
        var min_percent_input = $(this).siblings('.presto-player-min-percent');
        var max_percent_input = $(this).siblings('.presto-player-max-percent');

        if( trigger_type === 'gamipress_presto_player_watch_video_min_percent'
            || trigger_type === 'gamipress_presto_player_watch_specific_video_min_percent' ) {
            percent_input.show();
        } else {
            percent_input.hide();
        }

        if( trigger_type === 'gamipress_presto_player_watch_video_between_percent'
            || trigger_type === 'gamipress_presto_player_watch_specific_video_between_percent' ) {
            min_percent_input.show();
            max_percent_input.show();
        } else {
            min_percent_input.hide();
            max_percent_input.hide();
        }

    });

    // Loop requirement list items to show/hide amount input on initial load
    $('.requirements-list li').each(function() {

        // Grab our selected trigger type and achievement selector
        var trigger_type = $(this).find('.select-trigger-type').val();
        var percent_input = $(this).find('.presto-player-percent');
        var min_percent_input = $(this).find('.presto-player-min-percent');
        var max_percent_input = $(this).find('.presto-player-max-percent');

        if( trigger_type === 'gamipress_presto_player_watch_video_min_percent'
            || trigger_type === 'gamipress_presto_player_watch_specific_video_min_percent' ) {
            percent_input.show();
        } else {
            percent_input.hide();
        }

        if( trigger_type === 'gamipress_presto_player_watch_video_between_percent'
            || trigger_type === 'gamipress_presto_player_watch_specific_video_between_percent' ) {
            min_percent_input.show();
            max_percent_input.show();
        } else {
            min_percent_input.hide();
            max_percent_input.hide();
        }

    });

    $('.requirements-list').on( 'update_requirement_data', '.requirement-row', function(e, requirement_details, requirement) {

        if( requirement_details.trigger_type === 'gamipress_presto_player_watch_video_min_percent'
            || requirement_details.trigger_type === 'gamipress_presto_player_watch_specific_video_min_percent' ) {
            requirement_details.presto_player_percent = requirement.find( '.presto-player-percent input' ).val();
        }

        if( requirement_details.trigger_type === 'gamipress_presto_player_watch_video_between_percent'
            || requirement_details.trigger_type === 'gamipress_presto_player_watch_specific_video_between_percent' ) {
            requirement_details.presto_player_min_percent = requirement.find( '.presto-player-min-percent input' ).val();
            requirement_details.presto_player_max_percent = requirement.find( '.presto-player-max-percent input' ).val();
        }

    });

})( jQuery );