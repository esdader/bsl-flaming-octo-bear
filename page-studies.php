<?php 

/**
 * Studies
 */

get_header(); ?>

<div class="l-container">
	<div class="l-inner l-studies-intro">
		<div class="row col-8 offset-2">
			<h1 class="subheading center">
				Step into our world as we shed light on the future of successful marketing strategies in real-world applications. 
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
<?php if ( !is_user_logged_in() ) : ?>
<div class="l-outer l-registration-outer-con">
	<div class="l-inner">
		<div class="registration-inner-con col-6 no-guuters offset-3">

			<!-- Custom Login/Register/Password Code @ http://digwp.com/2010/12/login-register-password-code/ -->
			<!-- Theme Template Code -->

			<div id="login-register-password">

				<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>

				<ul class="tabs_login">
					<li class="active_login"><a href="#tab1_login">Register</a></li>
					<li><a href="#tab2_login">Login</a></li>
					<li><a href="#tab3_login">Forgot?</a></li>
				</ul>
				<div class="tab_container_login">
					<button class="close-reg-btn">[close]</button>
					<div id="tab1_login" class="tab_content_login">
						<h3>Please sign up <br>to access content.</h3>
						<?php 
							$reset = $_GET['reset']; 
							if ($reset == true) : ?>

								<h3>Success!</h3>
								<p>Check your email to reset your password.</p>

						<?php endif; ?>
						<?php custom_registration_function(); ?>
						
					</div>
					<div id="tab2_login" class="tab_content_login" style="display:none;">
						<h3>Have an account? Log in.</h3>

						<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
							<div class="username">
								<label for="user_login"><?php _e('Username'); ?>: </label>
								<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
							</div>
							<div class="password">
								<label for="user_pass"><?php _e('Password'); ?>: </label>
								<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
							</div>
							<div class="login_fields">
								<div class="rememberme">
									<label for="rememberme">
										<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
									</label>
								</div>
								<?php do_action('login_form'); ?>
								<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
								<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
								<input type="hidden" name="user-cookie" value="1" />
							</div>
						</form>
						
					</div>
					<div id="tab3_login" class="tab_content_login" style="display:none;">
						<h3>Enter your username or email to reset your password.</h3>
						<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
							<div class="username">
								<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
								<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
							</div>
							<div class="login_fields">
								<?php do_action('login_form', 'resetpass'); ?>
								<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
								<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
								<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
								<input type="hidden" name="user-cookie" value="1" />
							</div>
						</form>
					</div>
				</div>

				<?php }  ?>
			</div>

			<!-- Custom Login/Register/Password Code @ http://digwp.com/2010/12/login-register-password-code/ -->
		</div>
	</div>
</div>
<?php endif; ?>


<?php get_footer(); ?>