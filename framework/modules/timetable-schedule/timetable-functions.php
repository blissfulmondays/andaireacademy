<?php

if (!function_exists('arabesque_mikado_register_timetable_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function arabesque_mikado_register_timetable_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar Event', 'arabesque'),
            'id' => 'sidebar-event',
            'description' => esc_html__('Default Sidebar for Timetable pages', 'arabesque'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
            'after_title' => '</h4></div>'
        ));
    }

    add_action('widgets_init', 'arabesque_mikado_register_timetable_sidebars', 1);
}

if ( ! function_exists( 'arabesque_mikado_get_tt_event_single_content' ) ) {
	/**
	 * Loads timetable single event page
	 */

	function arabesque_mikado_get_tt_event_single_content() {
		$subtitle = get_post_meta( get_the_ID(), 'timetable_subtitle', true );

		$params = array(
			'subtitle' => $subtitle
		);

        arabesque_mikado_get_module_template_part( 'templates/events-single', 'timetable-schedule', '', $params );
	}

}

if ( ! function_exists( 'arabesque_mikado_tt_events_single_default_sidebar' ) ) {
	/**
	 * Sets default sidebar for timetable single event event
	 *
	 * @param $sidebar
	 *
	 * @return string
	 */
	function arabesque_mikado_tt_events_single_default_sidebar( $sidebar ) {
		$page_id = arabesque_mikado_get_page_id();

		if ( get_post_type( $page_id ) === 'events' ) {
			$custom_sidebar_area = get_post_meta( $page_id, 'mkdf_custom_sidebar_area_meta', true );
			$sidebar             = ! empty( $custom_sidebar_area ) ? $custom_sidebar_area : 'sidebar-event';
		}

		return $sidebar;
	}

	add_filter( 'arabesque_mikado_filter_sidebar_name', 'arabesque_mikado_tt_events_single_default_sidebar' );
}

if(!function_exists('arabesque_mikado_events_scope_meta_box_functions')) {
	function arabesque_mikado_events_scope_meta_box_functions($post_types) {
		$post_types[] = 'events';
		//$post_types[] = 'tt-events';
		//$post_types[] = 'tribe_events';

		return $post_types;
	}

	add_filter('arabesque_mikado_filter_meta_box_post_types_save', 'arabesque_mikado_events_scope_meta_box_functions');
	add_filter('arabesque_mikado_filter_meta_box_post_types_remove', 'arabesque_mikado_events_scope_meta_box_functions');
	add_filter('arabesque_mikado_filter_set_scope_for_meta_boxes', 'arabesque_mikado_events_scope_meta_box_functions');
}

if ( ! function_exists( 'mkdf_core_set_timetable_event_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set timetable events class name for shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function mkdf_core_set_timetable_event_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-a-timetable-events-hours';
		$shortcodes_icon_class_array[] = '.icon-wpb-a-timetable-event-info-holder';
		$shortcodes_icon_class_array[] = '.icon-wpb-a-timetable-event-info-table-item';
		
		return $shortcodes_icon_class_array;
	}

	if ( arabesque_mikado_timetable_schedule_installed() ) {
		add_filter( 'arabesque_core_filter_add_vc_shortcodes_custom_icon_class', 'mkdf_core_set_timetable_event_icon_class_name_for_vc_shortcodes' );
	}
}

if ( ! function_exists( 'arabesque_mikado_timetable_event_add_social_share_option' ) ) {
    function arabesque_mikado_timetable_event_add_social_share_option( $container ) {
        if ( arabesque_mikado_timetable_schedule_installed() ) {
            arabesque_mikado_add_admin_field(
                array(
                    'type'          => 'yesno',
                    'name'          => 'enable_social_share_on_events',
                    'default_value' => 'no',
                    'label'         => esc_html__( 'Events', 'arabesque' ),
                    'description'   => esc_html__( 'Show Social Share for Timetable Single Events', 'arabesque' ),
                    'parent'        => $container
                )
            );
        }
    }

    add_action( 'arabesque_mikado_action_post_types_social_share', 'arabesque_mikado_timetable_event_add_social_share_option', 15, 1 );
}