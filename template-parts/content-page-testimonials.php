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
<style>.testimonials-page-container{display:flex;flex-direction:row;flex-wrap:wrap}.testimonials-page-item{position:relative;flex:1 1 100%;margin:5px 10px}.testimonials-page-item::before{content:"";display:block;background-color:transparent;height:6px;width:0;margin:30px 0;background-image:radial-gradient(var(--blue) 50%,transparent 55%,transparent 100%),radial-gradient(var(--blueAccent) 50%,transparent 55%,transparent 100%),radial-gradient(var(--blue) 50%,transparent 55%,transparent 100%),linear-gradient(-90deg,transparent 0,transparent 32px,var(--blue) 32px,var(--blueAccent) 100%);background-size:8px 8px,8px 8px,8px 8px,100% 2px;background-repeat:no-repeat,no-repeat,no-repeat,repeat-x;background-position:right -1px center,right 10px center,right 20px center,right center;-moz-transition:1s ease-in-out all .1s;-webkit-transition:1s ease-in-out all .1s;transition:1s ease-in-out all .1s}.testimonials-page-item.visible::before{width:50%}.testimonial-icon{position:absolute;display:flex;top:-5px;left:50%;transform:translateX(-8px);fill:url(#testimonial-icon);opacity:0;transition:opacity 1s ease-in-out 1.1s}.testimonials-page-item.visible .testimonial-icon{opacity:1}.testimonials-page-item .testimonial-header:before{color:var(--blueAccent)}.testimonials-page-item .testimonial-header:after{color:var(--blueAccent)}.testimonials-page-item .testimonial-header{display:flex;justify-content:center;padding:10px 15px 15px 15px}@media (min-width:769px){.testimonials-page-container{margin:15px}.testimonials-page-item{margin:30px 0;padding:0 60px 60px 60px;border:solid rgba(0,120,163,0) 2px;transition:border-color 1s ease-in-out 1.1s}.testimonials-page-item.visible{border:solid #0078a3 2px}.testimonials-page-item::before{margin:60px 0 30px 0}.testimonial-icon{top:25px}}@media (min-width:1025px){.testimonials-page-item{flex:1 1 40%;margin:30px}}</style>
<?php
get_header();
?>
    <script>document.querySelector('.banner-text-internal').innerText = 'REVIEWS';</script>
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
                        '<div class="testimonials-page-item">
                            <svg class="testimonial-icon" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
                            <linearGradient id="testimonial-icon" gradientTransform="rotate(135)">
                            <stop offset="5%" stop-color="#0078a3"></stop>
                            <stop offset="95%" stop-color="#00aeef"></stop>
                            </linearGradient><path d="M22 3v13h-11.643l-4.357 3.105v-3.105h-4v-13h20zm2-2h-24v16.981h4v5.019l7-5.019h13v-16.981zm-5 6h-14v-1h14v1zm0 2h-14v1h14v-1zm-6 3h-8v1h8v-1z"/></svg>
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