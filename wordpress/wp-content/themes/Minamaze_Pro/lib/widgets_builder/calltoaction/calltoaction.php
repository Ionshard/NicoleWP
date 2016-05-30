<?php
/**
 * Add Call To Action Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Call To Action - Specific for Harest theme
---------------------------------------------------------------------------------- */
class thinkup_builder_calltoactionspirits extends WP_Widget {

	/* Register widget description. */
	function thinkup_builder_calltoactionspirits() {
		$widget_ops = array('classname' => 'thinkup_builder_calltoactionspirits', 'description' => 'Add a call to action field to your content.' );
		parent::__construct('thinkup_builder_calltoactionspirits', 'Call To Action', $widget_ops);
	}

	/* Add widget structure to Admin area. */
	function form($instance) {
		$default_entries = array( 
			'title'         => '', 
			'heading'       => '', 
			'heading_size'  => '', 
			'teaser'        => '', 
			'button_text1'  => '', 
			'button_link1'  => '', 
			'button_color1' => '',
			'button_text2'  => '', 
			'button_link2'  => '', 
			'button_color2' => '',
		);
		$instance = wp_parse_args( (array) $instance, $default_entries );

		$title         = $instance['title'];
		$heading       = $instance['heading'];
		$heading_size  = $instance['heading_size'];
		$teaser        = $instance['teaser'];
		$button_text1  = $instance['button_text1'];
		$button_link1  = $instance['button_link1'];
		$button_color1 = $instance['button_color1'];
		$button_text2  = $instance['button_text2'];
		$button_link2  = $instance['button_link2'];
		$button_color2 = $instance['button_color2'];

		echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('heading') . '" style="display: inline-block;width: 150px;">Title:</label><input class="widefat" id="' . $this->get_field_id('heading') . '" name="' . $this->get_field_name('heading') . '" type="text" value="' . esc_attr($heading) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('heading_size') . '" style="display: inline-block;width: 150px;" >Heading Size (px):</label>
			<select name="' . $this->get_field_name('heading_size') . '" id="' . $this->get_field_id('heading_size') . '" style="display: inline-block;width: 200px;margin: 0;" >';
			echo '<option '; ?><?php if($heading_size == "0") { echo "selected"; } ?><?php echo ' value="0">Default</option>';
			foreach ( range(10,50) as $k ) {
				echo '<option '; ?><?php if( $heading_size == $k ) { echo "selected"; } ?><?php echo ' value="' . $k . '">' . $k . '</option>';
			}
		echo '</select>',
			 '</p>';

		echo '<p><label for="' . $this->get_field_id('teaser') . '" >Teaser:</label><textarea for="' . $this->get_field_id('teaser') . '" id="' . $this->get_field_id('teaser') . '" name="' . $this->get_field_name('teaser') . '" style="display: block; width: 100%; height: 100px;" >' . esc_attr($teaser) . '</textarea></p>';

		echo '<p><label for="' . $this->get_field_id('button_text1') . '" style="display: inline-block;width: 150px;">Button 1 Text:</label><input class="widefat" id="' . $this->get_field_id('button_text1') . '" name="' . $this->get_field_name('button_text1') . '" type="text" value="' . esc_attr($button_text1) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('button_link1') . '" style="display: inline-block;width: 150px;">Button 1 Link:</label><input class="widefat" id="' . $this->get_field_id('button_link1') . '" name="' . $this->get_field_name('button_link1') . '" type="text" value="' . esc_attr($button_link1) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('button_color1') . '" style="display: inline-block;width: 150px;" >Button 1 - Color:</label>
			<select name="' . $this->get_field_name('button_color1') . '" id="' . $this->get_field_id('button_color1') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($button_color1 == "style1") { echo "selected"; } ?><?php echo ' value="style1">Theme -> Black</option>
			<option '; ?><?php if($button_color1 == "style2") { echo "selected"; } ?><?php echo ' value="style2">Theme -> White</option>
			<option '; ?><?php if($button_color1 == "style3") { echo "selected"; } ?><?php echo ' value="style3">Black -> White</option>
			<option '; ?><?php if($button_color1 == "style4") { echo "selected"; } ?><?php echo ' value="style4">Black -> Theme</option>
			<option '; ?><?php if($button_color1 == "style5") { echo "selected"; } ?><?php echo ' value="style5">White -> Black</option>
			<option '; ?><?php if($button_color1 == "style6") { echo "selected"; } ?><?php echo ' value="style6">White -> Theme</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('button_text2') . '" style="display: inline-block;width: 150px;">Button 2 Text:</label><input class="widefat" id="' . $this->get_field_id('button_text2') . '" name="' . $this->get_field_name('button_text2') . '" type="text" value="' . esc_attr($button_text2) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('button_link2') . '" style="display: inline-block;width: 150px;">Button Link 2:</label><input class="widefat" id="' . $this->get_field_id('button_link2') . '" name="' . $this->get_field_name('button_link2') . '" type="text" value="' . esc_attr($button_link2) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('button_color2') . '" style="display: inline-block;width: 150px;" >Button 2 - Color:</label>
			<select name="' . $this->get_field_name('button_color2') . '" id="' . $this->get_field_id('button_color2') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($button_color2 == "style1") { echo "selected"; } ?><?php echo ' value="style1">Theme -> Black</option>
			<option '; ?><?php if($button_color2 == "style2") { echo "selected"; } ?><?php echo ' value="style2">Theme -> White</option>
			<option '; ?><?php if($button_color2 == "style3") { echo "selected"; } ?><?php echo ' value="style3">Black -> White</option>
			<option '; ?><?php if($button_color2 == "style4") { echo "selected"; } ?><?php echo ' value="style4">Black -> Theme</option>
			<option '; ?><?php if($button_color2 == "style5") { echo "selected"; } ?><?php echo ' value="style5">White -> Black</option>
			<option '; ?><?php if($button_color2 == "style6") { echo "selected"; } ?><?php echo ' value="style6">White -> Theme</option>
			</select>
		</p>';
}

	/* Assign variable values. */
	function update($new_instance, $old_instance) {
		$instance                  = $old_instance;
		$instance['title']         = $new_instance['title'];
		$instance['heading']       = $new_instance['heading'];
		$instance['heading_size']  = $new_instance['heading_size'];
		$instance['teaser']        = $new_instance['teaser'];
		$instance['button_text1']  = $new_instance['button_text1'];
		$instance['button_link1']  = $new_instance['button_link1'];
		$instance['button_color1'] = $new_instance['button_color1'];
		$instance['button_text2']  = $new_instance['button_text2'];
		$instance['button_link2']  = $new_instance['button_link2'];
		$instance['button_color2'] = $new_instance['button_color2'];
		return $instance;
	}

	/* Output widget to front-end. */
	function widget($args, $instance) {

		$heading       = $instance['heading'];
		$heading_size  = $instance['heading_size'];
		$teaser        = $instance['teaser'];
		$button_text1  = $instance['button_text1'];
		$button_link1  = $instance['button_link1'];
		$button_color1 = $instance['button_color1'];
		$button_text2  = $instance['button_text2'];
		$button_link2  = $instance['button_link2'];
		$button_color2 = $instance['button_color2'];

		extract($args, EXTR_SKIP);

		if ( ! empty( $heading ) ) {
			if ( $heading_size !== '0' ) {
				$heading = '<h3 style="font-size: ' . $heading_size . 'px;" >' . $heading . '</h3>';
			} else {
				$heading = '<h3>' . $heading . '</h3>';
			}
		}

		echo '<div id="introaction"><div id="introaction-core">';
			echo '<div class="action-text">' . $heading .'</div>';

			echo '<div class="action-teaser">',
				 wpautop( $teaser ),
				 '</div>';

			if ( !empty( $button_link1 ) or !empty( $button_link2 ) ) {

				// Set default value of buttons to "Read more"
				if( empty( $button_text1 ) ) { $button_text1 = 'Read More'; }
				if( empty( $button_text2 ) ) { $button_text2 = 'Read More'; }
				
				if( empty( $button_color1 ) ) { $button_color1 = 'style1'; }
				if( empty( $button_color2 ) ) { $button_color2 = 'style1'; }
				
				echo '<div class="action-link">';
					// Add call to action button 1
					if ( ! empty( $button_link1 ) ) {
						echo '<a class="themebutton ' . $button_color1 . '" href="' . $button_link1 . '">',
						$button_text1,
						'</a>';
					}

					// Add call to action button 2
					if ( ! empty( $button_link2 ) ) {
						echo '<a class="themebutton ' . $button_color2 . '" href="' . $button_link2 . '">',
						$button_text2,
						'</a>';
					}
					echo '</div>';
			}

		echo '</div></div>';
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_calltoactionspirits");') );

?>