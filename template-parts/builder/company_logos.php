<?php
$logo_company      = get_sub_field( 'logo_company' );
$sup_title_section = get_sub_field( 'sup_title_section' );
$background_color  = get_sub_field( 'background_color' ) ? 'bg-beige-450' : '';
?>
<section class="company-logos <?php echo $background_color ?>">
	<div class="container">
		<?php if ( $sup_title_section ) : ?>
			<span class="h5 sup-title-section"><?php echo $sup_title_section ?></span>
		<?php endif; ?>
		<div class="gallery-slider-wrapper">
			<div class="swiper slide-gallery">
				<div class="swiper-wrapper">
					<?php if ( $logo_company ): ?>
						<?php foreach ( $logo_company as $image ): ?>

							<div class="swiper-slide">
								<img class="img-responsive" src="<?php echo $image['url']; ?>"
									 alt="<?php echo $image['alt']; ?>"/>
							</div>

						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="swiper-button-next">
				<svg>
					<use xlink:href="#arrow-right-next"></use>
				</svg>
			</div>
			<div class="swiper-button-prev">
				<svg>
					<use xlink:href="#arrow-left-prev"></use>
				</svg>
			</div>
		</div>
	</div>
</section>
