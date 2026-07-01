<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Ajax_Preview {

	public function __construct() {

		add_action(
			'wp_ajax_kwo_preview',
			array( $this, 'preview' )
		);

	}

	public function preview() {

		check_ajax_referer( 'kwo-admin', 'nonce' );

		if ( ! current_user_can( 'manage_options' ) ) {

			wp_send_json_error(
				array(
					'message' => 'No autorizado.'
				)
			);

		}

		$order_id = absint( $_POST['order_id'] ?? 0 );

		$template = sanitize_textarea_field(
			$_POST['template'] ?? ''
		);

		if ( ! $order_id ) {

			wp_send_json_error(
				array(
					'message' => 'Pedido inválido.'
				)
			);

		}

		$message = KWO_Message_Builder::build( $order_id, $template );

		wp_send_json_success(
			array(
				'message' => $message
			)
		);

	}

}