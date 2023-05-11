<?php

if (!function_exists('arabesque_mikado_sidearea_options_map')) {
    function arabesque_mikado_sidearea_options_map() {

        arabesque_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'arabesque'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = arabesque_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'arabesque'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'arabesque'),
                'description'   => esc_html__('Choose a type of Side Area', 'arabesque'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'arabesque'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'arabesque'),
                ),
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'arabesque'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 511px.', 'arabesque'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = arabesque_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'arabesque'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'arabesque'),
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'arabesque'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'arabesque'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'arabesque'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'arabesque'),
                'options'       => arabesque_mikado_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = arabesque_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'arabesque'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'arabesque'),
                'options'       => arabesque_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = arabesque_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'arabesque'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'arabesque'),
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'arabesque'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'arabesque'),
            )
        );

        $side_area_icon_style_group = arabesque_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'arabesque'),
                'description' => esc_html__('Define styles for Side Area icon', 'arabesque')
            )
        );

        $side_area_icon_style_row1 = arabesque_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'arabesque')
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'arabesque')
            )
        );

        $side_area_icon_style_row2 = arabesque_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'arabesque')
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'arabesque')
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'arabesque'),
                'description' => esc_html__('Choose a background color for Side Area', 'arabesque')
            )
        );

		arabesque_mikado_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__('Background Image', 'arabesque'),
				'description' => esc_html__('Choose a background image for Side Area', 'arabesque')
			)
		);

        arabesque_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'arabesque'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'arabesque'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        arabesque_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'arabesque'),
                'description'   => esc_html__('Choose text alignment for side area', 'arabesque'),
                'options'       => array(
                    ''       => esc_html__('Default', 'arabesque'),
                    'left'   => esc_html__('Left', 'arabesque'),
                    'center' => esc_html__('Center', 'arabesque'),
                    'right'  => esc_html__('Right', 'arabesque')
                )
            )
        );
    }

    add_action('arabesque_mikado_action_options_map', 'arabesque_mikado_sidearea_options_map', 4);
}