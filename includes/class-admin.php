<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Keyss_WhatsApp_Admin {

	public function __construct() {

		add_action(
			'admin_enqueue_scripts',
			array( $this, 'enqueue_assets' )
		);

	}

	public function render_settings_page()
	{
		$settings = get_option( 'kwo_settings', array() );

		$variables = require KWO_PLUGIN_PATH . 'includes/Config/variables.php';

		include KWO_PLUGIN_PATH . 'includes/Admin/Views/settings-page.php';
	}

	public function enqueue_assets( $hook ) {

		if ( $hook !== 'toplevel_page_keyss-whatsapp-orders' ) {
			return;
		}

		wp_enqueue_style(
			'kwo-admin',
			KWO_PLUGIN_URL . 'assets/css/admin.css',
			array(),
			KWO_VERSION
		);

		wp_enqueue_script(
			'kwo-admin',
			KWO_PLUGIN_URL . 'assets/js/admin.js',
			array(),
			KWO_VERSION,
			true
		);

	}

}