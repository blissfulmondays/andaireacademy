<?php

if ( ! function_exists( 'arabesque_mikado_register_required_plugins' ) ) {
	/**
	 * Registers theme required and optional plugins. Hooks to tgmpa_register hook
	 */
	function arabesque_mikado_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => esc_html__( 'WPBakery Visual Composer', 'arabesque' ),
				'slug'               => 'js_composer',
				'source'             => get_template_directory() . '/includes/plugins/js_composer.zip',
				'version'            => '6.7.0',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Revolution Slider', 'arabesque' ),
				'slug'               => 'revslider',
				'source'             => get_template_directory() . '/includes/plugins/revslider.zip',
				'version'            => '6.5.8',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Timetable Responsive Schedule For WordPress', 'arabesque' ),
				'slug'               => 'timetable',
				'source'             => get_template_directory() . '/includes/plugins/timetable.zip',
				'version'            => '6.7',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Arabesque Core', 'arabesque' ),
				'slug'               => 'arabesque-core',
				'source'             => get_template_directory() . '/includes/plugins/arabesque-core.zip',
				'version'            => '1.2.3',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Arabesque Instagram Feed', 'arabesque' ),
				'slug'               => 'arabesque-instagram-feed',
				'source'             => get_template_directory() . '/includes/plugins/arabesque-instagram-feed.zip',
				'version'            => '2.1',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'               => esc_html__( 'Arabesque Twitter Feed', 'arabesque' ),
				'slug'               => 'arabesque-twitter-feed',
				'source'             => get_template_directory() . '/includes/plugins/arabesque-twitter-feed.zip',
				'version'            => '1.0.4',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false
			),
			array(
				'name'         => esc_html__( 'The Events Calendar', 'arabesque' ),
				'slug'         => 'the-events-calendar',
				'external_url' => 'https://wordpress.org/plugins/the-events-calendar/',
				'required'     => false
			),
			array(
				'name'     => esc_html__( 'WooCommerce Plugin', 'arabesque' ),
				'slug'     => 'woocommerce',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'arabesque' ),
				'slug'     => 'contact-form-7',
				'required' => false
			),
			array(
				'name'     => esc_html__( 'Envato Market', 'arabesque' ),
				'slug'     => 'envato-market',
				'source'   => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' => false
			)
		);

		$config = array(
			'domain'       => 'arabesque',
			'default_path' => '',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'menu'         => 'install-required-plugins',
			'has_notices'  => true,
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'arabesque' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'arabesque' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'arabesque' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'arabesque' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'arabesque' ),
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'arabesque' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'arabesque' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'arabesque' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'arabesque' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'arabesque' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'arabesque' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'arabesque' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'arabesque' ),
				'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'arabesque' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'arabesque' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'arabesque' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'arabesque' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $config );
	}

	add_action( 'tgmpa_register', 'arabesque_mikado_register_required_plugins' );
}
