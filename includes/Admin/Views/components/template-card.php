<div class="kwo-card">

			<h2>📝 Plantilla del mensaje</h2>

			<p class="kwo-card-description">
				Personaliza el mensaje que será enviado automáticamente.
			</p>

			<textarea
				id="kwo-message-template"
				class="large-text code"
				rows="12"
				name="kwo_settings[message]"><?php

				echo esc_textarea(
					$settings['message']
					??
				"Hola {cliente}

				Gracias por tu compra.

				Pedido #{pedido}

				{productos}

				Comentario:
				{mensaje_cliente}

				Total: S/ {total}"
				);

			?></textarea>

		</div>