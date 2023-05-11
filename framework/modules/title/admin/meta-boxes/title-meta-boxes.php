<?php

if ( ! function_exists( 'arabesque_mikado_get_title_types_meta_boxes' ) ) {
	function arabesque_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'arabesque_mikado_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'arabesque' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'arabesque_mikado_map_title_meta' ) ) {
	function arabesque_mikado_map_title_meta() {
		$title_type_meta_boxes = arabesque_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'arabesque_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'arabesque' ),
				'name'  => 'title_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'arabesque' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'arabesque' ),
				'parent'        => $title_meta_box,
				'options'       => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'arabesque' ),
						'description'   => esc_html__( 'Choose title type', 'arabesque' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'arabesque' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'arabesque' ),
						'options'       => arabesque_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'arabesque' ),
						'description' => esc_html__( 'Set a height for Title Area', 'arabesque' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'arabesque' ),
						'description' => esc_html__( 'Choose a background color for title area', 'arabesque' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'arabesque' ),
						'description' => esc_html__( 'Choose an Image for title area', 'arabesque' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'arabesque' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'arabesque' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'arabesque' ),
							'hide'                => esc_html__( 'Hide Image', 'arabesque' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'arabesque' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'arabesque' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'arabesque' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'arabesque' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'arabesque' )
						)
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'arabesque' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'arabesque' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'arabesque' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'arabesque' ),
							'window-top'    => esc_html__( 'From Window Top', 'arabesque' )
						)
					)
				);

		arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_content_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Content Vertical Alignment', 'arabesque' ),
						'description'   => esc_html__( 'Set title content vertical alignment', 'arabesque' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							'' => esc_html__( 'Default', 'arabesque' ),
							'top' => esc_html__( 'Top', 'arabesque' ),
							'middle'    => esc_html__( 'Middle', 'arabesque' ),
							'bottom'    => esc_html__( 'Bottom', 'arabesque' )
						)
					)
				);
					
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_offset_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Title Vertical Offset', 'arabesque' ),
						'description'   => esc_html__( 'Set title vertical offset relative to its current position', 'arabesque' ),
						'parent'        => $show_title_area_meta_container,
						'args' 			=> array(
							'col_width' => '3',
							'suffix' => 'px'
						)
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'arabesque' ),
						'options'       => arabesque_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'arabesque' ),
						'description' => esc_html__( 'Choose a color for title text', 'arabesque' ),
						'parent'      => $show_title_area_meta_container
					)
				);

                arabesque_mikado_create_meta_box_field(
                    array(
                        'name'          => 'mkdf_show_title_text_meta',
                        'type'          => 'select',
                        'default_value' => '',
                        'label'         => esc_html__( 'Show Title Text', 'arabesque' ),
                        'description'   => esc_html__( 'Show Post Title in Title Area in global options needs to be set to NO', 'arabesque' ),
                        'parent'        => $show_title_area_meta_container,
                        'options'       => arabesque_mikado_get_yes_no_select_array()
                    )
                );
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'arabesque' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'arabesque' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'arabesque' ),
						'options'       => arabesque_mikado_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'arabesque' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'arabesque' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'arabesque_mikado_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_title_meta', 60 );
}