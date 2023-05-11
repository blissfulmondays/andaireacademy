<?php

if ( ! function_exists( 'arabesque_mikado_timetable_custom_styles' ) ) {
    /**
     * Outputs custom styles for timetable
     */
    function arabesque_mikado_timetable_custom_styles() {
        $first_main_color = arabesque_mikado_options()->getOptionValue( 'first_color' );
        if ( ! empty( $first_main_color ) ) {
            $color_selector = array(
                '.widget.upcoming_events_widget .tt_upcoming_event_controls a:hover'
            );

            $color_important_selector = array(
                'table.tt_timetable .event a:hover',
                'table.tt_timetable .event a.event_header:hover',
                '.tt_tabs .tt_tabs_navigation li a:hover',
                '.tt_tabs .tt_tabs_navigation .ui-tabs-active a',
                '.mkdf-ttevents-single .tt_event_items_list li.type_info .tt_event_text',
                '.mkdf-ttevents-single .tt_event_items_list li:not(.type_info):before'
            );

            $background_color_selector = array(
                '.events_filter.tt_tabs_navigation li a',
                '.tt_tabs .tt_tabs_navigation li a'
            );

            $border_color_selector = array(
                '.widget.upcoming_events_widget .tt_upcoming_event_controls a:hover'
            );

            $border_color_important_selector = array(
                '.tt_tabs .tt_tabs_navigation li a',
                '.tt_tabs .tt_tabs_navigation li a:hover',
                '.tt_tabs .tt_tabs_navigation .ui-tabs-active a'
            );

            echo arabesque_mikado_dynamic_css( $color_selector, array( 'color' => $first_main_color ) );
            echo arabesque_mikado_dynamic_css( $color_important_selector, array( 'color' => $first_main_color . '!important' ) );
            echo arabesque_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $first_main_color ) );
            echo arabesque_mikado_dynamic_css( $border_color_selector, array( 'border-color' => $first_main_color ) );

            if ( is_array( $border_color_important_selector ) && count( $border_color_important_selector ) ) {
                echo arabesque_mikado_dynamic_css( $border_color_important_selector, array( 'border-color' => $first_main_color . '!important' ) );
            }
        }
    }

    add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_timetable_custom_styles' );
}