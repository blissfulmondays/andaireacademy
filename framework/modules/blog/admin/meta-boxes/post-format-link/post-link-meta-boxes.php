<?php

if ( ! function_exists( 'arabesque_mikado_map_post_link_meta' ) ) {
	function arabesque_mikado_map_post_link_meta() {
		$link_post_format_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'arabesque' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'arabesque' ),
				'description' => esc_html__( 'Enter link', 'arabesque' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_post_link_meta', 24 );
}