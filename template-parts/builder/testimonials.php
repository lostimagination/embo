<?php
$image_section = get_sub_field( 'image_section' );
$quote_text = get_sub_field('quote_text');
?>
<section class="testimonials">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<?php if ( $image_section ) : ?>
					<div class="image-wrapper">
						<?php echo wp_get_attachment_image( $image_section['id'], 'medium', false, array( 'class' => 'person-image' ) ); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-6 offset-lg-1">
				<?php if($quote_text) : ?>
				 <div><?php echo wp_kses_post ($quote_text) ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
