<?php
/*
 * Template Name: Testimonials
 * 
 * Template part for displaying the "testimonials" template page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PacificBeachHomes
 */
if (get_field('testimonials')) {
    $testimonials = get_field('testimonials');
}
?>
<style>.testimonial-page-item {margin:30px 10px}
.testimonial-page-item::before {
    content: "";
    display: block;
    background-color: transparent;
    height: 6px;
    width: 0px;
    margin: 30px 5px;
    background-image: radial-gradient($blue 50%, transparent 55%, transparent 100%), radial-gradient($blueAccent 50%, transparent 55%, transparent 100%), radial-gradient($blue 50%, transparent 55%, transparent 100%), linear-gradient(-90deg, transparent 0, transparent 32px, $blue 32px, $blueAccent 100%);
    background-size: 8px 8px, 8px 8px, 8px 8px, 100% 2px;
    background-repeat: no-repeat, no-repeat, no-repeat, repeat-x;
    background-position: right -1px center, right 10px center, right 20px center, right center;
    -moz-transition: 1s ease-in-out all 0.1s;
    -webkit-transition: 1s ease-in-out all 0.1s;
    transition: 1s ease-in-out all 0.1s;
}

.testimonial-page-item.visible::before {
    width: 230px;
}
</style>
<?php
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

        <?php
		while ( have_posts() ) :
			the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pacificbeachhomes' ),
                        'after'  => '</div>',
                    ) );
                    ?>

                <div class="testimonials-page-container">
                    <?php foreach($testimonials as $testimonial) { echo
                        '<div class="testimonial-page-item">
                            <q class="testimonial-header">' . $testimonial['testimonial_headline'] . '</q>
                            <p class="testimonial-quote">' . $testimonial['testimonial_content'] . '</p>
                            <span class="testimonial-author">' . $testimonial['testimonial_author'] . '</span>
                        </div>';}
                    ?>
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
            <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();