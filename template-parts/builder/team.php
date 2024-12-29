<section class="team">
	<div class="container">
		<?php get_template_part( 'template-parts/builder/components/title' ) ?>
		<?php

		$team_member = get_sub_field( 'team_member' );

		if ( $team_member ): ?>
			<div class="row">
				<?php foreach ( $team_member as $post ): ?>
					<?php setup_postdata( $post ); ?>
					<?php
					$degree = get_field( 'degree' );
					$job    = get_field( 'job' );
					$col_columns  = get_sub_field( 'columns' ) ? 'col-lg-4' : 'col-lg-6';
					?>
					<div class="<?php echo $col_columns ?>">
						<div class="team-member-image">
							<?php the_post_thumbnail( 'medium', array( 'class' => 'flex-image' ) ); ?>
						</div>
						<div class="person-name">
							<a href="<?php the_permalink(); ?>">
								<h3 class="person-name__title"><?php the_title(); ?></h3>
							</a>

							<?php if ( $degree ) : ?>
								<span class="person-name__degree"><?php echo esc_html( $degree ); ?></span>
							<?php endif; ?>
						</div>

						<?php if ( $job ) : ?>
							<h5 class="person-name__job"><?php echo esc_html( $job ); ?> </h5>
						<?php endif; ?>
						 <article class="person-content">
							 <?php the_content(); ?>
						 </article>

					</div>
				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>


	</div>
</section>
