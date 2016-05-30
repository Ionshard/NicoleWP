<?php
$items    = NULL;
$title    = NULL;
$details  = NULL;
$show     = NULL;
$scroll   = NULL;
$speed    = NULL;
$effect   = NULL;
$category = NULL;

$items    = $atts['items'];
$title    = $atts['title'];
$details  = $atts['details'];
$show     = $atts['items'];
$scroll   = $atts['scroll'];
$speed    = $atts['speed'];
$effect   = $atts['effect'];
$category = $atts['category'];

if ( $items == '1' ) {
	$items  = 'column1-2/3';
} else if ( $items == '2' ) {
	$items  = 'column2-2/3';
} else if ( $items == '3' ) {
	$items  = 'column3-2/3';
} else if ( $items >= '4' ) {
	$items  = 'column4-2/3';
} else {
	$items  = 'column2-1/2';
}

$args = array(
	'post_type'   => 'post',
	'numberposts' => 10,
	'post_status' => 'publish',
	'category'    => $category,
	);
$recent_posts = wp_get_recent_posts( $args );

echo '<div class="sc-carousel carousel-blog" data-show="' . $show . '" data-scroll="' . $scroll . '" data-speed="' . $speed . '" data-effect="' . $effect . '">',
	 '<ul id="' . $instanceID . '">';
	 foreach( $recent_posts as $recent ){
	 $post_id = get_post_thumbnail_id( $recent["ID"] );
	 $post_img = wp_get_attachment_image_src($post_id, $items, true);
	 $post_img_full = wp_get_attachment_image_src($post_id, 'full', true);
	if ( ! empty( $post_id ) ) {
		echo '<li>',
			 '<div class="entry-header">',
			 '<a href="' . get_permalink( $recent["ID"] ) . '" ><img src="' . $post_img[0] . '" alt="' . $recent["post_title"] . '" /></a>',
			 '<div class="image-overlay">',
				'<div class="image-overlay-inner">',
				'<div class="hover-icons">',
				'<a class="hover-zoom prettyPhoto" href="'. $post_img_full[0] . '"><i></i></a>',
				'<a class="hover-link" href="'. get_permalink( $recent["ID"] ) . '"><i></i></a>',
				'</div>',
			 '</div>',
			 '</div>',
			 '</div>';
		
		if ( $title == 'on' ) {
			echo '<div class="entry-content">',			 
			'<h4><a href="' . get_permalink( $recent["ID"] ) . '" >' . $recent["post_title"] . '</a></h4>',
			'</div>';
		}

		if ( $details == 'on' ) {
			echo '<div class="entry-footer">';

				 $post_categories = wp_get_post_categories( $recent["ID"] );
				 $cats = array();
				 $cats_count = count($post_categories);
				 foreach($post_categories as $c){
					$count++;
					$cat = get_category( $c );
					$cat_name = $cat->name;
					$cat_id = get_cat_ID( $cat_name );
					$cat_url = get_category_link( $cat_id );

					if ( $count < $cats_count ) {
						echo '<a href="' . $cat_url . '">' . $cat_name . '</a>, ';
					} else {
						echo '<a href="' . $cat_url . '">' . $cat_name . '</a>';
					}
				 }
				 $count = NULL;
				 
				 $comment_count = (int) get_comments_number( $recent["ID"] );
				 
				 echo	'<span class="comment"><i class="fa fa-comments"></i>',
						'<a href="' . get_comments_link( $recent["ID"] ) . '">' . $comment_count .'</a>',
						'</span>';

			echo '</div>';
		}

		 '</li>';
	}
}
echo '</ul>',
	 '<div class="caroufredsel_nav">',
	 '<a class="prev" id="' . $instanceID . '_prev" href="#"><i class="fa fa-angle-left"></i></a>',
	 '<a class="next" id="' . $instanceID . '_next" href="#"><i class="fa fa-angle-right"></i></a>',
//	 '<div class="pagination" id="' . $instanceID . '_pag"></div>',
	 '</div>',
	 '<div class="clearboth"></div>',
	 '</div>';

?>