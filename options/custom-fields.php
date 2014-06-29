<?php

Carbon_Container::factory('custom_fields', 'Slideshow settings')
	->show_on_post_type('slideshow')
	->add_fields(array(
		Carbon_Field::factory('text', 'slide_link', 'Link')
			->help_text('Entire image will link here'),
));

Carbon_Container::factory('custom_fields', 'Page rotator')
	->show_on_post_type('page')
	->add_fields(array(
        Carbon_Field::factory('complex', 'page_rotator', 'Slider')
			->add_fields(array(
				Carbon_Field::factory('image', 'slide')
				->help_text(''),
        )),
));

Carbon_Container::factory('custom_fields', 'Sidebar')
    ->show_on_post_type('page')
    ->add_fields(array(
        Carbon_Field::factory('checkbox', 'sidebar_option')
			->help_text('Check box to add the "Page" sidebar.'),
));
