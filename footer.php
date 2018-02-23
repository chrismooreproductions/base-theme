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

<?php 	$footer_img = get_theme_mod('footer-image');
		$address = get_theme_mod('address');
		$email = get_theme_mod('enquiries-email');
		$page_1 = get_theme_mod('page-select-1');
		$page_2 = get_theme_mod('page-select-2');
		$copyright_message = get_theme_mod('copyright-message');
?>

	<footer>
		<div class="container">
			<div class="row">
				<div class="footer-logo">
					<img src="<?php echo $footer_img; ?>" alt="The Society Of Merchant Venturers Footer Image" width="76" height="76" style="height: 76px;">
				</div>
				<div class="footer-text">
					<h5 class="footer-text__address"><?php echo $address; ?></h5>
					<h5 class="footer-text__email"><?php echo $email; ?></h5>
				</div>
				<div class="footer-copyright">
					<div class="footer-copyright__pages">
						<a href="<?php get_permalink( $page_1 ); ?>"><?php echo get_the_title( $page_1 ); ?></a> |
						<a href="<?php get_permalink( $page_2 ); ?>"><?php echo get_the_title( $page_2 ); ?></a>
					</div>
					<div class="footer-copyright__copyright-text">
						<p>&copy; <?php echo $copyright_message; ?></p>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
