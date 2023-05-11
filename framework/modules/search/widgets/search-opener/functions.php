<?php

if ( ! function_exists( 'arabesque_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function arabesque_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'ArabesqueMikadoSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'arabesque_mikado_filter_register_widgets', 'arabesque_mikado_register_search_opener_widget' );
}