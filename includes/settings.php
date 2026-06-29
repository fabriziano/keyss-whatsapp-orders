<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registrar configuración
 */
function kwo_register_settings()
{
    register_setting(
        'kwo_settings_group',
        'kwo_whatsapp_number'
    );
}

add_action('admin_init', 'kwo_register_settings');

/**
 * Página de configuración
 */
function kwo_settings_page()
{
?>
    <div class="wrap">

        <h1>Keyss WhatsApp Orders</h1>

        <form method="post" action="options.php">

            <?php
            settings_fields('kwo_settings_group');
            do_settings_sections('kwo_settings_group');
            ?>

            <table class="form-table">

                <tr>

                    <th>Número de WhatsApp</th>

                    <td>

                        <input
                            type="text"
                            name="kwo_whatsapp_number"
                            value="<?php echo esc_attr(get_option('kwo_whatsapp_number')); ?>"
                            class="regular-text"
                            placeholder="51987654321">

                        <p class="description">
                            Ingrese el número con código de país y sin el signo +
                        </p>

                    </td>

                </tr>

            </table>

            <?php submit_button('Guardar'); ?>

        </form>

    </div>

<?php
}