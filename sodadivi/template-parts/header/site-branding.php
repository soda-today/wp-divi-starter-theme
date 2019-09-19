<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @since 1.0.0
 */
?>
<div class="site-branding">

	<?php if ( has_custom_logo() ) : ?>
		<div class="site-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>

	<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'sodadividomain' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
					'menu_class'     => 'main-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>

</div><!-- .site-branding -->
