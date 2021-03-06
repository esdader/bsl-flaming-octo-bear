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
<div class="l-small-view-nav">
  <header class="l-small-view-nav-header clearfix">
  	<button class="close-nav-btn js-close-nav-btn">
  		<img src="<?php bloginfo('template_directory'); ?>/img/xs.svg" onerror="this.src='<?php bloginfo('template_directory'); ?>/img/xs.png'" alt="Open menu">
  	</button>
  </header>
  <nav class="small-view-nav">
    <ul class="l-vertical-nav">
      <li<?php if ($post_id == 13) echo ' class="active"'; ?>>
        <a href="<?php echo site_url(); ?>">Home</a>
      </li>
      <li<?php if ($post_id == 5) echo ' class="active"'; ?>>
        <a href="<?php echo get_page_link(5); ?>">About</a>
      </li>
      <li<?php if ($post_id == 7) echo ' class="active"'; ?>>
        <a href="<?php echo get_page_link(7); ?>">Tools</a>
      </li>
      <li<?php if ($post_id == 9) echo ' class="active"'; ?>>
        <a href="<?php echo get_page_link(9); ?>">Studies</a>
      </li>
      <li<?php if (is_home()) echo ' class="active"'; ?>>
        <a href="<?php echo get_page_link(11); ?>">News</a>
      </li>
      <li>
        <ul class="l-horizontal-list header-footer-social-media-links gen-social-media-links">
          <li><a class="header-footer-social-link header-footer-twitter" href="http://twitter.com/BSLinsights" target="_blank">Follow on Twitter</a></li>
          <li><a class="header-footer-social-link header-footer-linkedin" href="https://www.linkedin.com/company/behavioral-science-lab" target="_blank">Follow on LinkedIn</a></li>
          <li><a class="header-footer-social-link header-footer-email" href="mailto:contact@behavioralsciencelab.com" target="_blank">Email us</a></li>

        </ul>
      </li>
    </ul>
  </nav>
</div>
</div> <!-- end l-shift-con -->
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