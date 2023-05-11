<?php

if ( ! function_exists( 'arabesque_mikado_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function arabesque_mikado_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'arabesque_mikado_filter_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'arabesque_mikado_get_hide_dep_for_header_logo_area_widgets_meta_boxes' ) ) {
	function arabesque_mikado_get_hide_dep_for_header_logo_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'arabesque_mikado_filter_header_logo_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'arabesque_mikado_header_logo_area_meta_options_map' ) ) {
	function arabesque_mikado_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = arabesque_mikado_get_hide_dep_for_header_logo_area_meta_boxes();
		$hide_dep_widgets = arabesque_mikado_get_hide_dep_for_header_logo_area_widgets_meta_boxes();
		
		$logo_area_container = arabesque_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		arabesque_mikado_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'arabesque' )
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'arabesque' ),
				'parent'        => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$arabesque_custom_sidebars = arabesque_mikado_get_custom_sidebars();
		if ( count( $arabesque_custom_sidebars ) > 0 ) {
			arabesque_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'arabesque' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'arabesque' ),
					'parent'      => $logo_area_container,
					'options'     => $arabesque_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'mkdf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'arabesque' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'arabesque' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_container = arabesque_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_logo_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'arabesque' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'arabesque' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'arabesque' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'arabesque' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'arabesque' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'arabesque' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_border_container = arabesque_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'mkdf_logo_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'arabesque' ),
				'description' => esc_html__( 'Set border color for grid area', 'arabesque' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'arabesque' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'arabesque' ),
				'parent'      => $logo_area_container
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'arabesque' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'arabesque' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'arabesque' ),
				'description'   => esc_html__( 'Set border on logo area', 'arabesque' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
		$logo_area_border_bottom_color_container = arabesque_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_logo_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'arabesque' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'arabesque' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);
		
		do_action( 'arabesque_mikado_action_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'arabesque_mikado_action_header_logo_area_meta_boxes_map', 'arabesque_mikado_header_logo_area_meta_options_map', 10, 1 );
}