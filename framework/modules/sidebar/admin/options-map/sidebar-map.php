<?php

if ( ! function_exists( 'arabesque_mikado_sidebar_options_map' ) ) {
	function arabesque_mikado_sidebar_options_map() {
		
		arabesque_mikado_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'arabesque' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = arabesque_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'arabesque' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		arabesque_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'arabesque' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'arabesque' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => arabesque_mikado_get_custom_sidebars_options()
		) );
		
		$arabesque_custom_sidebars = arabesque_mikado_get_custom_sidebars();
		if ( count( $arabesque_custom_sidebars ) > 0 ) {
			arabesque_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'arabesque' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'arabesque' ),
				'parent'      => $sidebar_panel,
				'options'     => $arabesque_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'arabesque_mikado_action_options_map', 'arabesque_mikado_sidebar_options_map', 7 );
}