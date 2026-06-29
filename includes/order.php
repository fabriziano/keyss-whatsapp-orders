<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Se ejecuta cuando un pedido llega a la página "Gracias por su compra".
 */
add_action('woocommerce_thankyou', 'kwo_order_created', 10, 1);

function kwo_order_created($order_id)
{
    if (!$order_id) {
        return;
    }

    $order = wc_get_order($order_id);

    if (!$order) {
        return;
    }

    error_log('==============================');
    error_log('Nuevo pedido recibido');
    error_log('Pedido: #' . $order->get_id());
    error_log('Cliente: ' . $order->get_billing_first_name() . ' ' . $order->get_billing_last_name());
    error_log('Total: ' . $order->get_total());
    error_log('==============================');
}