<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_WooCommerce_Hooks {

	public function __construct() {

		add_action(
			'woocommerce_thankyou',
			array( $this, 'redirect_to_whatsapp' ),
			20
		);

	}

	public function redirect_to_whatsapp( $order_id ) {

		if ( ! $order_id ) {
			return;
		}

		$settings = get_option( 'kwo_settings', array() );

		if ( empty( $settings['whatsapp'] ) ) {
			return;
		}

		$message = KWO_Message_Builder::build( $order_id );

		$url = sprintf(
			'https://wa.me/%s?text=%s',
			preg_replace( '/\D/', '', $settings['whatsapp'] ),
			rawurlencode( $message )
		);

		wp_safe_redirect( $url );
		exit;
	}	
}