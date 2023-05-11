<?php

if ( arabesque_mikado_is_the_events_calendar_installed() ) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/events/lib/events-query.php';
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/events/events-functions.php';
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/events/shortcodes/shortcodes-functions.php';
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/events/options-map/events-options-map.php';
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/events/custom-styles/events-custom-styles.php';
}