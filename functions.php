<?php

function theme_init_theme() {
	# Enqueue jQuery
	wp_enqueue_script('jquery');

	if (is_admin()) { /* Front end scripts and styles won't be included in admin area */
		wp_enqueue_style('theme-custom-admin', get_bloginfo('stylesheet_directory') . '/css/admin.css', array(), '1.0');
		return;
	}
	# Enqueue Custom Scripts
	# @wp_enqueue_script attributes -- id, location, dependancies, version
	//wp_enqueue_script('custom-script', get_bloginfo('stylesheet_directory') . '/js/custom-script.js', array('jquery'), '1.0');
	wp_enqueue_script('jquery-functions', get_bloginfo('stylesheet_directory') . '/js/functions.js', array('jquery', 'jquery-caroufredsel', 'jquery-colorbox', 'jquery-fancybox'));
}
add_action('init', 'theme_init_theme');


add_action('after_setup_theme', 'theme_setup_theme');

# To override theme setup process in a child theme, add your own theme_setup_theme() to your child theme's
# functions.php file.
if ( ! function_exists( 'theme_setup_theme' ) ):
function theme_setup_theme() {
	include_once('lib/common.php');
	include_once('lib/carbon-fields/carbon-fields.php');

	# Theme supports
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails', array('post', 'slideshow', 'page', 'post-thumbnails'));
	
	# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
	// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
    //
    function new_excerpt_more($more) {
        global $post;
        return ' <a class="read-more" href="'. get_permalink($post->ID) .'">Show More</a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');

	# Register Theme Menu Locations
	add_theme_support('menus');
	register_nav_menus(array(
		'main-menu'=>__('Main Menu'),
		'footer-menu'=>__('Footer Menu'),
	));

	# Register CPTs
	include_once('options/post-types.php');
	
	# Attach custom widgets
	#include_once('lib/custom-widgets/widgets.php');
	#include_once('options/widgets.php');
	
	# Add Actions
	add_action('widgets_init', 'theme_widgets_init');
	add_action('carbon_register_fields', 'attach_theme_options');
	add_action('carbon_after_register_fields', 'attach_theme_help');

	# Add Custom image sizes
	add_image_size('single_post_thumb', 470, 198, true);
	add_image_size('post_category_listing', 290, 161, true);

	# Add Filters
	
}
endif;

# Register Sidebars
# Note: In a child theme with custom theme_setup_theme() this function is not hooked to widgets_init
function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Default Sidebar',
		'id' => 'default-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));

    register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

function attach_theme_options() {
	# Attach fields
	include_once('options/theme-options.php');
	include_once('options/custom-fields.php');
}

function attach_theme_help() {
	# Theme Help needs to be after options/theme-options.php
	include_once('lib/theme-help/theme-readme.php');
}


/* Custom code goes below this line. */

function capitol_get_social_networks() {
	return array(
		'facebook'  => 'http://fb.me',
		'twitter'   => 'http://twitter.com',
		'youtube'   => 'http://youtube.com',
		'instagram' => 'http://instagram.com',
		'myspace'   => 'http://myspace.com',
		'itunes'    => 'http://itunes.com',
		'vimeo'     => 'http://vimeo.com',
		'other'     => '#',
	);
}

function capitol_list_social_networks() {
	$networks = capitol_get_social_networks();
	foreach($networks as $network => $address) {
		$current_network = carbon_get_theme_option($network);
		if(empty($current_network)) {
			continue;
		} ?>
		<li><a class="<?php echo $network; ?>" href="<?php echo esc_url($current_network); ?>" target="_blank"></a></li>
	<?php }
}

function capitol_get_thumb_url($src, $w = '', $h = '', $zc = 1) {
	$src = urlencode($src);
	return get_bloginfo('template_directory') . '/lib/timthumb.php?src=' . $src . ( ($w) ? '&amp;w=' . $w : '') . ( ($h) ? '&amp;h=' . $h : '') . '&amp;zc=' . $zc;
}


add_filter('manage_posts_columns', 'capitol_custom_post_columns');
function capitol_custom_post_columns($defaults) {
	if(empty($_GET['post_type']) || $_GET['post_type'] == 'post') {
		$defaults['post_is_featured'] = 'Featured?';
	}
	return $defaults;
}

add_action('manage_post_posts_custom_column', 'capitol_custom_post_column_values', 10, 2);
function capitol_custom_post_column_values($column_name, $post_id) {
	if( $column_name == 'post_is_featured' ) {
		$featured = carbon_get_post_meta($post_id, '_is_featured');
		if($featured == 'yes') {
			echo '<span class="green-checkmark" title="This post is featured"></span>';
		}
	}
}

/* Custom code goes above this line. */
?>
