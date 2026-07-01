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

		return array_merge(

			self::get_customer_variables( $order ),

			self::get_order_variables( $order ),

			self::get_shipping_variables( $order ),

			self::get_total_variables( $order )

		);

	}

	/**
	 * Variables del cliente.
	 */
	private static function get_customer_variables( $order ) {

		return array(

			'{cliente}'  => trim(
				$order->get_billing_first_name() . ' ' .
				$order->get_billing_last_name()
			),

			'{telefono}' => $order->get_billing_phone(),

			'{correo}'   => $order->get_billing_email(),

		);

	}

	/**
	 * Variables del pedido.
	 */
	private static function get_order_variables( $order ) {

		return array(

			'{pedido}'            => $order->get_id(),

			'{productos}'         => self::get_products( $order ),

			'{mensaje_cliente}'   => $order->get_customer_note(),

		);

	}

	/**
	 * Variables de envío.
	 */
	private static function get_shipping_variables( $order ) {

		return array(

			'{direccion}' => $order->get_billing_address_1(),

			'{ciudad}'    => $order->get_billing_city(),

			'{pais}'      => $order->get_billing_country(),

			'{metodo_envio}' => $order->get_shipping_method(),

		);

	}

	/**
	 * Variables monetarias.
	 */
	private static function get_total_variables( $order ) {

		return array(

			'{subtotal}' => wc_price( $order->get_subtotal() ),

			'{total}' => wc_price( $order->get_total() ),

			'{metodo_pago}' => $order->get_payment_method_title(),

		);

	}

	/**
	 * Construye la lista de productos.
	 */
	private static function get_products( $order ) {

		$productos = array();

		foreach ( $order->get_items() as $item ) {

			$productos[] = sprintf(

				"• %s x%d - %s",

				$item->get_name(),

				$item->get_quantity(),

				wp_strip_all_tags(
					wc_price( $item->get_total() )
				)

			);

		}

		return implode( PHP_EOL, $productos );

	}

	public static function get_recent_orders( $limit = 10 ) {

		return wc_get_orders(
			array(
				'limit'   => $limit,
				'orderby' => 'date',
				'order'   => 'DESC',
			)
		);

	}

	/**
	 * Obtiene un pedido por su ID.
	 *
	 * @param int $order_id
	 * @return WC_Order|false
	 */
	public static function get_order( $order_id ) {

		return wc_get_order( $order_id );

	}

}