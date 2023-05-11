<?php

if(!function_exists('arabesque_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function arabesque_mikado_design_styles() {
	    $font_family = arabesque_mikado_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && arabesque_mikado_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo arabesque_mikado_dynamic_css( $font_family_selector, array( 'font-family' => arabesque_mikado_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = arabesque_mikado_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                '.mkdf-comment-holder .mkdf-comment-text .comment-edit-link',
                '.mkdf-comment-holder .mkdf-comment-text .comment-reply-link',
                '.mkdf-comment-holder .mkdf-comment-text .replay',
                '.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link',
                '.mkdf-fullscreen-sidebar .widget ul li a:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_archive ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_categories ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_meta ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_nav_menu ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_pages ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_recent_entries ul li a abbr:hover',
                '.mkdf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
                '.mkdf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
                '.wpml-ls-menu-item .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
                '.wpml-ls-menu-item .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
                '.single-events .mkdf-event-single-icon',
                '.single-events .mkdf-ttevents-single-subtitle',
                '.single-events .tt_event_items_list li:not(.type_info):before',
                '.mkdf-blog-holder article.sticky .mkdf-post-title a',
                '.mkdf-blog-holder article .mkdf-post-mark .mkdf-post-link-image',
                '.mkdf-blog-holder article .mkdf-post-mark .mkdf-post-quote-image',
                '.mkdf-blog-holder article.format-link .mkdf-post-mark .mkdf-link-mark',
                '.mkdf-blog-holder article.format-quote .mkdf-post-mark .mkdf-quote-mark',
                '.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
                '.mkdf-blog-holder.mkdf-blog-centered article.format-link .mkdf-post-quote-image',
                '.mkdf-blog-holder.mkdf-blog-centered article.format-quote .mkdf-post-quote-image',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
                '.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
                '.mkdf-blog-single-navigation .mkdf-blog-single-next:hover',
                '.mkdf-blog-single-navigation .mkdf-blog-single-prev:hover',
                '.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
                '.mkdf-fullscreen-menu-opener:hover',
                '.mkdf-search-page-holder article.sticky .mkdf-post-title a',
                '.widget.mkdf-author-info-widget .mkdf-aiw-text',
                '.mkdf-pl-standard-pagination ul li.mkdf-pl-pag-active a',
                '.mkdf-portfolio-list-holder.mkdf-pl-gallery-overlay-zoom article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-portfolio-list-holder.mkdf-pl-gallery-overlay article .mkdf-pli-text .mkdf-pli-category-holder a:hover',
                '.mkdf-testimonials-holder.mkdf-testimonials-standard .mkdf-testimonial-title',
                '.mkdf-testimonials-holder .mkdf-testimonial-quote-image',
                '.mkdf-reviews-per-criteria .mkdf-item-reviews-average-rating',
                '.mkdf-banner-holder .mkdf-banner-link-text .mkdf-banner-link-hover span',
                '.mkdf-btn.mkdf-btn-outline',
                '.mkdf-iwt.mkdf-iwt-icon-left .mkdf-iwt-content .mkdf-iwt-title a:hover',
                '.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
                '.mkdf-twitter-list-holder .mkdf-twitter-icon',
                '.mkdf-twitter-list-holder .mkdf-tweet-text a:hover',
                '.mkdf-twitter-list-holder .mkdf-twitter-profile a:hover',
                '.mkdf-number-with-text-holder .mkdf-nwt-number-holder .mkdf-nwt-number'
            );

            $woo_color_selector = array();
            if(arabesque_mikado_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.mkdf-pl-holder .mkdf-pli .mkdf-pli-rating',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-rating',
                    '.mkdf-pls-holder .mkdf-pls-text .mkdf-pls-rating',
                    '.mkdf-product-info .mkdf-pi-rating',
                    '.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
                    '.mkdf-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before',
                    '.woocommerce .star-rating',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    '.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
                    'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .woocommerce-product-rating .star-rating',
                    '.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
                    '.mkdf-woo-single-page .related.products .product .star-rating',
                    '.mkdf-woo-single-page .upsells.products .product .star-rating',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a',
                    '.mkdf-pl-holder .mkdf-pl-categories ul li a.active',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.mkdf-btn.mkdf-btn-simple:not(.mkdf-btn-custom-hover-color):not(.mkdf-btn-underline):hover',
	        );

            $background_color_selector = array(
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
                '.mkdf-st-loader .arabesque_circles .grpahics',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'button.wpcf7-form-control.wpcf7-submit',
                'footer .widget #wp-calendar td#today',
                'footer .widget.widget_search .input-holder button',
                '.mkdf-side-menu .widget #wp-calendar td#today',
                '.mkdf-side-menu .widget.widget_search .input-holder button',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-sub-menu',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu',
                '.wpml-ls-menu-item .wpml-ls-legacy-dropdown .wpml-ls-sub-menu',
                '.wpml-ls-menu-item .wpml-ls-legacy-dropdown-click .wpml-ls-sub-menu',
                '.single-events .tt_event_hours li',
                'table.tt_timetable .tt_tooltip_text .tt_tooltip_content',
                '.tabs_box_navigation.sf-timetable-menu .tabs_box_navigation_selected',
                '.sf-timetable-menu li ul li a:hover',
                '.sf-timetable-menu li ul li.selected a:hover',
                '.tt_tabs .tt_tabs_navigation .ui-tabs-active a',
                '.tt_tabs .tt_tabs_navigation li a:hover',
                '.widget.tt_upcoming_events_widget .tt_upcoming_events .tt_upcoming_events_event_container:hover',
                '.widget.tt_upcoming_events_widget .tt_upcoming_event_controls a:hover',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.mkdf-blog-holder.mkdf-blog-single article.post_format-post-format-link .mkdf-post-text',
                '.mkdf-blog-holder.mkdf-blog-single article.post_format-post-format-quote .mkdf-post-text',
                '.mkdf-blog-list-holder .mkdf-bli-image-holder .mkdf-post-info-date',
                '.mkdf-page-footer .mkdf-footer-top-holder',
                '.mkdf-page-footer .mkdf-footer-bottom-holder',
                '.mkdf-drop-down .narrow .second .inner ul',
                '.mkdf-drop-down .wide .second .inner',
                '.mkdf-top-bar',
                '.mkdf-search-cover',
                '.mkdf-side-menu-button-opener .mkdf-side-menu-icon',
                '.mkdf-side-menu',
                '.mkdf-title-holder',
                '.mkdf-social-icons-group-widget.mkdf-square-icons .mkdf-social-icon-widget-holder:hover',
                '.mkdf-social-icons-group-widget.mkdf-square-icons.mkdf-light-skin .mkdf-social-icon-widget-holder:hover',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-active',
                '.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-hover',
                '.mkdf-btn.mkdf-btn-solid',
                '.mkdf-icon-shortcode.mkdf-circle .mkdf-icon-bckg-holder',
                '.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle .mkdf-icon-bckg-holder',
                '.mkdf-icon-shortcode.mkdf-square .mkdf-icon-bckg-holder',
                '.mkdf-price-table .mkdf-pt-inner ul li.mkdf-pt-title-holder',
                '.mkdf-process-holder .mkdf-process-circle',
                '.mkdf-process-holder .mkdf-process-line',
                '.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li.ui-state-active a',
                '.mkdf-tabs.mkdf-tabs-vertical .mkdf-tabs-nav li.ui-state-hover a',
            );

            $woo_background_color_selector = array();
            if(arabesque_mikado_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .mkdf-content a.added_to_cart',
                    '.woocommerce-page .mkdf-content a.button',
                    '.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    '.woocommerce-page .mkdf-content input[type=submit]',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
                    'div.woocommerce input[type=submit]',
                    '.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li.active',
                    '.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-cart-number',
                    '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .added_to_cart',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .button',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .added_to_cart:hover',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .button:hover',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .button:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .added_to_cart',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .button',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .added_to_cart:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .button:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .button:hover',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                'table.tt_timetable tbody tr'
            );

            $border_color_selector = array(
                '.mkdf-st-loader .pulse_circles .ball',
                '.mkdf-owl-slider+.mkdf-slider-thumbnail>.mkdf-slider-thumbnail-item.active img',
                'table.tt_timetable .tt_tooltip_text .tt_tooltip_arrow',
                '.tabs_box_navigation.sf-timetable-menu .tabs_box_navigation_selected',
                '.widget.tt_upcoming_events_widget .tt_upcoming_event_controls a:hover',
                '.widget.mkdf-author-info-widget',
                '.mkdf-btn.mkdf-btn-outline',
            );

            $woo_border_color_selector = array();
            if(arabesque_mikado_is_woocommerce_installed()) {
                $woo_border_color_selector = array(
                    '.woocommerce .mkdf-onsale:before',
                    '.woocommerce .mkdf-new-product:before',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-onsale:before',
                    '.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-image-outer .mkdf-plc-image .mkdf-plc-new-product:before',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-onsale:before',
                    '.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-image .mkdf-pli-new-product:before',
                );
            }

            echo arabesque_mikado_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo arabesque_mikado_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
            echo arabesque_mikado_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo arabesque_mikado_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo arabesque_mikado_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
            echo arabesque_mikado_dynamic_css($woo_border_color_selector, array('border-color' => $first_main_color));
        }

        $secondary_main_color = arabesque_mikado_options()->getOptionValue('secondary_color');
        if(!empty($secondary_main_color)) {

            $border_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
                '.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-border-hover):hover',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart:hover',
                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover'
            );

            $background_color_important_selector = array(
                '.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
                '.mkdf-btn.mkdf-btn-solid:not(.mkdf-btn-custom-hover-bg):hover',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart:hover',
                '.widget.woocommerce.widget_price_filter .price_slider_amount .button:hover'
            );

            $black_color_selector = array(
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-checkout:hover',
                '.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-view-cart:hover'
            );

            echo arabesque_mikado_dynamic_css($background_color_important_selector, array('background-color' => $secondary_main_color.'!important'));
            echo arabesque_mikado_dynamic_css($border_color_important_selector, array('border-color' => $secondary_main_color.'!important'));
            echo arabesque_mikado_dynamic_css($black_color_selector, array('color' => '#000000'));
        }
	
	    $page_background_color = arabesque_mikado_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.mkdf-content'
		    );
		    echo arabesque_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = arabesque_mikado_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo arabesque_mikado_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo arabesque_mikado_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( arabesque_mikado_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . arabesque_mikado_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo arabesque_mikado_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
    }

    add_action('arabesque_mikado_action_style_dynamic', 'arabesque_mikado_design_styles');
}

if ( ! function_exists( 'arabesque_mikado_content_styles' ) ) {
	function arabesque_mikado_content_styles() {
		$content_style = array();

		$padding = arabesque_mikado_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo arabesque_mikado_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();

		$padding_in_grid = arabesque_mikado_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo arabesque_mikado_dynamic_css( $content_selector_in_grid, $content_style_in_grid );

		$background_style = array();
		$background_image = arabesque_mikado_options()->getOptionValue('content_background_image');
		if ($background_image !== ''){
			$background_style['background-image'] = 'url('.esc_url($background_image).')';
		}

		echo arabesque_mikado_dynamic_css( '.mkdf-content', $background_style );
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_content_styles' );
}

if ( ! function_exists( 'arabesque_mikado_h1_styles' ) ) {
	function arabesque_mikado_h1_styles() {
		$margin_top    = arabesque_mikado_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = arabesque_mikado_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = arabesque_mikado_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = arabesque_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = arabesque_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_h1_styles' );
}

if ( ! function_exists( 'arabesque_mikado_h2_styles' ) ) {
	function arabesque_mikado_h2_styles() {
		$margin_top    = arabesque_mikado_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = arabesque_mikado_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = arabesque_mikado_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = arabesque_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = arabesque_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_h2_styles' );
}

if ( ! function_exists( 'arabesque_mikado_h3_styles' ) ) {
	function arabesque_mikado_h3_styles() {
		$margin_top    = arabesque_mikado_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = arabesque_mikado_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = arabesque_mikado_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = arabesque_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = arabesque_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_h3_styles' );
}

if ( ! function_exists( 'arabesque_mikado_h4_styles' ) ) {
	function arabesque_mikado_h4_styles() {
		$margin_top    = arabesque_mikado_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = arabesque_mikado_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = arabesque_mikado_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = arabesque_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = arabesque_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_h4_styles' );
}

if ( ! function_exists( 'arabesque_mikado_h5_styles' ) ) {
	function arabesque_mikado_h5_styles() {
		$margin_top    = arabesque_mikado_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = arabesque_mikado_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = arabesque_mikado_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = arabesque_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = arabesque_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_h5_styles' );
}

if ( ! function_exists( 'arabesque_mikado_h6_styles' ) ) {
	function arabesque_mikado_h6_styles() {
		$margin_top    = arabesque_mikado_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = arabesque_mikado_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = arabesque_mikado_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = arabesque_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = arabesque_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_h6_styles' );
}

if ( ! function_exists( 'arabesque_mikado_text_styles' ) ) {
	function arabesque_mikado_text_styles() {
		$item_styles = arabesque_mikado_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo arabesque_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_text_styles' );
}

if ( ! function_exists( 'arabesque_mikado_link_styles' ) ) {
	function arabesque_mikado_link_styles() {
		$link_styles      = array();
		$link_color       = arabesque_mikado_options()->getOptionValue( 'link_color' );
		$link_font_style  = arabesque_mikado_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = arabesque_mikado_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = arabesque_mikado_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo arabesque_mikado_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_link_styles' );
}

if ( ! function_exists( 'arabesque_mikado_link_hover_styles' ) ) {
	function arabesque_mikado_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = arabesque_mikado_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = arabesque_mikado_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo arabesque_mikado_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo arabesque_mikado_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'arabesque_mikado_action_style_dynamic', 'arabesque_mikado_link_hover_styles' );
}

if ( ! function_exists( 'arabesque_mikado_smooth_page_transition_styles' ) ) {
	function arabesque_mikado_smooth_page_transition_styles( $style ) {
		$id            = arabesque_mikado_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = arabesque_mikado_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader .mkdf-transition-loader-canvas'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= arabesque_mikado_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = arabesque_mikado_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
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
            '.mkdf-st-loader .arabesque_circles .grpahics'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= arabesque_mikado_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'arabesque_mikado_filter_add_page_custom_style', 'arabesque_mikado_smooth_page_transition_styles' );
}