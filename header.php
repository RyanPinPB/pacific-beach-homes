<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PacificBeachHomes
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125122385-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-125122385-1');
	</script>
	<meta charset="UTF-8">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Coda:400,800&display=swap" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Ryan Pearson">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.png">
	<!-- <link rel="manifest" href="/manifest.json" async> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pacificbeachhomes' ); ?></a>
		<?php if ( is_front_page() ) : ?>
			<section id="banner" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/backgrounds/background.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 100vh; position: relative; width:100%; z-index: 3;">
		<?php else: ?>
			<section id="banner-internal" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/backgrounds/backgroundInternal.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 35vh; position: relative; width:100%; z-index: 3;">
		<?php endif; ?>
			<header id="masthead" class="site-header header">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$pacificbeachhomes_description = get_bloginfo( 'description', 'display' );
					if ( $pacificbeachhomes_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $pacificbeachhomes_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<!-- laptop and desktop menu -->
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>

					<!-- mobile menu with hamburger  -->
					<div class="mobileMenu">
						<?php
						wp_nav_menu( array(
							'menu'				=> 'Mobile',
							'container_class'	=> 'mobileMenu-content'
						) );
						?>
					</div>
					<div class="menu-icon">
						<div class="hamburger"></div>
						<div class="hamburgertext">MENU</div>
					</div>

				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		<?php if ( is_front_page() ) : ?>
			<span class="banner-text">Welcome to Pacific Beach</span>
		<?php else:  ?>
			<span class="banner-text-internal stickyMenuStart"><?php single_post_title(); ?></span>
		<?php endif; ?>
		</section>

		<?php if ( is_front_page() ) : ?>
			<div id="content" class="site-content">
		<?php else:  ?>
			<div id="content" class="site-content internal-page">
		<?php endif; ?>
