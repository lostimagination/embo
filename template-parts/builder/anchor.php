<?php
/**
 * Anchor module.
 *
 * @package _it_start
 * @subpackage template-parts/builder
 */

// Enable strict typing mode.
declare( strict_types = 1 );

$anchor_id = get_sub_field( 'anchor_id' ); ?>

<?php if ( $anchor_id ) : ?>
	<div class="anchor" id="anchor-<?php echo esc_attr( $anchor_id ); ?>"></div>
	<?php
endif;
