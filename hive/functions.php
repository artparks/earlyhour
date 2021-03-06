<?php
/**
 * Hive functions and definitions
 *
 * @package Hive
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 940; /* pixels */
}

if ( ! function_exists( 'hive_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hive_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'hive_txtd', get_template_directory() . '/languages' );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'hive-masonry-image', 450, 9999, false );
		add_image_size( 'hive-single-image', 1024, 9999, false );
		add_image_size( 'hive-site-logo', 1000, 500, false );

		// This theme uses wp_nav_menu() in three locations.
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'hive_txtd' ),
			'footer'    => __( 'Footer Menu', 'hive_txtd' ),
			'social'    => __( 'Social Menu', 'hive_txtd' ),
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
			'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'image',
			'audio',
			'video',
			'quote',
			'link',
			'status',
			'chat'
		) );

		/*
		 * Add editor custom style to make it look more like the frontend
		 * Also enqueue the custom Google Fonts also
		 */
		add_editor_style( array( 'editor-style.css', hive_fonts_url() ) );

		/*
		 * Now some cleanup to remove features that we do not support
		 */
		remove_theme_support( 'custom-header' );
	}
endif; // hive_setup

add_action( 'after_setup_theme', 'hive_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hive_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hive_txtd' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

add_action( 'widgets_init', 'hive_widgets_init' );

/**
 * Filter the post titles
 *
 * Hooked to wp_loaded because we need to have access to theme mods
 */
function hive_filter_post_titles() {
	//make ultra mega nice post titles only if we are allowed to from Customizer > Theme Options
	if ( ! get_theme_mod( 'hive_disable_autostyle_titles' , false ) ) {
		add_filter( 'the_title', 'hive_auto_style_title' );
	}
}

add_action( 'loop_start', 'hive_filter_post_titles' );

/**
 * Enqueue scripts and styles.
 */
function hive_scripts_styles() {

	//FontAwesome Stylesheet
	wp_enqueue_style( 'hive-font-awesome-style', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.2.0' );

	//Main Stylesheet
	wp_enqueue_style( 'hive-style', get_template_directory_uri() . '/style.css', array('hive-font-awesome-style') );

	//Default Fonts
	wp_enqueue_style( 'hive-fonts', hive_fonts_url(), array(), null );

	//Enqueue jQuery
	wp_enqueue_script( 'jquery' );

	//Enqueue Masonry
	wp_enqueue_script( 'masonry' );

	//Enqueue ImagesLoaded plugin
	wp_enqueue_script( 'hive-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), '3.1.8', true );

	//Enqueue HoverIntent plugin
	wp_enqueue_script( 'hive-hoverintent', get_template_directory_uri() . '/assets/js/jquery.hoverIntent.js', array( 'jquery' ), '1.8.0', true );

	//Enqueue Velocity.js plugin
	wp_enqueue_script( 'hive-velocity', get_template_directory_uri() . '/assets/js/velocity.js', array(), '1.1.0', true );

	//Enqueue Hive Custom Scripts
	// wp_enqueue_script( 'hive-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery', 'masonry', 'hive-imagesloaded', 'hive-hoverintent', 'hive-velocity' ), '1.0.0', true );

	$js_url = ( is_ssl() ) ? 'https://v0.wordpress.com/js/videopress.js' : 'http://s0.videopress.com/js/videopress.js';
	wp_enqueue_script( 'videopress', $js_url, array( 'jquery', 'swfobject' ), '1.09' );

	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'hive_scripts_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Customify plugin configuration
 */
require get_template_directory() . '/inc/customify_config.php';

/**
 * Load Recommended/Required plugins notification
 */
require get_template_directory() . '/inc/required-plugins/required-plugins.php';

/**
 * Load the theme update logic
 */
require_once(get_template_directory() . '/inc/wp-updates-theme.php');
new WPUpdatesThemeUpdater_1219( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) ); ?>