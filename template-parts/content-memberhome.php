<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smv
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-fluid">
	
	<header class="home-page__header">
        <div class="container">
            <?php the_title( '<h1 class="home-page__header-text">', '</h1>' ); ?>
        </div>
	</header><!-- .entry-header -->

	<div class="container">
		<div class="home-page__content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="home-page__content-page-links">' . esc_html__( 'Pages:', 'smv' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'smv' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
	
	</div>
	
	
</article><!-- #post-<?php the_ID(); ?> -->
