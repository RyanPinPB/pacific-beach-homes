<?php
/*
 * Template Name: Agent
 * 
 * Template part for displaying the "Agent" template page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PacificBeachHomes
 */
if (get_field('agent_name')) {
    $agent_name = get_field('agent_name');
}
if (get_field('agent_title')) {
    $agent_title = get_field('agent_title');
}
if (get_field('agent_bio')) {
    $agent_bio = get_field('agent_bio');
}
if (get_field('agent_image')) {
    $agent_image = get_field('agent_image');
}
if (get_field('agent_background')) {
    $agent_background = get_field('agent_background');
}
?>
<style>.agents-page-container{display:flex;flex-direction:column;margin:auto;width:100%;max-width:1600px}.agent-pic-container{width:90%;max-width:350px;margin:auto;height:auto}.agent-page-header{display:flex;flex-direction:column;width:100%}.agent-details{display:flex;flex-direction:column;justify-content:center;align-items:center}.agent-title{margin:0}.agent-page-body{display:flex;flex-direction:column}.agent-page-col-2{display:flex;flex-direction:column;align-items:center}@media (min-width:1025px){.site-main .entry-content{margin-top:55px}.site-content.internal-page{padding:0 55px}.agents-page-container{flex-direction:row;flex-wrap:wrap}.agent-page-header{flex-direction:row;width:100%}.agent-details{display:flex;flex:1 1 75%;justify-content:center;align-items:center}.agent-pic-container{flex:1 1 25%;max-width:300px}.agent-page-body{display:flex;flex-direction:row-reverse}.agent-page-col-1{flex:1 1 75%;padding-left:55px}.agent-page-col-2{flex:1 1 25%;max-width:300px;margin-top:55px}.agent-background{border-right:solid 5px var(--orange);padding-right:20px}}@media (min-width:1350px){.internal-page .content-area{margin-left:40px}}</style>
<?php
get_header();
?>
    <script>document.querySelector('.banner-text-internal').innerText = 'AGENT';</script>
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

                <div class="agents-page-container">
                    <div class="agent-page-header">
                        <figure class="agent-pic-container">
                            <img class="agent-pic" src="<?=$agent_image?>" style="width:100%;" />
                        </figure>
                        <div class="agent-details">
                            <h1 class="agent-name"><?=$agent_name?></h1>
                            <h2 class="agent-title"><?=$agent_title?></h2>
                        </div>
                    </div>
                    <div class="agent-page-body">
                        <div class="agent-page-col-1">
                            <div class="agent-bio"><?=$agent_bio?></div>
                        </div>
                        <div class="agent-page-col-2">
                            <!-- <h2 class="agent-title"><?=$agent_title?></h2> -->
                            <div class="agent-background"><?=$agent_background?></div>
                        </div>
                    </div>
                    <!-- <a href="/contact-us/" class="contact-ryan viewHomes">Contact Ryan</a> -->
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