<?php
// Register the Widget
wp_register_sidebar_widget(
    'example_widget',			// your unique widget id
    'Example Widget',			// widget name
    'example_widget_callback',  // callback function to display widget
    array(                      // options
        'description' => 'Description of what your widget does'
    )
);
// Add the Widget Controlls
wp_register_widget_control(
	'example_widget',			// id
	'example_widget',			// name
	'example_widget_control'	// callback function
);

function example_widget_control($args=array(), $params=array()) {
	//the form is submitted, save into database
	if (isset($_POST['submitted'])) {
		update_option('about_us_widget_title', $_POST['widgettitle']);
		update_option('about_us_widget_twitterurl', $_POST['twitterurl']);
		update_option('about_us_widget_description', $_POST['description']);
	}

	//load options
	$widgettitle = get_option('about_us_widget_title');
	$twitterurl = get_option('about_us_widget_twitterurl');
	$description = get_option('about_us_widget_description');
	?>

	Widget Title:<br />
	<input type="text" class="widefat" name="widgettitle" value="<?php echo stripslashes($widgettitle); ?>" />
	<br /><br />

	Description about you:<br />
	<textarea class="widefat" rows="5" name="description"><?php echo stripslashes($description); ?></textarea>
	<br /><br />

	Twitter Profile URL:<br />
	<input type="text" class="widefat" name="twitterurl" value="<?php echo stripslashes($twitterurl); ?>" />
	<br /><br />

	<input type="hidden" name="submitted" value="1" />
	<?php
}
function example_widget_callback($args=array(), $params=array()) {
	//load options
	$widgettitle = get_option('about_us_widget_title');
	$description = get_option('about_us_widget_description');
	$twitterurl = get_option('about_us_widget_twitterurl');

	//widget output
	echo stripslashes($args['before_widget']);

	echo stripslashes($args['before_title']);
	echo stripslashes($widgettitle);
	echo stripslashes($args['after_title']);

	echo '<div class="textwidget">'.stripslashes(nl2br($description));

	if ($twitterurl != '') {
		echo '<p><a href="'.stripslashes($twitterurl).'" target="_blank">Follow us on Twitter</a></p>';
	}

	echo '</div>';//close div.textwidget
  echo stripslashes($args['after_widget']);
}
?>