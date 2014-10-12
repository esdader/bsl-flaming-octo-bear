<?php

function studies_init() {
	register_post_type( 'studies', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'has_archive'       => false,
		'query_var'         => true,
		'rewrite'           => array('slug', 'studies'),
		'labels'            => array(
			'name'                => __( 'Study', 'behavioralsciencelab' ),
			'singular_name'       => __( 'Studies', 'behavioralsciencelab' ),
			'all_items'           => __( 'Study', 'behavioralsciencelab' ),
			'new_item'            => __( 'New studies', 'behavioralsciencelab' ),
			'add_new'             => __( 'Add New', 'behavioralsciencelab' ),
			'add_new_item'        => __( 'Add New studies', 'behavioralsciencelab' ),
			'edit_item'           => __( 'Edit studies', 'behavioralsciencelab' ),
			'view_item'           => __( 'View studies', 'behavioralsciencelab' ),
			'search_items'        => __( 'Search study', 'behavioralsciencelab' ),
			'not_found'           => __( 'No study found', 'behavioralsciencelab' ),
			'not_found_in_trash'  => __( 'No study found in trash', 'behavioralsciencelab' ),
			'parent_item_colon'   => __( 'Parent studies', 'behavioralsciencelab' ),
			'menu_name'           => __( 'Study', 'behavioralsciencelab' ),
		),
	) );

}
add_action( 'init', 'studies_init' );

function studies_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['studies'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Studies updated. <a target="_blank" href="%s">View studies</a>', 'behavioralsciencelab'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'behavioralsciencelab'),
		3 => __('Custom field deleted.', 'behavioralsciencelab'),
		4 => __('Studies updated.', 'behavioralsciencelab'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Studies restored to revision from %s', 'behavioralsciencelab'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Studies published. <a href="%s">View studies</a>', 'behavioralsciencelab'), esc_url( $permalink ) ),
		7 => __('Studies saved.', 'behavioralsciencelab'),
		8 => sprintf( __('Studies submitted. <a target="_blank" href="%s">Preview studies</a>', 'behavioralsciencelab'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Studies scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview studies</a>', 'behavioralsciencelab'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Studies draft updated. <a target="_blank" href="%s">Preview studies</a>', 'behavioralsciencelab'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'studies_updated_messages' );
