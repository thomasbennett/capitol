<?php

$general_fields = array(
	Carbon_Field::factory('separator', 'general', 'General'),
    Carbon_Field::factory('image', 'capitol_logo', 'Website logo'),
	Carbon_Field::factory('text', 'capitol_join_mail', 'Mailinglist URL'),
	Carbon_Field::factory('text', 'capitol_label_logo', 'Footer label logo'),
	Carbon_Field::factory('rich_text', 'capitol_footer_contact', 'Footer contact text')
		->help_text('Sits in the lower right bottom corner of the footer.'),
	Carbon_Field::factory('text', 'capitol_copyright', 'Copyright text')
		->help_text('Use {year} to use the current year.'),
);

$social_networks = capitol_get_social_networks();
$social_network_fields = array();
foreach($social_networks as $network => $address) {
	array_push($social_network_fields, Carbon_Field::factory('text', $network)
		->set_default_value($address));
}
array_unshift($social_network_fields, Carbon_Field::factory('separator', 'social_networks', 'Social networks'));

$script_fields = array(
	Carbon_Field::factory('separator', 'scripts', 'Scripts'),
	Carbon_Field::factory('header_scripts', 'header_script', 'Header script'),
	Carbon_Field::factory('footer_scripts', 'footer_script', 'Footer script'),
);

$carbon_fields = array_merge($general_fields, $social_network_fields, $script_fields);

Carbon_Container::factory('theme_options', 'Theme Options')
	->add_fields($carbon_fields);

# Dashboard Customization
function custom_dashboard_widget() {
    include_once('dashboard.php');
}
add_action('admin_footer', 'custom_dashboard_widget');

# Theme Cleanup
function disable_default_dashboard_widgets() {

  # Dashboard
	#remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	#remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	#remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');

  # remove additional plugins
    # tribe events calendar
    # remove_meta_box('tribe_dashboard_widget', 'dashboard', 'normal');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

# Cleanup wp_head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator'); //removes WP Version # for security
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

