<?php
$title_section     = get_sub_field( 'title_section' );
$sub_title_section = get_sub_field( 'sub_title_section' );
$number_telephone  = get_sub_field( 'number_telephone' );
$address_email     = get_sub_field( 'address_email' );
$email_us          = get_sub_field( 'email_us' );
?>
<section class="get-touch">
	<div class="container">
		<div class="row  content-center">
			<div class="col-lg-5">
				<div class="get-touch-wrapper">
					<svg class="decor-small">
						<use xlink:href="#decor-small"></use>
					</svg>
					<?php if ( $title_section ) : ?>
						<span class="h2 get-touch__title"><?php echo esc_html( $title_section ); ?></span>
					<?php endif; ?>

					<?php if ( $sub_title_section ) : ?>
						<span class="get-touch__subtitle"> <?php echo esc_html( $sub_title_section ); ?></span>
					<?php endif; ?>

					<div class="number-phone">
						<svg>
							<use xlink:href="#phone"></use>
						</svg>
						<?php if ( $number_telephone ) : ?>
							<a href="tel:<?php echo it_phone_cleaner( $number_telephone ) ?>"><?php echo esc_html( $number_telephone ); ?></a>
						<?php endif; ?>

					</div>
					<div class="address-email">
						<svg>
							<use xlink:href="#email"></use>
						</svg>
						<?php if ( $address_email ) : ?>
							<a href="mailto:<?php echo $address_email; ?>">
								<?php if ( $email_us ) : ?>
									<span><?php echo esc_html( $email_us ); ?></span>
								<?php endif; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
