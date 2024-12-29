<?php
$info_section  = get_sub_field( 'info_section' );
$link_section  = get_sub_field( 'link_section' );
$title_section = get_sub_field( 'title_section' );
?>
<section class="headline">
	<div class="container">
		<div class="js-tabs tabs tabs--vertical row">
			<?php if ( have_rows( 'interactive_list' ) ) : ?>
				<div class="col-lg-6">
					<div class="tabs-titles">
						<?php while ( have_rows( 'interactive_list' ) ) : the_row(); ?>
							<?php
							$title     = get_sub_field( 'title' );
							$index     = get_row_index();
							$is_active = $index === 1 ? 'is-active' : '';
							?>
							<?php if ( $title ) : ?>
								<div class="js-tab-title tab-title <?php echo esc_attr( $is_active ); ?>"
									 data-item="tab-<?php echo esc_attr( $index ); ?>"><?php echo $title ?></div>
							<?php endif; ?>


						<?php endwhile; ?>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="tabs__contents">
						<?php while ( have_rows( 'interactive_list' ) ) : the_row(); ?>
							<?php
							$index     = get_row_index();
							$info      = get_sub_field( 'info' );
							$is_active = get_row_index() === 1 ? 'is-active' : '';
							?>
							<?php if ( $info ) : ?>
								<div class="js-tab-content tabs-info  <?php echo esc_attr( $is_active ); ?>"
									 id="tab-<?php echo esc_attr( $index ); ?>"><?php echo $info ?></div>
							<?php endif; ?>

						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $link_section ) :
			$link_section_target = $link_section['target'] ? $link_section['target'] : '_self'; ?>
			<div class="button-center">
				<a class="btn btn-outline" target="<?php echo esc_attr( $link_section_target ); ?>"
				   href="<?php echo esc_url( $link_section['url'] ); ?>">
					<?php echo $link_section['title'] ?>
					<svg>
						<use xlink:href="#arrow-right"></use>
					</svg>

				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
