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

	public function render_settings_page() {

		$settings = get_option( 'kwo_settings', array() );

		$variables = KWO_Variables::all();

        $order_options = KWO_Order_Service::get_order_options();

        require KWO_PLUGIN_PATH . 'includes/Admin/Views/settings-page.php';

	}

	public function enqueue_assets( $hook ) {

        if ( 'toplevel_page_keyss-whatsapp-orders' !== $hook ) {
            return;
        }

        $this->enqueue_styles();

        $this->enqueue_scripts();

    }

    private function enqueue_styles() {

        wp_enqueue_style(
            'kwo-admin',
            KWO_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            KWO_VERSION
        );

    }

    private function enqueue_scripts() {

        wp_enqueue_script(
            'kwo-admin',
            KWO_PLUGIN_URL . 'assets/js/admin.js',
            array(),
            KWO_VERSION,
            true
        );

        wp_localize_script(
            'kwo-admin',
            'kwoAdmin',
            array(
                'ajaxUrl' => admin_url( 'admin-ajax.php' ),
                'nonce'   => wp_create_nonce( 'kwo-admin' ),
                'previewVariables' => KWO_Variables::preview_data(),
                'variables' => KWO_Variables::all(),
            )
        );

    }

}