<?php

if ( ! function_exists( 'arabesque_mikado_map_footer_meta' ) ) {
	function arabesque_mikado_map_footer_meta() {

		$footer_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'arabesque_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'arabesque' ),
				'name'  => 'footer_meta'
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'arabesque' ),
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);

		$show_footer_meta_container = arabesque_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_footer_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Footer in Grid', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'arabesque' ),
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_uncovering_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Uncovering Footer', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'arabesque' ),
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'arabesque' ),
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_footer_top_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Footer Top Background Color', 'arabesque' ),
				'description' => esc_html__( 'Set background color for top footer area', 'arabesque' ),
				'parent'      => $show_footer_meta_container,
				'dependency' => array(
					'show' => array(
						'mkdf_show_footer_top_meta' => array( '', 'yes' )
					)
				)
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'arabesque' ),
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_footer_bottom_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Footer Bottom Background Color', 'arabesque' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'arabesque' ),
				'parent'      => $show_footer_meta_container,
				'dependency' => array(
					'show' => array(
						'mkdf_show_footer_bottom_meta' => array( '', 'yes' )
					)
				)
			)
		);
	}

	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_footer_meta', 70 );
}