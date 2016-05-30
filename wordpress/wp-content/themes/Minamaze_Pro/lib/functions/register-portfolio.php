<?php
/**
 * Register Portfolio menu in admin area.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Add Portfolios Menu to Admin
---------------------------------------------------------------------------------- */
function portfolio_custom_init() {
	$labels = array(
		'name' => _x( 'Portfolios', 'post type general name', 'minamaze' ),
		'singular_name' => _x( 'Portfolio', 'post type singular name', 'minamaze' ),
		'add_new' => _x( 'Add New', 'portfolio', 'minamaze' ),
		'add_new_item' => 'Add New Portfolio',
		'edit_item' => 'Edit Portfolio',
		'new_item' => 'New Portfolio',
		'view_item' => 'View Portfolio',
		'search_items' => 'Search Portfolios',
		'not_found' =>  'No portfolios found',
		'not_found_in_trash' => 'No portfolios found in Trash',
		'parent_item_colon' => '',
		'menu_name' => 'Portfolio',
	);
	  
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio' ),
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => true,
		'menu_position' => null,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	/* Register Portfolio menu */
	register_post_type( 'portfolio', $args );


	/* Fixes redirect to 404 error template */
	flush_rewrite_rules();
	  
	/* Initialise New Taxonomy Labels */
	$labels = array(
		'name' => _x( 'Tags', 'taxonomy general name', 'minamaze' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name', 'minamaze' ),
		'search_items' =>  'Search Types',
		'all_items' => 'All Tags',
		'parent_item' => 'Parent Tag',
		'parent_item_colon' => 'Parent Tag:',
		'edit_item' => 'Edit Tags',
		'update_item' => 'Update Tag',
		'add_new_item' => 'Add New Tag',
		'new_item_name' => 'New Tag Name',
	);

	/*  Register custom taxonomy for Portfolio tags */
	register_taxonomy( 'tagportfolio', array( 'portfolio' ), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag-portfolio' ),
	));
	  
}
add_action('init', 'portfolio_custom_init');
	

/* ----------------------------------------------------------------------------------
	Custom Portfolio Messages
---------------------------------------------------------------------------------- */
function portfolio_updated_messages( $messages ) {
global $post, $post_ID;

	$messages[ 'portfolio' ] = array(
		0 => '',
		1 => sprintf( 'Portfolio updated. <a href="%s">View portfolio</a>', esc_url( get_permalink( $post_ID ) ) ),
		2 => 'Custom field updated.',
		3 => 'Custom field deleted.',
		4 => 'Portfolio updated.',
		5 => isset($_GET[ 'revision' ]) ? sprintf( 'Portfolio restored to revision from %s', wp_post_revision_title( (int) 

$_GET[ 'revision' ], false ) ) : false,
		6 => sprintf( 'Portfolio published. <a href="%s">View portfolio</a>', esc_url( get_permalink( $post_ID ) ) ),
		7 => 'Portfolio saved.',
		8 => sprintf( 'Portfolio submitted. <a target="_blank" href="%s">Preview portfolio</a>', esc_url( add_query_arg( 'preview', 

'true', get_permalink( $post_ID ) ) ) ),
		9 => sprintf( 'Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview portfolio</a>',
		  date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
		10 => sprintf( 'Portfolio draft updated. <a target="_blank" href="%s">Preview portfolio</a>', esc_url( add_query_arg( 'preview', 

'true', get_permalink( $post_ID ) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'portfolio_updated_messages' );