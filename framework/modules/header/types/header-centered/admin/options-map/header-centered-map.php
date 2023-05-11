<?php

if ( ! function_exists( 'arabesque_mikado_get_hide_dep_for_header_centered_options' ) ) {
	function arabesque_mikado_get_hide_dep_for_header_centered_options() {
		$hide_dep_options = apply_filters( 'arabesque_mikado_filter_header_centered_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'arabesque_mikado_header_centered_logo_map' ) ) {
	function arabesque_mikado_header_centered_logo_map( $parent ) {
		$hide_dep_options = arabesque_mikado_get_hide_dep_for_header_centered_options();
		
		arabesque_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'logo_wrapper_padding_header_centered',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'arabesque' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'arabesque' ),
				'args'            => array(
					'col_width' => 3
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'arabesque_mikado_header_logo_area_additional_options', 'arabesque_mikado_header_centered_logo_map' );
}

if ( ! function_exists( 'arabesque_mikado_header_centered_map' ) ) {
	function arabesque_mikado_header_centered_map( $parent ) {
		$hide_dep_options = arabesque_mikado_get_hide_dep_for_header_centered_options();

		arabesque_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'widgets_position_header_centered',
				'default_value'   => 'apart',
				'label'           => esc_html__( 'Widgets Position for Header Centered', 'arabesque' ),
				'description'     => esc_html__( 'Choose position for widgets for header centered', 'arabesque' ),
				'options' => array(
					'apart' => esc_html__('Apart from Menu','arabesque'),
					'beside' => esc_html__('Beside Menu','arabesque'),
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
	}

	add_action( 'arabesque_mikado_header_menu_area_additional_options', 'arabesque_mikado_header_centered_map' );
}