<?php

if ( ! function_exists( 'arabesque_mikado_add_product_info_shortcode' ) ) {
	function arabesque_mikado_add_product_info_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'ArabesqueCore\CPT\Shortcodes\ProductInfo\ProductInfo',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( arabesque_mikado_core_plugin_installed() ) {
		add_filter( 'arabesque_core_filter_add_vc_shortcode', 'arabesque_mikado_add_product_info_shortcode' );
	}
}

if ( ! function_exists( 'arabesque_mikado_add_product_info_into_shortcodes_list' ) ) {
	function arabesque_mikado_add_product_info_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'mkdf_product_info';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'arabesque_mikado_filter_woocommerce_shortcodes_list', 'arabesque_mikado_add_product_info_into_shortcodes_list' );
}