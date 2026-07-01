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

    private function __construct()
    {
        $this->load_dependencies();

        $this->init_hooks();

        $this->init();
    }

    private function init_hooks()
    {
        add_action(
            'admin_menu',
            array( $this, 'admin_menu' )
        );
    }

    private function load_dependencies()
    {
        KWO_Loader::load();
    }

    private function init()
    {
        new Keyss_WhatsApp_Settings();

        $this->admin = new Keyss_WhatsApp_Admin();

        new KWO_WooCommerce_Hooks();

        new KWO_Ajax_Preview();
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

    public static function activate() {

    flush_rewrite_rules();

    }

    public static function deactivate() {

        flush_rewrite_rules();

    }

}