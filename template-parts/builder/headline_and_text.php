<?php
$info_section = get_sub_field( 'info_section' );
$link_section = get_sub_field( 'link_section' );
$title_section = get_sub_field('title_section');
?>
<section class="Headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">

				<?php if($title_section) : ?>
				 <div><?php echo wp_kses_post($title_section)?></div>
				<?php endif; ?>

			</div>
			<div class="col-lg">

				<?php if ( $info_section ) : ?>
					<div><?php echo wp_kses_post ($info_section) ?></div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ( $link_section  ) :
			$link_section_target = $link_section['target'] ? $link_section['target'] : '_self'; ?>
			<a class="btn btn-outline" target="<?php echo esc_attr( $link_section_target ); ?>"
			   href="<?php echo esc_url( $link_section['url'] ); ?>">
				<?php echo $link_section['title'] ?>
				<svg>
					<use xlink:href="#arrow-right"></use>
				</svg>

			</a>

		<?php endif; ?>
	</div>
</section>
