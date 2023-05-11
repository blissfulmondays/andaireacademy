<?php

if ( ! function_exists( 'arabesque_mikado_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function arabesque_mikado_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'arabesque' );
		
		return $type;
	}
	
	add_filter( 'arabesque_mikado_filter_title_type_global_option', 'arabesque_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'arabesque_mikado_filter_title_type_meta_boxes', 'arabesque_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
}