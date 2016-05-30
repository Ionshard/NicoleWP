<?php
/**
 * Add Title Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

if( ! class_exists( 'thinkup_builder_gmaps' ) ) {

	class thinkup_builder_gmaps extends WP_Widget {

		/* Register widget description. */
		function thinkup_builder_gmaps() {
			$widget_ops = array('classname' => 'thinkup_builder_gmaps', 'description' => 'Add a Google map to your content.' );
			parent::__construct('thinkup_builder_gmaps', 'Google Map', $widget_ops);
		}

		/* Add widget structure to Admin area. */
		function form($instance) {
			$default_entries = array( 
				'title'        => '', 
				'address'      => '', 
				'window'       => '', 
				'zoom'         => '', 
				'height'       => '', 
				'scrollwheel'  => '',
				'wide'         => '',
			);
			$instance = wp_parse_args( (array) $instance, $default_entries );

			$title        = $instance['title'];
			$address      = $instance['address'];
			$window       = $instance['window'];
			$zoom         = $instance['zoom'];
			$height       = $instance['height'];
			$scrollwheel  = $instance['scrollwheel'];
			$wide         = $instance['wide'];

			echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('address') . '" style="display: inline-block;width: 150px;">Address:</label><input class="widefat" id="' . $this->get_field_id('address') . '" name="' . $this->get_field_name('address') . '" type="text" value="' . esc_attr($address) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('window') . '" style="display: inline-block;width: 150px;">Info Window:</label><input class="widefat" id="' . $this->get_field_id('window') . '" name="' . $this->get_field_name('window') . '" type="text" value="' . esc_attr($window) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

			echo '<p><label for="' . $this->get_field_id('zoom') . '" style="display: inline-block;width: 150px;" >Zoom Level:</label>
				<select name="' . $this->get_field_name('zoom') . '" id="' . $this->get_field_id('zoom') . '" style="display: inline-block;width: 200px;margin: 0;" >';
				foreach ( range( 1, 15 ) as $k ) {
					echo '<option '; ?><?php if( $zoom == $k ) { echo "selected"; } ?><?php echo ' value="' . $k . '">' . $k . '</option>';
				}
			echo '</select>',
				 '</p>';

			echo '<p><label for="' . $this->get_field_id('height') . '" style="display: inline-block;width: 150px;" >Map Height:</label>
				<select name="' . $this->get_field_name('height') . '" id="' . $this->get_field_id('height') . '" style="display: inline-block;width: 200px;margin: 0;" >';
				foreach ( range( 50, 400, 10 ) as $k ) {
					echo '<option '; ?><?php if( $height == $k ) { echo "selected"; } ?><?php echo ' value="' . $k . '">' . $k . '</option>';
				}
			echo '</select>',
				 '</p>';

			echo '<p><label for="' . $this->get_field_id('scrollwheel') . '" style="display: inline-block;width: 150px;">Enable Mouse Scroll?:</label>&nbsp;<input id="' . $this->get_field_id('scrollwheel') . '" name="' . $this->get_field_name('scrollwheel') . '" type="checkbox" '; ?><?php if($scrollwheel == "on") { echo 'checked=checked'; } ?><?php echo ' /></p>';

			echo '<p><label for="' . $this->get_field_id('wide') . '" style="display: inline-block;width: 150px;">Screen Wide?:</label>&nbsp;<input id="' . $this->get_field_id('wide') . '" name="' . $this->get_field_name('wide') . '" type="checkbox" '; ?><?php if($wide == "on") { echo 'checked=checked'; } ?><?php echo ' /><label style="padding-lefT: 10px;font-size: 90%;">Note: Only works with Parallax Page Template</label></p>';
		}

		/* Assign variable values. */
		function update($new_instance, $old_instance) {
			$instance                 = $old_instance;
			$instance['title']        = $new_instance['title'];
			$instance['address']      = $new_instance['address'];
			$instance['window']       = $new_instance['window'];
			$instance['zoom']         = $new_instance['zoom'];
			$instance['height']       = $new_instance['height'];
			$instance['scrollwheel']  = $new_instance['scrollwheel'];
			$instance['wide']         = $new_instance['wide'];
			return $instance;
		}

		/* Output widget to front-end. */
		function widget($args, $instance) {

			$address      = $instance['address'];
			$window       = $instance['window'];
			$zoom         = $instance['zoom'];
			$height       = $instance['height'];
			$scrollwheel  = $instance['scrollwheel'];
			$wide         = $instance['wide'];

			extract($args, EXTR_SKIP);

				if ( $wide == 'on' ) {
					$class_wide = ' sc-gmap3-wide';
				}

				echo '<div class="sc-gmap3' . $class_wide . '"><div class="gmap3" data-address="' . $address . '"  data-window="' . $window . '" data-zoom="' . $zoom . '" data-height="' . $height . '" data-wide="' . $wide . '" data-scrollwheel="' . $scrollwheel . '"></div></div>';

				// Enque scripts only if widget is being used
				
				wp_enqueue_script( 'gmaps-google', '//maps.google.com/maps/api/js?sensor=false&amp;language=en', array(), '', true );
				wp_enqueue_script( 'gmaps', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE) . 'inc/plugins/gmap3/gmap3.js', array(), '5.1.1', true );
				wp_enqueue_script( 'gmaps-js', plugin_dir_url(__FILE__) . 'js/gmaps-thinkup.js', array( 'jquery' ), '1.1', true );
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_gmaps");') );
}


?>