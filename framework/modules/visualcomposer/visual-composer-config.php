<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = MIKADO_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'arabesque_mikado_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function arabesque_mikado_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'arabesque_mikado_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'arabesque_mikado_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function arabesque_mikado_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'arabesque' ),
				'value'      => array(
					esc_html__( 'Full Width', 'arabesque' ) => 'full-width',
					esc_html__( 'In Grid', 'arabesque' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Mikado Anchor ID', 'arabesque' ),
				'description' => esc_html__( 'For example "home"', 'arabesque' ),
				'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'arabesque' ),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'arabesque' ),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Mikado Background Position', 'arabesque' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'arabesque' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);

		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'arabesque' ),
				'value'       => array(
					esc_html__( 'Never', 'arabesque' )        => '',
					esc_html__( 'Below 1280px', 'arabesque' ) => '1280',
					esc_html__( 'Below 1024px', 'arabesque' ) => '1024',
					esc_html__( 'Below 768px', 'arabesque' )  => '768',
					esc_html__( 'Below 680px', 'arabesque' )  => '680',
					esc_html__( 'Below 480px', 'arabesque' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'arabesque' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Mikado Parallax Background Image', 'arabesque' ),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Mikado Parallax Speed', 'arabesque' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'arabesque' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Mikado Parallax Section Height (px)', 'arabesque' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'arabesque' ),
				'value'      => array(
					esc_html__( 'Default', 'arabesque' ) => '',
					esc_html__( 'Left', 'arabesque' )    => 'left',
					esc_html__( 'Center', 'arabesque' )  => 'center',
					esc_html__( 'Right', 'arabesque' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'        => 'dropdown',
                'param_name'  => 'row_btt_skin',
                'heading'     => esc_html__( 'Back To Top Button Skin', 'arabesque' ),
                'value'       => array(
                    esc_html__( 'Dark', 'arabesque' ) => 'dark',
                    esc_html__( 'Light', 'arabesque' )  => 'light'
                ),
                'save_always' => 'true',
                'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
            )
        );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'arabesque' ),
				'value'      => array(
					esc_html__( 'Full Width', 'arabesque' ) => 'full-width',
					esc_html__( 'In Grid', 'arabesque' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'arabesque' ),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'arabesque' ),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);

		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Mikado Background Position', 'arabesque' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'arabesque' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);

		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'arabesque' ),
				'value'       => array(
					esc_html__( 'Never', 'arabesque' )        => '',
					esc_html__( 'Below 1280px', 'arabesque' ) => '1280',
					esc_html__( 'Below 1024px', 'arabesque' ) => '1024',
					esc_html__( 'Below 768px', 'arabesque' )  => '768',
					esc_html__( 'Below 680px', 'arabesque' )  => '680',
					esc_html__( 'Below 480px', 'arabesque' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'arabesque' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'arabesque' ),
				'value'      => array(
					esc_html__( 'Default', 'arabesque' ) => '',
					esc_html__( 'Left', 'arabesque' )    => 'left',
					esc_html__( 'Center', 'arabesque' )  => 'center',
					esc_html__( 'Right', 'arabesque' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'arabesque' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( arabesque_mikado_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Mikado Enable Passepartout', 'arabesque' ),
					'value'       => array_flip( arabesque_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Mikado Passepartout Size', 'arabesque' ),
					'value'       => array(
						esc_html__( 'Tiny', 'arabesque' )   => 'tiny',
						esc_html__( 'Small', 'arabesque' )  => 'small',
						esc_html__( 'Normal', 'arabesque' ) => 'normal',
						esc_html__( 'Large', 'arabesque' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Side Passepartout', 'arabesque' ),
					'value'       => array_flip( arabesque_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Top Passepartout', 'arabesque' ),
					'value'       => array_flip( arabesque_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'arabesque' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'arabesque_mikado_vc_row_map' );
}