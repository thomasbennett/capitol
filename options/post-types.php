<?php  

register_post_type('slideshow', array(
	'labels' => array(
		'name'	 => 'Slideshow',
		'singular_name' => 'Slide',
		'add_new' => __( 'Add New' ),
		'add_new_item' => __( 'Add new slide' ),
		'view_item' => 'View slide',
		'edit_item' => 'Edit slide',
	    'new_item' => __('New slide'),
	    'view_item' => __('View slide'),
	    'search_items' => __('Search slides'),
	    'not_found' =>  __('No slides found'),
	    'not_found_in_trash' => __('No slides found in Trash'),
	),
	'public' => true,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' =>  'post.php?post=%d',
	'rewrite' => array(
		"slug" => "slide",
		"with_front" => false,
	),
	'query_var' => true,
	'supports' => array('title', 'excerpt', 'thumbnail', 'page-attributes'),
));

