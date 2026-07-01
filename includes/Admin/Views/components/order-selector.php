<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="kwo-card">

	<h2>🧪 Pedido de prueba</h2>

	<p class="kwo-card-description">
		Selecciona un pedido para generar una vista previa real.
	</p>

	<?php

	$id = 'kwo-order-preview';

	$options = $order_options;

	require __DIR__ . '/select.php';

	?>

</div>