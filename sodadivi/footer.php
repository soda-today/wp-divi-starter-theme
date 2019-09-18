<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<footer class="site-footer">
		<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
	</footer><!-- .site-footer -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
