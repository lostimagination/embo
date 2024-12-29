<section class="testimonials">
	<div class="container">

		<div class="testimonials-slider-wrapper">
			<div class="swiper slide-testimonials">
				<div class="swiper-wrapper">
					<?php

					$testimonials = get_sub_field( 'testimonials' );

					if ( $testimonials ): ?>

						<?php foreach ( $testimonials as $post ): ?>
							<?php setup_postdata( $post ); ?>
							<?php
							$bg_colors = [
								'turquois' => 'bg-turquois-50',
								'beige'    => 'bg-beige-450',
								'purple'   => 'bg-purple-50',
								'primary'  => 'bg-primary-150',
							];

							$bg_color         = get_sub_field( 'background_color' );
							$background_color = $bg_colors[ $bg_color ] ?? '';
							?>
							<div class="swiper-slide ">
								<div class="testimonial-wrapper ">
									<div class="testimonial-wrapper__color <?php echo $background_color ?>"></div>
									<div class="testimonial-image">
										<?php the_post_thumbnail( 'medium', array( 'class' => 'flex-image person-image' ) ); ?>
									</div>
									<div class="testimonial-content-wrapper">
										<svg class="quote-svg">
											<use xlink:href="#quote"></use>
										</svg>
										<div class="testimonial-content"><?php the_content(); ?></div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>
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
