<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package smv
 */

?>

	</div><!-- #content -->

	<footer>
		<div class="container">
			<?php if ( $footer_logo = get_field( 'footer_logo', 'option' ) ) { ?>
				<?php echo wp_get_attachment_image( $footer_logo, 'footer_logo' ) ?>
			<?php } ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
