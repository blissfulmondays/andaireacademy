<?php

if ( ! function_exists( 'arabesque_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function arabesque_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'arabesque_mikado_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'arabesque_mikado_header_standard_meta_map' ) ) {
	function arabesque_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = arabesque_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		arabesque_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'arabesque' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'arabesque' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'arabesque' ),
					'left'   => esc_html__( 'Left', 'arabesque' ),
					'right'  => esc_html__( 'Right', 'arabesque' ),
					'center' => esc_html__( 'Center', 'arabesque' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_additional_header_area_meta_boxes_map', 'arabesque_mikado_header_standard_meta_map' );
}