<?php

if (!defined('ABSPATH')) {
    exit;
}

class Keyss_WhatsApp_Plugin
{
    private static $instance = null;

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu()
    {
        add_menu_page(
            'WhatsApp Orders',
            'WhatsApp Orders',
            'manage_options',
            'keyss-whatsapp-orders',
            [$this, 'settings_page'],
            'dashicons-whatsapp',
            56
        );
    }

    public function settings_page()
    {
        ?>
        <div class="wrap">
            <h1>Keyss WhatsApp Orders</h1>

            <p>Bienvenido al panel de configuración.</p>

            <hr>

            <p>En la siguiente etapa agregaremos la configuración del número de WhatsApp.</p>
        </div>
        <?php
    }
}