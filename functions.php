<?php
include_once get_template_directory() . '/theme-includes.php';

if ( ! function_exists( 'arabesque_mikado_styles' ) ) {
	/**
	 * Function that includes theme's core styles
	 */
	function arabesque_mikado_styles() {

		$modules_css_deps_array = apply_filters( 'arabesque_mikado_filter_modules_css_deps', array() );

		//include theme's core styles
		wp_enqueue_style( 'arabesque-mikado-default-style', MIKADO_ROOT . '/style.css' );
		wp_enqueue_style( 'arabesque-mikado-modules', MIKADO_ASSETS_ROOT . '/css/modules.min.css', $modules_css_deps_array );

		arabesque_mikado_icon_collections()->enqueueStyles();

		wp_enqueue_style( 'wp-mediaelement' );

		do_action( 'arabesque_mikado_action_enqueue_third_party_styles' );

		//is woocommerce installed?
		if ( arabesque_mikado_is_woocommerce_installed() && arabesque_mikado_load_woo_assets() ) {
			//include theme's woocommerce styles
			wp_enqueue_style( 'arabesque-mikado-woo', MIKADO_ASSETS_ROOT . '/css/woocommerce.min.css' );
		}

		if ( arabesque_mikado_dashboard_page() ) {
			wp_enqueue_style( 'arabesque-mikado-dashboard', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkdf-dashboard.css' );
		}

		//define files after which style dynamic needs to be included. It should be included last so it can override other files
		$style_dynamic_deps_array = apply_filters( 'arabesque_mikado_filter_style_dynamic_deps', array() );

		if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css' ) && arabesque_mikado_is_css_folder_writable() && ! is_multisite() ) {
			wp_enqueue_style( 'arabesque-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic.css', $style_dynamic_deps_array, filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic.css' ) ); //it must be included after woocommerce styles so it can override it
		} else if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . arabesque_mikado_get_multisite_blog_id() . '.css' ) && arabesque_mikado_is_css_folder_writable() && is_multisite() ) {
			wp_enqueue_style( 'arabesque-mikado-style-dynamic', MIKADO_ASSETS_ROOT . '/css/style_dynamic_ms_id_' . arabesque_mikado_get_multisite_blog_id() . '.css', $style_dynamic_deps_array, filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_ms_id_' . arabesque_mikado_get_multisite_blog_id() . '.css' ) ); //it must be included after woocommerce styles so it can override it
		}

		//is responsive option turned on?
		if ( arabesque_mikado_is_responsive_on() ) {
			wp_enqueue_style( 'arabesque-mikado-modules-responsive', MIKADO_ASSETS_ROOT . '/css/modules-responsive.min.css' );

			//is woocommerce installed?
			if ( arabesque_mikado_is_woocommerce_installed() && arabesque_mikado_load_woo_assets() ) {
				//include theme's woocommerce responsive styles
				wp_enqueue_style( 'arabesque-mikado-woo-responsive', MIKADO_ASSETS_ROOT . '/css/woocommerce-responsive.min.css' );
			}

			//include proper styles
			if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) && arabesque_mikado_is_css_folder_writable() && ! is_multisite() ) {
				wp_enqueue_style( 'arabesque-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive.css', array(), filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive.css' ) );
			} else if ( file_exists( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . arabesque_mikado_get_multisite_blog_id() . '.css' ) && arabesque_mikado_is_css_folder_writable() && is_multisite() ) {
				wp_enqueue_style( 'arabesque-mikado-style-dynamic-responsive', MIKADO_ASSETS_ROOT . '/css/style_dynamic_responsive_ms_id_' . arabesque_mikado_get_multisite_blog_id() . '.css', array(), filemtime( MIKADO_ROOT_DIR . '/assets/css/style_dynamic_responsive_ms_id_' . arabesque_mikado_get_multisite_blog_id() . '.css' ) );
			}
		}
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_styles' );
}

if ( ! function_exists( 'arabesque_mikado_google_fonts_styles' ) ) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
	function arabesque_mikado_google_fonts_styles() {
		$font_simple_field_array = arabesque_mikado_options()->getOptionsByType( 'fontsimple' );
		if ( ! ( is_array( $font_simple_field_array ) && count( $font_simple_field_array ) > 0 ) ) {
			$font_simple_field_array = array();
		}

		$font_field_array = arabesque_mikado_options()->getOptionsByType( 'font' );
		if ( ! ( is_array( $font_field_array ) && count( $font_field_array ) > 0 ) ) {
			$font_field_array = array();
		}

		$available_font_options = array_merge( $font_simple_field_array, $font_field_array );

		$google_font_weight_array = arabesque_mikado_options()->getOptionValue( 'google_font_weight' );
		if ( ! empty( $google_font_weight_array ) && is_array( $google_font_weight_array ) ) {
			$google_font_weight_array = array_slice( arabesque_mikado_options()->getOptionValue( 'google_font_weight' ), 1 );
		}

		$font_weight_str = '200,300,400,500';
		if ( ! empty( $google_font_weight_array ) && is_array( $google_font_weight_array ) && $google_font_weight_array !== '' ) {
			$font_weight_str = implode( ',', $google_font_weight_array );
		}

		$google_font_subset_array = arabesque_mikado_options()->getOptionValue( 'google_font_subset' );
		if ( ! empty( $google_font_subset_array ) && is_array( $google_font_subset_array ) ) {
			$google_font_subset_array = array_slice( arabesque_mikado_options()->getOptionValue( 'google_font_subset' ), 1 );
		}

		$font_subset_str = 'latin-ext';
		if ( ! empty( $google_font_subset_array ) && is_array( $google_font_subset_array ) && $google_font_subset_array !== '' ) {
			$font_subset_str = implode( ',', $google_font_subset_array );
		}

		//default fonts
		$default_font_family = array(
			'Montserrat'
		);

		$modified_default_font_family = array();
		foreach ( $default_font_family as $default_font ) {
			$modified_default_font_family[] = $default_font . ':' . $font_weight_str;
		}

		$default_font_string = implode( '|', $modified_default_font_family );

		//define available font options array
		$fonts_array = array();
		foreach ( $available_font_options as $font_option ) {
			//is font set and not set to default and not empty?
			$font_option_value = arabesque_mikado_options()->getOptionValue( $font_option );

			if ( arabesque_mikado_is_font_option_valid( $font_option_value ) && ! arabesque_mikado_is_native_font( $font_option_value ) ) {
				$font_option_string = $font_option_value . ':' . $font_weight_str;

				if ( ! in_array( str_replace( '+', ' ', $font_option_value ), $default_font_family ) && ! in_array( $font_option_string, $fonts_array ) ) {
					$fonts_array[] = $font_option_string;
				}
			}
		}

		$fonts_array         = array_diff( $fonts_array, array( '-1:' . $font_weight_str ) );
		$google_fonts_string = implode( '|', $fonts_array );

		$protocol = is_ssl() ? 'https:' : 'http:';

		//is google font option checked anywhere in theme?
		if ( count( $fonts_array ) > 0 ) {

			//include all checked fonts
			$fonts_full_list      = $default_font_string . '|' . str_replace( '+', ' ', $google_fonts_string );
			$fonts_full_list_args = array(
				'family' => urlencode( $fonts_full_list ),
				'subset' => urlencode( $font_subset_str ),
			);

			$arabesque_mikado_fonts = add_query_arg( $fonts_full_list_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'arabesque-mikado-google-fonts', esc_url_raw( $arabesque_mikado_fonts ), array(), '1.0.0' );

		} else {
			//include default google font that theme is using
			$default_fonts_args     = array(
				'family' => urlencode( $default_font_string ),
				'subset' => urlencode( $font_subset_str ),
			);
			$arabesque_mikado_fonts = add_query_arg( $default_fonts_args, $protocol . '//fonts.googleapis.com/css' );
			wp_enqueue_style( 'arabesque-mikado-google-fonts', esc_url_raw( $arabesque_mikado_fonts ), array(), '1.0.0' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_google_fonts_styles' );
}

if ( ! function_exists( 'arabesque_mikado_scripts' ) ) {
	/**
	 * Function that includes all necessary scripts
	 */
	function arabesque_mikado_scripts() {
		global $wp_scripts;

		//init theme core scripts
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-accordion' );
		wp_enqueue_script( 'wp-mediaelement' );

		// 3rd party JavaScripts that we used in our theme
		wp_enqueue_script( 'appear', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.appear.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'modernizr', MIKADO_ASSETS_ROOT . '/js/modules/plugins/modernizr.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'hoverIntent', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.hoverIntent.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-plugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.plugin.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', MIKADO_ASSETS_ROOT . '/js/modules/plugins/owl.carousel.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waypoints', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waypoints.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'fluidvids', MIKADO_ASSETS_ROOT . '/js/modules/plugins/fluidvids.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'perfect-scrollbar', MIKADO_ASSETS_ROOT . '/js/modules/plugins/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'ScrollToPlugin', MIKADO_ASSETS_ROOT . '/js/modules/plugins/ScrollToPlugin.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'parallax', MIKADO_ASSETS_ROOT . '/js/modules/plugins/parallax.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'waitforimages', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.waitforimages.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'prettyphoto-4.0', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.prettyPhoto.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'jquery-easing-1.3', MIKADO_ASSETS_ROOT . '/js/modules/plugins/jquery.easing.1.3.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'isotope', MIKADO_ASSETS_ROOT . '/js/modules/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'vivus', MIKADO_ASSETS_ROOT . '/js/modules/plugins/vivus.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'packery', MIKADO_ASSETS_ROOT . '/js/modules/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );

		do_action( 'arabesque_mikado_action_enqueue_third_party_scripts' );

		if ( arabesque_mikado_is_woocommerce_installed() ) {
			wp_enqueue_script( 'select2' );
		}

		if ( arabesque_mikado_is_page_smooth_scroll_enabled() ) {
			wp_enqueue_script( 'tweenLite', MIKADO_ASSETS_ROOT . '/js/modules/plugins/TweenLite.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'smoothPageScroll', MIKADO_ASSETS_ROOT . '/js/modules/plugins/smoothPageScroll.js', array( 'jquery' ), false, true );
		}

		//include google map api script
		$google_maps_api_key          = arabesque_mikado_options()->getOptionValue( 'google_maps_api_key' );
		$google_maps_extensions       = '';
		$google_maps_extensions_array = apply_filters( 'arabesque_mikado_filter_google_maps_extensions_array', array() );

		if ( ! empty( $google_maps_extensions_array ) ) {
			$google_maps_extensions .= '&libraries=';
			$google_maps_extensions .= implode( ',', $google_maps_extensions_array );
		}

		if ( ! empty( $google_maps_api_key ) ) {
			wp_enqueue_script( 'arabesque-mikado-google-map-api', '//maps.googleapis.com/maps/api/js?key=' . esc_attr( $google_maps_api_key ) . $google_maps_extensions, array(), false, true );
		} else {
			wp_enqueue_script( 'arabesque-mikado-google-map-api', '//maps.googleapis.com/maps/api/js', array(), false, true );
		}

		wp_enqueue_script( 'arabesque-mikado-modules', MIKADO_ASSETS_ROOT . '/js/modules.min.js', array( 'jquery' ), false, true );

		if ( arabesque_mikado_dashboard_page() ) {
			$dash_array_deps = array(
				'jquery-ui-datepicker',
				'jquery-ui-sortable'
			);

			wp_enqueue_script( 'arabesque-mikado-dashboard', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/js/mkdf-dashboard.js', $dash_array_deps, false, true );

			wp_enqueue_script( 'wp-util' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script(
				'iris',
				admin_url( 'js/iris.min.js' ),
				array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),
				false,
				1
			);

			wp_enqueue_script(
				'wp-color-picker',
				admin_url( 'js/color-picker.min.js' ),
				array( 'iris' ),
				false,
				1
			);

			$colorpicker_l10n = array(
				'clear'         => esc_html__( 'Clear', 'arabesque' ),
				'defaultString' => esc_html__( 'Default', 'arabesque' ),
				'pick'          => esc_html__( 'Select Color', 'arabesque' ),
				'current'       => esc_html__( 'Current Color', 'arabesque' ),
			);

			wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n );
		}

		//include comment reply script
		$wp_scripts->add_data( 'comment-reply', 'group', 1 );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_scripts' );
}

if ( ! function_exists( 'arabesque_mikado_theme_setup' ) ) {
	/**
	 * Function that adds various features to theme. Also defines image sizes that are used in a theme
	 */
	function arabesque_mikado_theme_setup() {
		//add support for feed links
		add_theme_support( 'automatic-feed-links' );

		//add support for post formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'quote', 'video', 'audio' ) );

		//add theme support for post thumbnails
		add_theme_support( 'post-thumbnails' );

		//add theme support for title tag
		add_theme_support( 'title-tag' );

		//add theme support for editor style
		add_editor_style( 'framework/admin/assets/css/editor-style.css' );

		//defined content width variable
		$GLOBALS['content_width'] = apply_filters( 'arabesque_mikado_filter_set_content_width', 1100 );

		//define thumbnail sizes
		add_image_size( 'arabesque_mikado_square', 550, 550, true );
		add_image_size( 'arabesque_mikado_landscape', 1100, 550, true );
		add_image_size( 'arabesque_mikado_portrait', 550, 1100, true );
		add_image_size( 'arabesque_mikado_huge', 1100, 1100, true );

		load_theme_textdomain( 'arabesque', get_template_directory() . '/languages' );
	}

	add_action( 'after_setup_theme', 'arabesque_mikado_theme_setup' );
}

if ( ! function_exists( 'arabesque_mikado_enqueue_editor_customizer_styles' ) ) {
	/**
	 * Enqueue supplemental block editor styles
	 */
	function arabesque_mikado_enqueue_editor_customizer_styles() {
		wp_enqueue_style( 'arabesque-mikado-modules-admin-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/mkdf-modules-admin.css' );
		wp_enqueue_style( 'arabesque-mikado-editor-customizer-styles', MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT . '/css/editor-customizer-style.css' );
	}

	// add google font
	add_action( 'enqueue_block_editor_assets', 'arabesque_mikado_google_fonts_styles' );
	// add action
	add_action( 'enqueue_block_editor_assets', 'arabesque_mikado_enqueue_editor_customizer_styles' );
}

if ( ! function_exists( 'arabesque_mikado_is_responsive_on' ) ) {
	/**
	 * Checks whether responsive mode is enabled in theme options
	 * @return bool
	 */
	function arabesque_mikado_is_responsive_on() {
		return arabesque_mikado_options()->getOptionValue( 'responsiveness' ) !== 'no';
	}
}

if ( ! function_exists( 'arabesque_mikado_rgba_color' ) ) {
	/**
	 * Function that generates rgba part of css color property
	 *
	 * @param $color string hex color
	 * @param $transparency float transparency value between 0 and 1
	 *
	 * @return string generated rgba string
	 */
	function arabesque_mikado_rgba_color( $color, $transparency ) {
		if ( $color !== '' && $transparency !== '' ) {
			$rgba_color = '';

			$rgb_color_array = arabesque_mikado_hex2rgb( $color );
			$rgba_color      .= 'rgba(' . implode( ', ', $rgb_color_array ) . ', ' . $transparency . ')';

			return $rgba_color;
		}
	}
}

if ( ! function_exists( 'arabesque_mikado_header_meta' ) ) {
	/**
	 * Function that echoes meta data if our seo is enabled
	 */
	function arabesque_mikado_header_meta() { ?>

        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

	<?php }

	add_action( 'arabesque_mikado_action_header_meta', 'arabesque_mikado_header_meta' );
}

if ( ! function_exists( 'arabesque_mikado_user_scalable_meta' ) ) {
	/**
	 * Function that outputs user scalable meta if responsiveness is turned on
	 * Hooked to arabesque_mikado_action_header_meta action
	 */
	function arabesque_mikado_user_scalable_meta() {
		//is responsiveness option is chosen?
		if ( arabesque_mikado_is_responsive_on() ) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=yes">
		<?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
		<?php }
	}

	add_action( 'arabesque_mikado_action_header_meta', 'arabesque_mikado_user_scalable_meta' );
}

if ( ! function_exists( 'arabesque_mikado_smooth_page_transitions' ) ) {
	/**
	 * Function that outputs smooth page transitions html if smooth page transitions functionality is turned on
	 * Hooked to arabesque_mikado_action_after_body_tag action
	 */
	function arabesque_mikado_smooth_page_transitions() {
		$id = arabesque_mikado_get_page_id();

		if ( arabesque_mikado_get_meta_field_intersect( 'smooth_page_transitions', $id ) === 'yes' && arabesque_mikado_get_meta_field_intersect( 'page_transition_preloader', $id ) === 'yes' ) { ?>
            <div class="mkdf-smooth-transition-loader mkdf-mimic-ajax">
                <div class="mkdf-transition-loader-canvas"></div>
                <div class="mkdf-st-loader">
                    <div class="mkdf-st-loader1">
						<?php arabesque_mikado_loading_spinners(); ?>
                    </div>
                </div>
            </div>
		<?php }
	}

	add_action( 'arabesque_mikado_action_after_body_tag', 'arabesque_mikado_smooth_page_transitions', 10 );
}

if ( ! function_exists( 'arabesque_mikado_back_to_top_button' ) ) {
	/**
	 * Function that outputs back to top button html if back to top functionality is turned on
	 * Hooked to arabesque_mikado_action_after_wrapper_inner action
	 */
	function arabesque_mikado_back_to_top_button() {
		if ( arabesque_mikado_options()->getOptionValue( 'show_back_button' ) == 'yes' ) { ?>
            <a id='mkdf-back-to-top' href='#'>
                <span class="mkdf-icon-stack">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="42px" height="36px" viewBox="0 0 42 36" enable-background="new 0 0 42 36" xml:space="preserve">
                    <g>
                        <polygon fill="currentColor" points="38.633,22.514 20.844,3.439 3.051,22.135 3.775,22.824 20.836,4.896 37.902,23.195 	"/>
                    </g>
                    <g>
                        <polygon fill="currentColor" points="38.633,30.863 20.844,11.789 3.051,30.484 3.775,31.174 20.836,13.246 37.902,31.545 	"/>
                    </g>
                    </svg>
                </span>
            </a>
		<?php }
	}

	add_action( 'arabesque_mikado_action_after_wrapper_inner', 'arabesque_mikado_back_to_top_button', 30 );
}

if ( ! function_exists( 'arabesque_mikado_get_page_id' ) ) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see arabesque_mikado_is_woocommerce_installed()
	 * @see arabesque_mikado_is_woocommerce_shop()
	 */
	function arabesque_mikado_get_page_id() {
		if ( arabesque_mikado_is_woocommerce_installed() && arabesque_mikado_is_woocommerce_shop() ) {
			return arabesque_mikado_get_woo_shop_page_id();
		}

		if ( arabesque_mikado_is_default_wp_template() ) {
			return - 1;
		}

		return get_queried_object_id();
	}
}

if ( ! function_exists( 'arabesque_mikado_get_multisite_blog_id' ) ) {
	/**
	 * Check is multisite and return blog id
	 *
	 * @return int
	 */
	function arabesque_mikado_get_multisite_blog_id() {
		if ( is_multisite() ) {
			return get_blog_details()->blog_id;
		}
	}
}

if ( ! function_exists( 'arabesque_mikado_is_default_wp_template' ) ) {
	/**
	 * Function that checks if current page archive page, search, 404 or default home blog page
	 * @return bool
	 *
	 * @see is_archive()
	 * @see is_search()
	 * @see is_404()
	 * @see is_front_page()
	 * @see is_home()
	 */
	function arabesque_mikado_is_default_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'arabesque_mikado_has_shortcode' ) ) {
	/**
	 * Function that checks whether shortcode exists on current page / post
	 *
	 * @param string shortcode to find
	 * @param string content to check. If isn't passed current post content will be used
	 *
	 * @return bool whether content has shortcode or not
	 */
	function arabesque_mikado_has_shortcode( $shortcode, $content = '' ) {
		$has_shortcode = false;

		if ( $shortcode ) {
			//if content variable isn't past
			if ( $content == '' ) {
				//take content from current post
				$page_id = arabesque_mikado_get_page_id();
				if ( ! empty( $page_id ) ) {
					$current_post = get_post( $page_id );

					if ( is_object( $current_post ) && property_exists( $current_post, 'post_content' ) ) {
						$content = $current_post->post_content;
					}
				}
			}

			//does content has shortcode added?
			if ( has_shortcode( $content, $shortcode ) ) {
				$has_shortcode = true;
			}
		}

		return $has_shortcode;
	}
}

if ( ! function_exists( 'arabesque_mikado_get_unique_page_class' ) ) {
	/**
	 * Returns unique page class based on post type and page id
	 *
	 * $params int $id is page id
	 * $params bool $allowSingleProductOption
	 * @return string
	 */
	function arabesque_mikado_get_unique_page_class( $id, $allowSingleProductOption = false ) {
		$page_class = '';

		if ( arabesque_mikado_is_woocommerce_installed() && $allowSingleProductOption ) {

			if ( is_product() ) {
				$id = get_the_ID();
			}
		}

		if ( is_single() ) {
			$page_class = '.postid-' . $id;
		} elseif ( is_home() ) {
			$page_class .= '.home';
		} elseif ( is_archive() || $id === arabesque_mikado_get_woo_shop_page_id() ) {
			$page_class .= '.archive';
		} elseif ( is_search() ) {
			$page_class .= '.search';
		} elseif ( is_404() ) {
			$page_class .= '.error404';
		} else {
			$page_class .= '.page-id-' . $id;
		}

		return $page_class;
	}
}

if ( ! function_exists( 'arabesque_mikado_page_custom_style' ) ) {
	/**
	 * Function that print custom page style
	 */
	function arabesque_mikado_page_custom_style() {
		$style = apply_filters( 'arabesque_mikado_filter_add_page_custom_style', $style = '' );

		if ( $style !== '' ) {

			if ( arabesque_mikado_is_woocommerce_installed() && arabesque_mikado_load_woo_assets() ) {
				wp_add_inline_style( 'arabesque-mikado-woo', $style );
			} else {
				wp_add_inline_style( 'arabesque-mikado-modules', $style );
			}
		}
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_page_custom_style' );
}

if ( ! function_exists( 'arabesque_mikado_container_style' ) ) {
	/**
	 * Function that return container style
	 */
	function arabesque_mikado_container_style( $style ) {
		$page_id      = arabesque_mikado_get_page_id();
		$class_prefix = arabesque_mikado_get_unique_page_class( $page_id, true );

		$container_selector = array(
			$class_prefix . ' .mkdf-content',
		);

		$container_class       = array();
		$page_backgorund_color = get_post_meta( $page_id, 'mkdf_page_background_color_meta', true );

		if ( $page_backgorund_color !== '' ) {
			$container_class['background-color'] = $page_backgorund_color;
		}

		$disable_background_image = get_post_meta( $page_id, 'mkdf_disable_content_background_image_meta', true );

		if ( $disable_background_image == 'yes' ) {
			$container_class['background-image'] = 'none';
		} else {
			$page_background_image = get_post_meta( $page_id, 'mkdf_content_background_image_meta', true );

			if ( $page_background_image ) {
				$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			}
		}

		$current_style = arabesque_mikado_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter( 'arabesque_mikado_filter_add_page_custom_style', 'arabesque_mikado_container_style' );
}

if ( ! function_exists( 'arabesque_mikado_content_padding' ) ) {
	/**
	 * Function that return padding for content
	 */
	function arabesque_mikado_content_padding( $style ) {
		$page_id      = arabesque_mikado_get_page_id();
		$class_prefix = arabesque_mikado_get_unique_page_class( $page_id, true );

		$return_style                = '';
		$current_style_string        = '';
		$current_mobile_style_string = '';

		$content_selector = array(
			$class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
			$class_prefix . ' .mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);

		// general padding
		$content_style = array();

		$page_padding = get_post_meta( $page_id, 'mkdf_page_content_padding', true );

		if ( $page_padding !== '' ) {

			$content_style['padding'] = $page_padding;
			$current_style_string     .= arabesque_mikado_dynamic_css( $content_selector, $content_style );
		}

		// mobile padding
		$content_mobile_style = array();

		$page_mobile_padding = get_post_meta( $page_id, 'mkdf_page_content_padding_mobile', true );

		if ( $page_mobile_padding !== '' ) {
			$content_mobile_style['padding'] = $page_mobile_padding;
			$current_mobile_style_string     .= arabesque_mikado_dynamic_css( $content_selector, $content_mobile_style );
		}

		// print

		if ( $current_style_string != '' ) {
			$return_style .= $current_style_string;
		}

		if ( $current_mobile_style_string != '' ) {
			$return_style .= '@media only screen and (max-width: 1024px) {' . $current_mobile_style_string . '}';
		}

		$return_style .= $return_style . $style;

		return $return_style;
	}

	add_filter( 'arabesque_mikado_filter_add_page_custom_style', 'arabesque_mikado_content_padding' );
}

if ( ! function_exists( 'arabesque_mikado_print_custom_js' ) ) {
	/**
	 * Prints out custom css from theme options
	 */
	function arabesque_mikado_print_custom_js() {
		$custom_js = arabesque_mikado_options()->getOptionValue( 'custom_js' );

		if ( ! empty( $custom_js ) ) {
			wp_add_inline_script( 'arabesque-mikado-modules', $custom_js );
		}
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_print_custom_js' );
}

if ( ! function_exists( 'arabesque_mikado_get_global_variables' ) ) {
	/**
	 * Function that generates global variables and put them in array so they could be used in the theme
	 */
	function arabesque_mikado_get_global_variables() {
		$global_variables = array();

		$global_variables['mkdfAddForAdminBar']         = is_admin_bar_showing() ? 32 : 0;
		$global_variables['mkdfElementAppearAmount']    = - 100;
		$global_variables['mkdfElementAnimateDuration'] = 1500;
		$global_variables['mkdfAjaxUrl']                = esc_url( admin_url( 'admin-ajax.php' ) );

		$global_variables = apply_filters( 'arabesque_mikado_filter_js_global_variables', $global_variables );

		wp_localize_script( 'arabesque-mikado-modules', 'mkdfGlobalVars', array(
			'vars' => $global_variables
		) );
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_get_global_variables' );
}

if ( ! function_exists( 'arabesque_mikado_per_page_js_variables' ) ) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function arabesque_mikado_per_page_js_variables() {
		$per_page_js_vars = apply_filters( 'arabesque_mikado_filter_per_page_js_vars', array() );

		wp_localize_script( 'arabesque-mikado-modules', 'mkdfPerPageVars', array(
			'vars' => $per_page_js_vars
		) );
	}

	add_action( 'wp_enqueue_scripts', 'arabesque_mikado_per_page_js_variables' );
}

if ( ! function_exists( 'arabesque_mikado_content_elem_style_attr' ) ) {
	/**
	 * Defines filter for adding custom styles to content HTML element
	 */
	function arabesque_mikado_content_elem_style_attr() {
		$styles = apply_filters( 'arabesque_mikado_filter_content_elem_style_attr', array() );

		arabesque_mikado_inline_style( $styles );
	}
}

if ( ! function_exists( 'arabesque_mikado_is_plugin_installed' ) ) {
	/**
	 * Function that checks if forward plugin installed
	 *
	 * @param $plugin string
	 *
	 * @return bool
	 */
	function arabesque_mikado_is_plugin_installed( $plugin ) {
		switch ( $plugin ) {
			case 'core':
				return defined( 'ARABESQUE_CORE_VERSION' );
				break;
			case 'woocommerce':
				return function_exists( 'is_woocommerce' );
				break;
			case 'visual-composer':
				return class_exists( 'WPBakeryVisualComposerAbstract' );
				break;
			case 'revolution-slider':
				return class_exists( 'RevSliderFront' );
				break;
			case 'contact-form-7':
				return defined( 'WPCF7_VERSION' );
				break;
			case 'wpml':
				return defined( 'ICL_SITEPRESS_VERSION' );
				break;
			case 'gutenberg-editor':
				return class_exists( 'WP_Block_Type' );
				break;
			case 'gutenberg-plugin':
				return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
				break;
			default:
				return false;
				break;
		}
	}
}

if ( ! function_exists( 'arabesque_mikado_core_plugin_installed' ) ) {
	/**
	 * Function that checks if Mikado Core plugin installed
	 * @return bool
	 */
	function arabesque_mikado_core_plugin_installed() {
		return defined( 'ARABESQUE_CORE_VERSION' );
	}
}

if ( ! function_exists( 'arabesque_mikado_is_woocommerce_installed' ) ) {
	/**
	 * Function that checks if WooCommerce plugin installed
	 * @return bool
	 */
	function arabesque_mikado_is_woocommerce_installed() {
		return function_exists( 'is_woocommerce' );
	}
}

if ( ! function_exists( 'arabesque_mikado_visual_composer_installed' ) ) {
	/**
	 * Function that checks if Visual Composer plugin installed
	 * @return bool
	 */
	function arabesque_mikado_visual_composer_installed() {
		return class_exists( 'WPBakeryVisualComposerAbstract' );
	}
}

if ( ! function_exists( 'arabesque_mikado_revolution_slider_installed' ) ) {
	/**
	 * Function that checks if Revolution Slider plugin installed
	 * @return bool
	 */
	function arabesque_mikado_revolution_slider_installed() {
		return class_exists( 'RevSliderFront' );
	}
}

if ( ! function_exists( 'arabesque_mikado_contact_form_7_installed' ) ) {
	/**
	 * Function that checks if Contact Form 7 plugin installed
	 * @return bool
	 */
	function arabesque_mikado_contact_form_7_installed() {
		return defined( 'WPCF7_VERSION' );
	}
}

if ( ! function_exists( 'arabesque_mikado_timetable_schedule_installed' ) ) {
	/**
	 * Function that checks if Timetable Responsive Schedule plugin is installed
	 * @return bool
	 */
	function arabesque_mikado_timetable_schedule_installed() {
		//checking for this dummy function because plugin doesn't have constant or class
		//that we can hook to. Poorly coded plugin
		return function_exists( 'timetable_load_textdomain' );
	}
}

if ( ! function_exists( 'arabesque_mikado_is_wpml_installed' ) ) {
	/**
	 * Function that checks if WPML plugin installed
	 * @return bool
	 */
	function arabesque_mikado_is_wpml_installed() {
		return defined( 'ICL_SITEPRESS_VERSION' );
	}
}

if ( ! function_exists( 'arabesque_mikado_is_wp_gutenberg_installed' ) ) {
	/**
	 * Function that checks if WordPress 5.x with Gutenberg editor installed
	 *
	 * @return bool
	 */
	function arabesque_mikado_is_wp_gutenberg_installed() {
		return class_exists( 'WP_Block_Type' );
	}
}

if ( ! function_exists( 'arabesque_mikado_is_gutenberg_plugin_installed' ) ) {
	/**
	 * Function that checks if Gutenberg plugin installed
	 *
	 * @return bool
	 */
	function arabesque_mikado_is_gutenberg_plugin_installed() {
		return function_exists( 'is_gutenberg_page' ) && is_gutenberg_page();
	}
}

if ( ! function_exists( 'arabesque_mikado_timetable_schedule_installed' ) ) {
	/**
	 * Function that checks if Timetable Responsive Schedule plugin is installed
	 * @return bool
	 */
	function arabesque_mikado_timetable_schedule_installed() {
		//checking for this dummy function because plugin doesn't have constant or class
		//that we can hook to. Poorly coded plugin
		return function_exists( 'timetable_load_textdomain' );
	}
}

if ( ! function_exists( 'arabesque_mikado_max_image_width_srcset' ) ) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function arabesque_mikado_max_image_width_srcset() {
		return 1920;
	}

	add_filter( 'max_srcset_image_width', 'arabesque_mikado_max_image_width_srcset' );
}

if ( ! function_exists( 'arabesque_mikado_is_the_events_calendar_installed' ) ) {
	/**
	 * Function that checks if The Event Calendar plugin is installed
	 * @return bool
	 */
	function arabesque_mikado_is_the_events_calendar_installed() {
		return class_exists( 'Tribe__Events__Main' );
	}
}

if ( ! function_exists( 'arabesque_mikado_generate_first_color_selectors' ) ) {
	/**
	 * Function generate arrays of selectors for first color option
	 */
	function arabesque_mikado_generate_first_color_selectors() {

		$return_array = array();
		//generate color selector array
		$return_array['color_selector'] = array(
			'.mkdf-arabesque-loader svg.mkdf-arabesque-loader-pulse',
			'.mkdf-comment-holder .mkdf-comment-text .comment-edit-link:hover',
			'.mkdf-comment-holder .mkdf-comment-text .comment-reply-link:hover',
			'.mkdf-comment-holder .mkdf-comment-text .replay:hover',
			'.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link:hover',
			'.mkdf-comment-holder .mkdf-comment-text .comment-respond .logged-in-as a:hover',
			'footer .widget #wp-calendar tfoot a:hover',
			'footer .widget.widget_search .input-holder button:hover',
			'footer .widget.widget_tag_cloud a:hover',
			'footer .widget.widget_mkdf_twitter_widget .mkdf-twitter-widget li.mkdf-tweet-holder .mkdf-tweet-text a:hover',
			'footer .widget.mkdf-blog-list-widget .mkdf-blog-list-holder.mkdf-bl-simple .mkdf-bli-content .entry-title.mkdf-post-title a:hover',
			'footer .widget.mkdf-blog-list-widget .mkdf-blog-list-holder.mkdf-bl-simple .mkdf-bli-content .mkdf-post-info-date a:hover',
			'footer .widget .footer-custom-menu ul li a:hover',
			'footer .widget .mkdf-iwt .mkdf-iwt-icon a',
			'footer .widget .mkdf-iwt .mkdf-iwt-icon',
			'footer .widget .mkdf-iwt span.mkdf-iwt-title a:hover',
			'footer .widget.mkdf-social-icons-group-widget .mkdf-social-icon-widget-holder:hover',
			'.mkdf-iwt.mkdf-iwt-svg-path .mkdf-iwt-icon',
			'.mkdf-iwt.mkdf-iwt-svg-path .mkdf-iwt-icon a',
			'.mkdf-fullscreen-sidebar .widget ul li a:hover',
			'.mkdf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
			'.mkdf-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
			'.mkdf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
			'.mkdf-side-menu .widget ul li a:hover',
			'.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
			'.mkdf-side-menu .widget.widget_search .input-holder button:hover',
			'.mkdf-side-menu .widget.widget_tag_cloud a:hover',
			'.mkdf-side-menu .mkdf-social-icons-group-widget .mkdf-social-icon-widget-holder:hover',
			'.mkdf-side-menu .widget .textwidget a:hover',
			'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
			'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
			'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-sub-menu .wpml-ls-item a:hover',
			'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu .wpml-ls-item a:hover',
			'.mkd-ttevents-single .mkd-event-single-icon',
			'.mkd-ttevents-single .tt_event_items_list li.type_info .tt_event_text',
			'.mkd-ttevents-single .tt_event_items_list li:not(.type_info):before',
			'.mkdf-blog-holder article.sticky .mkdf-post-title a',
			'.mkdf-blog-holder article .mkdf-post-info-top>div a:hover',
			'.mkdf-blog-holder article .mkdf-post-info-bottom .mkdf-post-info-bottom-right a i',
			'.mkdf-blog-holder article .mkdf-post-info-bottom a:hover',
			'.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
			'.mkdf-blog-pagination ul li a.mkdf-pag-active',
			'.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
			'.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
			'.mkdf-blog-single-navigation .mkdf-blog-single-next:hover',
			'.mkdf-blog-single-navigation .mkdf-blog-single-prev:hover',
			'.mkdf-single-links-pages .mkdf-single-links-pages-inner>span',
			'.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
			'.mkdf-top-bar .widget a:hover',
			'.mkdf-search-page-holder article.sticky .mkdf-post-title a',
			'.mkdf-search-cover .mkdf-search-close:hover',
			'.mkdf-booking-form.light .mkdf-bf-form-button .mkdf-btn.mkdf-btn-small',
			'.mkdf-pl-filter-holder ul li.mkdf-pl-current span',
			'.mkdf-pl-filter-holder ul li:hover span',
			'.mkdf-pl-standard-pagination ul li.mkdf-pl-pag-active a',
			'.mkdf-portfolio-list-holder.mkdf-pl-gallery-overlay article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-nav-light-skin .owl-nav .owl-next:hover',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-nav-light-skin .owl-nav .owl-prev:hover',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-nav-dark-skin .owl-nav .owl-next:hover',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-nav-dark-skin .owl-nav .owl-prev:hover',
			'.mkdf-testimonials-holder.mkdf-testimonials-image-pagination .mkdf-testimonials-image-pagination-inner .mkdf-testimonials-author-job',
			'.mkdf-testimonials-holder.mkdf-testimonials-image-pagination.mkdf-testimonials-light .owl-nav .owl-next:hover',
			'.mkdf-testimonials-holder.mkdf-testimonials-image-pagination.mkdf-testimonials-light .owl-nav .owl-prev:hover',
			'.mkdf-testimonials-holder.mkdf-testimonials-standard .mkdf-testimonial-quote i',
			'.mkdf-reviews-per-criteria .mkdf-item-reviews-average-rating',
			'.mkdf-banner-holder .mkdf-banner-link-text .mkdf-banner-link-hover span',
			'.mkdf-video-button-holder .mkdf-video-button-play',
			'.mkdf-btn.mkdf-btn-outline',
			'.mkdf-icon-list-holder .mkdf-il-icon-holder>*',
			'.mkdf-info-list .mkdf-info-list-item:hover .mkdf-ili-left',
			'.mkdf-info-list .mkdf-info-list-item .mkdf-info-list-item-inner:hover .mkdf-ili-title',
			'.mkdf-interactive-banner-holder .mkdf-interactive-banner-icon',
			'.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
			'.mkdf-twitter-list-holder .mkdf-twitter-icon',
			'.mkdf-twitter-list-holder .mkdf-tweet-text a:hover',
			'.mkdf-twitter-list-holder .mkdf-twitter-profile a:hover',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget li .mkdf-twitter-icon',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget li .mkdf-tweet-text a:hover',
			'.mkdf-number-with-text-holder .mkdf-nwt-number-holder .mkdf-nwt-number'
		);

		$return_array['woo_color_selector'] = array();
		if ( arabesque_mikado_is_woocommerce_installed() ) {
			$return_array['woo_color_selector'] = array(
				'.mkdf-pl-holder .mkdf-pli .mkdf-pli-rating',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-rating',
				'.mkdf-pls-holder .mkdf-pls-text .mkdf-pls-rating',
				'.mkdf-product-info .mkdf-pi-rating',
				'.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
				'.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before',
				'.woocommerce .star-rating',
				'.woocommerce-pagination .page-numbers:not(.prev):not(.next).current',
				'.woocommerce-pagination .page-numbers:not(.prev):not(.next):hover',
				'.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
				'.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
				'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
				'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
				'.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-shopping-cart-holder .mkdf-header-cart:hover',
				'.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-shopping-cart-holder .mkdf-header-cart:hover',
				'.widget.woocommerce.widget_layered_nav ul li.chosen a',
				'.mkdf-plc-holder.mkdf-plc-nav-light-skin .owl-nav .owl-next:hover',
				'.mkdf-plc-holder.mkdf-plc-nav-light-skin .owl-nav .owl-prev:hover'
			);
		}

		$return_array['color_selector'] = array_merge( $return_array['color_selector'], $return_array['woo_color_selector'] );

		$return_array['color_important_selector'] = array(
			'.mkdf-related-posts-holder .mkdf-related-post .mkdf-post-info>div a:hover',
			'.mkdf-blog-list-holder.mkdf-bl-standard .mkdf-bli-info>div a:hover',
			'.mkdf-light-header .mkdf-page-header>div:not(.fixed):not(.mkdf-sticky-header) .mkdf-menu-area .widget a:hover',
			'.mkdf-light-header .mkdf-page-header>div:not(.fixed):not(.mkdf-sticky-header).mkdf-menu-area .widget a:hover',
			'.mkdf-dark-header .mkdf-page-header>div:not(.fixed):not(.mkdf-sticky-header) .mkdf-menu-area .widget a:hover',
			'.mkdf-dark-header .mkdf-page-header>div:not(.fixed):not(.mkdf-sticky-header).mkdf-menu-area .widget a:hover',
			'.mkdf-light-header.mkdf-header-vertical .mkdf-vertical-menu ul li a:hover',
			'.mkdf-light-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current-menu-ancestor>a',
			'.mkdf-light-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current-menu-item>a',
			'.mkdf-light-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current_page_item>a',
			'.mkdf-light-header.mkdf-header-vertical .mkdf-vertical-menu>ul>li.current-menu-ancestor>a',
			'.mkdf-light-header.mkdf-header-vertical .mkdf-vertical-menu>ul>li.mkdf-active-item>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li a:hover',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current-menu-ancestor>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current-menu-item>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current_page_item>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu>ul>li.current-menu-ancestor>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu>ul>li.mkdf-active-item>a',
			'.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-search-opener:hover',
			'.mkdf-light-header .mkdf-top-bar .mkdf-search-opener:hover',
			'.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-search-opener:hover',
			'.mkdf-dark-header .mkdf-top-bar .mkdf-search-opener:hover',
			'.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener.opened',
			'.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener:hover',
			'.mkdf-light-header .mkdf-top-bar .mkdf-side-menu-button-opener.opened',
			'.mkdf-light-header .mkdf-top-bar .mkdf-side-menu-button-opener:hover',
			'.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener.opened',
			'.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-side-menu-button-opener:hover',
			'.mkdf-dark-header .mkdf-top-bar .mkdf-side-menu-button-opener.opened',
			'.mkdf-dark-header .mkdf-top-bar .mkdf-side-menu-button-opener:hover',
			'.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-icon-widget-holder:hover',
			'.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-icon-widget-holder:hover',
			'.mkdf-dark-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-social-icon-widget-holder:hover',
			'.mkdf-light-header .mkdf-page-header>div:not(.mkdf-sticky-header):not(.fixed) .mkdf-social-icon-widget-holder:hover'
		);

		$return_array['background_color_selector'] = array(
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes>div',
			'.mkdf-st-loader .wave>div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1>div',
			'.mkdf-st-loader .five_rotating_circles .container2>div',
			'.mkdf-st-loader .five_rotating_circles .container3>div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball',
			'#submit_comment',
			'.post-password-form input[type=submit]',
			'input.wpcf7-form-control.wpcf7-submit',
			'.xdsoft_datetimepicker .xdsoft_label>.xdsoft_select>div>.xdsoft_option:hover',
			'.tt_tabs .tt_tabs_navigation .ui-tabs-active a',
			'.tt_tabs .tt_tabs_navigation li a:hover',
			'.widget.upcoming_events_widget .tt_upcoming_event_controls a:hover',
			'.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
			'.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
			'.mkdf-search-fade .mkdf-fullscreen-with-sidebar-search-holder .mkdf-fullscreen-search-table',
			'.mkdf-social-icons-group-widget.mkdf-square-icons .mkdf-social-icon-widget-holder:hover',
			'.mkdf-social-icons-group-widget.mkdf-square-icons.mkdf-light-skin .mkdf-social-icon-widget-holder:hover',
			'.mkdf-doctors-single-holder .mkdf-ds-bio-holder .mkdf-contact-info.mkdf-book-now',
			'.mkdf-booking-form',
			'.mkdf-booking-form.light',
			'.widget_mkd_booking_form_widget',
			'.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_current',
			'.xdsoft_datetimepicker .xdsoft_calendar td:hover',
			'.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div.xdsoft_current',
			'.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div:hover',
			'.mkdf-doctor.info-bellow .mkdf-doctor-title-image .mkdf-doctor-image .mkdf-circle-animate',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-pag-light-skin .owl-dots .owl-dot.active span',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-pag-light-skin .owl-dots .owl-dot:hover span',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-pag-dark-skin .owl-dots .owl-dot.active span',
			'.mkdf-portfolio-slider-holder .mkdf-portfolio-list-holder.mkdf-pag-dark-skin .owl-dots .owl-dot:hover span',
			'.mkdf-testimonials-holder',
			'.mkdf-working-hours-holder',
			'.mkdf-top-bar',
			'.mkdf-blog-list-holder .mkdf-bli-image-holder .mkdf-post-info-date',
			'.mkdf-single-image-holder.mkdf-has-box-shadow.mkdf-image-behavior-custom-link .mkdf-si-inner',
			'.mkdf-single-image-holder.mkdf-has-box-shadow.mkdf-image-behavior-lightbox .mkdf-si-inner',
			'.mkdf-events-list.mkdf-has-box-shadow .mkdf-events-list-item-holder .mkdf-events-list-item-image-holder',
			'.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-active',
			'.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-hover',
			'.mkdf-btn.mkdf-btn-solid',
			'.no-touch .mkdf-horizontal-timeline .mkdf-events-wrapper .mkdf-events a:hover .circle-outer',
			'.mkdf-horizontal-timeline .mkdf-events-wrapper .mkdf-events a.selected .circle-outer',
			'.mkdf-icon-shortcode.mkdf-circle',
			'.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle',
			'.mkdf-icon-shortcode.mkdf-square',
			'.mkdf-interactive-banner-holder.mkdf-interactive-banner-light-theme .mkdf-interactive-banner-overlay',
			'.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
			'.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
			'.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
			'.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
			'.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a',
			'.mkdf-video-button-holder.mkdf-vb-has-img .mkdf-video-button-play .mkdf-video-button-play-inner .mkdf-video-button-circle',
			'.mkdf-video-button-holder.mkdf-vb-has-img .mkdf-video-button-play-image .mkdf-video-button-play-inner .mkdf-video-button-circle'
		);

		$return_array['woo_background_color_selector'] = array();
		if ( arabesque_mikado_is_woocommerce_installed() ) {
			$return_array['woo_background_color_selector'] = array(
				'.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
				'.woocommerce-page .mkdf-content a.added_to_cart',
				'.woocommerce-page .mkdf-content a.button',
				'.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button):not(.mkdf-search-submit)',
				'.woocommerce-page .mkdf-content input[type=submit]:not(.wpcf7-submit)',
				'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
				'div.woocommerce a.added_to_cart',
				'div.woocommerce a.button',
				'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button):not(.mkdf-search-submit)',
				'div.woocommerce input[type=submit]:not(.wpcf7-submit)',
				'.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-cart-number',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .added_to_cart',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .button',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .added_to_cart:hover',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .button:hover',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .button:hover',
				'.mkdf-plc-holder.mkdf-plc-pag-light-skin .owl-dots .owl-dot span',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .added_to_cart:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .button:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .button:hover'
			);
		}

		$return_array['background_color_selector'] = array_merge( $return_array['background_color_selector'], $return_array['woo_background_color_selector'] );

		$return_array['background_color_important_selector'] = array(
			'.xdsoft_datetimepicker .xdsoft_calendar td:hover',
			'.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div:hover'
		);

		//generate border color selectors array
		$return_array['border_color_selector'] = array(
			'.mkdf-st-loader .pulse_circles .ball',
			'.mkdf-owl-slider+.mkdf-slider-thumbnail>.mkdf-slider-thumbnail-item.active img',
			'.widget.upcoming_events_widget .tt_upcoming_event_controls a:hover',
			'.mkdf-btn.mkdf-btn-outline',
			'.mkdf-separator',
			'.mkdf-main-menu .mkdf-main-menu-line'
		);

		return $return_array;

	}

}


if ( ! function_exists( 'arabesque_mikado_generate_second_color_selectors' ) ) {
	/**
	 * Function generate arrays of selectors for second color option
	 */
	function arabesque_mikado_generate_second_color_selectors() {

		$return_array = array();

		//generate border color important selectors array
		$return_array['second_border_color_important_selector'] = array(
			'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
			'.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-border-hover):hover',
			'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
			'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart:hover',
			'.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover'
		);

		//generate background color important selectors array
		$return_array['second_background_color_important_selector'] = array(
			'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
			'.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-hover-bg):hover',
			'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
			'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart:hover',
			'.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover'
		);

		$return_array['black_color_selector'] = array(
			'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
			'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart:hover'
		);

		return $return_array;

	}

}

if ( ! function_exists( 'arabesque_mikado_get_formated_output' ) ) {

	function arabesque_mikado_get_formated_output( $output ) {

		if ( ! empty( $output ) ) {
			return $output;
		} else {
			return '';
		}

	}
}

if ( ! function_exists( 'arabesque_mikado_get_module_part' ) ) {
	function arabesque_mikado_get_module_part( $module ) {
		return $module;
	}
}
