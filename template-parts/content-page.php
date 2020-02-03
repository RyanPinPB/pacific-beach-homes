<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PacificBeachHomes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">

		<div class="properties">
			<div class="propContainer">
				<div class="prop1">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop2">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop3">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop4">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop5">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
		</div>

		<a class="viewHomes" href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes for sale in Pacific Beach</a>

		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pacificbeachhomes' ),
			'after'  => '</div>',
		) );
		?>

		<a class="viewHomes" href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes for sale in Pacific Beach</a>

		<div class="properties">
			<div class="propContainer">
				<div class="prop6 lazy">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop7 lazy">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop8 lazy">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop9 lazy">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
			<div class="propContainer">
				<div class="prop10 lazy">
					<div class="overlay">
						<a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" target="blank">View homes</a>
					</div>
				</div>
			</div>
		</div>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'pacificbeachhomes' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
