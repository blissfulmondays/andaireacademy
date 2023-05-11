<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'arabesque_mikado_map_blog_meta' ) ) {
	function arabesque_mikado_map_blog_meta() {
		$mkdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = arabesque_mikado_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'arabesque' ),
				'name'  => 'blog_meta'
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'arabesque' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'arabesque' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkdf_blog_categories
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'arabesque' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'arabesque' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'arabesque' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'arabesque' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'arabesque' ),
					'in-grid'    => esc_html__( 'In Grid', 'arabesque' ),
					'full-width' => esc_html__( 'Full Width', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'arabesque' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'arabesque' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'arabesque' ),
					'two'   => esc_html__( '2 Columns', 'arabesque' ),
					'three' => esc_html__( '3 Columns', 'arabesque' ),
					'four'  => esc_html__( '4 Columns', 'arabesque' ),
					'five'  => esc_html__( '5 Columns', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'arabesque' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'arabesque' ),
				'options'     => arabesque_mikado_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'arabesque' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'arabesque' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'arabesque' ),
					'fixed'    => esc_html__( 'Fixed', 'arabesque' ),
					'original' => esc_html__( 'Original', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'arabesque' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'arabesque' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'arabesque' ),
					'standard'        => esc_html__( 'Standard', 'arabesque' ),
					'load-more'       => esc_html__( 'Load More', 'arabesque' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'arabesque' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'arabesque' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'arabesque' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'arabesque_mikado_action_meta_boxes_map', 'arabesque_mikado_map_blog_meta', 30 );
}