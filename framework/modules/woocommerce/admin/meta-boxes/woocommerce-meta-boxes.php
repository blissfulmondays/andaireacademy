<?php

if ( ! function_exists( 'arabesque_mikado_map_woocommerce_meta' ) ) {
	function arabesque_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'arabesque' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'arabesque' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'arabesque' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'arabesque' ),
					'small'              => esc_html__( 'Small', 'arabesque' ),
					'large-width'        => esc_html__( 'Large Width', 'arabesque' ),
					'large-height'       => esc_html__( 'Large Height', 'arabesque' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'arabesque' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'arabesque' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'arabesque' ),
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'arabesque' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_woocommerce_meta', 99 );
}