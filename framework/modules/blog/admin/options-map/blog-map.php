<?php

if ( ! function_exists( 'arabesque_mikado_get_blog_list_types_options' ) ) {
	function arabesque_mikado_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'arabesque_mikado_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'arabesque_mikado_blog_options_map' ) ) {
	function arabesque_mikado_blog_options_map() {
		$blog_list_type_options = arabesque_mikado_get_blog_list_types_options();
		
		arabesque_mikado_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'arabesque' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = arabesque_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'arabesque' )
			)
		);

		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'blog_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'arabesque' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for blog post lists. Default value is large', 'arabesque' ),
				'options'     => arabesque_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_blog_lists
			)
		);

		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'arabesque' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'arabesque' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'arabesque' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'arabesque' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => arabesque_mikado_get_custom_sidebars_options(),
			)
		);
		
		$arabesque_custom_sidebars = arabesque_mikado_get_custom_sidebars();
		if ( count( $arabesque_custom_sidebars ) > 0 ) {
			arabesque_mikado_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'arabesque' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'arabesque' ),
					'parent'      => $panel_blog_lists,
					'options'     => arabesque_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'arabesque' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'arabesque' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'arabesque' ),
					'full-width' => esc_html__( 'Full Width', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'arabesque' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'arabesque' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'arabesque' ),
					'three' => esc_html__( '3 Columns', 'arabesque' ),
					'four'  => esc_html__( '4 Columns', 'arabesque' ),
					'five'  => esc_html__( '5 Columns', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'arabesque' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'arabesque' ),
				'default_value' => 'normal',
				'options'       => arabesque_mikado_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'arabesque' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'arabesque' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'arabesque' ),
					'original' => esc_html__( 'Original', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'arabesque' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'arabesque' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'arabesque' ),
					'load-more'       => esc_html__( 'Load More', 'arabesque' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'arabesque' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'arabesque' )
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'arabesque' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'arabesque' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

        arabesque_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'show_tags_area_blog',
                'default_value' => 'yes',
                'label'         => esc_html__( 'Enable Blog Tags on Standard List', 'arabesque' ),
                'description'   => esc_html__( 'Enabling this option will show tags on standard blog list', 'arabesque' ),
                'parent'        => $panel_blog_lists
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'blog_posted_by',
                'type'          => 'yesno',
                'label'         => esc_html__( 'Show Posted By link', 'arabesque' ),
                'description'   => esc_html__( 'Enabling this option will show "By user" link after the title on blog list page', 'arabesque' ),
                'parent'        => $panel_blog_lists,
                'default_value' => 'yes'
            )
        );
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = arabesque_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'arabesque' )
			)
		);

		arabesque_mikado_add_admin_field(
			array(
				'name'        => 'blog_single_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'arabesque' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for Blog Single pages. Default value is large', 'arabesque' ),
				'options'     => arabesque_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_blog_single
			)
		);

		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'arabesque' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'arabesque' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => arabesque_mikado_get_custom_sidebars_options()
			)
		);
		
		if ( count( $arabesque_custom_sidebars ) > 0 ) {
			arabesque_mikado_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'arabesque' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'arabesque' ),
					'parent'      => $panel_blog_single,
					'options'     => arabesque_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'arabesque' ),
				'parent'        => $panel_blog_single,
				'options'       => arabesque_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'arabesque' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);

        arabesque_mikado_add_admin_field(
            array(
                'name'          => 'blog_single_posted_by',
                'type'          => 'yesno',
                'label'         => esc_html__( 'Show Posted By after post title', 'arabesque' ),
                'description'   => esc_html__( 'Enabling this option will show "By user" link after the title on single post pages', 'arabesque' ),
                'parent'        => $panel_blog_single,
                'default_value' => 'yes'
            )
        );
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'arabesque' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'arabesque' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'arabesque' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'arabesque' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = arabesque_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'arabesque' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'arabesque' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'arabesque' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = arabesque_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'arabesque' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		arabesque_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'arabesque' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'arabesque' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'arabesque_mikado_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'arabesque_mikado_action_options_map', 'arabesque_mikado_blog_options_map', 14 );
}