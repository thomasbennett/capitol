<?php
/*
* Register the new widget classes here so that they show up in the widget list
*/
function load_widgets() {
	register_widget('LatestTweets');
	// register_widget('MyWidget');
}
add_action('widgets_init', 'load_widgets');

/*
class MyWidget extends Carbon_Widget {
	protected $form_options = array(
		'width' => 400
	);
	function MyWidget() {
		$dummy_options = array('aaaa' => 'option one', 'bbbbb' => 'option two', 'cccc' => 'option three');

		$this->setup('test widget', 'some description', array(
			Carbon_Field::factory('text', 'myy_text'),
			// Carbon_Field::factory('textarea', 'myy_textarea'),
			Carbon_Field::factory('date', 'myy_date'),
			// Carbon_Field::factory('color', 'myy_color'),
			// Carbon_Field::factory('map', 'myy_map'),
			// Carbon_Field::factory('select', 'myy_select')->add_options($dummy_options),
			// Carbon_Field::factory('radio', 'myy_radio')->add_options($dummy_options),
			// Carbon_Field::factory('checkbox', 'myy_checkbox'),
			// Carbon_Field::factory('separator', 'myy_separator'),
			// Carbon_Field::factory('set', 'myy_set')->add_options($dummy_options),
			// Carbon_Field::factory('file', 'myy_file'),
			// Carbon_Field::factory('image', 'myy_image'),
			// Carbon_Field::factory('rich_text', 'myy_rich_text'),
			// Carbon_Field::factory('choose_sidebar', 'myy_choose_sidebar'),
			// Carbon_Field::factory('map_with_address', 'myy_map_with_address')
		));
	}
}
*/

/*
* Displays a block with latest tweets from particular user
*/
class LatestTweets extends ThemeWidgetBase {
	function LatestTweets() {
		$widget_opts = array(
			'classname' => 'theme-widget',
			'description' => 'Displays a block with your latest tweets'
		);
		$this->WP_Widget('theme-widget-latest-tweets', 'Latest Tweets', $widget_opts);
		$this->custom_fields = array(
			array(
				'name'=>'title',
				'type'=>'text',
				'title'=>'Title',
				'default'=>''
			),
			array(
				'name'=>'username',
				'type'=>'text',
				'title'=>'Username',
				'default'=>''
			),
			array(
				'name'=>'count',
				'type'=>'text',
				'title'=>'Number of Tweets to show',
				'default'=>'5'
			),
		);
	}
	
	/*
	* Called when rendering the widget in the front-end
	*/
	function front_end($args, $instance) {
		extract($args);
		$tweets = TwitterHelper::get_tweets($instance['username'], $instance['count']);
		if (!empty($tweets)) {
			if ($instance['title'])
				echo $before_title . $instance['title'] . $after_title;
		}
		?>
		<ul>
			<?php foreach ($tweets as $tweet): ?>
				<li><?php echo $tweet->tweet_text ?> - <span><?php echo $tweet->time_distance ?> ago</span></li>
			<?php endforeach ?>
		</ul>
		<?php
	}
}

/*
* An example widget
*/
class ThemeWidgetExample extends ThemeWidgetBase {
	/*
	* Register widget function. Must have the same name as the class
	*/
	function ThemeWidgetExample() {
		$widget_opts = array(
			'classname' => 'theme-widget', // class of the <li> holder
			'description' => __( 'Displays a block with title/text' ) // description shown in the widget list
		);
		// Additional control options. Width specifies to what width should the widget expand when opened
		$control_ops = array(
			//'width' => 350,
		);
		// widget id, widget display title, widget options
		$this->WP_Widget('theme-widget-example', 'Theme Widget - Example', $widget_opts, $control_ops);
		$this->custom_fields = array(
			array(
				'name'=>'title', // field name
				'type'=>'text', // field type (text, textarea, integer etc.)
				'title'=>'Title', // title displayed in the widget form
				'default'=>'Hello World!' // default value
			),
			array(
				'name'=>'text',
				'type'=>'textarea',
				'title'=>'Content', 
				'default'=>'Lorem Ipsum dolor sit amet'
			),
		);
	}
	
	/*
	* Called when rendering the widget in the front-end
	*/
	function front_end($args, $instance) {
		extract($args);
		if ($instance['title'] != '') {
			echo $before_title . $instance['title'] . $after_title;
		}
		?>
		<p><?php echo $instance['text'];?></p>
		<?php
	}
}
?>
