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

// Change URL of the logo link for Members Home Page
add_filter( 'get_custom_logo', 'link_to_members_home' );
	function link_to_members_home() {
		$custom_logo = get_theme_mod( 'custom_logo' );
		$html = sprintf( '<a href="%1$s%2$s" class="custom-logo-link" rel="home" itemprop="url">%3$s</a>',
				esc_url( home_url() ),
				'/members-home-page',
				wp_get_attachment_image( $custom_logo, 'full', false, array(
					'class'    => 'custom-logo',
				) )
			);
    return $html;   
}

// Get current user data
$current_user = wp_get_current_user();


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
			<div class="row">
				<div class="members-area">
					<!-- Set hard link to the home page here: -->
					<a href="<?php get_page_by_title('Home'); ?>">Public Home Page</a>
					<!-- end of hard link -->
					<a href="<?php echo get_edit_user_link(); ?>"><?php echo $current_user->display_name; ?></a>
					<a href="<?php echo wp_logout_url(); ?>">Logout</a>
					<a href="<?php get_page_by_title('User Profile Update'); ?>">User Profile Update</a>
				</div>
			</div>
			<div class="row">
				<div class="header-background">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->
			</div>
		</div>
	</header>

	<nav id="" class="">
		<div class="container">
			<div class="row">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'smv' ); ?></button>
				<?php
					wp_nav_menu( array( 
						'theme_location'	=> 'members-only-menu',
						'menu_class'	 	=> '',
						'walker'		 	=> new WP_Bootstrap_Navwalker()
					) );
				?>
			</div>
		</div>
	</nav><!-- #site-navigation -->
