<?php
/**
 * PacificBeachHomes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PacificBeachHomes
 */

if ( ! function_exists( 'pacificbeachhomes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pacificbeachhomes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on PacificBeachHomes, use a find and replace
		 * to change 'pacificbeachhomes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pacificbeachhomes', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'pacificbeachhomes' ),
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
		add_theme_support( 'custom-background', apply_filters( 'pacificbeachhomes_custom_background_args', array(
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
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pacificbeachhomes_setup' );

// creates 'options' section in wp admin menu and puts advanced custom fields inside of this section
if ( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	acf_add_options_sub_page('Contact Info');
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pacificbeachhomes_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pacificbeachhomes_content_width', 640 );
}
add_action( 'after_setup_theme', 'pacificbeachhomes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pacificbeachhomes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Pages', 'pacificbeachhomes' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here that will show up on pages', 'pacificbeachhomes' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Posts', 'pacificbeachhomes' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here that will show up on posts', 'pacificbeachhomes' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'pacificbeachhomes' ),
		'id'            => 'footer-menu',
		'description'   => esc_html__( 'Add menu that will show up in footer column', 'pacificbeachhomes' ),
		'before_widget' => '<section class="footer-menu">',
		'after_widget'  => '</section>',
		'before_title'  => '<strong class="footer-menu-title">',
		'after_title'   => '</strong>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Resources', 'pacificbeachhomes' ),
		'id'            => 'footer-resources',
		'description'   => esc_html__( 'Add resources that will show up in footer column', 'pacificbeachhomes' ),
		'before_widget' => '<section class="footer-resources">',
		'after_widget'  => '</section>',
		'before_title'  => '<strong class="footer-resources-title">',
		'after_title'   => '</strong>',
	) );

}
add_action( 'widgets_init', 'pacificbeachhomes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pacificbeachhomes_scripts() {
	// if ( $_SERVER['SERVER_NAME'] === 'localhost' || strpos($_SERVER['SERVER_NAME'], '.local') !== false ) :
	// 	$path = '//127.0.0.1:3000';
	// 	wp_enqueue_style( 'custom-style', $path . '/assets/css/main.bundle.css');
	// else :
	// 	$path = get_stylesheet_directory_uri();
	// 	wp_enqueue_style( 'custom-style', $path . '/assets/css/main.bundle.css');
	// endif;
	wp_enqueue_script( 'pacificbeachhomes-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], '20151215', 'true' );
	wp_enqueue_script( 'pacificbeachhomes-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', 'true' );
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', [], null, 'true');
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.bundle.js', ['jquery'], null, 'true' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pacificbeachhomes_scripts' );

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

//changes the Blog's author link to go to ryan's custom page
add_filter( 'author_link', 'new_author_link', 10, 1 );

function new_author_link( $link ) {      
    $link = 'https://pacificbeachhomes.com/ryan-pearson/';

    return $link;           
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//deregister plugin styles
// add_action('wp_print_styles', 'my_deregister_styles', 100);

// function my_deregister_styles() {
//   wp_deregister_style('dashicons');
//   wp_deregister_style('admin-bar');
//   wp_deregister_style('frm_fonts');
//   wp_deregister_style('wp-block-library');
//   wp_deregister_style('yoast-seo-adminbar');
// }


//enqueue style in footer instead of head
function prefix_add_footer_styles() {
	if ( $_SERVER['SERVER_NAME'] === 'localhost' || strpos($_SERVER['SERVER_NAME'], '.local') !== false ) :
		$path = '//127.0.0.1:3000' ;
	else :
		$path = get_stylesheet_directory_uri();
	endif;
    wp_enqueue_style( 'custom-style', $path . '/assets/css/main.bundle.css');
};
add_action( 'get_footer', 'prefix_add_footer_styles' );


//preload style sheets to defer stylesheets - doesn't work for firefox

// function add_rel_preload($html, $handle, $href, $media) {
    
//     if (is_admin())
//         return $html;

//      $html = <<<EOT
// <link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
// EOT;
//     return $html;
// }
// add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );