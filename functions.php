<?php

define( 'DS', DIRECTORY_SEPARATOR );
define('DIR_THEME', get_template_directory_uri());

function biorgaSetUp()
{

	load_theme_textdomain( 'biorga' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 1200, true );
	add_image_size( 'biorga-featured-image', 667, 417, true );
	add_image_size( 'biorga-thumbnail-avatar', 100, 100, true );
	add_image_size( 'biorga-featured-image-nov', 500, 500, false );

	// Add Theme Support Woocomerce
	add_theme_support( 'woocommerce' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'topbar-menu'    => __( 'Top Menu', 'biorga' ),
		'offcanvas-menu'   => __( 'OffCanvas Menu', 'biorga' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 122,
		'height'      => 72,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'biorgaSetUp');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function biorgaWidgetsInit() 
{
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'biorga' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'biorga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'biorga' ),
		'id'            => 'footer',
		'description'   => __( 'Add widgets here to appear in your footer on blog posts and archive pages.', 'biorga' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'biorgaWidgetsInit' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since The Black UnCode 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function biorgaExcerptMore() 
{
	return '';
}
add_filter( 'excerpt_more', 'biorgaExcerptMore' );

function biorgaExcerptLength( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'biorgaExcerptLength', 999 );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since The Black UnCode 1.0
 */
function biorgaJavaScriptDetection() 
{
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'biorgaJavaScriptDetection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function biorgaPingBackHeader() 
{
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'biorgaPingBackHeader' );

/**
 * Deregister scripts
 */
function biorgaChangeJquery ()
{
	if (!is_admin()){
		// remove and change jquery
		wp_deregister_script( 'jquery' );
		// Add jQuery
		wp_register_script('jquery', DIR_THEME . DS . "assets/js/vendor/jquery.min.js", array(), '3.2.1', false);
		wp_enqueue_script('jquery');
	}
}
add_action( 'init', 'biorgaChangeJquery' );

/**
 * Enqueue scripts and styles.
 */

function biorgaScripts ()
{
	// Theme styles
	wp_enqueue_style( 'framework-style', DIR_THEME . DS . 'assets/css/theme.css', array(), '6.8' );
	wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), '5.6' );
	wp_enqueue_style( 'custom-icons', DIR_THEME . DS . 'assets/css/icons.css', array(), '1.0' );
	wp_enqueue_style( 'custom-style', DIR_THEME . DS . 'assets/css/rs.css', array(), '1.0' );
	wp_enqueue_style( 'font-barlow-condensed', 'https://fonts.googleapis.com/css?family=Barlow+Condensed:400,400i,500,700,700i');
	wp_enqueue_style( 'font-Catamaran', 'https://fonts.googleapis.com/css?family=Catamaran:400,500,700');
	wp_enqueue_style( 'font-dancing-script', 'https://fonts.googleapis.com/css?family=Dancing+Script:400,700');


	// Theme scripts
	wp_enqueue_script('what-input', DIR_THEME . DS . "assets/js/vendor/what-input.min.js", array('jquery'), '4.1.6', true);
	wp_enqueue_script('framework-script', DIR_THEME . DS . "assets/js/vendor/foundation.min.js", array('jquery'), '6.5', true);
	wp_enqueue_script( 'TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js', array(), '2.0.2', true );
	wp_enqueue_script('scripts', DIR_THEME . DS . "assets/js/theme.js", array('jquery'), '1.1.0', true);
}
add_action( 'wp_enqueue_scripts', 'biorgaScripts' );

// Includes Theme
// ---------------
require get_parent_theme_file_path( 'includes/theme_helper.php' );
require get_parent_theme_file_path( 'includes/theme-topbar-walker.php' );
require get_parent_theme_file_path( 'includes/theme-acordeon-walker.php' );
require get_parent_theme_file_path( 'includes/theme-shortcodes.php' );
require get_parent_theme_file_path( 'includes/custom_post_types.php' );
require get_parent_theme_file_path( 'includes/breadcrumbs.php' );