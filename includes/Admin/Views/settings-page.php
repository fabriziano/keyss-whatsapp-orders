<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$preview = $settings['message'] ?? '';

$grouped_variables = array();

foreach ( $variables as $variable ) {
	$grouped_variables[ $variable['group'] ][] = $variable;
}
?>

<div class="wrap">

	<?php require __DIR__ . '/components/header.php'; ?>

	<form method="post" action="options.php">

		<?php settings_fields( 'kwo_settings_group' ); ?>

		<div class="kwo-layout">

			<div class="kwo-main">

				<?php require __DIR__ . '/components/configuration-card.php'; ?>

				<?php require __DIR__ . '/components/template-card.php'; ?>

				<?php require __DIR__ . '/components/variables-card.php'; ?>

				<?php submit_button( 'Guardar configuración' ); ?>

			</div>

			<div class="kwo-sidebar">

				<?php require __DIR__ . '/components/order-selector.php'; ?>

				<?php require __DIR__ . '/components/preview-card.php'; ?>

			</div>

		</div>

	</form>

</div>