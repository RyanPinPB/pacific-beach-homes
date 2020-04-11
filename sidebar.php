<?php
/**
 * The sidebar containing the main widget area
 * 
 * If the page has a category (a post page or blog page) this will give the post: sidebar-2 
 * Sidebar-2 is a sidebar with post information.
 * If the page has no category, the page will be given sidebar-1, which has page info.
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PacificBeachHomes
 */

?>
<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'pacificbeachhomes' ); ?>">
	<div class="sidebar-container">
		<?php
		if ( is_404() ) {
			dynamic_sidebar( 'sidebar-1' );
		}elseif ( has_category() ) {
			dynamic_sidebar( 'sidebar-2' );
		}else{ 
			dynamic_sidebar( 'sidebar-1' );
		}
		?>
	</div>
</aside> <!-- #secondary -->
