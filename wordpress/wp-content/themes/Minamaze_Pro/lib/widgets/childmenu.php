<?php
/**
 * Add Categories Widget.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	Categories
---------------------------------------------------------------------------------- */

class thinkup_widget_childmenu extends WP_Widget {

	/* Register widget description. */
	function thinkup_widget_childmenu() {
		$widget_ops = array('classname' => 'thinkup_widget_childmenu', 'description' => 'Display a menu of child pages.' );
		parent::__construct('thinkup_widget_childmenu', 'ThinkUpThemes: Child Pages Menu', $widget_ops);
	}

	/* Add widget structure to Admin area. */
	function form($instance) {
		$default_entries = array( 
			'parentpage' => '', 
			'sortby'     => '', 
			'sortorder'  => '', 
		);
		$instance = wp_parse_args( (array) $instance, $default_entries );

		$parentpage = $instance['parentpage'];
		$sortby     = $instance['sortby'];
		$sortorder  = $instance['sortorder'];

		echo '<p><label for="' . $this->get_field_id('parentpage') . '">' . __( 'Parent Page', 'minamaze' ) . ': 
			 <select name="' . $this->get_field_name('parentpage') . '" id="' . $this->get_field_id('parentpage') . '" >';
			 $pages = get_pages( array( 'parent' => 0 ) ); 
			 foreach ( $pages as $page ) {
				echo '<option '; ?><?php if( $parentpage == $page->ID ) { echo "selected"; } ?><?php echo ' value="' . $page->ID . '">' . $page->post_title . '</option>';
			 }
		echo '</select>
			 </label></p>';
			 
		echo '<p><label for="' . $this->get_field_id('sortby') . '" >' . __( 'Sort By', 'minamaze' ) . ':
			<select name="' . $this->get_field_name('sortby') . '" id="' . $this->get_field_id('sortby') . '" style="margin-left: 55px;width: 155px;" >
			<option '; ?><?php if($sortby == "post_author") { echo "selected"; } ?><?php echo ' value="post_author">Author Name</option>
			<option '; ?><?php if($sortby == "post_modified") { echo "selected"; } ?><?php echo ' value="post_modified">Date Modified</option>
			<option '; ?><?php if($sortby == "menu_order") { echo "selected"; } ?><?php echo ' value="menu_order">Menu Order</option>
			<option '; ?><?php if($sortby == "ID") { echo "selected"; } ?><?php echo ' value="ID">Page ID</option>
			<option '; ?><?php if($sortby == "post_title") { echo "selected"; } ?><?php echo ' value="post_title">Page Title</option>
			<option '; ?><?php if($sortby == "post_date") { echo "selected"; } ?><?php echo ' value="post_date">Post Date</option>
			<option '; ?><?php if($sortby == "post_name") { echo "selected"; } ?><?php echo ' value="post_name">Post Slug</option>
			</select>
		</label></p>';		 
			 
		echo '<p><label for="' . $this->get_field_id('sortorder') . '" >' . __( 'Sort Order', 'minamaze' ) . ':
			<select name="' . $this->get_field_name('sortorder') . '" id="' . $this->get_field_id('sortorder') . '" style="margin-left: 35px;width: 155px;" >
			<option '; ?><?php if($sortorder == "ASC") { echo "selected"; } ?><?php echo ' value="ASC">Ascending</option>
			<option '; ?><?php if($sortorder == "DESC") { echo "selected"; } ?><?php echo ' value="DESC">Descending</option>
			</select>
		</label></p>';
	}

	/* Assign variable values. */
	function update($new_instance, $old_instance) {
		$instance               = $old_instance;
		$instance['parentpage'] = $new_instance['parentpage'];
		$instance['sortby']     = $new_instance['sortby'];
		$instance['sortorder']  = $new_instance['sortorder'];
		return $instance;
	}

	/* Output widget to front-end. */
	function widget($args, $instance) {

		$parentpage = $instance['parentpage'];
		$sortby     = $instance['sortby'];
		$sortorder  = $instance['sortorder'];

		extract($args, EXTR_SKIP);
	 
		echo $before_widget;

		$parentpage = $instance['parentpage'];
		$sortby     = $instance['sortby'];
		$sortorder  = $instance['sortorder'];

		$args = array(
			'child_of'    => $parentpage,
			'sort_column' => $sortby,
			'sort_order'  => $sortorder,
		); 
		$pages = get_pages( $args ); 

		echo '<ul>';
			foreach ( $pages as $page ) {
				if( get_permalink( $page->ID ) == get_permalink() ) {
					$input_class = ' class="active"'; 
				} else { 
					$input_class = ''; 
				}
				echo '<li><a href="' . get_permalink( $page->ID ) . '"' . $input_class . '>' . $page->post_title . '</a></li>';
			}
		echo '</ul>';


		echo $after_widget;
	  }

}
add_action( 'widgets_init', create_function('', 'return register_widget("thinkup_widget_childmenu");') );

?>