<section class="section">
    <div class="container">
		<?php get_template_part( 'template-parts/builder/components/title' ); ?>

		<?php
		$teaser_color = get_sub_field( 'teaser_color' );
		$courses      = get_sub_field( 'courses' );

		if ( $courses ): ?>
            <div class="row justify-content-between">
				<?php foreach ( $courses as $post ): ?>
					<?php setup_postdata( $post ); ?>
                    <div class="col-lg-4 teaser-item-col">
                        <div class="teaser-item">
                            <div class="teaser-item__decor background-<?php echo $teaser_color; ?>"></div>
                            <h3 class="teaser-item__title">
								<?php the_title(); ?>
                            </h3>
                            <div class="teaser-item__info">
								<?php echo wp_trim_words( get_the_content(), 40 ) ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-arrow btn-purple">
								<?php esc_html_e( 'Course info', 'embo' ); ?>
                            </a>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>


    </div>
</section>
