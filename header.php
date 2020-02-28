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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Coda:400,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Merriweather:300,400,700,900|Open+Sans:400,600,800|Poppins:400,700,900|Roboto:400,500&display=swap" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Ryan Pearson">
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.png">
	<!-- <link rel="manifest" href="/manifest.json" async> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pacificbeachhomes' ); ?></a>

		<header id="masthead" class="site-header header is-visible">
			<div class="site-branding">
				<?php
				the_custom_logo();
				?>
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
				<a class="mobile-button" href="/">
					<figure class="mobile-icon-container">
						<svg class="mobile-icon home" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20 7.093v-5.093h-3v2.093l3 3zm4 5.907l-12-12-12 12h3v10h18v-10h3zm-5 8h-14v-10.26l7-6.912 7 6.99v10.182zm-5-1h-4v-6h4v6z"/></svg>
					</figure>
					<div class="mobile-text">HOME</div>
				</a>
				<a class="mobile-button" href="/buy">
					<figure class="mobile-icon-container">
						<svg class="mobile-icon buy" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 4v6.406l-3.753 3.741-6.463-6.462 3.7-3.685h6.516zm2-2h-12.388l1.497 1.5-4.171 4.167 9.291 9.291 4.161-4.193 1.61 1.623v-12.388zm-5 4c.552 0 1 .449 1 1s-.448 1-1 1-1-.449-1-1 .448-1 1-1zm0-1c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm6.708.292l-.708.708v3.097l2-2.065-1.292-1.74zm-12.675 9.294l-1.414 1.414h-2.619v2h-2v2h-2v-2.17l5.636-5.626-1.417-1.407-6.219 6.203v5h6v-2h2v-2h2l1.729-1.729-1.696-1.685z"/></svg>
					</figure>
					<div class="mobile-text">BUY</div>
				</a>
				<a class="mobile-button" href="/sell">
					<figure class="mobile-icon-container">
						<svg class="mobile-icon sell" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M22 7h-19v11h-1v-12h20v1zm-2-2h-19v11h-1v-12h20v1zm-6 6c-1.656 0-3 1.344-3 3s1.344 3 3 3 3-1.344 3-3-1.344-3-3-3zm.15 4.484v.315h-.3v-.299c-.311-.005-.632-.079-.898-.217l.135-.493c.287.11.669.229.968.162.345-.078.415-.433.034-.604-.279-.129-1.133-.242-1.133-.973 0-.409.312-.775.895-.855v-.319h.301v.305c.217.006.461.043.732.126l-.108.493c-.23-.08-.485-.154-.733-.139-.446.026-.486.413-.174.575.514.242 1.182.42 1.182 1.063 0 .516-.404.791-.901.86zm-10.15-7.484v12h20v-12h-20zm18 8.018c-.959.42-1.395 1.022-1.814 1.982h-12.372c-.419-.959-.855-1.562-1.814-1.982v-4.036c.959-.42 1.395-1.022 1.814-1.982h12.371c.42.959.855 1.562 1.814 1.982v4.036z"/></svg>
					</figure>
					<div class="mobile-text">SELL</div>
				</a>
				<div class="menu-icon">
					<div class="hamburgerContainer">
						<div class="hamburger"></div>
					</div>
					<div class="hamburgertext">MENU</div>
				</div>

			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
		
		
		<?php if ( is_front_page() ) : ?>
			<section id="banner" class="frontBanner">
		<?php else: ?>
			<section id="banner" class="internal">
		<?php endif; ?>
			
		<?php if ( is_front_page() ) : ?>
			<span class="banner-text">Welcome to Pacific Beach</span>
			<div class="banner-top"></div>
		<?php else:  ?>
			<!-- <span class="banner-text-internal stickyMenuStart"></span> -->
		<?php endif; ?>
		</section>

		<?php if ( is_front_page() ) : ?>
			<div id="content" class="site-content">
		<?php else:  ?>
			<div id="content" class="site-content internal-page">
		<?php endif; ?>
