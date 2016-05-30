<?php
$items    = NULL;
$title    = NULL;
$tags     = NULL;
$show     = NULL;
$scroll   = NULL;
$speed    = NULL;
$effect   = NULL;
$style    = NULL;
$category = NULL;

$items    = $atts['items'];
$title    = $atts['title'];
$tags     = $atts['tags'];
$show     = $atts['items'];
$scroll   = $atts['scroll'];
$speed    = $atts['speed'];
$effect   = $atts['effect'];
$style    = $atts['style'];
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
	'post_type'   => 'portfolio',
	'numberposts' => 10,
	'post_status' => 'publish',
	'category'    => $category,
	);

$recent_posts = wp_get_recent_posts( $args );

echo '<div class="sc-carousel carousel-portfolio" data-show="' . $show . '" data-scroll="' . $scroll . '" data-speed="' . $speed . '" data-effect="' . $effect . '">',
	 '<ul id="' . $instanceID . '">';
	 foreach( $recent_posts as $recent ){
	 $post_id = get_post_thumbnail_id( $recent["ID"] );
	 $post_img = wp_get_attachment_image_src($post_id, $items, true);
	 $post_img_full = wp_get_attachment_image_src($post_id, 'full', true);
	if ( ! empty( $post_id ) ) {
		echo '<li>';

		if( $style == 'boxed' ) echo '<div class="port-style2">';

		echo '<div class="port-thumb">',
			 '<a href="' . get_permalink( $recent["ID"] ) . '" ><img src="' . $post_img[0] . '" alt="' . $recent["post_title"] . '" /></a>',
			 '<div class="image-overlay">',
				'<div class="image-overlay-inner">',
				'<div class="hover-icons">',
				'<a class="hover-zoom prettyPhoto" href="'. $post_img_full[0] . '"><i>+</i></a>',
				'<a class="hover-link" href="'. get_permalink( $recent["ID"] ) . '"><i class="dashicons dashicons-admin-links"></i></a>',
				'</div>',
			 '</div>',
			 '</div>',
			 '</div>';



		if ( $title == 'on' or $tags == 'on' ) {
		echo '<div class="port-details">';
		
		if ( $title == 'on' ) {
			echo '<div class="entry-content">',			 
			'<h4><a href="' . get_permalink( $recent["ID"] ) . '" >' . $recent["post_title"] . '</a></h4>',
			'</div>';
		}

		if ( $tags == 'on' ) {
			echo '<div class="entry-footer">';

				$terms = get_the_terms( $recent["ID"], 'tagportfolio' );
				if ( $terms && ! is_wp_error( $terms ) ) : 
					$links = array();
					foreach ( $terms as $term ) { $links[] = $term->name; }
					$tax = join( " ", $links );		
				else :	
					$tax = '';	
				endif;

				if ( empty( $tax ) ) {
					echo '<p class="port-tags">.</p>';
				} else {
					echo '<p class="port-tags">' . $tax . '</p>';
				}

				$comment_count = (int) get_comments_number( $recent["ID"] );
				 
				echo '<span class="comment"><i class="fa fa-comments"></i>',
					 '<a href="' . get_comments_link( $recent["ID"] ) . '">' . $comment_count .'</a>',
					 '</span>';

			echo '</div>';
		}

		echo '</div>';	
		}

		if( $style == 'boxed' ) echo '</div>';

		echo '</li>';
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