<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Agrega el menú al administrador
 */
function kwo_admin_menu()
{
    add_menu_page(
        'Keyss WhatsApp Orders',
        'Keyss WhatsApp',
        'manage_options',
        'kwo-settings',
        'kwo_settings_page',
        'dashicons-whatsapp',
        56
    );
}

add_action('admin_menu', 'kwo_admin_menu');

add_action('admin_init', function () {

    error_log('Keyss WhatsApp Orders cargado correctamente.');

});