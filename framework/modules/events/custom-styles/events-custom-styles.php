<?php

if ( ! function_exists( 'arabesque_mikado_events_header_menu_area_styles' ) ) {
	/**
	 * Generates styles for menu area
	 */
	function arabesque_mikado_events_header_menu_area_styles() {
		$background_color              = arabesque_mikado_options()->getOptionValue( 'events_menu_area_background_color' );
		$background_color_transparency = arabesque_mikado_options()->getOptionValue( 'events_menu_area_background_transparency' );
		
		$menu_area_styles = array();
		
		if ( $background_color !== '' ) {
			$menu_area_background_color        = $background_color;
			$menu_area_background_transparency = 1;
			
			if ( $background_color_transparency !== '' ) {
				$menu_area_background_transparency = $background_color_transparency;
			}
			
			$menu_area_styles['background-color'] = arabesque_mikado_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		}
		
		echo arabesque_mikado_dynamic_css( '.post-type-archive-tribe_events .mkdf-page-header .mkdf-menu-area', $menu_area_styles );
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_events_header_menu_area_styles' );
}