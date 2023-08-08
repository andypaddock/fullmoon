<?php
/**
 * Campi Ya Kanzi functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package full_moon
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function campiyakanzi_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Campi Ya Kanzi, use a find and replace
		* to change 'campiyakanzi' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'campiyakanzi', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'campiyakanzi' ),
		)
	);
	register_nav_menus(
    array(
      'mobile-menu' => __('Mobile Menu')
    )
  );
register_nav_menus(
    array(
      'off-menu' => __('Off Canvas Menu')
    )
  );
  register_nav_menus(
    array(
      'quick' => __('Quick Links')
    )
  );
  register_nav_menus(
    array(
      'conservation' => __('Conservation Menu')
    )
  );
  register_nav_menus(
    array(
      'main-links' => __('Main Links')
    )
  );
  register_nav_menus(
    array(
      'sub' => __('Sub Pages')
    )
  );


	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'campiyakanzi_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'campiyakanzi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function campiyakanzi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'campiyakanzi_content_width', 640 );
}
add_action( 'after_setup_theme', 'campiyakanzi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function campiyakanzi_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'campiyakanzi' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'campiyakanzi' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'campiyakanzi_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function campiyakanzi_scripts() {
	wp_enqueue_style('campiyakanzi-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
	wp_enqueue_script('campiyakanzi-core-js', get_template_directory_uri() . '/js/compiled.js', array('jquery'), filemtime(get_stylesheet_directory() . '/js/compiled.js'), true);
}
add_action( 'wp_enqueue_scripts', 'campiyakanzi_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}

add_action('after_setup_theme', 'silver_hero_image');
function silver_hero_image()
{
  add_image_size('hero-image', 1920); // 1920 pixels wide (and unlimited height)
}

add_post_type_support( 'page', 'excerpt' );

function campiyakanzi_dashboard_widget() {
	global $wp_meta_boxes;
	wp_add_dashboard_widget('custom_help_widget', 'campiyakanzi Support', 'campiyakanzi_dashboard_help');
}

function campiyakanzi_dashboard_help() {
	echo file_get_contents(__DIR__ . "/admin-settings/dashboard.html");
}

function campiyakanzi_custom_fonts() {
	echo '<style type="text/css">' . file_get_contents(__DIR__ . "/admin-settings/style-admin.css") . '</style>';
}


show_admin_bar(false);

 //Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );



// add google maps API key for ACF

function my_acf_init()
{

	acf_update_setting('google_api_key', 'AIzaSyDMoZWtHGaeWcZ4Tbh1NvPDP-H1IniquP0');
}

add_action('acf/init', 'my_acf_init');