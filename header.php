<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package smv
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'smv' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="header-background">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->
		</div>

	</header>

	<nav id="site-navigation" class="navbar">
		<div class="container">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'smv' ); ?></button>
				<?php
					wp_nav_menu([
						'menu'            => 'top',
						'theme_location'  => 'top',
						'container'       => 'div',
						'container_id'    => 'bs4navbar',
						'container_class' => 'collapse navbar-collapse',
						'menu_id'         => false,
						'menu_class'      => 'navbar-nav mr-auto',
						'depth'           => 2,
						'fallback_cb'     => 'bs4navwalker::fallback',
						'walker'          => new bs4navwalker()
					  ]);
				?>
		</div>
	</nav><!-- #site-navigation -->
