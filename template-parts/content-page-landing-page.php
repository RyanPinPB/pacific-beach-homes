<?php
/**
 * Template Name: Landing Page Template
 * 
 * Template part for displaying the "landing page" template page content in page.php
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
                <style>
                    .landing-page-options {
                        width: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-wrap: wrap;
                        gap:3rem;
                    }
                    .homes-for-sale {
                        background-image: url("https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/button/oceanfront-house.jpg");
                    }
                    .home-valuation {
                        background-image: url("https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/button/crystal-pier.jpg");
                    }
                    .learn-buying {
                        background-image: url("https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/button/house-with-pool.jpg");
                    }
                    .learn-selling {
                        background-image: url("https://pacificbeachhomes.com/wp-content/themes/pacific-beach-homes/assets/images/button/crystal-pier-aeriel.jpg");
                    }
                    .landing-page-button-background {
                        display: -webkit-flex;
                        display: flex;
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        width: 100%;
                        text-align: center;
                        height: 300px;
                        -webkit-justify-content: center;
                        justify-content: center;
                        -webkit-align-items: center;
                        align-items: center;
                        white-space: normal;
                        margin-bottom:10px;
                    }

                    @media (min-width: 650px) {
                        .landing-page-button-background {
                            margin-bottom:unset;
                            height: 400px;
                            width: 47%;
                            transition: -webkit-transform .3s ease-in-out;
                            transition: transform .3s ease-in-out;
                            transition: transform .3s ease-in-out,-webkit-transform .3s ease-in-out;
                        }

                        .landing-page-button-background:hover {
                            transform: scale(1.01);
                        }
                    }
                </style>

                <section class="landing-page-options">
                <div class="landing-page-button-background homes-for-sale"><a class="site-button" href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&amp;sort=importdate&amp;status=A&amp;utm_source=OTHERWEB&amp;utm_campaign=PacificBeachHomes&amp;mdv=5&amp;mpv=5&amp;utm_medium=referral" rel="nofollow noopener" target="_blank">View homes for sale</a></div>
                <div class="landing-page-button-background home-valuation"><a class="site-button-blue" href="https://pearson.lajollaagent.com/home-valuation/" target="_blank" rel="nofollow noopener">What's my home worth?</a></div>
                <div class="landing-page-button-background learn-buying"><a class="site-button" href="https://pacificbeachhomes.com/buying-a-home-in-pacific-beach/">Learn about buying</a></div>
                <div class="landing-page-button-background learn-selling"><a class="site-button-blue" href="https://pacificbeachhomes.com/selling-a-home-in-pacific-beach/">Learn about selling</a></div>
                </section>
                <a class="site-button" href="/testimonials/" style="display:flex;justify-content:center;font-size:22.5px;">Read our reviews</a>

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
// get_sidebar();
?>

<script>document.querySelector('.banner-text-internal').innerText = 'PB';
setTimeout(() => {
    document.querySelector('.sell-alert').style.transform = "translateY(0%)"
}, 15000);
function closeAlert() {
    document.querySelector('.sell-alert').style.transform = "translateY(100%)"
}
</script>
<div class="sell-alert">
    <a aria-label="Call Pacific Beach Homes" href="tel:8587408495" class="alert-phone">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.5 17.311l-1.76-3.397-1.032.505c-1.12.543-3.4-3.91-2.305-4.497l1.042-.513-1.747-3.409-1.053.52c-3.601 1.877 2.117 12.991 5.8 11.308l1.055-.517z"/></svg>
    </a>
    <a href="#footer" class="alert-content">
        <button class="sell-alert-cta" type="button" onclick="closeAlert()">FREE CONSULTATION</button>
    </a>
    <button type="button" onclick="closeAlert()" class="alert-close">X</button>
</div>
<style>
    .sell-alert {
        position:fixed;
        z-index:1000;
        box-shadow:0px 0px 4px 2px rgba(0,0,0,.5);
        bottom:0;
        left:0;
        display:flex;
        padding:20px 10px 40px 10px;
        justify-content:flex-end;
        align-content:center;
        width:100%;
        background:var(--orange);
        transform:translateY(100%);
        transition:transform .3s ease-in-out;
    }
    .alert-phone {
        height:40px;
        width:40px;
    }
    .alert-phone svg {
        height:40px;
        width:40px;
        border-radius:50%;
        background:var(--blue);
        fill:var(--white);
    }
    .alert-content {
        margin:auto;
        height:40px;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .alert-content:hover {
        text-decoration:none;
    }
    .sell-alert-cta {
        border:none;
        display:flex;
        justify-content:center;
        align-items:center;
        height:40px;
        font-family: 'Poppins';
        color:white;
        font-size:1.8rem;
        font-size:clamp(1.6rem, 2.5vw, 2rem);
        background:var(--blue);
        border-radius:20px;
        padding:10px 20px;
    }
    .alert-close {
        height:40px;
        width:40px;
        border-radius:50%;
        font-size:1.5rem;
        box-shadow:unset;
        color:rgba(255,255,255,.5);
    }
    @media (min-width: 768px) {
        .sell-alert {
            padding:20px 20px 20px 20px;
        }
    }
</style>

<?php
get_footer();