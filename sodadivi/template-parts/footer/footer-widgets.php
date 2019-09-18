<?php
/**
 * Displays the footer widget area
 *
 * @since 1.0.0
 */
?>
<div class="container">
	<div class="columns">

		<?php foreach ( array_fill(0, SODADIVI_NB_FOOTER_AREAS, null) as $i ): ?>
			<?php if ( is_active_sidebar( "footer-$i" ) ) : ?>
				<div class="column col-xs-12 col-sm-6 col-3">
					<?php if ( is_active_sidebar( "footer-$i" ) ): ?>
						<div class="widget-column footer-widget-<?php echo $i; ?>">
							<?php dynamic_sidebar( "footer-$i" ); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
