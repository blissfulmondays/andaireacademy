<?php

if(!function_exists('arabesque_mikado_events_scope_meta_box_functions')) {
	function arabesque_mikado_events_scope_meta_box_functions($post_types) {
		$post_types[] = 'events';
		$post_types[] = 'tt-events';
		$post_types[] = 'tribe_events';
		
		return $post_types;
	}
	
	add_filter('arabesque_mikado_filter_meta_box_post_types_save', 'arabesque_mikado_events_scope_meta_box_functions');
	add_filter('arabesque_mikado_filter_meta_box_post_types_remove', 'arabesque_mikado_events_scope_meta_box_functions');
	add_filter('arabesque_mikado_filter_set_scope_for_meta_boxes', 'arabesque_mikado_events_scope_meta_box_functions');
}

if ( ! function_exists( 'arabesque_mikado_events_deregister_theme_map_script' ) ) {
	/**
	 * Deregisters theme's google map api script when on single event page or on calendar page
	 */
	function arabesque_mikado_events_deregister_theme_map_script() {
		if ( tribe_is_event() || is_post_type_archive( 'tribe_events' ) ) {
			wp_dequeue_script( 'arabesque-mikado-google-map-api' );
		}
	}
	
	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_events_deregister_theme_map_script' );
}

if ( ! function_exists( 'arabesque_mikado_events_archive_sidebar_layout' ) ) {
	/**
	 * Resets sidebar layout for events archive page
	 *
	 * @param $layout
	 *
	 * @return string
	 */
	function arabesque_mikado_events_archive_sidebar_layout( $layout ) {
		if ( is_post_type_archive( 'tribe_events' ) ) {
			$layout = '';
		}
		
		return $layout;
	}
	
	add_filter( 'arabesque_mikado_filter_sidebar_layout', 'arabesque_mikado_events_archive_sidebar_layout' );
}

if ( ! function_exists( 'arabesque_mikado_events_archive_sidebar' ) ) {
	/**
	 * Resets sidebar for events archive page
	 *
	 * @param $sidebar
	 *
	 * @return string
	 */
	function arabesque_mikado_events_archive_sidebar( $sidebar ) {
		if ( is_post_type_archive( 'tribe_events' ) ) {
			$sidebar = '';
		}
		
		if( is_singular('events')) {
			$sidebar = 'sidebar-event';
			
			$custom_sidebar_area = get_post_meta(get_the_ID(), 'mkdf_custom_sidebar_area_meta', true);
			
			if(!empty($custom_sidebar_area)) {
				$sidebar = $custom_sidebar_area;
			}
		}
		
		return $sidebar;
	}
	
	add_filter( 'arabesque_mikado_filter_sidebar_name', 'arabesque_mikado_events_archive_sidebar' );
}

if ( ! function_exists( 'arabesque_mikado_events_archive_sidebar_layout' ) ) {
	/**
	 * Resets sidebar layout for events archive page
	 *
	 * @param $layout
	 *
	 * @return string
	 */
	function arabesque_mikado_events_archive_sidebar_layout( $layout ) {
		if ( is_post_type_archive( 'tribe_events' ) ) {
			$layout = '';
		}
		
		return $layout;
	}
	
	add_filter( 'arabesque_mikado_filter_sidebar_layout', 'arabesque_mikado_events_archive_sidebar_layout' );
}

if ( ! function_exists( 'arabesque_mikado_events_archive_title_text' ) ) {
	/**
	 * Hooks to title text filter and alters it for events calendar page
	 *
	 * @param $text
	 *
	 * @return string
	 */
	function arabesque_mikado_events_archive_title_text( $text ) {
		if ( is_post_type_archive( 'tribe_events' ) ) {
			$text = esc_html__( 'Events Calendar', 'arabesque' );
		}
		
		return $text;
	}
	
	add_filter( 'arabesque_mikado_filter_title_text', 'arabesque_mikado_events_archive_title_text' );
}

if ( ! function_exists( 'arabesque_mikado_events_tooltip_image' ) ) {
	/**
	 * Hooks to tribe_events_template_data_array and changes tooltip image size
	 *
	 * @param $json
	 * @param $event
	 *
	 * @return mixed
	 */
	function arabesque_mikado_events_tooltip_image( $json, $event ) {
		if ( isset( $json['imageTooltipSrc'] ) ) {
			$image_tool_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $event->ID ), 'medium' );
			$image_tool_src = $image_tool_arr[0];
			
			$json['imageTooltipSrc'] = $image_tool_src;
		}
		
		return $json;
	}
	
	add_filter( 'tribe_events_template_data_array', 'arabesque_mikado_events_tooltip_image', 10, 2 );
}