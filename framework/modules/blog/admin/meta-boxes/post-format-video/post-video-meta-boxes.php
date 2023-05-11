<?php

if ( ! function_exists( 'arabesque_mikado_map_post_video_meta' ) ) {
	function arabesque_mikado_map_post_video_meta() {
		$video_post_format_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'arabesque' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'arabesque' ),
				'description'   => esc_html__( 'Choose video type', 'arabesque' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'arabesque' ),
					'self'            => esc_html__( 'Self Hosted', 'arabesque' )
				)
			)
		);
		
		$mkdf_video_embedded_container = arabesque_mikado_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'mkdf_video_embedded_container'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'arabesque' ),
				'description' => esc_html__( 'Enter Video URL', 'arabesque' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'arabesque' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'arabesque' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'arabesque' ),
				'description' => esc_html__( 'Enter video image', 'arabesque' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_post_video_meta', 22 );
}