<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$preview = $settings['message'] ?? '';

foreach ( $variables as $variable ) {
	$preview = str_replace(
		$variable['token'],
		$variable['example'],
		$preview
	);
}
?>

<div class="wrap">

	<h1>📱 Keyss WhatsApp Orders</h1>

	<p class="description">
		Configura el envío automático de pedidos de WooCommerce a WhatsApp.
	</p>

	<form method="post" action="options.php">

		<?php settings_fields( 'kwo_settings_group' ); ?>

		<div class="kwo-card">

			<h2>📱 Configuración de WhatsApp</h2>

			<table class="form-table">

				<tr>

					<th scope="row">
						Número de WhatsApp
					</th>

					<td>

						<input
							type="text"
							class="regular-text"
							name="kwo_settings[whatsapp]"
							value="<?php echo esc_attr( $settings['whatsapp'] ?? '' ); ?>"
							placeholder="51999999999">

						<p class="description">
							Ingrese el número sin espacios.
						</p>

					</td>

				</tr>

			</table>

		</div>

		<div class="kwo-card">

			<h2>📝 Plantilla del mensaje</h2>

			<textarea
				id="kwo-message-template"
				class="large-text code"
				rows="12"
				name="kwo_settings[message]"><?php
				echo esc_textarea(
					$settings['message']
					??
					"Hola {cliente}\n\nGracias por tu compra.\n\nPedido #{pedido}\n\n{productos}\n\nComentario:\n{mensaje_cliente}\n\nTotal: S/ {total}"
				);
			?></textarea>

		</div>

		<div class="kwo-card">

			<h2>🧩 Variables disponibles</h2>

			<div id="kwo-variables">

				<?php foreach ( $variables as $variable ) : ?>

					<div class="kwo-variable-card">

						<h4>
							<?php echo esc_html( $variable['icon'] ); ?>
							<?php echo esc_html( $variable['label'] ); ?>
						</h4>

						<p><?php echo esc_html( $variable['description'] ); ?></p>

						<button
							type="button"
							class="button button-secondary kwo-variable"
							data-variable="<?php echo esc_attr( $variable['token'] ); ?>">

							Insertar

						</button>

					</div>

				<?php endforeach; ?>

			</div>

		</div>

		<div class="kwo-card">

			<h2>👀 Vista previa</h2>

			<div id="kwo-preview">

				<?php echo nl2br( esc_html( $preview ) ); ?>

			</div>

		</div>

		<?php submit_button( 'Guardar configuración' ); ?>

	</form>

</div>