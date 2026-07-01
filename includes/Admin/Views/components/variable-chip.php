<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<button
	type="button"
	class="kwo-chip kwo-variable"
	data-variable="<?php echo esc_attr( $variable['token'] ); ?>">

	<span class="kwo-chip-icon">
		<?php echo esc_html( $variable['icon'] ); ?>
	</span>

	<span class="kwo-chip-label">
		<?php echo esc_html( $variable['label'] ); ?>
	</span>

</button>