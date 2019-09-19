<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicons/safari-pinned-tab.svg" color="#000000">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicons/favicon.ico">
	<meta name="msapplication-TileColor" content="#0300ff">
	<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/favicons/browserconfig.xml">
	<meta name="theme-color" content="#0300ff">
	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'sodadividomain' ); ?></a>

		<header id="masthead" class="site-header">

			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div><!-- .site-branding-container -->
		</header><!-- #masthead -->

	<div id="content" class="site-content">
