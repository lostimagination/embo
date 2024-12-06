<section class="home-hero section">
    <div class="container">
        <div class="row align-middle">
            <div class="col-lg-6">
				<?php if ( $hero_image = get_sub_field( 'hero_image' ) ) : ?>
                    <div class="home-hero__image">
						<?php echo wp_get_attachment_image( $hero_image['id'], 'large', false, array( 'class' => 'flex-image' ) ); ?>
                        <svg class="home-hero__decor" viewBox="0 0 328 328" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g style="mix-blend-mode:multiply">
                                <path d="M292.095 0C292.095 161.321 161.321 292.095 0 292.095" stroke="#F5AC00" stroke-width="70" stroke-miterlimit="10"/>
                            </g>
                        </svg>

                    </div>
				<?php endif; ?>
            </div>
            <div class="col-lg-6">
				<?php if ( $hero_title = get_sub_field( 'hero_title' ) ) : ?>
                <div class="home-hero__title">
	                <?php echo wp_kses_post( $hero_title ); ?>
                </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>
