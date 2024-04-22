<?php
/**
 * Picture Block Template.
 *
 * @param array $block The block settings and attributes.
 *
 * @package fwd-acf-blocks
 */

// Load values and assign defaults.
$picture_type        = get_field( 'picture_element_type' );
$preferred_image     = get_field( 'preferred_image' );
$fallback_image      = get_field( 'fallback_image' );
$small_screen_image  = get_field( 'small_screen_image' );
$medium_screen_image = get_field( 'medium_screen_image' );
$large_screen_image  = get_field( 'large_screen_image' );
$medium_breakpoint   = '50em';
$large_breakpoint    = '75em';
if ( get_field( 'medium_breakpoint' ) ) {
	$medium_breakpoint = get_field( 'medium_breakpoint' );
}
if ( get_field( 'large_breakpoint' ) ) {
	$large_breakpoint = get_field( 'large_breakpoint' );
}

// Support custom "id" values.
$anchor = 'picture-block-' . wp_rand( 100, 999 );
if ( ! empty( $block['anchor'] ) ) {
	$anchor = esc_attr( $block['anchor'] );
}

// Support custom "class" values.
$class_name = 'picture-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

?>

<?php if ( 'art-direction' === $picture_type && $small_screen_image ) : ?>
	<picture id="<?php echo esc_attr( $anchor ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
		<?php if ( $large_screen_image ) : ?>
			<source 
				srcset="<?php echo esc_attr( $large_screen_image['url'] ); ?>" 
				media="(min-width: <?php echo esc_attr( $large_breakpoint ); ?>)"
				>
		<?php endif; ?>
		<?php if ( $medium_screen_image ) : ?>
			<source 
				srcset="<?php echo esc_attr( $medium_screen_image['url'] ); ?>" 
				media="(min-width: <?php echo esc_attr( $medium_breakpoint ); ?>)"
				>
		<?php endif; ?>
		<img 
			src="<?php echo esc_attr( $small_screen_image['url'] ); ?>" 
			alt="<?php echo esc_attr( $small_screen_image['alt'] ); ?>"
			width="<?php echo esc_attr( $small_screen_image['width'] ); ?>"
			height="<?php echo esc_attr( $small_screen_image['height'] ); ?>"
			decoding="async"
			>
	</picture>
<?php elseif ( 'file-type' === $picture_type && $fallback_image && $preferred_image ) : ?>
	<picture id="<?php echo esc_attr( $anchor ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
		<source 
			srcset="<?php echo esc_attr( $preferred_image['url'] ); ?>" 
			type="<?php echo esc_attr( $preferred_image['mime_type'] ); ?>"
			>
		<img 
			src="<?php echo esc_attr( $fallback_image['url'] ); ?>" 
			alt="<?php echo esc_attr( $fallback_image['alt'] ); ?>"
			width="<?php echo esc_attr( $fallback_image['width'] ); ?>"
			height="<?php echo esc_attr( $fallback_image['height'] ); ?>"
			decoding="async"
			>
	</picture>
<?php endif; ?>