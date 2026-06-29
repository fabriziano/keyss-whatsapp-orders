<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class KWO_Order_Data {

	/**
	 * Obtiene todas las variables del pedido.
	 */
	public static function get_variables( $order_id ) {

		$order = wc_get_order( $order_id );

		if ( ! $order ) {
			return array();
		}

		$productos = array();

		foreach ( $order->get_items() as $item ) {

			$producto = sprintf(
				"• %s x%d - %s",
				$item->get_name(),
				$item->get_quantity(),
				wc_price( $item->get_total() )
			);

			$productos[] = wp_strip_all_tags( $producto );

		}

		return array(

			'cliente' => trim(
				$order->get_billing_first_name() . ' ' .
				$order->get_billing_last_name()
			),

			'pedido' => $order->get_id(),

			'telefono' => $order->get_billing_phone(),

			'correo' => $order->get_billing_email(),

			'direccion' => $order->get_billing_address_1(),

			'ciudad' => $order->get_billing_city(),

			'pais' => $order->get_billing_country(),

			'metodo_pago' => $order->get_payment_method_title(),

			'metodo_envio' => implode(
				', ',
				$order->get_shipping_method()
					? array( $order->get_shipping_method() )
					: array()
			),

			'productos' => implode( PHP_EOL, $productos ),

			'subtotal' => wc_price( $order->get_subtotal() ),

			'total' => wc_price( $order->get_total() ),

			'mensaje_cliente' => $order->get_customer_note(),

		);

	}

}