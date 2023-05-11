<?php

if ( ! function_exists( 'arabesque_mikado_get_hide_dep_for_header_standard_options' ) ) {
	function arabesque_mikado_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'arabesque_mikado_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'arabesque_mikado_header_standard_map' ) ) {
	function arabesque_mikado_header_standard_map( $parent ) {
		$hide_dep_options = arabesque_mikado_get_hide_dep_for_header_standard_options();
		
		arabesque_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'arabesque' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'arabesque' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'arabesque' ),
					'left'   => esc_html__( 'Left', 'arabesque' ),
					'center' => esc_html__( 'Center', 'arabesque' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_additional_header_menu_area_options_map', 'arabesque_mikado_header_standard_map' );
}