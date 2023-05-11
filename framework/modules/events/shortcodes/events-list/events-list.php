<?php
namespace ArabesqueCore\CPT\Shortcodes\EventsList;

use ArabesqueMikado\Modules\Events\Lib\EventsQuery;
use ArabesqueCore\Lib;

class EventsList implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_events_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                      => esc_html__( 'Events List', 'arabesque' ),
				'base'                      => $this->getBase(),
				'category'                  => esc_html__( 'By ARABESQUE', 'arabesque' ),
				'icon'                      => 'icon-wpb-events-list extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array_merge(
					array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'columns',
							'heading'     => esc_html__( 'Number of Columns', 'arabesque' ),
							'value'       => array(
								esc_html__( 'Default', 'arabesque' ) => '',
								esc_html__( 'One', 'arabesque' )     => 'one',
								esc_html__( 'Two', 'arabesque' )     => 'two',
								esc_html__( 'Three', 'arabesque' )   => 'three',
								esc_html__( 'Four', 'arabesque' )    => 'four',
								esc_html__( 'Five', 'arabesque' )    => 'five',
								esc_html__( 'Six', 'arabesque' )     => 'six'
							),
							'description' => esc_html__( 'Default value is Three', 'arabesque' ),
							'group'       => esc_html__( 'Layout Options', 'arabesque' )
						),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'space_between_items',
                            'heading'     => esc_html__( 'Space Between Items', 'arabesque' ),
                            'value'       => array_flip( arabesque_mikado_get_space_between_items_array(false, true, true, true, true) ),
                            'save_always' => true,
                            'group'       => esc_html__( 'Layout Options', 'arabesque' )
                        ),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Proportions', 'arabesque' ),
							'value'       => array(
								esc_html__( 'Original', 'arabesque' )  => 'full',
								esc_html__( 'Square', 'arabesque' )    => 'square',
								esc_html__( 'Landscape', 'arabesque' ) => 'landscape',
								esc_html__( 'Portrait', 'arabesque' )  => 'portrait'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Layout Options', 'arabesque' )
						),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'show_excerpt',
                            'heading'     => esc_html__( 'Show Excerpt', 'arabesque' ),
                            'value'       => array_flip( arabesque_mikado_get_yes_no_select_array( false, false ) ),
                            'save_always' => true,
                            'group'       => esc_html__( 'Layout Options', 'arabesque' )
                        ),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_box_shadow',
                            'heading'     => esc_html__( 'Enable Box Shadow', 'arabesque' ),
                            'value'       => array_flip( arabesque_mikado_get_yes_no_select_array( false, true ) ),
                            'save_always' => true,
                            'group'       => esc_html__( 'Layout Options', 'arabesque' )
                        ),
                        array(
                            'type'        => 'colorpicker',
                            'param_name'  => 'box_shadow_bg_color',
                            'heading'     => esc_html__( 'Box Shadow Background Color', 'arabesque' ),
                            'save_always' => true,
                            'group'       => esc_html__( 'Layout Options', 'arabesque' ),
                            'dependency' => array( 'element' => 'enable_box_shadow', 'value' => array( 'yes', ) )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'item_skin',
                            'heading'    => esc_html__( 'Item Skin', 'arabesque' ),
                            'value'      => array(
                                esc_html__( 'Default', 'arabesque' )    => 'default',
                                esc_html__( 'Light', 'arabesque' )       => 'light'
                            ),
                            'group'      => esc_html__( 'Layout Options', 'arabesque' )
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'bottom_margin',
                            'heading'     => esc_html__( 'Event List item custom Bottom Margin (px or %)', 'arabesque' ),
                            'group'       => esc_html__( 'Layout Options', 'arabesque' ),
                        )
					),
					EventsQuery::getInstance()->queryVCParams()
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'columns'               => '',
            'space_between_items'   => 'normal',
			'image_size'            => '',
            'show_excerpt'          => 'no',
            'enable_box_shadow'     => 'yes',
            'box_shadow_bg_color'   => '',
            'item_skin'             => 'default',
            'bottom_margin'         => ''
		);
		
		$eventsQuery = EventsQuery::getInstance();
		
		$default_atts = array_merge( $default_atts, $eventsQuery->getShortcodeAtts() );
		$params       = shortcode_atts( $default_atts, $atts );

		$queryResults = $eventsQuery->buildQueryObject( $params );
		
		$params['query']               = $queryResults;
		$params['caller']              = $this;
        $params['show_excerpt']        = ! empty( $params['show_excerpt'] ) ? $params['show_excerpt'] : $default_atts['show_excerpt'];
        $params['holder_classes']      = $this->getHolderClasses( $params, $default_atts );
        $params['item_holder_styles']  = $this->getItemHolderStyles( $params );
        $params['image_holder_styles'] = $this->getImageHolderStyles( $params );
		
		$itemClass[] = 'mkdf-events-list-item mkdf-item-space';
		
		switch ( $params['columns'] ) {
			case 'one':
				$itemClass[] = 'mkdf-grid-col-12';
				break;
			case 'two':
				$itemClass[] = 'mkdf-grid-col-6';
				break;
			case 'three':
				$itemClass[] = 'mkdf-grid-col-4';
				break;
			case 'four':
				$itemClass[] = 'mkdf-grid-col-3';
				$itemClass[] = 'mkdf-grid-col-ipad-landscape-6';
				$itemClass[] = 'mkdf-grid-col-ipad-portrait-12';
				break;
			default:
				$itemClass[] = 'mkdf-grid-col-4';
				break;
		}

		$params['item_class'] = implode( ' ', $itemClass );
		
		$params['image_size'] = $this->getImageSize( $params );
		
		return arabesque_mikado_get_module_template_part( 'templates/events-list-holder', 'events/shortcodes/events-list', '', $params );
	}
	
	public function getEventItemTemplate( $params ) {
		echo arabesque_mikado_get_module_template_part( 'templates/events-list-item', 'events/shortcodes/events-list', '', $params );
	}
	
	private function getImageSize( $params ) {
		
		if ( ! empty( $params['image_size'] ) ) {
			$image_size = $params['image_size'];
			
			switch ( $image_size ) {
				case 'landscape':
					$thumb_size = 'arabesque_mikado_image_landscape';
					break;
				case 'portrait':
					$thumb_size = 'arabesque_mikado_image_portrait';
					break;
				case 'square':
					$thumb_size = 'arabesque_mikado_image_square';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
				case 'custom':
					$thumb_size = 'custom';
					break;
				default:
					$thumb_size = 'full';
					break;
			}
			
			return $thumb_size;
		}
	}

    private function getHolderClasses( $params, $default_atts ) {
        $holderClasses = array();

        $holderClasses[] = $params['enable_box_shadow'] === 'yes' ? 'mkdf-has-box-shadow' : '';
        $holderClasses[] = ! empty( $params['item_skin'] ) ? 'mkdf-' . $params['item_skin'] . '-skin' : '';
        $holderClasses[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $default_atts['space_between_items'] . '-space';

        return implode( ' ', $holderClasses );
    }

    private function getItemHolderStyles( $params ) {
        $styles = array();

        if ( $params['bottom_margin'] !== '' ) {
            if ( arabesque_mikado_string_ends_with( $params['bottom_margin'], '%' ) || arabesque_mikado_string_ends_with( $params['bottom_margin'], 'px' ) ) {
                $styles[] = 'margin-bottom: ' . $params['bottom_margin'];
            } else {
                $styles[] = 'margin-bottom: ' . arabesque_mikado_filter_px( $params['bottom_margin'] ) . 'px';
            }
        }

        return implode( ';', $styles );
    }

    private function getImageHolderStyles( $params ) {
        $backgroundStyles = array();

        if ( $params['enable_box_shadow'] === 'yes' ) {

            if ( ! empty( $params['box_shadow_bg_color'] ) ) {
                $backgroundStyles[] = 'background: ' . $params['box_shadow_bg_color'];
            }
        }

        return $backgroundStyles;
    }
}