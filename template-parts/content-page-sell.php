<?php
/**
 * Template Name: Sell Template
 * 
 * Template part for displaying the "buy" template page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PacificBeachHomes
 */

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
                
                <h3>
                    <a href="#footer">Schedule a consultation with us today to help make this process as easy and fast as you want</a>
                </h3>
                <a class="site-button-blue" href="https://pearson.lajollaagent.com/home-valuation/" target="_blank" rel="nofollow noopener">How much is my home worth?</a>

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
get_sidebar();
?>

<script>document.querySelector('.banner-text-internal').innerText = 'SELL';
setTimeout(() => {
    document.querySelector('.sell-alert').style.transform = "translateY(0%)"
}, 20000);
function closeAlert() {
    document.querySelector('.sell-alert').style.transform = "translateY(100%)"
}
</script>
<div class="sell-alert" style="position:fixed;z-index:1000;box-shadow:0px 0px 4px 2px rgba(0,0,0,.5);bottom:0;left:0;display:flex;padding:20px;justify-content:flex-end;align-content:center;width:100%;background:var(--orange);transform:translateY(100%);transition:transform .3s ease-in-out;">
    <a href="#footer" class="alert-content" style="margin:auto;height:40px;display:flex;justify-content:center;align-items:center;"><button type="button" onclick="closeAlert()" style="border:none;display:flex;justify-content:center;color:white;font-size:1.8rem;background:var(--blue);border-radius:20px;padding:10px 20px;">FREE CONSULTATION</button></a>
    <button type="button" onclick="closeAlert()" class="alert-close" style="height:40px;width:40px;border-radius:50%;font-size:1.5rem;box-shadow:unset;color:rgba(255,255,255,.5);">X</button>
</div>
<style>
    .alert-content:hover {
        text-decoration:none;
    }
</style>

<?php
get_footer();