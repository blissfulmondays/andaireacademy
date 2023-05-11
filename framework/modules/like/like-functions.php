<?php

if ( ! function_exists( 'arabesque_mikado_like' ) ) {
	/**
	 * Returns ArabesqueMikadoLike instance
	 *
	 * @return ArabesqueMikadoLike
	 */
	function arabesque_mikado_like() {
		return ArabesqueMikadoLike::get_instance();
	}
}

function arabesque_mikado_get_like() {
	
	echo wp_kses( arabesque_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}