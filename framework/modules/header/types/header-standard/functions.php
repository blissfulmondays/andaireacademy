<?php

if ( ! function_exists( 'arabesque_mikado_register_header_standard_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function arabesque_mikado_register_header_standard_type( $header_types ) {
		$header_type = array(
			'header-standard' => 'ArabesqueMikado\Modules\Header\Types\HeaderStandard'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'arabesque_mikado_init_register_header_standard_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function arabesque_mikado_init_register_header_standard_type() {
		add_filter( 'arabesque_mikado_filter_register_header_type_class', 'arabesque_mikado_register_header_standard_type' );
	}
	
	add_action( 'arabesque_mikado_action_before_header_function_init', 'arabesque_mikado_init_register_header_standard_type' );
}