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
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', [], null, 'true');
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
add_action('wp_print_styles', 'my_deregister_styles', 100);

function my_deregister_styles() {
  wp_deregister_style('dashicons');
  wp_deregister_style('admin-bar');
  wp_deregister_style('frm_fonts');
  wp_deregister_style('wp-block-library');
  wp_deregister_style('yoast-seo-adminbar');
}


//enqueue style in footer instead of head
function prefix_add_footer_styles() {
	if ( $_SERVER['SERVER_NAME'] === 'localhost' || strpos($_SERVER['SERVER_NAME'], '.local') !== false ) :
		$path = '//127.0.0.1:3000';
	else :
		$path = get_stylesheet_directory_uri();
	endif;
    wp_enqueue_style( 'custom-style', $path . '/assets/css/main.bundle.css');
};
add_action( 'get_footer', 'prefix_add_footer_styles' );

//add inline styles
function hook_css() {
    ?>
	<style type="text/css">a,h3{color:var(--blue)}.main-navigation a,a,a.mobile-button:hover{text-decoration:none}@font-face{font-family:Poppins;font-style:normal;font-weight:400;src:url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-regular.eot);src:local('Poppins Regular'),local('Poppins-Regular'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-regular.eot?#iefix) format('embedded-opentype'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-regular.woff2) format('woff2'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-regular.woff) format('woff'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-regular.ttf) format('truetype'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-regular.svg#Poppins) format('svg');font-display:swap}@font-face{font-family:Poppins;font-style:normal;font-weight:700;src:url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-700.eot);src:local('Poppins Bold'),local('Poppins-Bold'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-700.eot?#iefix) format('embedded-opentype'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-700.woff2) format('woff2'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-700.woff) format('woff'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-700.ttf) format('truetype'),url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/fonts/poppins-v9-latin-700.svg#Poppins) format('svg');font-display:swap}:root{--headerFont:'Poppins',sans-serif;--bodyFont:'Roboto',Helvetica;--blue:rgba(0, 174, 239,1);--blueAccent:rgba(0, 120, 163,1);--orange:rgba(240, 124, 0, 1);--white:rgba(255,255,255,1);--black:rgba(0,0,0,1)}*{margin:0;padding:0;box-sizing:border-box}html{font-size:10px}h1,h2{font-size:3.6rem}body{font-family:var(--bodyFont)}h1,h2,h3{line-height:1.2em;font-family:var(--headerFont)}.site-content{position:relative;background:var(--white);z-index:3}.clearfix::after{content:"";clear:both;display:table}h1{text-align:center;font-weight:700;margin:20px 10px;background:-webkit-linear-gradient(var(--blueAccent),var(--blue));background-clip:border-box;-webkit-background-clip:text;-webkit-text-fill-color:transparent}.mobile-text,h2,h3{font-weight:400}h2{color:var(--orange);margin:40px 10px 30px}h3{font-size:2.7rem;margin:25px 15px}p,ul{font-size:2.25rem;font-family:var(--bodyFont)}p{margin-top:20px;line-height:1.6}ul{list-style:none;margin:0 0 0 1.5em}#masthead,.mobile-text{font-family:var(--headerFont)}.screen-reader-text{border:0;clip:rect(1px,1px,1px,1px);clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute!important;width:1px;word-wrap:normal!important}a#scroll{display:none}#masthead{position:fixed;top:0;background:rgba(0,120,163,0);display:flex;flex-direction:row;justify-content:space-between;align-items:center;width:100%;transition:all .3s ease-in;z-index:100}#masthead.is-visible{opacity:1;transform:translate(0,0);-webkit-transform:translate(0,0);transition:transform .3s,background .3s,color .3s,opacity 0 .3s;-webkit-transition:-webkit-transform .3s,background .3s,color .3s}.nav-container{width:100%;display:flex;flex-direction:row;justify-content:space-between;align-items:center}.site-branding{display:none;align-items:center;margin:10px}.site-branding a{max-width:400px;height:auto;max-height:80px;cursor:pointer;transition:transform .3s ease-in-out}.site-branding a .custom-logo{max-width:100%;height:auto}.main-navigation{display:flex;flex-direction:row;width:100%;align-items:center;justify-content:space-evenly}.menu-main-container{display:none}a.mobile-button{display:flex;flex-direction:column;align-items:center;justify-content:center;flex:1 1 auto;height:80px;transition:opacity .8s}a.mobile-button.hidden{opacity:0}.mobile-icon-container{height:34px;margin:0}.mobile-icon{height:100%;fill:var(--white)}.mobile-text{display:flex;justify-content:center;align-items:center;color:var(--white);font-size:1.75rem}.mobileMenu,a.menu-icon{flex-direction:column;display:flex}.wrap{background-color:var(--white)}.front-banner{background-image:url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/backgrounds/background.jpg);background-position:center;background-size:cover;background-repeat:no-repeat;height:100vh;height:calc(var(--vho,1vh) *100);position:relative;width:100%;z-index:4}.front-banner::after{position:absolute;bottom:0;left:0;content:'';width:100%;height:10%;background:-webkit-linear-gradient(top,rgba(0,0,0,0) 0,rgba(0,0,0,.95) 80%,rgba(0,0,0,1) 100%);background:linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.95) 80%,rgba(0,0,0,1) 100%)}.banner-top,.internal-banner{background-position:center;background-size:cover;background-repeat:no-repeat}.banner-top{background-image:url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/backgrounds/background-top.png);position:absolute;width:100%;height:100%;z-index:5}.internal-banner{background-image:url(https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/backgrounds/backgroundInternal.jpg);height:200px;position:relative;width:100%;z-index:3}.banner-text,.banner-text-internal{position:absolute;width:100%;left:0;font-family:var(--headerFont);font-weight:400;color:var(--white);text-align:center}.banner-text{font-size:4.7rem;margin:auto;line-height:1;top:23%;transition:font-size .3s ease-in-out,opacity 1s ease-in-out;opacity:0}.banner-text-internal{top:67%;font-size:11rem;transform:translate3d(0,-50%,0);opacity:.2;text-shadow:0 0 5px var(--black);overflow:hidden}.mobileMenu{height:calc(var(--vh,1vh) * 100);width:0;position:fixed;z-index:19;left:0;top:0;justify-content:space-between;background-color:#000;background-color:rgba(0,120,163,.9);overflow:hidden;transition:.8s}a.menu-icon{position:relative;flex:1 1 auto;justify-content:center;height:80px;cursor:pointer;z-index:20}.hamburgerContainer{display:flex;flex-direction:column;align-items:center;justify-content:center;height:34px;margin:0}.hamburger,.hamburger:after,.hamburger:before{background:#fff;height:3px;box-shadow:0 2px 5px rgba(0,0,0,.2)}.hamburger{position:relative;width:40px;transition:.8s}.hamburger:after,.hamburger:before{content:'';position:absolute;right:0;left:0;margin:auto;width:30px;transition:.8s,transform .8s;z-index:8}.hamburger:before{top:-10px}.hamburger:after{top:10px}.hamburgertext{font-family:var(--headerFont);font-size:1.75rem;font-weight:400;color:var(--white);transition:.8s;text-align:center}@media (min-width:769px){a.menu-icon{display:none}#masthead.is-visible{opacity:1;transform:translate(0,0);-webkit-transform:translate(0,0);transition:transform .3s,background .3s,color .3s,opacity 0 .3s;-webkit-transition:-webkit-transform .3s,background .3s,color .3s}.site-branding{display:flex;margin:10px 10px 10px 15px}.main-navigation{margin:10px 15px 10px 10px;justify-content:flex-end}a.mobile-button{display:none}.menu-main-container{display:flex;flex-direction:row;align-items:center;justify-content:flex-end}.menu-main-container ul{display:flex;justify-content:space-between}.menu-main-container li{font-size:2.15rem;padding:0 1.4rem;font-family:var(--headerFont)}.menu-main-container a{text-decoration:none;color:var(--white);font-weight:700;letter-spacing:.5px}.banner-text{font-size:7.2rem}.container-banner-text{top:45%}.internal-banner{min-height:25vh}.banner-text-internal{top:65%;font-size:15rem}}@media (min-width:1025px){.menu-main-container li{font-size:2.7rem}.banner-text{font-size:8.1rem}}@media (min-width:1350px){.internal-banner{min-height:30vh}.banner-text-internal{top:65%;font-size:20rem}}@media (min-width:1600px){.nav-container{max-width:1600px;margin:auto}}</style>
    <?php
}
add_action('wp_head', 'hook_css');



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