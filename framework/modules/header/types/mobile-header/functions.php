<?php

if ( ! function_exists( 'arabesque_mikado_include_mobile_header_menu' ) ) {
	function arabesque_mikado_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'arabesque' );
		
		return $menus;
	}
	
	add_filter( 'arabesque_mikado_filter_register_headers_menu', 'arabesque_mikado_include_mobile_header_menu' );
}

if ( ! function_exists( 'arabesque_mikado_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function arabesque_mikado_register_mobile_header_areas() {
		if ( arabesque_mikado_is_responsive_on() ) {
			register_sidebar(
				array(
					'id'            => 'mkdf-right-from-mobile-logo',
					'name'          => esc_html__( 'Mobile Header Widget Area', 'arabesque' ),
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'arabesque' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-right-from-mobile-logo">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'arabesque_mikado_register_mobile_header_areas' );
}

if ( ! function_exists( 'arabesque_mikado_mobile_header_class' ) ) {
	function arabesque_mikado_mobile_header_class( $classes ) {
		$classes[] = 'mkdf-default-mobile-header';
		
		$classes[] = 'mkdf-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'arabesque_mikado_mobile_header_class' );
}

if ( ! function_exists( 'arabesque_mikado_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function arabesque_mikado_get_mobile_header( $slug = '', $module = '' ) {
		if ( arabesque_mikado_is_responsive_on() ) {
			$mobile_menu_title = arabesque_mikado_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title,
				'mobile_icon_class'		 => arabesque_mikado_get_mobile_navigation_icon_class()
			);

            $module = apply_filters('arabesque_mikado_filter_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('arabesque_mikado_filter_mobile_menu_slug', '');
            $parameters = apply_filters('arabesque_mikado_filter_mobile_menu_parameters', $parameters);

            arabesque_mikado_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'arabesque_mikado_action_after_wrapper_inner', 'arabesque_mikado_get_mobile_header', 20 );
}

if ( ! function_exists( 'arabesque_mikado_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function arabesque_mikado_get_mobile_logo() {
		$show_logo_image = arabesque_mikado_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = arabesque_mikado_get_meta_field_intersect( 'logo_image_mobile', arabesque_mikado_get_page_id() );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : arabesque_mikado_get_meta_field_intersect( 'logo_image', arabesque_mikado_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = arabesque_mikado_get_image_dimensions( $logo_image );
			
			$logo_height = '';
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_height'     => $logo_height,
				'logo_styles'     => $logo_styles
			);
			
			arabesque_mikado_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'arabesque_mikado_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function arabesque_mikado_get_mobile_nav() {
		arabesque_mikado_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'arabesque_mikado_mobile_header_per_page_js_var' ) ) {
    function arabesque_mikado_mobile_header_per_page_js_var( $perPageVars ) {
        $perPageVars['mkdfMobileHeaderHeight'] = arabesque_mikado_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter( 'arabesque_mikado_filter_per_page_js_vars', 'arabesque_mikado_mobile_header_per_page_js_var' );
}

if ( ! function_exists( 'arabesque_mikado_get_mobile_navigation_icon_class' ) ) {
	/**
	 * Loads mobile navigation icon class
	 */
	function arabesque_mikado_get_mobile_navigation_icon_class() {
		$classes = array(
			'mkdf-mobile-menu-opener'
		);

		$classes[] = arabesque_mikado_get_icon_sources_class( 'mobile_icon', 'mkdf-mobile-menu-opener' );

		return $classes;
	}
}