<?php 

/**
 * Studies
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
	<div class="l-outer l-studies-con">
		<div class="l-inner l-studies">
			<div class="row">
				<?
					$args = array(
								'post_type' => 'studies'
							);

					$studies = new WP_Query($args);
				?>

				<?php if ( $studies->have_posts() ) : while ( $studies->have_posts() ) : $studies->the_post(); ?>
					<div class="l-study col-4">
						<a class="js-load-study" href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail('medium'); ?>
							<?php endif; ?>
						</a>
						<div class="study-thumb-content">
							<h3><?php the_title(); ?></h3>
							<p><?php the_excerpt(); ?></p>
						</div>
						
					</div>
				<?php endwhile; ?>
				<!-- post navigation -->
				<?php else: ?>
				<!-- no posts found -->
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="l-outer l-study-con">

	</div>
</div>


<?php get_footer(); ?>