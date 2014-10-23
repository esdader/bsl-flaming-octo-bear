<?php 

/** 
 * Studies -- single view
 */

get_header(); ?>


<div class="l-container">
	<div class="l-inner l-studies-intro">
		<div class="row col-8 offset-2">
			<h1 class="subheading center">
				Step into our world as we shed light on the future of successful marketing strategies in realworld applications. 
			</h1>
		</div>
	</div>
	<article id="current-study" class="l-outer l-single-view-study-con">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="l-inner is-expanded">
				<div class="study-hero-con">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('full'); ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="l-inner study">
				<header class="study-header col-10 offset-1 clearfix">
					<h1 class="study-title">
						<?php the_title(); ?>
					</h1>
					<div class="study-close-social-con">
						<?php

							$earl = get_permalink();
							$title = get_the_title();
							$summary = get_the_excerpt();
							$source = get_bloginfo('name');
							$encoded_earl = urlencode($earl);

						?>
						<div class="single-view-social-media-links">
							<ul class="l-horizontal-list study-social-media-links gen-social-media-links">
								<li><a class="study-social-link study-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_earl; ?>">Share on Facebook</a></li>
								<li><a class="study-social-link study-twitter" target="_blank" href="https://twitter.com/home?status=<?php echo $encoded_earl; ?>">Share on Twitter</a></li>
								<li><a class="study-social-link study-linkedin" target="_blank" href="<?php echo createLinkedInLink($earl, $title, $summary, $source); ?>">Share on LinkedIn</a></li>

							</ul>
						</div>
					</div>
				</header>
				<div class="study-main-content col-6 offset-1">
					<?php the_content(); ?>
				</div>
				<div class="row">
					<div class="study-button-block col-6 offset-1">
						<button class="download">Download</button>
						<button class="watch-webinar">Watch Webinar</button>
						<button class="close-study close-btn">
							<img 
								src="<?php bloginfo('template_directory'); ?>/img/close_button.svg"
								onerror="this.src='<?php bloginfo('template_directory'); ?>/img/close_button.png'"

								alt="Close">
						</button>
					</div>	
				</div>
				
			</div>
		<?php endwhile; ?>
		<?php else: ?>
		<?php endif; ?>
		
	</article>
</div>



<?php get_footer(); ?>