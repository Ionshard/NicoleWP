<?php
/**
 * Add Seperator Page Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_seperator' ) ) {

	class thinkup_builder_seperator extends WP_Widget {

		/* Register widget description. */
		function thinkup_builder_seperator() {
			$widget_ops = array('classname' => 'thinkup_builder_seperator', 'description' => 'Add a separator to create perfect gaps.' );
			parent::__construct('thinkup_builder_seperator', 'Separator', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title'     => '', 
				'seperator' => '', 
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title   = $instance['title'];
			$seperator = $instance['seperator'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;" >Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('seperator') . '" style="display: inline-block;width: 150px;" >Seperator Height (px):</label>
				<select name="' . $this->get_field_name('seperator') . '" id="' . $this->get_field_id('seperator') . '" style="display: inline-block;width: 200px;margin: 0;" >
				<option '; ?><?php if($seperator == "1") { echo "selected"; } ?><?php echo ' value="1">10</option>
				<option '; ?><?php if($seperator == "2") { echo "selected"; } ?><?php echo ' value="2">20</option>
				<option '; ?><?php if($seperator == "3") { echo "selected"; } ?><?php echo ' value="3">30</option>
				<option '; ?><?php if($seperator == "4") { echo "selected"; } ?><?php echo ' value="4">40</option>
				<option '; ?><?php if($seperator == "5") { echo "selected"; } ?><?php echo ' value="5">50</option>
				<option '; ?><?php if($seperator == "6") { echo "selected"; } ?><?php echo ' value="6">60</option>
				<option '; ?><?php if($seperator == "7") { echo "selected"; } ?><?php echo ' value="7">70</option>
				<option '; ?><?php if($seperator == "8") { echo "selected"; } ?><?php echo ' value="8">80</option>
				<option '; ?><?php if($seperator == "9") { echo "selected"; } ?><?php echo ' value="9">90</option>
				<option '; ?><?php if($seperator == "10") { echo "selected"; } ?><?php echo ' value="10">100</option>
				</select>
			</p>';

		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance              = $old_instance;
			$instance['title']     = $new_instance['title'];		
			$instance['seperator'] = $new_instance['seperator'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {
			
			extract($args, EXTR_SKIP);

			$seperator = $instance['seperator'] * 10;

			if ( ! empty( $seperator ) ) {
				echo '<div class="margin' . $seperator . '"></div>';
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_seperator");') );
}


?>