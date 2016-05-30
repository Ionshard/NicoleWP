<?php
/**
 * Add Title Page Builder Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

class thinkup_builder_carouselportfolioharest extends WP_Widget {

	/* Register widget description. */
	function thinkup_builder_carouselportfolioharest() {
		$widget_ops = array('classname' => 'thinkup_builder_carouselportfolioharest', 'description' => 'Add a portfolio carousel to your content.' );
		parent::__construct('thinkup_builder_carouselportfolioharest', 'Portfolio (Carousel)', $widget_ops);
	}

	/* Add widget structure to Admin area. */
	function form($instance) {
		$default_entries = array( 
			'title'          => '',
			'link'           => '',
			'items'          => '', 
			'scroll'         => '', 
			'speed'          => '', 
			'effect'         => '', 
			'toggle_title'   => '', 
			'toggle_details' => '', 
			'category'       => '',
		);
		$instance = wp_parse_args( (array) $instance, $default_entries );

		$title          = $instance['title'];
		$link           = $instance['link'];
		$items          = $instance['items'];
		$scroll         = $instance['scroll'];
		$speed          = $instance['speed'];
		$effect         = $instance['effect'];
		$toggle_title   = $instance['toggle_title'];
		$toggle_details = $instance['toggle_details'];
		$category       = $instance['category'];

		echo '<p><label for="' . $this->get_field_id('title') . '" style="display: inline-block;width: 150px;">Module Title:</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('link') . '" style="display: inline-block;width: 150px;">Portfolio URL:</label><input class="widefat" id="' . $this->get_field_id('link') . '" name="' . $this->get_field_name('link') . '" type="text" value="' . esc_attr($link) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('items') . '" style="display: inline-block;width: 150px;" >Items:</label>
			<select name="' . $this->get_field_name('items') . '" id="' . $this->get_field_id('items') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($items == "2") { echo "selected"; } ?><?php echo ' value="2">2</option>
			<option '; ?><?php if($items == "3") { echo "selected"; } ?><?php echo ' value="3">3</option>
			<option '; ?><?php if($items == "4") { echo "selected"; } ?><?php echo ' value="4">4</option>
			<option '; ?><?php if($items == "5") { echo "selected"; } ?><?php echo ' value="5">5</option>
			<option '; ?><?php if($items == "6") { echo "selected"; } ?><?php echo ' value="6">6</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('scroll') . '" style="display: inline-block;width: 150px;" >Scroll:</label>
			<select name="' . $this->get_field_name('scroll') . '" id="' . $this->get_field_id('scroll') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($scroll == "1") { echo "selected"; } ?><?php echo ' value="1">1</option>
			<option '; ?><?php if($scroll == "2") { echo "selected"; } ?><?php echo ' value="2">2</option>
			<option '; ?><?php if($scroll == "3") { echo "selected"; } ?><?php echo ' value="3">3</option>
			<option '; ?><?php if($scroll == "4") { echo "selected"; } ?><?php echo ' value="4">4</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('speed') . '" style="display: inline-block;width: 150px;">Speed:</label><input class="widefat" id="' . $this->get_field_id('speed') . '" name="' . $this->get_field_name('speed') . '" type="text" value="' . esc_attr($speed) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		echo '<p><label for="' . $this->get_field_id('effect') . '" style="display: inline-block;width: 150px;" >Effect:</label>
			<select name="' . $this->get_field_name('effect') . '" id="' . $this->get_field_id('effect') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($effect == "none") { echo "selected"; } ?><?php echo ' value="none">None</option>
			<option '; ?><?php if($effect == "scroll") { echo "selected"; } ?><?php echo ' value="scroll">Scroll</option>
			<option '; ?><?php if($effect == "directscroll") { echo "selected"; } ?><?php echo ' value="directscroll">Direct Scroll</option>
			<option '; ?><?php if($effect == "fade") { echo "selected"; } ?><?php echo ' value="fade">Fade</option>
			<option '; ?><?php if($effect == "crossfade") { echo "selected"; } ?><?php echo ' value="crossfade">Crossfade</option>
			<option '; ?><?php if($effect == "cover") { echo "selected"; } ?><?php echo ' value="cover">Cover</option>
			<option '; ?><?php if($effect == "cover-fade") { echo "selected"; } ?><?php echo ' value="cover-fade">Coverfade</option>
			<option '; ?><?php if($effect == "uncover") { echo "selected"; } ?><?php echo ' value="uncover">Uncover</option>
			<option '; ?><?php if($effect == "uncover-fade") { echo "selected"; } ?><?php echo ' value="uncover-fade">Uncover Fade</option>
			</select>
		</p>';

		echo '<p><label for="' . $this->get_field_id('toggle_title') . '" style="display: inline-block;width: 150px;" >Toggle Project Title:</label>
			<select name="' . $this->get_field_name('toggle_title') . '" id="' . $this->get_field_id('toggle_title') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($toggle_title == "off") { echo "selected"; } ?><?php echo ' value="off">off</option>
			<option '; ?><?php if($toggle_title == "on") { echo "selected"; } ?><?php echo ' value="on">on</option>
			</select>
		</p>';
		
		echo '<p><label for="' . $this->get_field_id('toggle_details') . '" style="display: inline-block;width: 150px;" >Toggle Project Description:</label>
			<select name="' . $this->get_field_name('toggle_details') . '" id="' . $this->get_field_id('toggle_details') . '" style="display: inline-block;width: 200px;margin: 0;" >
			<option '; ?><?php if($toggle_details == "off") { echo "selected"; } ?><?php echo ' value="off">off</option>
			<option '; ?><?php if($toggle_details == "on") { echo "selected"; } ?><?php echo ' value="on">on</option>
			</select>
		</p>';
		
		echo '<p><label for="' . $this->get_field_id('category') . '" style="display: inline-block;width: 150px;">Category ID ( 0 = all ):</label><input class="widefat" id="' . $this->get_field_id('category') . '" name="' . $this->get_field_name('category') . '" type="text" value="' . esc_attr($category) . '" style="display: inline-block;width: 200px;margin: 0;" /></p>';

		// enqueue script to hide default carousel portfolio option
		wp_enqueue_style( 'carousel-portfolio-backend', get_template_directory_uri() . '/lib/widgets_builder/carousel_portfolio/css/carousel-portfolio-backend.css', '', '1.0.0' );
	}

	/* Assign variable values. */
	function update($new_instance, $old_instance) {
		$instance                   = $old_instance;
		$instance['title']          = $new_instance['title'];
		$instance['link']           = $new_instance['link'];
		$instance['items']          = $new_instance['items'];
		$instance['scroll']         = $new_instance['scroll'];
		$instance['speed']          = $new_instance['speed'];
		$instance['effect']         = $new_instance['effect'];
		$instance['toggle_title']   = $new_instance['toggle_title'];
		$instance['toggle_details'] = $new_instance['toggle_details'];
		$instance['category']       = $new_instance['category'];
		return $instance;
	}

	/* Output widget to front-end. */
	function widget($args, $instance) {

		$items          = $instance['items'];
		$link           = $instance['link'];
		$scroll         = $instance['scroll'];
		$speed          = $instance['speed'];
		$effect         = $instance['effect'];
		$toggle_title   = $instance['toggle_title'];
		$toggle_details = $instance['toggle_details'];
		$category       = $instance['category'];
		
		extract($args, EXTR_SKIP);
		
		if ( empty( $speed ) ) {
			$speed = '500';
		}
		if ( empty( $category ) ) {
			$category = '0';
		}

		if ( ! empty( $link ) ) {
			echo '<div class="carousel-portfolio-builder style2">';
			echo '<a href="' . $link . '" class="sc-carousel-button"><span>View All Projects</span></a>';
		} else {
			echo '<div class="carousel-portfolio-builder">';
		}

		echo do_shortcode( '[carousel_portfolio items="' . $items .'" scroll="' . $scroll . '" speed="' . $speed . '" effect="' . $effect . '" title="' . $toggle_title . '" details="' . $toggle_details . '" category="' . $category . '"]' );

		echo '</div>';
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_builder_carouselportfolioharest");') );

?>