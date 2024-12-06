<?php
/**
 * The header for the theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _it_start
 */

// Enable strict typing mode.
declare( strict_types = 1 );

$logo_id  = get_field( 'logo', 'options' );
$logo     = is_int( $logo_id ) ? wp_get_attachment_image( $logo_id, 'medium' ) : '';
$has_hero = false;

while ( have_rows( 'builder' ) ) {
	the_row();
	if ( 'hero' === get_row_layout() ) {
		$has_hero = true;
	}
}

$extra_classes = $has_hero ? 'has-hero' : ''; // Page with Hero requires extra header's styling.
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( $extra_classes ); ?> id="top">
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_it_start' ); ?></a>

<header class="site-header">
    <div class="site-header-top">
        <div class="container container--large">
              <?php
                if($header_top_link = get_field('header_top_link' , 'options')) :
                       $header_top_link_target = $header_top_link['target'] ? $header_top_link['target'] : '_self';
                       ?>
                <div class="site-header-top__wrapper">
                    <a
                            target="<?php echo esc_attr( $header_top_link_target); ?>"
                            href="<?php echo esc_url(is_array($header_top_link) ? $header_top_link['url'] : null); ?>">
		                <?php echo esc_html($header_top_link['title']); ?>
                    </a>
                </div>
                <?php endif; ?>
        </div>
    </div>
    <div class="site-header-bottom">
        <div class="container container--larger">
            <div class="site-header-bottom__wrapper">
	            <?php if ( ! empty( $logo ) ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home" aria-label="<?php bloginfo( 'name' ); ?>">
			            <?php echo wp_kses_post( $logo ); ?>
                    </a>
	            <?php endif; ?>

                <nav class="main-nav">
		            <?php
		            wp_nav_menu(
			            array(
				            'theme_location'  => 'main',
				            'container_class' => 'main-menu__container',
				            'menu_class'      => 'main-menu',
				            'depth'           => 2,
				            'fallback_cb'     => false,
			            )
		            );
		            ?>
		            <?php if ( is_active_sidebar( 'language-switcher' ) ) : ?>
                        <div class="hidden-sm-up">
				            <?php dynamic_sidebar( 'language-switcher' ); ?>
                        </div>
		            <?php endif; ?>
                </nav>

                <?php get_search_form(); ?>
                <span class="icon-burger hidden-lg-up" role="button" aria-label="<?php esc_html_e( 'Toggle navigation', '_it_start' ); ?>"><i></i></span>
            </div>
        </div>
    </div>

</header>

<main class="site-content" id="content">
