<?php
/**
 * smv functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package smv
 */

add_image_size('header_logo', 400, 110, array('center', 'center'));
add_image_size('footer_logo', 75, 75);

if ( ! function_exists( 'smv_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function smv_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on smv, use a find and replace
		 * to change 'smv' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'smv', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Primary', 'smv' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'smv_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		
		$header_logo = array(
			'width'       => 400,
			'height'      => 110,
			'flex-height' => false,
			'flex-width'  => false,
			'header-text' => array( 'site-title', 'site-description' )
		);
		add_theme_support( 'custom-logo', $header_logo );

	}
endif;
add_action( 'after_setup_theme', 'smv_setup' );

function register_members_only_menu() {
	register_nav_menu('members-only-menu',__( 'Members Only Menu' ));
}
add_action( 'init', 'register_members_only_menu' );

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */

function smv_login_redirect( $redirect_to, $request, $user ) {
	// Is there a user logged in?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		// Check if user is admin
		if ( in_array( 'administrator', $user->roles ) ) {
			// Redirect to dashboard
			return $redirect_to;
		} else {
			// Redirect to Members Home Page
			return home_url( '/members-home-page' );
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'smv_login_redirect', 10, 3 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function smv_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'smv_content_width', 640 );
}
add_action( 'after_setup_theme', 'smv_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smv_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'smv' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'smv' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'smv_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function smv_scripts() {

	wp_enqueue_style( 'smv-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/build/assets/css/vendor/bootstrap.min.css' );

	wp_enqueue_style( 'underscores', get_stylesheet_directory_uri() . '/build/assets/css/vendor/underscores.css' );

	wp_enqueue_style( 'owl-css', get_stylesheet_directory_uri() . '/build/assets/css/vendor/owl.carousel.min.css' );
	
	wp_enqueue_style( 'owl-theme', get_stylesheet_directory_uri() . '/build/assets/css/vendor/owl.theme.default.min.css' );

	wp_enqueue_style( 'compiled-scss', get_stylesheet_directory_uri() . '/build/assets/css/user/theme.css' );
	
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/build/assets/js/vendor/jquery.slim.min.js', array(), '20151215', true );

	wp_enqueue_script( 'complied-js', get_stylesheet_directory_uri() . '/build/assets/js/user/theme.js', array(jquery), '20151215', true );

	wp_enqueue_script( 'smv-navigation', get_stylesheet_directory_uri() . '/build/assets/js/vendor/navigation.js', array(jquery), '20151215', true );

	wp_enqueue_script( 'smv-skip-link-focus-fix', get_stylesheet_directory_uri() . '/build/assets/js/vendor/skip-link-focus-fix.js', array(jquery), '20151215', true );
	
	wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/build/assets/js/vendor/owl.carousel.min.js', array(jquery), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'smv_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Bootstrap 4 navwalker
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Enable ACF Global Options Page
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page('Theme Settings');
}