<?php

if ( ! function_exists( 'arabesque_mikado_breadcrumbs_title_area_typography_style' ) ) {
	function arabesque_mikado_breadcrumbs_title_area_typography_style() {
		
		$item_styles = arabesque_mikado_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-breadcrumbs'
		);
		
		echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = arabesque_mikado_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.mkdf-title-holder .mkdf-title-wrapper .mkdf-breadcrumbs a:hover'
		);
		
		echo arabesque_mikado_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_breadcrumbs_title_area_typography_style' );
}