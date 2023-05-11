<?php

if ( ! function_exists( 'arabesque_mikado_logo_meta_box_map' ) ) {
	function arabesque_mikado_logo_meta_box_map() {
		
		$logo_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'arabesque_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'arabesque' ),
				'name'  => 'logo_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'arabesque' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'arabesque' ),
				'parent'      => $logo_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'arabesque' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'arabesque' ),
				'parent'      => $logo_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'arabesque' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'arabesque' ),
				'parent'      => $logo_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'arabesque' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'arabesque' ),
				'parent'      => $logo_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'arabesque' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'arabesque' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_logo_meta_box_map', 47 );
}