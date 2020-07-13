<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PacificBeachHomes
 */

if (get_field('phone_number', 'option')) {
    $phone_number = get_field('phone_number', 'option');
}

if (get_field('email_address', 'option')) {
    $email_address = get_field('email_address', 'option');
}

if (get_field('yelp_link', 'option')) {
    $yelp_link = get_field('yelp_link', 'option');
}

if (get_field('instagram_link', 'option')) {
    $instagram_link = get_field('instagram_link', 'option');
}

if (get_field('twitter_link', 'option')) {
    $twitter_link = get_field('twitter_link', 'option');
}

if (get_field('googlemybusiness_link', 'option')) {
    $googlemybusiness_link = get_field('googlemybusiness_link', 'option');
}

if (get_field('linkedin_link', 'option')) {
    $linkedin_link = get_field('linkedin_link', 'option');
}

if (get_field('facebook_link', 'option')) {
    $facebook_link = get_field('facebook_link', 'option');
}

if (get_field('mailchimp_shortcode', 'option')) {
    $mailchimp_shortcode = get_field('mailchimp_shortcode', 'option');
}

if (get_field('owner_name', 'option')) {
    $owner_name = get_field('owner_name', 'option');
}

if (get_field('owner_license', 'option')) {
    $owner_license = get_field('owner_license', 'option');
}

if (get_field('office_name', 'option')) {
    $office_name = get_field('office_name', 'option');
}

if (get_field('office_address_one', 'option')) {
    $office_address_one = get_field('office_address_one', 'option');
}

if (get_field('office_address_two', 'option')) {
    $office_address_two = get_field('office_address_two', 'option');
}

if (get_field('office_phone', 'option')) {
    $office_phone = get_field('office_phone', 'option');
}

if (get_field('office_license', 'option')) {
    $office_license = get_field('office_license', 'option');
}

?>

	</div><!-- #content -->
	
	<footer id="footer" class="site-footer">
		<div class="footer-top-container">
			<div class="footer-top-col-1">
				<span class="footer-name">Pacific Beach Homes <span class="footer-name-second-line">Real Estate</span></span>
				<span class="footer-phone">Phone: <a href="tel:<?= $phone_number ?>"><?= $phone_number ?></a></span>
				<span class="footer-email">Email: <a href="mailto:<?= $email_address ?>"><?= $email_address ?></a></span>
				<span class="footer-location">Located in Pacific Beach<br> San Diego, CA 92109</span>
				<iframe class="mapofpb lazy" data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d36756.17666588754!2d-117.25274746866957!3d32.79500597287665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dc01c762be19e5%3A0xa7bdb8ca881be76c!2sPacific+Beach%2C+San+Diego%2C+CA!5e1!3m2!1sen!2sus!4v1560577559593!5m2!1sen!2sus" width="350" height="410" frameborder="0" style="border:0" title="Map of Pacific Beach" allowfullscreen></iframe>
			</div>
			<div class="footer-top-col-2">
				<span class="form-cta">Request a free<br>consultation</span>

				<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1, 'title' => false, 'description' => false ) ); ?>
				
			</div>
		</div>
		<div class="footer-bottom-container">
			<div><?= $mailchimp_shortcode ?></div>
			<div class="footer-site-map">
				<div class="site-map-col-1">
				<?php dynamic_sidebar( 'footer-menu' ); ?>
				</div>
				<div class="site-map-col-2">
				<?php dynamic_sidebar( 'footer-resources' ); ?>
				</div>
				<div class="site-map-col-3">
					<h4 class="site-map-col-3-title">About Us:</h4>
					<span class="owner-information">Owner Info:</span>
					<a href="/ryan-pearson"><?=$owner_name?></a>
					<span>CA DRE License #<?=$owner_license?></span>
					<a href="tel:<?=$phone_number?>" class="owner-phone"><?=$phone_number?></a>
					<span class="office-information">Office Info:</span>
					<span class="office-name"><?=$office_name?></span>
					<span class="office-license">CA DRE License #<?=$office_license?></span>
					<span class="office-address-line-1"><?=$office_address_one?></span>
					<span class="office-address-line-2"><?=$office_address_two?></span>
					<a href="tel:<?=$office_phone?>" class="office-phone"><?=$office_phone?></a>
				</span>
				</div>
			</div>
			<span class="made-by"><a href="https://ryanpearson.website" rel="noopener" target="_blank">Ryan Pearson made this website.</a> <span class="follow">Follow us:</span></span>
			<div class="social-icons">
				<a href="<?=$yelp_link?>" title="Visit our Yelp page" aria-label="Visit our Yelp page" rel="noopener" target="_blank"><svg class="yelp" alt="Yelp icon" role="img" width="45" height="45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Yelp</title><path d="M21.111 18.226c-.141.969-2.119 3.483-3.029 3.847-.311.124-.611.094-.85-.09-.154-.12-.314-.365-2.447-3.827l-.633-1.032c-.244-.37-.199-.857.104-1.229.297-.359.732-.494 1.111-.35.02.012 1.596.531 1.596.531 3.588 1.179 3.705 1.224 3.857 1.338.227.186.332.475.285.813h.006zm-7.191-5.267c-.254-.386-.25-.841.012-1.155l.998-1.359c2.189-2.984 2.311-3.141 2.459-3.245.256-.171.57-.179.871-.032.869.422 2.623 3.029 2.729 4.029v.034c.029.341-.105.618-.346.784-.164.105-.314.166-4.393 1.156-.645.164-1.004.254-1.215.329l.029-.03c-.404.12-.854-.074-1.109-.479l-.035-.032zm-2.504-1.546c-.195.061-.789.245-1.519-.938 0 0-4.931-7.759-5.047-7.998-.07-.27.015-.574.255-.82.734-.761 4.717-1.875 5.76-1.621.34.088.574.301.656.604.06.335.545 7.536.615 9.149.066 1.38-.525 1.565-.72 1.624zm.651 7.893c-.011 3.774-.019 3.9-.081 4.079-.105.281-.346.469-.681.53-.96.164-3.967-.946-4.594-1.69-.12-.164-.195-.328-.21-.493-.016-.12 0-.24.045-.346.075-.195.18-.345 2.88-3.51l.794-.944c.271-.345.75-.45 1.199-.271.436.165.706.54.676.945v1.68l-.028.02zm-8.183-2.414c-.295-.01-.56-.187-.715-.48-.111-.215-.189-.57-.238-1.002-.137-1.301.029-3.264.419-3.887.183-.285.45-.436.745-.426.195 0 .369.061 4.229 1.65l1.13.449c.404.15.654.57.63 1.051-.03.465-.298.824-.694.93l-1.605.51c-3.59 1.155-3.709 1.185-3.898 1.17l-.003.035zm14.977 7.105h-.004l-.005.003.009-.003z"/></svg></a>
				
				<a href="<?=$instagram_link?>" title="Visit our Instagram page" aria-label="Visit our Instagram page" rel="noopener" target="_blank" >
					<svg class="instagram" alt="Instagram icon" role="img" width="45" height="45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title>
					<defs>
						<linearGradient id="ig-gradient">
							<stop offset="0%" stop-color="#F8ED34" />
							<stop offset="50%" stop-color="#EA118D" />
							<stop offset="100%" stop-color="#2E368F" />
						</linearGradient>
					</defs>
					<path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
				</a>
				
				<a href="<?=$twitter_link?>" title="Visit our Twitter page" aria-label="Visit our Twitter page" rel="noopener" target="_blank"><svg class="twitter" alt="Twitter icon" role="img" width="45" height="45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/></svg></a>
				
				<a href="<?=$googlemybusiness_link?>" title="Visit our Google business page" aria-label="Visit our Google business page" rel="noopener" target="_blank">
					<svg class="google" alt="Google icon" role="img" width="45" height="45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Google</title>
					<defs>
						<linearGradient id="google-gradient" gradientTransform="rotate(90)">
							<stop offset="0%" stop-color="#DB4437" />
							<stop offset="33%" stop-color="#F4B400" />
							<stop offset="66%" stop-color="#4285F4" />
							<stop offset="100%" stop-color="#0F9D58" />
						</linearGradient>
					</defs>
					<path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/></svg>
				</a>
				
				<a href="<?=$linkedin_link?>" title="Visit our linkedin page" aria-label="Visit our LinkedIn page" rel="noopener" target="_blank"><svg class="linkedin" alt="Linkedin icon" role="img" width="45" height="45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
				
				<a href="<?=$facebook_link?>" title="Visit our Facebook page" aria-label="Visit our Facebook page" rel="noopener" target="_blank"><svg class="facebook" alt="Facebook icon" role="img" width="45" height="45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"/></svg></a>
			</div>
			<div class="footer-disclaimer">
			This information is deemed reliable but not guaranteed. You should rely on this information only to decide whether or not to further investigate a particular property. BEFORE MAKING ANY OTHER DECISION, YOU SHOULD PERSONALLY INVESTIGATE THE FACTS (e.g. square footage and lot size) with the assistance of an appropriate professional. You may use this information only to identify properties you may be interested in investigating further. All uses except for personal, non- commercial use in accordance with the foregoing purpose are prohibited. Redistribution or copying of this information, any photographs or video tours is strictly prohibited. This information is derived from the Internet Data Exchange (IDX) service provided by San Diego MLS. Displayed property listings may be held by a brokerage firm other than the broker and/or agent responsible for this display. The information and any photographs and video tours and the compilation from which they are derived is protected by copyright. Compilation © <?= date("Y"); ?> San Diego MLS.</div>
			</div>
		</div>
	</footer><!-- #footer -->

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
