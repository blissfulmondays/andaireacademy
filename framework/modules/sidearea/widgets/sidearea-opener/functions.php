<?php

if ( ! function_exists( 'arabesque_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function arabesque_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'ArabesqueMikadoSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'arabesque_mikado_filter_register_widgets', 'arabesque_mikado_register_sidearea_opener_widget' );
}