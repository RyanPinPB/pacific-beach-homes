<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PacificBeachHomes
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div class="not-found-container" style="position: relative; width: 75%; min-width:300px; max-width:600px; margin: 20px auto;">
						<div class="not-found-image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/other/laugh.png'); background-size: cover; background-position: center; width:100%; padding-bottom:66%;"></div>
						<h2 class="not-found-text" style="position:absolute; color: white; bottom: 0; font-size: 20px; font-weight:700; text-align:center; text-shadow: 0px 0px 2px black; margin: 0px; ">"I need a house with 4 bedrooms, close to the beach, for under $350,000"</h2>
					</div>
					<h1 class="page-title"><?php esc_html_e( 'Sorry! We can&rsquo;t find what you are looking for.', 'pacificbeachhomes' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below, or a search?', 'pacificbeachhomes' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'pacificbeachhomes' ); ?></h2>
						<ul>
							<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
							?>
						</ul>
					</div><!-- .widget -->

					<?php
					/* translators: %1$s: smiley */
					$pacificbeachhomes_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'pacificbeachhomes' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$pacificbeachhomes_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
