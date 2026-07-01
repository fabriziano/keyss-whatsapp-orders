<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Order_Service {

	/**
	 * Devuelve las opciones para el selector de pedidos.
	 */
	public static function get_order_options() {

		$orders = KWO_Order_Data::get_recent_orders();

		$options = array(
			'' => 'Seleccionar pedido...',
		);

		foreach ( $orders as $order ) {

			$options[ $order->get_id() ] = sprintf(
				'#%d - %s %s',
				$order->get_id(),
				$order->get_billing_first_name(),
				$order->get_billing_last_name()
			);

		}

		return $options;

	}

}