<?php

if ( arabesque_mikado_visual_composer_installed() ) {
	if ( ! function_exists( 'arabesque_mikado_ttsingle_hours_vc_map' ) ) {
		function arabesque_mikado_ttsingle_hours_vc_map() {
			vc_map(
				array(
					'name'                      => esc_html__( 'Timetable Event Hours', 'arabesque' ),
					'base'                      => 'tt_event_hours',
					'category'                  => esc_html__( 'By ARABESQUE', 'arabesque' ),
					'icon'                      => 'icon-a-wpb-timetable-events-hours extended-custom-icon',
					'allowed_container_element' => 'vc_row'
				)
			);
		}
		
		add_action( 'vc_before_init', 'arabesque_mikado_ttsingle_hours_vc_map' );
	}
	
	if ( ! function_exists( 'arabesque_mikado_ttsingle_info_holder' ) ) {
		function arabesque_mikado_ttsingle_info_holder() {
			vc_map(
				array(
					"name"            => esc_html__( 'Timetable Event Info Holder', 'arabesque' ),
					'base'            => 'tt_items_list',
					'category'        => esc_html__( 'By ARABESQUE', 'arabesque' ),
					'as_parent'       => array( 'only' => 'tt_item' ),
					'icon'            => 'icon-wpb-a-timetable-event-info-holder extended-custom-icon',
					'content_element' => true,
					'js_view'         => 'VcColumnView'
				)
			);
		}
		
		add_action( 'vc_before_init', 'arabesque_mikado_ttsingle_info_holder', 10 );
	}
	
	if ( ! function_exists( 'arabesque_mikado_ttsingle_info_table_item' ) ) {
		function arabesque_mikado_ttsingle_info_table_item() {
			vc_map(
				array(
					'name'      => esc_html__( 'Timetable Event Info Table Item', 'arabesque' ),
					'base'      => 'tt_item',
					'as_child'  => array( 'only' => 'tt_items_list' ),
					'as_parent' => array( 'except' => 'vc_row, vc_accordion' ),
					'icon'      => 'icon-wpb-a-timetable-event-info-table-item extended-custom-icon',
					'category'  => esc_html__( 'By ARABESQUE', 'arabesque' ),
					'params'    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Label', 'arabesque' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'value',
							'heading'    => esc_html__( 'Value', 'arabesque' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'arabesque' ),
							'value'       => array(
								esc_html__( 'Table', 'arabesque' ) => 'info'
							),
							'save_always' => true
						)
					)
				)
			);
		}
		
		add_action( 'vc_before_init', 'arabesque_mikado_ttsingle_info_table_item', 11 );
	}
	
	class WPBakeryShortCode_Tt_Items_List extends WPBakeryShortCodesContainer {}
}