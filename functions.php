<?php

/**
 * Add custom post types
 */

require get_template_directory() . '/post-types/team-members.php';
require get_template_directory() . '/post-types/studies.php';


/**
 * Enqueue styles and scripts
 */

function starter_theme_scripts() {
	
	// main stylesheet
	wp_enqueue_style( 
		'main', 
		get_template_directory_uri() . '/css/main.css',
		array(),
		'0.1.22'
	);
	
	// modernizr
	wp_enqueue_script(
		'modernizr', 
		get_template_directory_uri() . '/js/vendor/modernizr-2.8.2.min.js',
		array(), // dependencies
		false,   // version
		false    // in footer
	);

	// special stuff for jquery
	wp_deregister_script('jquery');
	wp_register_script(
		'jquery',
		get_template_directory_uri() . '/js/vendor/jquery-1.11.1.min.js',
        array(),
		false,
		true
	);
	wp_enqueue_script( 'jquery' );

	// plugins
	wp_enqueue_script(
		'plugins',
		get_template_directory_uri() . '/js/plugins.js',
		array(
				'jquery'
			),
		false,
		true

	);

	// main javascript
	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/js/main.js',
		array(
				'jquery',
				'plugins'
			),
		'0.1.6',
		true

	);
}

if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'starter_theme_scripts' );

/**
 * Add support for menus
 */

function register_starter_theme_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu' => __( 'Extra Menu' )
		)
	);
}
add_action( 'init', 'register_starter_theme_menus' );

/**
 * Don't show admin bar
 */

show_admin_bar(false);

/**
 * Add featured images support
 */

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

/**
 * Add image size
 * 
 * example if needed
 * not active by default because WordPress will save images in the example sizes
 */

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'blog-full-width', 800, 9999 );
}

/**
 * Social media link generators
 */

function createLinkedInLink($earl, $title, $summary, $source) {

	$earl = urlencode($earl);
	$title = urlencode($title);
	$summary = urlencode($summary);
	$source = urlencode($source);

	$link = "http://www.linkedin.com/shareArticle?mini=true&url={$earl}&title={$title}&summary={$summary}&source={$source}";

	return $link;
}



?>
