<?php

if ( ! function_exists( 'arabesque_mikado_register_header_divided_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function arabesque_mikado_register_header_divided_type( $header_types ) {
		$header_type = array(
			'header-divided' => 'ArabesqueMikado\Modules\Header\Types\HeaderDivided'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'arabesque_mikado_init_register_header_divided_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function arabesque_mikado_init_register_header_divided_type() {
		add_filter( 'arabesque_mikado_filter_register_header_type_class', 'arabesque_mikado_register_header_divided_type' );
	}
	
	add_action( 'arabesque_mikado_action_before_header_function_init', 'arabesque_mikado_init_register_header_divided_type' );
}

if ( ! function_exists( 'arabesque_mikado_include_header_divided_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function arabesque_mikado_include_header_divided_menu( $menus ) {
		$menus['divided-left-navigation']  = esc_html__( 'Divided Left Navigation', 'arabesque' );
		$menus['divided-right-navigation'] = esc_html__( 'Divided Right Navigation', 'arabesque' );
		
		return $menus;
	}
	
	if ( arabesque_mikado_check_is_header_type_enabled( 'header-divided' ) ) {
		add_filter( 'arabesque_mikado_filter_register_headers_menu', 'arabesque_mikado_include_header_divided_menu' );
	}
}

if ( ! function_exists( 'arabesque_mikado_get_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function arabesque_mikado_get_divided_left_main_menu( $additional_class = 'mkdf-default-nav' ) {
		arabesque_mikado_get_module_template_part( 'templates/divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'arabesque_mikado_get_sticky_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function arabesque_mikado_get_sticky_divided_left_main_menu( $additional_class = 'mkdf-default-nav' ) {
		arabesque_mikado_get_module_template_part( 'templates/sticky-divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'arabesque_mikado_get_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function arabesque_mikado_get_divided_right_main_menu( $additional_class = 'mkdf-default-nav' ) {
		arabesque_mikado_get_module_template_part( 'templates/divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'arabesque_mikado_get_sticky_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function arabesque_mikado_get_sticky_divided_right_main_menu( $additional_class = 'mkdf-default-nav' ) {
		arabesque_mikado_get_module_template_part( 'templates/sticky-divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'arabesque_mikado_register_header_divided_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function arabesque_mikado_register_header_divided_widgets() {
		register_sidebar(
			array(
				'id'            => 'mkdf-header-divided-left-widget-area',
				'name'          => esc_html__( 'Header Divided Left Widget Area', 'arabesque' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-divided-left-widget-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear left of the Header Divided left menu area', 'arabesque' )
			)
		);

		register_sidebar(
			array(
				'id'            => 'mkdf-header-divided-right-widget-area',
				'name'          => esc_html__( 'Header Divided Right Widget Area', 'arabesque' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-divided-right-widget-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear right of the Header Divided right menu area', 'arabesque' )
			)
		);
	}

	if ( arabesque_mikado_check_is_header_type_enabled( 'header-divided' ) ) {
		add_action( 'widgets_init', 'arabesque_mikado_register_header_divided_widgets' );
	}
}