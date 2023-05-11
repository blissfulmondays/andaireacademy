<?php

if ( ! function_exists( 'arabesque_mikado_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function arabesque_mikado_general_options_map() {
		
		arabesque_mikado_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'arabesque' ),
				'icon'  => 'fa fa-institution'
			)
		);

        $panel_branding = arabesque_mikado_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_branding',
                'title' => esc_html__( 'Branding', 'arabesque' )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $panel_branding,
                'type'          => 'yesno',
                'name'          => 'hide_logo',
                'default_value' => 'no',
                'label'         => esc_html__( 'Hide Logo', 'arabesque' ),
                'description'   => esc_html__( 'Enabling this option will hide logo image', 'arabesque' )
            )
        );

        $hide_logo_container = arabesque_mikado_add_admin_container(
            array(
                'parent'          => $panel_branding,
                'name'            => 'hide_logo_container',
                'dependency' => array(
                    'hide' => array(
                        'hide_logo'  => 'yes'
                    )
                )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'logo_image',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label'         => esc_html__( 'Logo Image - Default', 'arabesque' ),
                'parent'        => $hide_logo_container
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_dark',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label'         => esc_html__( 'Logo Image - Dark', 'arabesque' ),
                'parent'        => $hide_logo_container
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_light',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
                'label'         => esc_html__( 'Logo Image - Light', 'arabesque' ),
                'parent'        => $hide_logo_container
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_sticky',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label'         => esc_html__( 'Logo Image - Sticky', 'arabesque' ),
                'parent'        => $hide_logo_container
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'logo_image_mobile',
                'type'          => 'image',
                'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
                'label'         => esc_html__( 'Logo Image - Mobile', 'arabesque' ),
                'parent'        => $hide_logo_container
            )
        );
		
		$panel_design_style = arabesque_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Appearance', 'arabesque' )
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'arabesque' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'arabesque' ),
				'parent'        => $panel_design_style
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'arabesque' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = arabesque_mikado_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'arabesque' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'arabesque' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'arabesque' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'arabesque' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'arabesque' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'arabesque' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'arabesque' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'arabesque' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'arabesque' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'arabesque' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'arabesque' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'arabesque' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'arabesque' ),
					'100i' => esc_html__( '100 Thin Italic', 'arabesque' ),
					'200'  => esc_html__( '200 Extra-Light', 'arabesque' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'arabesque' ),
					'300'  => esc_html__( '300 Light', 'arabesque' ),
					'300i' => esc_html__( '300 Light Italic', 'arabesque' ),
					'400'  => esc_html__( '400 Regular', 'arabesque' ),
					'400i' => esc_html__( '400 Regular Italic', 'arabesque' ),
					'500'  => esc_html__( '500 Medium', 'arabesque' ),
					'500i' => esc_html__( '500 Medium Italic', 'arabesque' ),
					'600'  => esc_html__( '600 Semi-Bold', 'arabesque' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'arabesque' ),
					'700'  => esc_html__( '700 Bold', 'arabesque' ),
					'700i' => esc_html__( '700 Bold Italic', 'arabesque' ),
					'800'  => esc_html__( '800 Extra-Bold', 'arabesque' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'arabesque' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'arabesque' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'arabesque' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'arabesque' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'arabesque' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'arabesque' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'arabesque' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'arabesque' ),
					'greek'        => esc_html__( 'Greek', 'arabesque' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'arabesque' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'arabesque' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #fdd8d6', 'arabesque' ),
				'parent'      => $panel_design_style
			)
		);

        arabesque_mikado_add_admin_field(
            array(
                'name'        => 'secondary_color',
                'type'        => 'color',
                'label'       => esc_html__( 'Secondary Main Color', 'arabesque' ),
                'description' => esc_html__( 'Choose the second most dominant theme color. Default color is #ffd0ce', 'arabesque' ),
                'parent'      => $panel_design_style
            )
        );
		
		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'arabesque' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'arabesque' ),
				'parent'      => $panel_design_style
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'arabesque' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'arabesque' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Boxed Layout - begin **********************/
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'arabesque' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				arabesque_mikado_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'arabesque' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'arabesque' ),
						'parent'      => $boxed_container
					)
				);
				
				arabesque_mikado_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'arabesque' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'arabesque' ),
						'parent'      => $boxed_container
					)
				);
				
				arabesque_mikado_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'arabesque' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'arabesque' ),
						'parent'      => $boxed_container
					)
				);
				
				arabesque_mikado_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'arabesque' ),
						'description'   => esc_html__( 'Choose background image attachment', 'arabesque' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'arabesque' ),
							'fixed'  => esc_html__( 'Fixed', 'arabesque' ),
							'scroll' => esc_html__( 'Scroll', 'arabesque' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'arabesque' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				arabesque_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'arabesque' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'arabesque' ),
						'parent'      => $paspartu_container
					)
				);
				
				arabesque_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'arabesque' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'arabesque' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				arabesque_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'arabesque' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'arabesque' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				arabesque_mikado_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'arabesque' )
					)
				);
		
				arabesque_mikado_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'arabesque' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'arabesque' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'arabesque' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Aparabesques to pages set to "Default Template" and rows set to "In Grid")', 'arabesque' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'mkdf-grid-1100' => esc_html__( '1100px - default', 'arabesque' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'arabesque' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'arabesque' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'arabesque' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'arabesque' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'arabesque' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = arabesque_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Behavior', 'arabesque' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'arabesque' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'arabesque' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				arabesque_mikado_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'arabesque' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'arabesque' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = arabesque_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
		
		
					arabesque_mikado_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'arabesque' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = arabesque_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'arabesque' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'arabesque' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = arabesque_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					arabesque_mikado_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'arabesque' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
                                'arabesque_circles'          => esc_html__( 'Arabesque Circles', 'arabesque' )
							)
						)
					);
					
					arabesque_mikado_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'arabesque' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					arabesque_mikado_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'arabesque' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'arabesque' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'arabesque' ),
				'parent'        => $panel_settings
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'arabesque' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = arabesque_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'arabesque' )
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'arabesque' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'arabesque' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = arabesque_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'arabesque' )
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'arabesque' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'arabesque' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_options_map', 'arabesque_mikado_general_options_map', 1 );
}

if ( ! function_exists( 'arabesque_mikado_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function arabesque_mikado_page_general_style( $style ) {
		$current_style = '';
		$page_id       = arabesque_mikado_get_page_id();
		$class_prefix  = arabesque_mikado_get_unique_page_class( $page_id );

        $first_color = arabesque_mikado_get_meta_field_intersect('first_color', $page_id);
        $secondary_color = arabesque_mikado_get_meta_field_intersect('secondary_color', $page_id);

        if(!empty($first_color)) {
            extract(arabesque_mikado_generate_first_color_selectors());

            $page_color_selector = array();
            foreach ($color_selector as $key=>$value) {
                $page_color_selector[] = $class_prefix . ' ' . $value;
            }

            $page_color_important_selector = array();
            foreach ($color_important_selector as $key=>$value) {
                $page_color_important_selector[] = $class_prefix . ' ' . $value;
            }

            $page_background_color_selector = array();
            foreach ($background_color_selector as $key=>$value) {
                $page_background_color_selector[] = $class_prefix . ' ' . $value;
            }

            $page_background_color_important_selector = array();
            foreach ($background_color_important_selector as $key=>$value) {
                $page_background_color_important_selector[] = $class_prefix . ' ' . $value;
            }

            $page_border_color_selector = array();
            foreach ($border_color_selector as $key=>$value) {
                $page_border_color_selector[] = $class_prefix . ' ' . $value;
            }

            $current_style .= arabesque_mikado_dynamic_css($page_color_selector, array('color' => $first_color));
            $current_style .= arabesque_mikado_dynamic_css($page_color_important_selector, array('color' => $first_color.'!important'));
            $current_style .= arabesque_mikado_dynamic_css($page_background_color_selector, array('background-color' => $first_color));
            $current_style .= arabesque_mikado_dynamic_css($page_background_color_important_selector, array('background-color' => $first_color.'!important'));
            $current_style .= arabesque_mikado_dynamic_css($page_border_color_selector, array('border-color' => $first_color));
        }

        if (!empty($secondary_color)) {
            extract(arabesque_mikado_generate_second_color_selectors());

            $page_border_color_important_selector = array();
            foreach ($second_border_color_important_selector as $key=>$value) {
                $page_border_color_important_selector[] = $class_prefix . ' ' . $value;
            }

            $page_background_color_important_selector = array();
            foreach ($second_background_color_important_selector as $key=>$value) {
                $page_background_color_important_selector[] = $class_prefix . ' ' . $value;
            }

            $page_black_color_selector = array();
            foreach ($black_color_selector as $key=>$value) {
                $page_black_color_selector[] = $class_prefix . ' ' . $value;
            }

            $current_style .= arabesque_mikado_dynamic_css($page_border_color_important_selector, array('border-color' => $secondary_color.'!important'));
            $current_style .= arabesque_mikado_dynamic_css($page_background_color_important_selector, array('background-color' => $secondary_color.'!important'));
            $current_style .= arabesque_mikado_dynamic_css($page_black_color_selector, array('color' => '#000'));
        }
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = arabesque_mikado_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = arabesque_mikado_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = arabesque_mikado_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = arabesque_mikado_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.mkdf-boxed .mkdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= arabesque_mikado_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.mkdf-paspartu-enabled .mkdf-page-header .mkdf-fixed-wrapper.fixed',
			'.mkdf-paspartu-enabled .mkdf-sticky-header',
			'.mkdf-paspartu-enabled .mkdf-mobile-header.mobile-header-appear .mkdf-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-page-header .mkdf-fixed-wrapper.fixed',
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-sticky-header.header-appear',
			'.mkdf-paspartu-enabled.mkdf-fixed-paspartu-enabled .mkdf-mobile-header.mobile-header-appear .mkdf-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = arabesque_mikado_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = arabesque_mikado_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( arabesque_mikado_string_ends_with( $paspartu_width, '%' ) || arabesque_mikado_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = arabesque_mikado_string_ends_with( $paspartu_width, '%' ) ? arabesque_mikado_filter_suffix( $paspartu_width, '%' ) : arabesque_mikado_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = arabesque_mikado_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.mkdf-paspartu-enabled .mkdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= arabesque_mikado_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= arabesque_mikado_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= arabesque_mikado_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = arabesque_mikado_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( arabesque_mikado_string_ends_with( $paspartu_responsive_width, '%' ) || arabesque_mikado_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = arabesque_mikado_string_ends_with( $paspartu_responsive_width, '%' ) ? arabesque_mikado_filter_suffix( $paspartu_responsive_width, '%' ) : arabesque_mikado_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = arabesque_mikado_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . arabesque_mikado_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . arabesque_mikado_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . arabesque_mikado_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'arabesque_mikado_filter_add_page_custom_style', 'arabesque_mikado_page_general_style' );
}