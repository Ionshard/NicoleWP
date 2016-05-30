<?php
/**
 * Add Notification Box to Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_notification' ) ) {

	class thinkup_builder_notification extends WP_Widget {

		/* Register widget description. */
		function thinkup_builder_notification() {
			$widget_ops = array('classname' => 'thinkup_builder_notification', 'description' => 'Add a notification box to your content.' );
			parent::__construct('thinkup_builder_notification', 'Notification Box', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title' => '', 
				'text'  => '', 
				'type'  => '',
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title = $instance['title'];
			$text  = $instance['text'];
			$type  = $instance['type'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 100px;" >Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('type') . '" >Content:</label><textarea for="' . $this->get_field_id('text') . '" id="' . $this->get_field_id('text') . '" name="' . $this->get_field_name('text') . '" style="display: block; width: 100%; height: 100px;" >' . esc_attr($text) . '</textarea></p>';

			echo '<p><label for="' . $this->get_field_id('type') . '" style="display: inline-block;width: 100px;" >Type:</label>
				<select name="' . $this->get_field_name('type') . '" id="' . $this->get_field_id('type') . '" style="display: inline-block;width: 200px; margin: 0px;" >
				<option '; ?><?php if($type == "download") { echo "selected"; } ?><?php echo ' value="download">Download</option>
				<option '; ?><?php if($type == "error") { echo "selected"; } ?><?php echo ' value="error">Error</option>
				<option '; ?><?php if($type == "info") { echo "selected"; } ?><?php echo ' value="info">Info</option>
				<option '; ?><?php if($type == "message") { echo "selected"; } ?><?php echo ' value="message">Message</option>
				<option '; ?><?php if($type == "normal") { echo "selected"; } ?><?php echo ' value="normal">Normal</option>
				<option '; ?><?php if($type == "question") { echo "selected"; } ?><?php echo ' value="question">Question</option>
				<option '; ?><?php if($type == "stop") { echo "selected"; } ?><?php echo ' value="stop">Stop</option>
				<option '; ?><?php if($type == "success") { echo "selected"; } ?><?php echo ' value="success">Success</option>
				<option '; ?><?php if($type == "warning") { echo "selected"; } ?><?php echo ' value="warning">Warning</option>
				</select>
			</p>';
		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance          = $old_instance;
			$instance['title'] = $new_instance['title'];
			$instance['text']  = $new_instance['text'];
			$instance['type']  = $new_instance['type'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {

			$title = $instance['title'];
			$text  = $instance['text'];
			$type  = $instance['type'];

			extract($args, EXTR_SKIP);

			echo '<div class="notification ' . $type . '">',
				 '<div class="icon">' . $text . '</div>',
				 '</div>';
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_notification");') );
}


?>