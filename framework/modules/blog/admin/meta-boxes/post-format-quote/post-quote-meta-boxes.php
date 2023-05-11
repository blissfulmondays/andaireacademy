<?php

if ( ! function_exists( 'arabesque_mikado_map_post_quote_meta' ) ) {
	function arabesque_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'arabesque' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'arabesque' ),
				'description' => esc_html__( 'Enter Quote text', 'arabesque' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'arabesque' ),
				'description' => esc_html__( 'Enter Quote author', 'arabesque' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_post_quote_meta', 25 );
}