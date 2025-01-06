<section class="list-trainers">
	<div class="container">
		<?php get_template_part( 'template-parts/builder/components/title' ) ?>


		<?php
		$args = array(
			'post_type'      => 'team',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => - 1,

		);
		?>

		<?php $the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>
			<div class="row">
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="col-lg-4">
						<?php
						$degree     = get_field( 'degree' );
						$experience = get_field( 'experience' );
						?>

						<div class="person-name">
							<a href="<?php the_permalink(); ?>">
								<h4 class="person-name__title"><?php the_title(); ?></h4>
							</a>

							<?php if ( $degree ) : ?>
								<span class="person-name__degree"><?php echo esc_html( $degree ); ?></span>
							<?php endif; ?>
						</div>

						<?php if ( $experience ) : ?>
							<div><?php echo wp_kses_post( $experience ) ?></div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
				<!-- end of the loop -->
				<?php wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>

	</div>
	</div>
</section>
