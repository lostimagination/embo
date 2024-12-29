<?php
$position  = get_sub_field( 'position' ) ? 'row-reverse' : '';
$cl_colors = [
	'turquois' => 'bg-turquois-50',
	'beige'    => 'bg-beige-450',
	'purple'   => 'bg-purple-50',
	'primary'  => 'bg-primary-150',
];

$cl_color     = get_sub_field( 'circle_color' );
$circle_color = $cl_colors[ $cl_color ] ?? '';
?>
<section class="circle-tabs">
	<div class="container">
		<div class="row ">
			<div class="js-tabs tabs tabs--vertical circle-tabs-row row <?php echo esc_attr( $position ); ?>">
				<div class="col-lg-6 ">
					<?php get_template_part( 'template-parts/builder/components/title', null, array( 'class' => '' ) ) ?>
					<?php if ( have_rows( 'interactive_items' ) ) : ?>
						<div class="circle-tabs-decor <?php echo esc_attr($circle_color);?>"></div>
						<div class="tabs-titles <?php echo $position ?> ">
							<?php while ( have_rows( 'interactive_items' ) ) :
								the_row(); ?>
								<?php
								$title     = get_sub_field( 'title' );
								$index     = get_row_index();
								$is_active = $index === 1 ? 'is-active' : '';
								?>
								<?php if ( $title ) : ?>

								<div class="js-tab-title tab-title <?php echo esc_attr( $is_active ); ?>"
								data-item="tab-<?php echo esc_attr( $index ); ?>"><?php echo $title ?>
							<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-lg-6">
					<?php if ( have_rows( 'interactive_items' ) ) : ?>
						<div class="tabs-contents">
							<?php while ( have_rows( 'interactive_items' ) ) : the_row(); ?>
								<?php
								$index     = get_row_index();
								$info      = get_sub_field( 'info' );
								$is_active = get_row_index() === 1 ? 'is-active' : '';
								?>
								<?php if ( $info ) : ?>
									<div class="js-tab-content tabs-info <?php echo esc_attr( $is_active ); ?>"
										 id="tab-<?php echo esc_attr( $index ); ?>"><?php echo $info ?>
									</div>
								<?php endif; ?>

							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
