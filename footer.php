<div class="l-short-footer-con">
	<div class="l-short-footer">
		<ul class="l-horizontal-nav short-footer">
			<li class="short-footer-name"><?php echo get_bloginfo('name'); ?></li>
			<li>2222 Rio Grande, Bldg. C, Third Floor Austin, TX 78705</li>
			<li>T: 512.476.7949</li>
			<li>F: 512.476.7950</li>
			<li class="short-footer-email"><a href="mailto:contact@behavioralsciencelab.com">contact@behavioralsciencelab.com</a></li>
		</ul>
		<?php if ( is_front_page() ) : ?>
			<p class="footer-copy">&copy; <?php echo date('Y'); ?> Behavioral Science Lab. All Rights Reserved by Sanders\Wingo Advertising and Sentien Tech.</p>
		<?php endif; ?>
	</div>
</div>
<button class="back-to-top ir">
	Back to top
</button>
<?php if ( is_user_logged_in() ) : ?>
	<?php

		$user_ID = get_current_user_id(); 
		$user = get_userdata( $user_ID );
		$first_name = get_the_author_meta( 'first_name', $user_ID );
		$last_name = get_the_author_meta( 'last_name', $user_ID );
		$name =  $first_name . ' ' . $last_name;
		$email = $user->data->user_email;
		$date = Date('m/d/Y');
		$company = get_the_author_meta( 'company', $user_ID );
		$title = get_the_author_meta( 'title', $user_ID );
		$phone_number = get_the_author_meta( 'phonenumber', $user_ID );
	?>
	<script>
		var bslDltracker = {
			name : "<?php echo $name; ?>",
			email : "<?php echo $email; ?>",
			date : "<?php echo $date; ?>",
			company : "<?php echo $company; ?>",
			title : "<?php echo $title; ?>",
			phoneNumber : "<?php echo $phone_number; ?>"

		}
	</script>
	<div class="download-tracker-form-con">
		<?php echo do_shortcode('[contact-form-7 id="88" title="Download tracker"]' ); ?>
	</div>
<?php endif; ?>

    <?php wp_footer(); ?>
    
    <script>
        var _gaq=[['_setAccount','UA-45434526-1'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>