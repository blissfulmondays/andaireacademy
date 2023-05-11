<?php

if ( ! function_exists( 'arabesque_mikado_map_general_meta' ) ) {
	function arabesque_mikado_map_general_meta() {
		
		$general_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'arabesque_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'arabesque' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'arabesque' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'arabesque' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'arabesque' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = arabesque_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'arabesque' ),
				'description' => esc_html__( 'Define styles for Content area', 'arabesque' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = arabesque_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);

				arabesque_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'arabesque' ),
						'parent' => $mkdf_content_padding_row,
					)
				);

				arabesque_mikado_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'arabesque' ),
						'parent'  => $mkdf_content_padding_row,
					)
				);

        arabesque_mikado_create_meta_box_field(
            array(
                'name'          => 'mkdf_first_color_meta',
                'type'          => 'color',
                'default_value' => '',
                'label'         => esc_html__('Page Main Color', 'arabesque'),
                'description'   => esc_html__('Choose page main color', 'arabesque'),
                'parent'        => $general_meta_box
            )
        );

        arabesque_mikado_create_meta_box_field(
            array(
                'name'          => 'mkdf_secondary_color_meta',
                'type'          => 'color',
                'default_value' => '',
                'label'         => esc_html__('Page Secondary Main Color', 'arabesque'),
                'description'   => esc_html__('Choose page secondary main color', 'arabesque'),
                'parent'        => $general_meta_box
            )
        );
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'arabesque' ),
				'description' => esc_html__( 'Choose background color for page content', 'arabesque' ),
				'parent'      => $general_meta_box
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'type'          => 'yesno',
				'name'          => 'mkdf_disable_content_background_image_meta',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Content Background Image', 'arabesque' ),
				'description'   => esc_html__( 'Disable content background image', 'arabesque' ),
				'parent'        => $general_meta_box
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'type'          => 'image',
				'name'          => 'mkdf_content_background_image_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image', 'arabesque' ),
				'description'   => esc_html__( 'Choose image to use as content background image', 'arabesque' ),
				'parent'        => $general_meta_box,
				'dependency'	=> array(
					'show' => array(
						'mkdf_disable_content_background_image_meta' => 'no'
					)
				)
			)
		);

		arabesque_mikado_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_background_image_behavior_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image Behavior', 'arabesque' ),
				'description'   => esc_html__( 'Choose background image behavior', 'arabesque' ),
				'parent'        => $general_meta_box,
				'options'		=> array(
					'' => esc_html__('Default','arabesque'),
					'full-image' => esc_html__('As Full Image','arabesque'),
					'pattern' => esc_html__('As Pattern','arabesque'),
				),
				'dependency'	=> array(
					'show' => array(
						'mkdf_disable_content_background_image_meta' => 'no'
					)
				)
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'arabesque' ),
				'parent'  => $general_meta_box,
				'options' => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'arabesque' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'arabesque' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'arabesque' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'arabesque' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'arabesque' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'arabesque' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'arabesque' ),
						'description'   => esc_html__( 'Choose background image attachment', 'arabesque' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'arabesque' ),
							'fixed'  => esc_html__( 'Fixed', 'arabesque' ),
							'scroll' => esc_html__( 'Scroll', 'arabesque' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'arabesque' ),
				'parent'        => $general_meta_box,
				'options'       => arabesque_mikado_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'arabesque' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'arabesque' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'arabesque' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'arabesque' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'arabesque' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'arabesque' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				arabesque_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'arabesque' ),
						'options'       => arabesque_mikado_get_yes_no_select_array(),
					)
				);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'arabesque' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'arabesque' ),
						'options'       => arabesque_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'arabesque' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Aparabesques to pages set to "Default Template" and rows set to "In Grid")', 'arabesque' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'arabesque' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'arabesque' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'arabesque' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'arabesque' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'arabesque' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'arabesque' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'arabesque' ),
				'parent'        => $general_meta_box,
				'options'       => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				arabesque_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'arabesque' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'arabesque' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => arabesque_mikado_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = arabesque_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					arabesque_mikado_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'arabesque' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = arabesque_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'arabesque' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'arabesque' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = arabesque_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					arabesque_mikado_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'arabesque' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'arabesque' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'arabesque' ),
								'pulse'                 => esc_html__( 'Pulse', 'arabesque' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'arabesque' ),
								'cube'                  => esc_html__( 'Cube', 'arabesque' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'arabesque' ),
								'stripes'               => esc_html__( 'Stripes', 'arabesque' ),
								'wave'                  => esc_html__( 'Wave', 'arabesque' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'arabesque' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'arabesque' ),
								'atom'                  => esc_html__( 'Atom', 'arabesque' ),
								'clock'                 => esc_html__( 'Clock', 'arabesque' ),
								'mitosis'               => esc_html__( 'Mitosis', 'arabesque' ),
								'lines'                 => esc_html__( 'Lines', 'arabesque' ),
								'fussion'               => esc_html__( 'Fussion', 'arabesque' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'arabesque' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'arabesque' ),
                                'arabesque'             => esc_html__( 'Arabesque', 'arabesque' )
							)
						)
					);
					
					arabesque_mikado_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'arabesque' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					arabesque_mikado_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'arabesque' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'arabesque' ),
							'options'     => arabesque_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'arabesque' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'arabesque' ),
				'parent'      => $general_meta_box,
				'options'     => arabesque_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_general_meta', 10 );
}