<?php

if ( ! function_exists( 'arabesque_mikado_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function arabesque_mikado_header_top_bar_styles() {
		$top_header_height = arabesque_mikado_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo arabesque_mikado_dynamic_css( '.mkdf-top-bar', array( 'height' => arabesque_mikado_filter_px( $top_header_height ) . 'px' ) );
			echo arabesque_mikado_dynamic_css( '.mkdf-top-bar .mkdf-logo-wrapper a', array( 'max-height' => arabesque_mikado_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo arabesque_mikado_dynamic_css( '.mkdf-header-box .mkdf-top-bar-background', array( 'height' => arabesque_mikado_get_top_bar_background_height() . 'px' ) );
		
		$top_bar_container_selector = '.mkdf-top-bar > .mkdf-vertical-align-containers';
		$top_bar_container_styles   = array();
		$container_side_padding     = arabesque_mikado_options()->getOptionValue( 'top_bar_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( arabesque_mikado_string_ends_with( $container_side_padding, 'px' ) || arabesque_mikado_string_ends_with( $container_side_padding, '%' ) ) {
				$top_bar_container_styles['padding-left'] = $container_side_padding;
				$top_bar_container_styles['padding-right'] = $container_side_padding;
			} else {
				$top_bar_container_styles['padding-left'] = arabesque_mikado_filter_px( $container_side_padding ) . 'px';
				$top_bar_container_styles['padding-right'] = arabesque_mikado_filter_px( $container_side_padding ) . 'px';
			}
			
			echo arabesque_mikado_dynamic_css( $top_bar_container_selector, $top_bar_container_styles );
		}
		
		if ( arabesque_mikado_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.mkdf-top-bar .mkdf-grid .mkdf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = arabesque_mikado_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = arabesque_mikado_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = arabesque_mikado_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo arabesque_mikado_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = arabesque_mikado_options()->getOptionValue( 'top_bar_background_color' );
        $background_image = arabesque_mikado_options()->getOptionValue( 'top_bar_background_image' );
		$border_color     = arabesque_mikado_options()->getOptionValue( 'top_bar_border_color' );

		$top_bar_background_selector = array(
		  '.mkdf-header-box .mkdf-top-bar-background'
        );
		$top_bar_background_style = array();

		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( arabesque_mikado_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = arabesque_mikado_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = arabesque_mikado_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			$top_bar_background_style['background-color'] = $background_color;
		}

		if($background_image !== '' ){
            $top_bar_styles['background-image'] = 'url('.$background_image.')';
            $top_bar_background_style['background-image'] = 'url('.$background_image.')';
        }

        echo arabesque_mikado_dynamic_css( $top_bar_background_selector, $top_bar_background_style );

        if ( arabesque_mikado_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo arabesque_mikado_dynamic_css( '.mkdf-top-bar', $top_bar_styles );
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_header_top_bar_styles' );
}