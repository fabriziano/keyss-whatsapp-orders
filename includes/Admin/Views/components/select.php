<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<select
	id="<?php echo esc_attr( $id ); ?>"
	name="<?php echo esc_attr( $name ?? '' ); ?>"
	class="kwo-select">

	<?php foreach ( $options as $value => $label ) : ?>

		<option value="<?php echo esc_attr( $value ); ?>">

			<?php echo esc_html( $label ); ?>

		</option>

	<?php endforeach; ?>

</select>