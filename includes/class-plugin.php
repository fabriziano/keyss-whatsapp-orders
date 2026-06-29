<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Keyss_WhatsApp_Plugin {

    private static $instance = null;
    private $admin;

    public static function get_instance() {

        if ( self::$instance === null ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {

        // Configuración
        require_once KWO_PLUGIN_PATH . 'includes/class-settings.php';
        require_once KWO_PLUGIN_PATH . 'includes/class-admin.php';

        // Helpers
        require_once KWO_PLUGIN_PATH . 'includes/Helpers/class-template-engine.php';

        // WooCommerce
        require_once KWO_PLUGIN_PATH . 'includes/WooCommerce/class-order-data.php';
        require_once KWO_PLUGIN_PATH . 'includes/WooCommerce/class-hooks.php';

        // WhatsApp
        require_once KWO_PLUGIN_PATH . 'includes/WhatsApp/class-message-builder.php';

        // Inicializar componentes
        new Keyss_WhatsApp_Settings();
        $this->admin = new Keyss_WhatsApp_Admin();
        new KWO_WooCommerce_Hooks();

        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    public function admin_menu() {

        add_menu_page(
            'WhatsApp Orders',
            'WhatsApp Orders',
            'manage_options',
            'keyss-whatsapp-orders',
            array( $this, 'settings_page' ),
            'dashicons-whatsapp',
            56
        );

    }

    public function settings_page()
    {
        $this->admin->render_settings_page();
    }

}