<?php
$logo_company      = get_sub_field( 'logo_company' );
$sup_title_section = get_sub_field( 'sup_title_section' );
$background_color = get_sub_field( 'background_color' ) ? 'bg-biege-450' : '';
?>
<section class="company-logos <?php echo $background_color ?>">
	<div class="container">
		<?php if ( $sup_title_section ) : ?>
			<span class="h5 sup-title-section"><?php echo $sup_title_section ?></span>
		<?php endif; ?>
		<div class="gallery">
			<?php if ( $logo_company ): ?>
				<?php foreach ( $logo_company as $image ): ?>

					<div class="columns small-12 medium-6 large-4">
						<img class="img-responsive" src="<?php echo $image['url']; ?>"
							 alt="<?php echo $image['alt']; ?>"/>
						<p><?php echo $image['caption']; ?></p>
					</div>

				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
