<div class="kwo-card">

			<h2>⚙ Configuración</h2>

			<p class="kwo-card-description">
				Configura el número de WhatsApp que recibirá los pedidos.
			</p>

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
							Ingrese el número en formato internacional.
						</p>

					</td>

				</tr>

			</table>

		</div>