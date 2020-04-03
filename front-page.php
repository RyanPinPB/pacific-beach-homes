<?php 
if (get_field('selling_points')) {
    $selling_points = get_field('selling_points');
}

if (get_field('pb_homes_content')) {
    $pb_homes_content = get_field('pb_homes_content');
}

if (get_field('ryan_content')) {
    $ryan_content = get_field('ryan_content');
}

if (get_field('testimonials')) {
    $testimonials = get_field('testimonials');
}

if (get_field('service_content')) {
    $service_content = get_field('service_content');
}

if (get_field('phone_number', 'option')) {
    $phone_number = get_field('phone_number', 'option');
}

if (get_field('email_address', 'option')) {
    $email_address = get_field('email_address', 'option');
}

get_header() ?>

<section id="section1" class="selling-points owl-carousel">
    <?php foreach($selling_points as $selling_point) { echo
    '<div class="item selling-point sp1 flip-card">
        <div class="flip-card-inner">
            <div class="flip-card-front">
                <h3>' . $selling_point['selling_point_headline'] . '</h3>
            </div>
            <div class="flip-card-back">
                <span>' . $selling_point['selling_point_content'] . '</span>
            </div>
        </div>
    </div>';}
    ?>
</section>

<div id="contact-flag">
    <a href="#footer" class="flag-text">contact us today</a>
</div>

<!-- Content Section -->

<div class="mid-wrap clearfix">

    <section id="section2">
        <div class="content-wrap">
            <span class="zip-code">92109</span>
            <main class="content">
                <?= $pb_homes_content ?>
            </main>
        </div>
        <div class="sidebar-wrap">
            <div class="sidebar">
                <div class="lazy volleyball" role="img" aria-label="Volleyball in Mission Beach" title="Volleyball in Mission Beach"></div>
                <div class="lazy sunset" role="img" aria-label="Sunset view of Northern Pacific Beach" title="Sunset view of Northern Pacific Beach"></div>
                <div class="lazy pier" role="img" aria-label="Aeriel photo of Crystal Pier" title="Aeriel photo of Crystal Pier"></div>
                <div class="lazy surfimg" role="img" aria-label="Surfer catching barrel in Pacific Beach" title="Surfer catching barrel in Pacific Beach"></div>
                <div class="lazy wavesimg" role="img" aria-label="Waves in Pacific Beach" title="Waves in Pacific Beach"></div>
                <div class="lazy pier-sunset" role="img" aria-label="Crystal Pier sunset" title="Crystal Pier sunset"></div>
            </div>
        </div>
    </section>

    <section id="section3" class="image-buttons owl-carousel">
        <div class="item imagebutton pbsale lazy">
            <a href="https://pearson.lajollaagent.com/results-gallery/?postalcode=92109&sort=importdate&status=A&utm_source=OTHERWEB&utm_campaign=PacificBeachHomes&mdv=5&mpv=5&utm_medium=referral" target="blank">Pacific Beach real estate for sale</a>
        </div>

        <div class="item imagebutton homeworth lazy">
            <a href="https://pearson.lajollaagent.com/home-valuation/" target="blank">How much is my home worth?</a>
        </div>
    </section>

    <span class="local slide-up">Ryan Pearson is a local, born and raised in Pacific Beach, and is actively invested in the community.</span>
    <section id="section4">
        <div class="content-wrap2">
            <div class="content2">
                <?= $ryan_content ?>
            </div>
        </div>
    </section>

    <h2 class="testimonials-header slide-up">Client Testimonials</h2>
    <section class="testimonials-container">
        <div class="testimonials owl-carousel">
            <?php foreach($testimonials as $testimonial) { echo
                '<div class="item testimonial">
                    <q class="testimonial-header">' . $testimonial['testimonial_headline'] . '</q>
                    <p class="testimonial-quote">' . $testimonial['testimonial_content'] . '</p>
                    <span class="testimonial-author">' . $testimonial['testimonial_author'] . '</span>
                </div>';}
            ?>
        </div>
    </section>

    <section id="section5">
        <div class="content-wrap3">
            <div class="content3">
                <?= $service_content ?>
                <span class="calltoaction">Call Pacific Beach Homes at <a href="tel:<?= $phone_number ?>">(858) 740-8495</a> for a free consultation today</span>
            </div>
        </div>
        <div class="sidebar-wrap3">
            <div class="sidebar3"></div>
        </div>
    </section>
</div>

<?php get_footer() ?>