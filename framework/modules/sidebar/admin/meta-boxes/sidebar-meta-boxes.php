<?php

if ( ! function_exists( 'arabesque_mikado_map_sidebar_meta' ) ) {
	function arabesque_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'arabesque_mikado_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'arabesque' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'arabesque' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'arabesque' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => arabesque_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = arabesque_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			arabesque_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'arabesque' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'arabesque' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_sidebar_meta', 31 );
}