<?php

function team_members_init() {
	register_post_type( 'team-members', array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'supports'          => array( 'title', 'editor'),
		'has_archive'       => true,
		'query_var'         => true,
		'rewrite'           => true,
		'labels'            => array(
			'name'                => __( 'Team members', 'behavioralsciencelab' ),
			'singular_name'       => __( 'Team member', 'behavioralsciencelab' ),
			'all_items'           => __( 'Team members', 'behavioralsciencelab' ),
			'new_item'            => __( 'New team member', 'behavioralsciencelab' ),
			'add_new'             => __( 'Add New', 'behavioralsciencelab' ),
			'add_new_item'        => __( 'Add New team member', 'behavioralsciencelab' ),
			'edit_item'           => __( 'Edit team member', 'behavioralsciencelab' ),
			'view_item'           => __( 'View team member', 'behavioralsciencelab' ),
			'search_items'        => __( 'Search team members', 'behavioralsciencelab' ),
			'not_found'           => __( 'No team members found', 'behavioralsciencelab' ),
			'not_found_in_trash'  => __( 'No team members found in trash', 'behavioralsciencelab' ),
			'parent_item_colon'   => __( 'Parent team members', 'behavioralsciencelab' ),
			'menu_name'           => __( 'Team members', 'behavioralsciencelab' ),
		),
	) );

}
add_action( 'init', 'team_members_init' );

function team_members_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['team-members'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Team members updated. <a target="_blank" href="%s">View team members</a>', 'behavioralsciencelab'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'behavioralsciencelab'),
		3 => __('Custom field deleted.', 'behavioralsciencelab'),
		4 => __('Team member updated.', 'behavioralsciencelab'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Team member restored to revision from %s', 'behavioralsciencelab'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Team member published. <a href="%s">View team member</a>', 'behavioralsciencelab'), esc_url( $permalink ) ),
		7 => __('Team member saved.', 'behavioralsciencelab'),
		8 => sprintf( __('Team member submitted. <a target="_blank" href="%s">Preview team member</a>', 'behavioralsciencelab'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Team member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team member</a>', 'behavioralsciencelab'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Team member draft updated. <a target="_blank" href="%s">Preview team member</a>', 'behavioralsciencelab'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'team_members_updated_messages' );
