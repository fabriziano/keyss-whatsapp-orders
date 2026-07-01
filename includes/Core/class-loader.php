<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Loader {

	public static function load() {

		$files = array(

			'includes/Config/class-variables.php',

			'includes/Admin/class-settings.php',
			'includes/Admin/class-admin.php',

			'includes/Helpers/class-template-engine.php',
			'includes/Services/class-order-service.php',
			'includes/WooCommerce/class-order-data.php',
			'includes/WooCommerce/class-hooks.php',

			'includes/Ajax/class-preview.php',
			'includes/WhatsApp/class-message-builder.php',

		);

		foreach ( $files as $file ) {
			require_once KWO_PLUGIN_PATH . $file;
		}

	}

}