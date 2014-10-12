<?php get_header(); ?>

<div class="l-container">
	<div class="l-home-section">
		<div class="video-container">
			<video autoplay loop poster="<?php bloginfo('template_directory'); ?>/img/BSL_HighRes_960.jpg">
					<source src="<?php echo bloginfo('template_directory'); ?>/videos/bg.mp4" type="video/mp4">
						<img src="<?php bloginfo('template_directory'); ?>/img/home_bg.jpg" alt="">
			</video>
		</div>
		<div class="l-home-copy">
			<div class="l-inner">
				<h1 class="col-7 offset-3 home-title no-gutters">
					Yes, but WHY 
				</h1>
			</div>
		</div>	
	</div>
</div>

<?php get_footer(); ?>