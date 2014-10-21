<?php 

/**
 * About page
 */

get_header(); ?>

<div class="l-container">

	<div class="l-about-why">
		<div class="l-inner">
			<div class="col-8 offset-2">
				<h1 class="about-why-heading">
					We are pioneers of innovative research solutions: providing a clear understanding of why and how people make decisions.
				</h1>
			</div>
		</div>
	</div>
	<div class="l-about-reimagine">
		<div class="l-inner">
			<div class="col-6 offset-1">
				<h2 class="about-reimagine-heading">
					We reimagine consumer research.
				</h2>
			</div>
			<div class="col-5 offset-1 about-reimagine-content">
				<p>
					We created the Lab to help our clients understand the full picture of how people make decisions in their daily lives. We know that current market research techniques can tell you the who, what when and where, but not truly why people buy or will buy your brand.
				</p>
				<p>
					That’s why we set out to rethink and redesign the entire research process creating research tools that help our clients understand how people really think. 
				</p>
			</div>
		</div>
	</div>
	<div class="l-outer">
		<div class="l-inner">
			<div class="row col-8 offset-2 team-members-headline-con">
				<h2 class="team-members-headline">
					Our team is trained in sociology, experimental psychology, anthropology, behavioral economics, project management and marketing innovation.
				</h2>
			</div>
			<div class="row col-12 no-gutters team-member-nav">
				<ul class="l-horizontal-list clearfix">
					
					<?php
						$args = array(
									'post_type'     => 'team-members',
									'post_per_page' => -1,
									'order'         => 'ASC',
									'orderby'      => 'menu_order'
								);
						$tm = new WP_Query($args);
					?>
					<?php if ( $tm->have_posts() ) : while ( $tm->have_posts() ) : $tm->the_post(); ?>
						<li class="team-member">
							<?php
								$img = get_field('tm_main_image');
								$roll_img = get_field('tm_main_image_rollover');
							?>
							<img 
								class="team-member-image"
								data-team-member-image="<?php echo $roll_img['url']; ?>"
								src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<div class="team-member-rolls">
								<h3 class="team-member-name"><?php the_title(); ?></h3>
								<h4 class="team-member-title">
									<?php the_field('tm_title'); ?><br>
									<?php the_field('tm_title_2'); ?>

								</h4>
								<div class="team-member-quote">
									<?php the_content(); ?>
								</div>
								<ul class="l-horizontal-list tm-social-media-links-con clearfix">
									<?php if ( get_field('tm_twitter') ) : ?>
									<li><a class="tm-social-links tm-twitter" href="<?php the_field('tm_twitter'); ?>"  target="_blank">Follow on Twitter</a></li>
									<?php endif; ?>
									<?php if ( get_field('tm_linkedin') ) : ?>
									<li><a class="tm-social-links tm-linkedin" href="<?php the_field('tm_linkedin'); ?>" target="_blank">Follow on LinkedIn</a></li>
									<?php endif; ?>
									<?php if ( get_field('tm_email') ) : ?>
									<li><a class="tm-social-links tm-email" href="<?php the_field('tm_email'); ?>" target="_blank">Email</a></li>
									<?php endif; ?>
								</ul>
							</div>
							
						</li>
						
					<?php endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
					<!-- no posts found -->
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="l-outer l-about-map">
		<div class="map">
			<iframe width='100%' height='646px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/esdader.jmkp6hhd/attribution,zoompan.html?access_token=pk.eyJ1IjoiZXNkYWRlciIsImEiOiJtV1g2cnZJIn0.46vfmMQOHMte9Gqs5w8bFQ'></iframe>
		</div>
		<div class="l-inner l-about-map-inner">
			<div class="row col-6 offset-1">
				<div class="l-about-bubble">
					<p class="bubble-intro">
						If you want to understand why people buy your brand, call or email us.
					</p>
					<p class="bubble-contact">
						512.476.7949<br>
						<a href="mailto:contact@behavioralsciencelab.com"><span>contact</span>@behavioralsciencelab.com</a>
					</p>
					<h4 class="bubble-heading">If ever in Austin, stop on by.</h4>
					<p class="bubble-contact-block">
						2222 Rio Grande<br>
						Building C, Third Floor<br>
						Austin, Texas 78701 U.S.A.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer() ?>