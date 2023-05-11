<?php
namespace ArabesqueMikado\Modules\Events\Lib;

class EventsQuery {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	
	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {
	}
	
	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if ( self::$instance == null ) {
			return new self;
		}
		
		return self::$instance;
	}
	
	public function queryVCParams() {
		return array(
			array(
				'type'        => 'dropdown',
				'param_name'  => 'order_by',
				'heading'     => esc_html__( 'Order By', 'arabesque' ),
				'value'       => array(
					esc_html__( 'Menu Order', 'arabesque' ) => 'menu_order',
					esc_html__( 'Title', 'arabesque' )      => 'title',
					esc_html__( 'Date', 'arabesque' )       => 'date'
				),
				'save_always' => true,
				'group'       => esc_html__( 'Query Options', 'arabesque' )
			),
			array(
				'type'        => 'dropdown',
				'param_name'  => 'order',
				'heading'     => esc_html__( 'Order', 'arabesque' ),
				'value'       => array(
					esc_html__( 'ASC', 'arabesque' )  => 'ASC',
					esc_html__( 'DESC', 'arabesque' ) => 'DESC',
				),
				'save_always' => true,
				'group'       => esc_html__( 'Query Options', 'arabesque' )
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'category',
				'heading'     => esc_html__( 'Events Category', 'arabesque' ),
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'arabesque' ),
				'group'       => esc_html__( 'Query Options', 'arabesque' )
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'number',
				'heading'     => esc_html__( 'Number of Events', 'arabesque' ),
				'value'       => '-1',
				'description' => esc_html__( 'Enter -1 to show all', 'arabesque' ),
				'group'       => esc_html__( 'Query Options', 'arabesque' )
			),
			array(
				'type'        => 'textfield',
				'param_name'  => 'selected_events',
				'heading'     => esc_html__( 'Show Only Events with Listed IDs', 'arabesque' ),
				'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'arabesque' ),
				'group'       => esc_html__( 'Query Options', 'arabesque' )
			)
		);
	}
	
	public function getShortcodeAtts() {
		return array(
			'order_by'        => 'date',
			'order'           => 'ASC',
			'number'          => '-1',
			'category'        => '',
			'selected_events' => '',
			'next_page'       => ''
		);
	}
	
	public function buildQueryObject( $params ) {
		$queryArray = array(
			'post_type'      => 'tribe_events',
			'orderby'        => $params['order_by'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number']
		);
		
		if ( ! empty( $params['category'] ) ) {
			$queryArray['tribe_events_cat'] = $params['category'];
		}
		
		$projectIds = null;
		if ( ! empty( $params['selected_events'] ) ) {
			$projectIds             = explode( ',', $params['selected_events'] );
			$queryArray['post__in'] = $projectIds;
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$queryArray['paged'] = $params['next_page'];
			
		} else {
			$queryArray['paged'] = 1;
		}
		
		return new \WP_Query( $queryArray );
	}
}
