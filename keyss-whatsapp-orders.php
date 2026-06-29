<?php
/**
 * Plugin Name: Keyss WhatsApp Orders
 * Plugin URI: https://keyss.store
 * Description: Envía automáticamente los pedidos de WooCommerce a WhatsApp.
 * Version: 1.0.0
 * Author: Fabriziano Arnao Castillo
 * Author URI: https://keyss.store
 * License: GPL v2 or later
 * Text Domain: keyss-whatsapp-orders
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Constantes del plugin
define( 'KWO_VERSION', '1.0.0' );
define( 'KWO_PLUGIN_FILE', __FILE__ );
define( 'KWO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'KWO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Cargar archivos del plugin
require_once KWO_PLUGIN_PATH . 'includes/class-plugin.php';

// Iniciar el plugin
function keyss_whatsapp_orders() {
    return Keyss_WhatsApp_Plugin::get_instance();
}

keyss_whatsapp_orders();