<?php
/**
 * This template can be overridden by copying it to yourtheme/flexible-checkout-fields/fields/email.php
 *
 * @var string  $key   Field ID.
 * @var mixed[] $args  Custom attributes for field.
 * @var mixed   $value Field value.
 * @var string[] $custom_attributes .
 *
 * @package Flexible Checkout Fields
 */

?>
<div class="form-row form-group <?php echo esc_attr( $args['class'] ); ?>"
	id="<?php echo esc_attr( $key ); ?>_field"
	data-priority="<?php echo esc_attr( $args['priority'] ); ?>"
	data-fcf-field="<?php echo esc_attr( $key ); ?>">
	<label for="<?php echo esc_attr( $key ); ?>">
		<?php echo wp_kses_post( $args['label'] ); ?><?php if ( $args['required'] ) : ?>*<?php endif; ?>		
	</label>
	<input
		type="email"
		class="input-text form-control"
		name="<?php echo esc_attr( $key ); ?>"
		id="<?php echo esc_attr( $key ); ?>"
		placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>"
		value="<?php echo esc_attr( $value ); ?>"
		data-fcf-field-input="<?php echo esc_attr( $key ); ?>"
		<?php foreach ( $custom_attributes as $attr_key => $attr_value ) : ?>
			<?php echo esc_attr( $attr_key ); ?>="<?php echo esc_attr( $attr_value ); ?>"
		<?php endforeach; ?> />
</div>
