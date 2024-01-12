<?php
/**
 * Dsignfly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dsignfly
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
function dsignfly_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Dsignfly, use a find and replace
		* to change 'dsignfly' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dsignfly', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'dsignfly' ),
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
			'dsignfly_custom_background_args',
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
add_action( 'after_setup_theme', 'dsignfly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dsignfly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dsignfly_content_width', 640 );
}
add_action( 'after_setup_theme', 'dsignfly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dsignfly_widgets_init() {
	register_sidebar(
		array(
			'id'            => 'sidebar-1',
			'name'          => esc_html__( 'Sidebar', 'dsignfly' ),
			'description'   => esc_html__( 'Add widgets here.', 'dsignfly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => "</h2><h1>Hii</h1>\n",
		)
	);
}
add_action( 'widgets_init', 'dsignfly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dsignfly_scripts() {
	wp_enqueue_style( 'dsignfly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dsignfly-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dsignfly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsignfly_scripts' );

/**
 * Add a class to the active menu item
 *
 * @param  $classes
 * @param  $item
 */
function add_active_class( $classes, $item ) {
	if ( 0 == $item->menu_item_parent && in_array( 'current-menu-item', $classes ) ) {
		$classes[] = 'active';
	}
	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_active_class', 10, 2 );

add_filter(
	'excerpt_length',
	function () {
		return 25;
	}
);

function custom_portfolio_post_type() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'dsignfly' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'dsignfly' ),
		'menu_name'          => _x( 'Portfolio', 'admin menu', 'dsignfly' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'dsignfly' ),
		'add_new'            => _x( 'Add New', 'project', 'dsignfly' ),
		'add_new_item'       => __( 'Add New Project', 'dsignfly' ),
		'new_item'           => __( 'New Project', 'dsignfly' ),
		'edit_item'          => __( 'Edit Project', 'dsignfly' ),
		'view_item'          => __( 'View Project', 'dsignfly' ),
		'all_items'          => __( 'All Projects', 'dsignfly' ),
		'search_items'       => __( 'Search Projects', 'dsignfly' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'dsignfly' ),
		'not_found'          => __( 'No projects found.', 'dsignfly' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'dsignfly' ),
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'dsignfly' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'portfolio', $args );
}

add_action( 'init', 'custom_portfolio_post_type' );


/**
 * Load Custom Comments Layout file.
 */
require get_template_directory() . '/inc/comments-helper.php';

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
