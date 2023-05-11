<?php

if ( ! function_exists( 'arabesque_mikado_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function arabesque_mikado_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'arabesque' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'arabesque' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_additional_title_area_meta_boxes', 'arabesque_mikado_breadcrumbs_title_type_options_meta_boxes' );
}