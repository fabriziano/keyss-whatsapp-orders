<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="kwo-card">

	<h2>🧩 Variables disponibles</h2>

	<p class="kwo-card-description">
		Haz clic sobre una variable para insertarla en la plantilla.
	</p>

	<div id="kwo-variables">

		<?php foreach ( $grouped_variables as $group => $items ) : ?>

			<h3 class="kwo-group-title">
				<?php echo esc_html( $group ); ?>
			</h3>

			<div class="kwo-chip-container">

				<?php foreach ( $items as $variable ) : ?>

					<?php require __DIR__ . '/variable-chip.php'; ?>

				<?php endforeach; ?>

			</div>

		<?php endforeach; ?>

	</div>

</div>