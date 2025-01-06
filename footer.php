<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _it_start
 */

// Enable strict typing mode.
declare( strict_types=1 );

$logo_small     = get_field( 'logo_small', 'options' );
$logo_short     = get_field( 'logo_short', 'options' );
$footer_info    = get_field( 'footer_info', 'options' );
$footer_address = get_field( 'footer_address', 'options' );
$title_list     = get_field( 'title_list', 'options' );
$title_socials  = get_field( 'title_socials', 'options' );
$title_form     = get_field( 'title_form', 'options' );
$footer_form    = get_field( 'footer_form', 'options' );
$copyright      = get_field( 'copyright', 'options' );

$enable_to_top = get_field( 'enable_to_top', 'options' );
?>

</main><!-- /.site-content -->

<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="footer-padding">
					<div class="footer-logo">
						<?php if ( ! empty( $logo_small ) ) : ?>
							<a href="<?php echo esc_url( home_url() ); ?>" class="logo-small">
								<?php if ( $logo_small ) : ?>
									<?php echo wp_get_attachment_image( $logo_small['id'], 'medium', false, array( 'class' => '' ) ); ?>
								<?php endif; ?>
							</a>
						<?php endif; ?>
						<?php if ( ! empty( $logo_short ) ) : ?>
							<a href="<?php echo esc_url( home_url() ); ?>" class="logo-short">
								<?php if ( $logo_short ) : ?>
									<?php echo wp_get_attachment_image( $logo_short['id'], 'medium', false, array( 'class' => '' ) ); ?>
								<?php endif; ?>
							</a>
						<?php endif; ?>
					</div>

					<?php if ( $footer_info ) : ?>
						<div class="footer-info">
							<?php echo wp_kses_post( $footer_info ); ?>
						</div>
					<?php endif; ?>
					<?php ?>
					<?php if ( $footer_address ) : ?>
						<div class="footer-address"><?php echo wp_kses_post( $footer_address ) ?></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-2">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'footer',
						'container_class' => 'footer-links__container',
						'menu_class'      => 'footer-links',
						'fallback_cb'     => false,
					)
				);
				?>
			</div>
			<div class="col-lg-2">
				<div class="footer-padding">
					<?php if ( $title_list ) : ?>
						<div class="footer-title"> <?php echo esc_html( $title_list ) ?></div>
					<?php endif; ?>
					<?php

					$list_course = get_field( 'list_course', 'options' );

					if ( $list_course ): ?>

						<?php foreach ( $list_course as $post ): ?>
							<?php setup_postdata( $post ); ?>
							<p class="footer-list"><?php the_title(); ?></p>
						<?php endforeach; ?>

						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="footer-padding socials-form">
					<?php if ( $title_socials ) : ?>
					<div>
						<div class="footer-title footer-title__socials">
							<?php echo $title_socials ?>
						</div>
						<?php endif; ?>

						<?php if ( have_rows( 'icons_socials', 'options' ) ) : ?>
							<?php while ( have_rows( 'icons_socials', 'options' ) ) : the_row(); ?>
								<?php
								$link_socials = get_sub_field( 'link_socials' );
								$icon_socials = get_sub_field( 'icon_socials' );
								?>
								<a href="<?php echo $link_socials ?>">
									<?php if ( $icon_socials ) : ?>
										<div class="footer-socials">
											<?php echo wp_get_attachment_image( $icon_socials['id'], 'thumbnail', false, array( 'class' => '' ) ); ?>
										</div>
									<?php endif; ?>
								</a>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div>
						<?php if ( $title_form ) : ?>
							<p class="footer-title-form"><?php echo esc_html( $title_form ) ?></p>
						<?php endif; ?>

						<?php if ( $footer_form ) : ?>
							<div class="footer-form"><?php echo do_shortcode( $footer_form ); ?></div>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>

		<?php get_template_part( 'template-parts/socials' ); ?>
	</div>

	<div class="site-footer__copyright">
		<div class="container">
			<!--			<span>&copy; --><?php //echo esc_html( gmdate( 'Y' ) ); ?><!-- -->
			<?php //esc_html_e( 'All rights reserved', '_it_start' ); ?><!--</span>-->
			<div class="wrapper-copyright">
				<?php if ( $copyright ) : ?>
					<div class="footer-copyright">
						<?php echo wp_kses_post( $copyright ); ?>
					</div>
				<?php endif; ?>

				<?php if ( have_rows( 'copyright_links', 'options' ) ) : ?>
					<?php while ( have_rows( 'copyright_links', 'options' ) ) : the_row(); ?>
						<?php if ( $link = get_sub_field( 'link' ) ) :
							$link_target = $link['target'] ? $link['target'] : '_self'; ?>
							<a  class="copyright-link" target="<?php echo esc_attr( $link_target ); ?>"
							   href="<?php echo esc_url( $link['url'] ); ?>">
								<?php echo $link['title'] ?>
							</a>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>

<?php get_template_part( 'template-parts/svg' ); ?>

<?php if ( $enable_to_top && ! is_404() ) : ?>
	<a id="to-top" href="#top">
		<svg>
			<use xlink:href="#angle-up"></use>
		</svg>
		<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', '_it_start' ); ?></span> </a>
<?php endif; ?>

<?php wp_footer(); ?>

</body></html>
