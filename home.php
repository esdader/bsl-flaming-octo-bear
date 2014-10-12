<?php

/**
 * News
 */

get_header(); ?>
<div class="l-container">
	<div class="l-outer">
		<div class="l-inner">
			<div class="row col-6 offset-3 blog-heading">
				<h2>Stay up to date with our latest discoveries and mindful practices.</h2>
			</div>
		</div>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="l-outer l-blog-landing-con">
			<div class="l-inner">
				<div class="l-blog-landing-entry row">
					<div class="l-blog-landing-image col-4 offset-1">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('blog-full-width');
							} 
						?>
					</div>
					<div class="l-blog-landing-meta col-5">
						<header>
							<h3 class="blog-landing-title"><?php the_title(); ?></h3>
							<p class="blog-landing-meta">
								<?php echo get_the_date(); ?>
							</p>
						</header>
							<p class="blog-landing-meta">
								<?php the_category(', '); ?>
							</p>

					</div>
				</div>
			</div>
		</div>
		<div class="l-outer">
			<div class="hentry l-inner l-blog-single-entry-con">
			<article class="l-blog-single-entry row col-10 offset-1 entry-content">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="l-blog-single-hero">
							<?php the_post_thumbnail('blog-full-width'); ?>
						</div>
					<?php endif; ?>
					<div class="row">
						<div class="l-blog-single-view-title">
							<h1 class="blog-single-view-title"><?php the_title(); ?></h1>
						</div>
						<?php

							$earl = get_permalink();
							$title = get_the_title();
							$summary = get_the_excerpt();
							$source = get_bloginfo('name');
							$encoded_earl = urlencode($earl);

						?>
						<div class="l-blog-single-view-social-links">
							<button class="news-close-btn">
								<img 
									src="<?php bloginfo('template_directory'); ?>/img/close_button.svg"
									onerror="this.src='<?php bloginfo('template_directory'); ?>/img/close_button.png'"

									alt="Close">
							</button>
							<ul class="l-horizontal-list study-social-media-links gen-social-media-links">
								<li><a class="study-social-link study-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_earl; ?>">Share on Facebook</a></li>
								<li><a class="study-social-link study-twitter" target="_blank" href="https://twitter.com/home?status=<?php echo $encoded_earl; ?>">Share on Twitter</a></li>
								<li><a class="study-social-link study-linkedin" target="_blank" href="<?php echo createLinkedInLink($earl, $title, $summary, $source); ?>">Share on LinkedIn</a></li>

							</ul>
							
						</div>
					</div>
					<div class="row l-blog-single-view-meta">
						<p class="blog-single-meta">
							<?php echo get_the_date(); ?>
						</p>
						<p class="blog-single-meta author-meta">
							by <?php the_author(); ?>
						</p>
					</div>
					<section class="blog-single-content">
						<?php the_content(); ?>
					</section>
				</article>
			</div>
		</div>
	<?php endwhile; ?>
	<!-- post navigation -->
	<?php else: ?>
	<!-- no posts found -->
	<?php endif; ?>
</div>

<?php get_footer(); ?>