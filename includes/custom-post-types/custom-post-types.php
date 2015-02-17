<?php
/*
// Oral Histories
register_post_type('oral_histories', array(
	'label' => __('Oral Histories'),
	'singular_label' => __('Oral History'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author', 'categories')
));
*/

/*
// Topy Photos
register_post_type('topy_photos', array(
	'label' => __('Topy Photos'),
	'singular_label' => __('Oral Topy Photo'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author')
));
*/
/*
function register_events_cpt() {
	$labels = array( 
		'name' 					=> 'Events',
		'singular_name'			=> 'Event',
		'add_new' 				=> 'Add New',
		'all_items' 			=> 'All Events',
		'add_new_item' 			=> 'Add New',
		'edit_item'				=> 'Edit Event',
		'new_item' 				=> 'New Event',
		'view_item' 			=> 'View Event',
		'search_items' 			=> 'Search Events',
		'not_found' 			=> 'No Events Found',
		'not_found_in_trash' 	=> 'No Events Found in Trash',
		'parent_item_colon' 	=> 'Parent Event Post:',
		'menu_name' 			=> 'Events',
	);
	$args = array( 
		'labels' 				=> $labels,
		'description' 			=> 'Events',
		'public' 				=> true,
		'exclude_from_search' 	=> false,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_nav_menus' 	=> true,
		'show_in_menu' 			=> true,
		'show_in_admin_bar' 	=> true,
		'menu_position' 		=> null,
		'menu_icon' 			=> NULL, 
		'capability_type' 		=> 'post',
		'capabilities' 			=> array(	
										'edit_post', 
										'read_post', 
										'delete_post',
										'edit_posts',
										'edit_others_posts',
										'publish_posts',
										'read_private_posts'
									),
		'map_meta_cap' 			=> true,
		'hierarchical' 			=> true,
		'supports' 				=> array( 	
										'title',
										'editor',
										'author',
										'thumbnail',
										//'excerpt',
										//'trackbacks',
										//'custom-fields',
										//'comments' ,
										//'revisions',
										//'page-attributes',
										//'post-formats'
									),
		'taxonomies' => array('category'),
		'has_archive'			=> false,
		'permalink_epmask' 		=> EP_PERMALINK,
		'rewrite' 				=> array( 	
										'slug' 			=> 'events', 
										'with_front' 	=> false,
										'feeds' 		=> false,
										'pages' 		=> false,
										'ep_mask' 		=> EP_PERMALINK
									),
		'query_var' 			=> false,
		'can_export' 			=> true,
	);
	register_post_type( 'events', $args );
}
add_action( 'init', 'register_events_cpt' );
*/
/*
// Web sponsor
register_post_type('web_sponsor', array(
	'label' => __('Web Sponsors'),
	'singular_label' => __('Web Sponsor'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'exclude_from_search' => true,
    'public' => true,
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author')
));
*/
/*
// Histories
register_post_type('histories', array(
	'label' => __('Histories'),
	'singular_label' => __('History'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author')
));
*/

// Awards
/*
register_post_type('awards', array(
	'label' => __('Awards'),
	'singular_label' => __('Award'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'exclude_from_search' => true,
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor')	,
	'has_archive' => true,	
));
*/

/*
// Shop
register_post_type('shop', array(
	'label' => __('Shop'),
	'singular_label' => __('Shop'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author')
));
*/

/*
// News
register_post_type('site-news', array(
	'label' => __('News'),
	'singular_label' => __('News'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title', 'editor', 'author')
));
*/
/*

// Tout
register_post_type('tout', array(
	'exclude_from_search' => true,
	'label' => __('Tout'),
	'singular_label' => __('Tout'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title')
));
*/
// Tout
/*
register_post_type('background', array(
	'exclude_from_search' => true,
	'label' => __('Background'),
	'singular_label' => __('Background'),
	'public' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'rewrite' => false,
	'query_var' => false,
	'supports' => array('title')
));
*/
?>