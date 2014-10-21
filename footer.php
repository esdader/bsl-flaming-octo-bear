<?php if (!is_front_page() ) :?>
	<div class="l-footer-con">
		<div class="l-footer">
			<div class="footer-addy col-3 offset-1">
				<h4 class="addy-title"><?php echo get_bloginfo('name'); ?></h4>
				<p>2222 Rio Grande<br>
					Bldg. C, Third Floor<br>
					Austin, TX 78705
				</p>
				<p>
					<a href="mailto:contact@behavioralsciencelab.com">Contact@behavioralsciencelab.com</a>
				</p>
			</div>
			<div class="footer-phone-numbers col-2">
				<p>T: 512.476.7949<br>
				   F: 512.476.7950
				</p>
			</div>
			<div class="l-footer-social-icons col-2 no-gutters offset-4">
			  <ul class="l-horizontal-list footer-social-media-links gen-social-media-links">
			    <li><a class="footer-social-link footer-twitter" href="http://twitter.com/BSLinsights" target="_blank">Share on Twitter</a></li>
			    <li><a class="footer-social-link footer-linkedin" href="https://www.linkedin.com/company/behavioral-scienc-lab" target="_blank">Share on LinkedIn</a></li>
			    <li><a class="footer-social-link footer-email" href="mailto:contact@behavioralsciencelab.com" target="_blank">Email us</a></li>

			  </ul>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="l-short-footer-con">
		<div class="l-short-footer">
			<ul class="l-horizontal-nav short-footer">
				<li class="short-footer-name"><?php echo get_bloginfo('name'); ?></li>
				<li>2222 Rio Grande, Bldg. C, Third Floor Austin, TX 78705</li>
				<li>T: 512.476.7949</li>
				<li>F: 512.476.7950</li>
				<li class="short-footer-email"><a href="mailto:contact@behavioralsciencelab.com">Contact@behavioralsciencelab.com</a></li>
			</ul>
		</div>
	</div>
<?php endif; ?>
    <?php wp_footer(); ?>
    
    <script>
        // var _gaq=[['_setAccount','UA-45434526-1'],['_trackPageview']];
        // (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        // g.src='//www.google-analytics.com/ga.js';
        // s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>