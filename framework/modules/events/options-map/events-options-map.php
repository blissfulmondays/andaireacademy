<?php

if ( arabesque_mikado_is_the_events_calendar_installed() ) {
	if ( ! function_exists( 'arabesque_mikado_events_options_map' ) ) {
		/**
		 * Add Evetns options page
		 */
		function arabesque_mikado_events_options_map() {
			
			arabesque_mikado_add_admin_page(
				array(
					'slug'  => '_events_page',
					'title' => esc_html__( 'Events', 'arabesque' ),
					'icon'  => 'fa fa-calendar'
				)
			);
			
			$panel_header = arabesque_mikado_add_admin_panel(
				array(
					'page'  => '_events_page',
					'name'  => 'panel_header',
					'title' => esc_html__( 'Header', 'arabesque' )
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'parent'        => $panel_header,
					'type'          => 'select',
					'name'          => 'events_header_style',
					'default_value' => '',
					'label'         => esc_html__( 'Header Skin', 'arabesque' ),
					'description'   => esc_html__( 'Choose a predefined header style for header elements (logo, main menu, side menu opener...)', 'arabesque' ),
					'options'       => array(
						''             => esc_html__( 'Default', 'arabesque' ),
						'light-header' => esc_html__( 'Light', 'arabesque' ),
						'dark-header'  => esc_html__( 'Dark', 'arabesque' )
					)
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'parent'        => $panel_header,
					'type'          => 'color',
					'name'          => 'events_menu_area_background_color',
					'default_value' => '',
					'label'         => esc_html__( 'Background color', 'arabesque' ),
					'description'   => esc_html__( 'Set background color for menu area', 'arabesque' )
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'parent'        => $panel_header,
					'type'          => 'text',
					'name'          => 'events_menu_area_background_transparency',
					'default_value' => '',
					'label'         => esc_html__( 'Background transparency', 'arabesque' ),
					'description'   => esc_html__( 'Set background transparency for menu area', 'arabesque' ),
					'args'          => array(
						'col_width' => 3
					)
				)
			);
			
			$panel_title = arabesque_mikado_add_admin_panel(
				array(
					'page'  => '_events_page',
					'name'  => 'panel_title',
					'title' => esc_html__( 'Title Settings', 'arabesque' )
				)
			);
			
			$show_events_title_area_container = arabesque_mikado_add_admin_container(
				array(
					'parent'          => $panel_title,
					'name'            => 'show_events_title_area_container',
					'hidden_property' => 'show_title_area',
					'hidden_value'    => 'no'
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name'          => 'title_events_area_type',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Title Area Type', 'arabesque' ),
					'description'   => esc_html__( 'Choose title type', 'arabesque' ),
					'parent'        => $show_events_title_area_container,
					'options'       => array(
						''           => esc_html__( 'Default', 'arabesque' ),
						'standard'   => esc_html__( 'Standard', 'arabesque' ),
						'breadcrumb' => esc_html__( 'Breadcrumb', 'arabesque' )
					)
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name'        => 'title_events_area_background_image',
					'type'        => 'image',
					'label'       => esc_html__( 'Background Image', 'arabesque' ),
					'description' => esc_html__( 'Choose an Image for Title Area', 'arabesque' ),
					'parent'      => $show_events_title_area_container
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name'        => 'title_events_area_background_color',
					'type'        => 'color',
					'label'       => esc_html__( 'Background Color', 'arabesque' ),
					'description' => esc_html__( 'Choose a background color for Title Area', 'arabesque' ),
					'parent'      => $show_events_title_area_container
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name'        => 'title_events_area_height',
					'type'        => 'text',
					'label'       => esc_html__( 'Height', 'arabesque' ),
					'description' => esc_html__( 'Set a height for Title Area', 'arabesque' ),
					'parent'      => $show_events_title_area_container,
					'args'        => array(
						'col_width' => 2,
						'suffix'    => 'px'
					)
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name' => 'title_events_area_vertical_alignment',
					'type' => 'select',
					'default_value' => 'header_bottom',
					'label' => esc_html__('Vertical Alignment', 'arabesque'),
					'description' => esc_html__('Specify title vertical alignment', 'arabesque'),
					'parent' => $show_events_title_area_container,
					'options' => array(
						''          => esc_html__( 'Default', 'arabesque' ),
						'header_bottom' => esc_html__('From Bottom of Header', 'arabesque'),
						'window_top' => esc_html__('From Window Top', 'arabesque')
					)
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name'          => 'title_events_area_content_alignment',
					'type'          => 'select',
					'default_value' => 'left',
					'label'         => esc_html__( 'Horizontal Alignment', 'arabesque' ),
					'description'   => esc_html__( 'Specify title horizontal alignment', 'arabesque' ),
					'parent'        => $show_events_title_area_container,
					'options'       => array(
						''          => esc_html__( 'Default', 'arabesque' ),
						'center' => esc_html__( 'Center', 'arabesque' ),
						'left'   => esc_html__( 'Left', 'arabesque' ),
						'right'  => esc_html__( 'Right', 'arabesque' )
					)
				)
			);
			
			arabesque_mikado_add_admin_field(
				array(
					'name' => 'title_events_area_title_tag',
					'type' => 'select',
					'default_value' => '',
					'label' => esc_html__('Title Tag', 'arabesque'),
					'parent' => $show_events_title_area_container,
					'options' => arabesque_mikado_get_title_tag(true)
				)
			);
			
			arabesque_mikado_add_admin_field(array(
				'type'			=> 'color',
				'name'			=> 'events_page_title_color',
				'label'			=> esc_html__('Title Text Color', 'arabesque'),
				'parent'		=> $show_events_title_area_container
			));
		}
		
		add_action( 'arabesque_mikado_action_options_map', 'arabesque_mikado_events_options_map', 19 );
	}
}