<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once KWO_PLUGIN_PATH . 'includes/Helpers/class-template-engine.php';
require_once KWO_PLUGIN_PATH . 'includes/WooCommerce/class-order-data.php';

class KWO_Message_Builder {

	public static function build( $order_id, $template = null ) {

		if ( $template === null ) {

			$settings = get_option( 'kwo_settings', array() );

			$template = $settings['message'] ?? '';

		}

		$variables = KWO_Order_Data::get_variables( $order_id );

		return KWO_Template_Engine::replace(
			$template,
			$variables
		);

	}

}