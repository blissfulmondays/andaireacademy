<?php

if ( ! function_exists( 'arabesque_mikado_map_post_gallery_meta' ) ) {
	
	function arabesque_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'arabesque' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		arabesque_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'arabesque' ),
				'description' => esc_html__( 'Choose your gallery images', 'arabesque' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_post_gallery_meta', 21 );
}
