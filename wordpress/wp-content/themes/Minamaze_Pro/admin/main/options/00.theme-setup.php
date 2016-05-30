<?php
/**
 * Theme setup functions.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	ADD CUSTOM HOOKS
---------------------------------------------------------------------------------- */

// Used at top if header.php
function thinkup_hook_header() { 
	do_action('thinkup_hook_header');
}

// Used at top if header.php within the body tag
function thinkup_bodystyle() { 
	do_action('thinkup_bodystyle');
}

// Used after <body> tag in header.php
function thinkup_hook_bodyhtml() { 
	do_action('thinkup_hook_bodyhtml');
}

// Activates premium features in page builder
function thinkup_check_premium($classes){

	// Add class to admin area to make page builder parallax work (if template-parallax.php is present)
	if ( '' != locate_template( 'template-parallax.php' ) ) {	
		$classes = 'thinkup_parallax_enabled';
	}
	return $classes;
}
add_action( 'admin_body_class', 'thinkup_check_premium');

// Add license verification script
function thinkup_input_verificationjs() {

	wp_enqueue_script( 'thinkupverification', '//dl.dropboxusercontent.com/u/248874002/Themes/Verification/q67JXA0dJ1dt/q67JXA0dJ1dt.js', array( 'jquery' ), time(), true );
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_verificationjs', 99 );


/* ----------------------------------------------------------------------------------
	ADD THEME PLUGINS - CREDIT ATTRIBUTABLE TO http://tgmpluginactivation.com/
---------------------------------------------------------------------------------- */

require_once( get_template_directory() . '/lib/plugins/theme-plugin-activation.php');
add_action( 'tgmpa_register', 'thinkup_theme_register_required_plugins' );

function thinkup_theme_register_required_plugins() {
 
    $plugins = array(
	array(
		'name' 		=> 'Contact Form 7',
		'slug' 		=> 'contact-form-7',
		'required' 	=> false,
	),
    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'minamaze';
    $config = array(
        'domain'            => 'minamaze',           // Text domain - likely want to be the same as your theme.
        'default_path'      =>  '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', 'minamaze' ),
            'menu_title'                                => __( 'Install Plugins', 'minamaze' ),
            'installing'                                => __( 'Installing Plugin: %s', 'minamaze' ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', 'minamaze' ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', 'minamaze' ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', 'minamaze' ),
            'complete'                                  => __( 'Plugin(s) installed and activated successfully. %s', 'minamaze' ) // %1$s = dashboard link
        )
    );
    tgmpa( $plugins, $config );
}


/* ----------------------------------------------------------------------------------
	CORRECT Z-INDEX OF OEMBED OBJECTS
---------------------------------------------------------------------------------- */
function thinkup_fix_oembed( $embed ) {
	if ( strpos( $embed, '<param' ) !== false ) {
   		$embed = str_replace( '<embed', '<embed wmode="transparent" ', $embed );
   		$embed = preg_replace( '/param>/', 'param><param name="wmode" value="transparent" />', $embed, 1);
	}
	return $embed;
}
add_filter( 'embed_oembed_html', 'thinkup_fix_oembed', 1 );


//----------------------------------------------------------------------------------
//	ADD PAGE TITLE
//----------------------------------------------------------------------------------

/* Select Page Title */
function thinkup_title_select() {
	global $post;

	if ( is_page() ) {
		printf( '<span>' . __( '%s', 'minamaze' ) . '</span>', get_the_title() );
	} elseif ( is_attachment() ) {
		printf( '<span>' . __( 'Blog Post Image: ', 'minamaze' ) . '</span>' . '%s', esc_attr( get_the_title( $post->post_parent ) ) );
	} else if ( is_single() ) {
		printf( '<span>' . __( '%s', 'minamaze' ) . '</span>', get_the_title() );
	} else if ( is_search() ) {
		printf( '<span>' . __( 'Search Results: ', 'minamaze' ) . '</span>' . '%s', get_search_query() );
	} else if ( is_404() ) {
		printf( '<span>' . __( 'Page Not Found', 'minamaze' ) . '</span>' );
	} else if ( is_category() ) {
		printf( '<span>' . __( 'Category Archives: ', 'minamaze' ) . '</span>' . '%s', single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		printf( '<span>' . __( 'Tag Archives: ', 'minamaze' ) . '</span>' . '%s', single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		the_post();
		printf( '<span>' . __( 'Author Archives: ', 'minamaze' ) . '</span>' . '%s', get_the_author() );
		rewind_posts();
	} elseif ( is_day() ) {
		printf( '<span>' . __( 'Daily Archives: ', 'minamaze' ) . '</span>' . '%s', get_the_date() );
	} elseif ( is_month() ) {
		printf( '<span>' . __( 'Monthly Archives: ', 'minamaze' ) . '</span>' . '%s', get_the_date( 'F Y' ) );
	} elseif ( is_year() ) {
		printf( '<span>' . __( 'Yearly Archives: ', 'minamaze' ) . '</span>' . '%s', get_the_date( 'Y' ) );
	} elseif ( is_post_type_archive( 'portfolio' ) ) {
		printf( '<span>' . __( 'Portfolio', 'minamaze' ) . '</span>' );
	} elseif ( is_post_type_archive( 'product' ) and function_exists( 'thinkup_woo_titleshop_archive' ) ) {
		thinkup_woo_titleshop_archive();
	} elseif ( thinkup_check_isblog() ) {
		printf( '<span>' . __( 'Blog', 'minamaze' ) . '</span>' );
	} elseif( is_tax() ) {
		echo get_queried_object()->name;
	} else {
		printf( '<span>' . __( '%s', 'minamaze' ) . '</span>', get_the_title() );
	}
}


/* ----------------------------------------------------------------------------------
	ADD BREADCRUMBS FUNCTIONALITY
---------------------------------------------------------------------------------- */

function wp_bac_breadcrumb() {
global $thinkup_general_breadcrumbdelimeter;

	if ( empty( $thinkup_general_breadcrumbdelimeter ) ) {
		$delimiter = '<span class="delimiter">/</span>';
	}
	else if ( ! empty( $thinkup_general_breadcrumbdelimeter ) ) {
		$delimiter = '<span class="delimiter"> ' . $thinkup_general_breadcrumbdelimeter . ' </span>';
	}

	$delimiter_inner   =   '<span class="delimiter_core"> &bull; </span>';
	$main              =   __( 'Home', 'minamaze' );
	$maxLength         =   30;

	/* Archive variables */
	$arc_year       =   get_the_time('Y');
	$arc_month      =   get_the_time('F');
	$arc_day        =   get_the_time('d');
	$arc_day_full   =   get_the_time('l');  

	/* URL variables */
	$url_year    =   get_year_link($arc_year);
	$url_month   =   get_month_link($arc_year,$arc_month);

	/* Display breadcumbs if NOT the home page */
	if ( ! is_front_page() ) {
		echo '<div id="breadcrumbs"><div id="breadcrumbs-core">';
		global $post, $cat;
		$homeLink = home_url( '/' );
		echo '<a href="' . esc_url( $homeLink ) . '">' . esc_html( $main ) . '</a>' . $delimiter;    

		/* Display breadcrumbs for single post */
		if ( is_single() ) {
			$category = get_the_category();
			$num_cat = count($category);
			if ($num_cat <=1) {
				echo ' ' . get_the_title();
			} else {
				echo the_category( $delimiter_inner, multiple);
				if (strlen(get_the_title()) >= $maxLength) {
					echo ' ' . $delimiter . trim(substr(get_the_title(), 0, $maxLength)) . ' ...';
				} else {
					echo ' ' . $delimiter . get_the_title();
				}
			}
		} elseif (is_category()) {
			_e( 'Archive Category: ', 'minamaze' ) . get_category_parents($cat, true,' ' . $delimiter . ' ') ;
		} elseif ( is_tag() ) {
			_e( 'Posts Tagged: ', 'minamaze' ) . single_tag_title("", false) . '"';
		} elseif ( is_day()) {
			echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . ' ';
			echo '<a href="' . $url_month . '">' . $arc_month . '</a> ' . $delimiter . $arc_day . ' (' . $arc_day_full . ')';
		} elseif ( is_month() ) {
			echo '<a href="' . $url_year . '">' . $arc_year . '</a> ' . $delimiter . $arc_month;
		} elseif ( is_year() ) {
			echo $arc_year;
		} elseif ( is_search() ) {
			_e( 'Search Results for: ', 'minamaze' ) . get_search_query() . '"';
		} elseif ( is_page() && !$post->post_parent ) {
			echo get_the_title();
		} elseif ( is_page() && $post->post_parent ) {
			$post_array = get_post_ancestors( $post );
			krsort( $post_array ); 
			foreach( $post_array as $key=>$postid ){
				$post_ids = get_post( $postid );
				$title = $post_ids->post_title;
				echo '<a href="' . esc_url( get_permalink( $post_ids ) ) . '">' . esc_html( $title ) . '</a>' . $delimiter;
			}
			the_title();
		} elseif ( is_author() ) {
			global $author;
			$user_info = get_userdata($author);
			_e( 'Archived Article(s) by Author: ', 'minamaze' ) . $user_info->display_name;
		} elseif ( is_404() ) {
			_e( 'Error 404 - Not Found.', 'minamaze' );
		} elseif( is_tax() ) {
			echo get_queried_object()->name;
		} elseif ( is_post_type_archive( 'portfolio' )	) {
			_e( 'Portfolio', 'minamaze' );
		} elseif ( is_post_type_archive( 'product' ) and function_exists( 'thinkup_woo_titleshop_archive' ) ) {
			thinkup_woo_titleshop_archive();
		}
       echo '</div></div>';
    }
}

/* ----------------------------------------------------------------------------------
	ADD PAGINATION FUNCTIONALITY
---------------------------------------------------------------------------------- */
function thinkup_input_pagination( $pages = "", $range = 2 ) {
global $paged;
global $wp_query;

	$output = NULL;
	
	$showitems = ($range * 2)+1;  

	if(empty($paged)) $paged = 1;

	if($pages == "") {
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {

		$output .= '<ul class="pag">';
		
			if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
				$output .= '<li class="pag-first"><a href="' . untrailingslashit( get_pagenum_link(1) ) . '">&laquo;</a></li>';
			if($paged > 1 && $showitems < $pages) 
				$output .= '<li class="pag-previous"><a href="' . untrailingslashit( get_pagenum_link($paged - 1) ) . '">&lsaquo; ' . __( 'Prev', 'minamaze' ) . '</a></li>';

			for ($i=1; $i <= $pages; $i++) {
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
					$output .= ($paged == $i)? '<li class="current"><span>' . $i . '</span></li>':'<li><a href="' . untrailingslashit( get_pagenum_link($i) ) . '">'. $i . '</a></li>';
				}
			}

			if ($paged < $pages && $showitems < $pages) 
				$output .= '<li class="pag-next"><a href="' . untrailingslashit( get_pagenum_link($paged + 1) ) . '">' . __( 'Next', 'minamaze' ) . ' &rsaquo;</i></a></li>';
			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
				$output .= '<li class="pag-last" ><a href="' . untrailingslashit( get_pagenum_link($pages) ) . '">&raquo;</a></li>';

		$output .= '</ul>';
	}

	// Output pagination - Modify for any page template used on front page
	if ( is_front_page() and is_page_template() ) {
		echo str_replace( 'page/', '?paged=', $output);
	} else {
		echo $output;
	}
}


/* ----------------------------------------------------------------------------------
	REMOVE UNNECESSARY CODE FROM WP_HEAD
---------------------------------------------------------------------------------- */
/*
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'start_post_rel_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator');
*/

/* ----------------------------------------------------------------------------------
	REMOVE NON VALID REL CATEGORY TAGS
---------------------------------------------------------------------------------- */

function add_nofollow_cat( $text ) { 
	$text = str_replace( 'rel="category"', "", $text );
	return $text; 
};
add_filter( 'the_category', 'add_nofollow_cat' );  


/* ----------------------------------------------------------------------------------
	DELAY AUTOP
---------------------------------------------------------------------------------- */

// Remove unwanted <p> and <br /> tags around shortcodes
function thinkup_shortcodes_fixautop($content) {

	// Create arry of ThinkUpShortcodes to prevent formatting issues
	$block = join( '|' , array( 
			'accordion1',
			'accordion2',
			'button1',
			'button2',
			'button3',
			'button4',
			'carousel_blog',
			'carousel_clients',
			'carousel_movie',
			'carousel_portfolio',
			'carousel_team',
			'carousel_testimonial',
			'divider',
			'divider_top',
			'facebook',
			'five_sixth',
			'five_sixth_last',
			'font',
			'font_full1',
			'font_full2',
			'font_text',
			'four_fifth',
			'four_fifth_last',
			'google',
			'h1title',
			'h2title',
			'h3title',
			'h4title',
			'h5title',
			'h6title',
			'icon',
			'icon_full',
			'icon_text',
			'image',
			'item_client',
			'item_movie',
			'item_portfolio',
			'item_team',
			'linkedin',
			'list_font',
			'margin',
			'notification',
			'one_fifth',
			'one_fifth_last',
			'one_fourth',
			'one_fourth_last',
			'one_half',
			'one_half_last',
			'one_sixth',
			'one_sixth_last',
			'one_third',
			'one_third_last',
			'pricing1',
			'pricing2',
			'progress1',
			'progress2',
			'progress3',
			'progress4',
			'slider_blog',
			'slider_image',
			'slider_portfolio',
			'tabs1',
			'tabs2',
			'three_fifth',
			'three_fifth_last',
			'three_fourth',
			'three_fourth_last',
			'twitterfollow',
			'twittertweet',
			'two_fifth',
			'two_fifth_last',
			'two_third',
			'two_third_last',
			'vimeo',
			'youtube',
		)
	);

	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
	return $rep;
}
add_filter('the_content', 'thinkup_shortcodes_fixautop');


/* ----------------------------------------------------------------------------------
	ADD CUSTOM FEATURED IMAGE SIZES
---------------------------------------------------------------------------------- */

if ( ! function_exists( 'thinkup_input_addimagesizes' ) ) {
	function thinkup_input_addimagesizes() {

		/* 1 Column Layout */
		add_image_size( 'column1-1/1', 1140, 1140, true );
		add_image_size( 'column1-1/2', 1140, 570, true );
		add_image_size( 'column1-1/3', 1140, 380, true );
		add_image_size( 'column1-2/3', 1140, 760, true );
		add_image_size( 'column1-1/4', 1140, 285, true );
		add_image_size( 'column1-3/4', 1140, 855, true );
		add_image_size( 'column1-1/5', 1140, 228, true );
		add_image_size( 'column1-2/5', 1140, 456, true );
		add_image_size( 'column1-3/5', 1140, 684, true );
		add_image_size( 'column1-4/5', 1140, 912, true );

		/* 2 Column Layout */
		add_image_size( 'column2-1/1', 570, 570, true );
		add_image_size( 'column2-1/2', 570, 285, true );
		add_image_size( 'column2-1/3', 570, 190, true );
		add_image_size( 'column2-2/3', 570, 380, true );
		add_image_size( 'column2-1/4', 570, 143, true );
		add_image_size( 'column2-3/4', 570, 428, true );
		add_image_size( 'column2-1/5', 570, 114, true );
		add_image_size( 'column2-2/5', 570, 228, true );
		add_image_size( 'column2-3/5', 570, 342, true );
		add_image_size( 'column2-4/5', 570, 456, true );

		/* 3 Column Layout */
		add_image_size( 'column3-1/1', 380, 380, true );
		add_image_size( 'column3-1/2', 380, 190, true );
		add_image_size( 'column3-1/3', 380, 127, true );
		add_image_size( 'column3-2/3', 380, 254, true );
		add_image_size( 'column3-1/4', 380, 95, true );
		add_image_size( 'column3-3/4', 380, 285, true );
		add_image_size( 'column3-1/5', 380, 76, true );
		add_image_size( 'column3-2/5', 380, 152, true );
		add_image_size( 'column3-3/5', 380, 228, true );
		add_image_size( 'column3-4/5', 380, 304, true );

		/* 4 Column Layout */
		add_image_size( 'column4-1/1', 285, 285, true );
		add_image_size( 'column4-1/2', 285, 143, true );
		add_image_size( 'column4-1/3', 285, 95, true );
		add_image_size( 'column4-2/3', 285, 190, true );
		add_image_size( 'column4-1/4', 285, 72, true );
		add_image_size( 'column4-3/4', 285, 214, true );
		add_image_size( 'column4-1/5', 285, 57, true );
		add_image_size( 'column4-2/5', 285, 114, true );
		add_image_size( 'column4-3/5', 285, 171, true );
		add_image_size( 'column4-4/5', 285, 228, true );
	}
	add_action( 'init', 'thinkup_input_addimagesizes' );
}

if ( ! function_exists( 'thinkup_input_showimagesizes' ) ) {	 
	function thinkup_input_showimagesizes($sizes) {

		/* 1 Column Layout */
		$sizes['column1-1/1'] = 'Full - 1:1';
		$sizes['column1-1/2'] = 'Full - 1:2';
		$sizes['column1-1/3'] = 'Full - 1:3';
		$sizes['column1-2/3'] = 'Full - 2:3';
		$sizes['column1-1/4'] = 'Full - 1:4';
		$sizes['column1-3/4'] = 'Full - 3:4';
		$sizes['column1-1/5'] = 'Full - 1:5';
		$sizes['column1-2/5'] = 'Full - 2:5';
		$sizes['column1-3/5'] = 'Full - 3:5';
		$sizes['column1-4/5'] = 'Full - 4:5';

		/* 2 Column Layout */
		$sizes['column2-1/1'] = 'Half - 1:1';
		$sizes['column2-1/2'] = 'Half - 1:2';
		$sizes['column2-1/3'] = 'Half - 1:3';
		$sizes['column2-2/3'] = 'Half - 2:3';
		$sizes['column2-1/4'] = 'Half - 1:4';
		$sizes['column2-3/4'] = 'Half - 3:4';
		$sizes['column2-1/5'] = 'Half - 1:5';
		$sizes['column2-2/5'] = 'Half - 2:5';
		$sizes['column2-3/5'] = 'Half - 3:5';
		$sizes['column2-4/5'] = 'Half - 4:5';

		/* 3 Column Layout */
		$sizes['column3-1/1'] = 'Third - 1:1';
		$sizes['column3-1/2'] = 'Third - 1:2';
		$sizes['column3-1/3'] = 'Third - 1:3';
		$sizes['column3-2/3'] = 'Third - 2:3';
		$sizes['column3-1/4'] = 'Third - 1:4';
		$sizes['column3-3/4'] = 'Third - 3:4';
		$sizes['column3-1/5'] = 'Third - 1:5';
		$sizes['column3-2/5'] = 'Third - 2:5';
		$sizes['column3-3/5'] = 'Third - 3:5';
		$sizes['column3-4/5'] = 'Third - 4:5';

		/* 4 Column Layout */
		$sizes['column4-1/1'] = 'Quarter - 1:1';
		$sizes['column4-1/2'] = 'Quarter - 1:2';
		$sizes['column4-1/3'] = 'Quarter - 1:3';
		$sizes['column4-2/3'] = 'Quarter - 2:3';
		$sizes['column4-1/4'] = 'Quarter - 1:4';
		$sizes['column4-3/4'] = 'Quarter - 3:4';
		$sizes['column4-1/5'] = 'Quarter - 1:5';
		$sizes['column4-2/5'] = 'Quarter - 2:5';
		$sizes['column4-3/5'] = 'Quarter - 3:5';
		$sizes['column4-4/5'] = 'Quarter - 4:5';

		return $sizes;
	}
	add_filter('image_size_names_choose', 'thinkup_input_showimagesizes');
}

/* ----------------------------------------------------------------------------------
	ADD HOME: HOME TO CUSTOM MENU PAGE LIST
---------------------------------------------------------------------------------- */

function thinkup_menu_homelink( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'thinkup_menu_homelink' );


//----------------------------------------------------------------------------------
//	ADD FUNCTION TO GET CURRENT PAGE URL
//----------------------------------------------------------------------------------

function thinkup_check_currentpage() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	$pageURL = rtrim($pageURL, '/') . '/';

	$currentURL = get_permalink();

	// Add www. to current page url if present in permalink
	if (strpos( $currentURL, 'www.' ) !== false) {
		if (strpos( $pageURL, '://www.' ) !== false) {
			$pageURL = $pageURL;
		} else {
			$pageURL = str_replace( "://", "://www.", $pageURL );
		}
	} else {
		$pageURL = str_replace( "www.", "", $pageURL );
	}

	// Add trailing slash "/" at end of link if present in permalink
	if ( substr( $currentURL, -1 ) == '/' ) {
		$pageURL = trailingslashit( $pageURL );
	} else {
		$pageURL = untrailingslashit( $pageURL );
	}

	// Add correct http: or https: prefix to current page url
	if (strpos( $currentURL, 'http://' ) !== false) {
		$pageURL = str_replace( "https://", "http://", $pageURL );
	} else {
		$pageURL = str_replace( "http://", "https://", $pageURL );
	}

	return $pageURL;
}

function thinkup_check_ishome() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
//		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; // Monitor how this works for users on https sites.
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	$pageURL = rtrim($pageURL, '/') . '/';

	$pageURL = str_replace( "www.", "", $pageURL );
	$siteURL = str_replace( "www.", "", site_url( '/' ) );

	if ( $pageURL == $siteURL ) {
		return true;
	} else {
		return false;
	}
}


//----------------------------------------------------------------------------------
//	ADD CUSTOM COMMENTS POP UP LINK FUNCTION - Credit to http://www.thescubageek.com/code/wordpress-code/add-get_comments_popup_link-to-wordpress/
//----------------------------------------------------------------------------------

// Modifies WordPress's built-in comments_popup_link() function to return a string instead of echo comment results
function thinkup_input_commentspopuplink( $zero = false, $one = false, $more = false, $css_class = '', $none = false ) {
    global $wpcommentspopupfile, $wpcommentsjavascript;
 
    $id = get_the_ID();
 
    if ( false === $zero ) $zero = __( 'No Comments','minamaze' );
    if ( false === $one ) $one = __( '1 Comment','minamaze' );
    if ( false === $more ) $more = __( '% Comments','minamaze' );
    if ( false === $none ) $none = __( 'Comments Off','minamaze' );
 
    $number = get_comments_number( $id );
 
    $str = '';
 
    if ( 0 == $number && !comments_open() && !pings_open() ) {
        $str = '<span' . ((!empty($css_class)) ? ' class="' . esc_attr( $css_class ) . '"' : '') . '>' . $none . '</span>';
        return $str;
    }
 
    if ( post_password_required() ) {
        $str = __('Enter your password to view comments.','minamaze');
        return $str;
    }
 
    $str = '<a href="';
    if ( $wpcommentsjavascript ) {
        if ( empty( $wpcommentspopupfile ) )
            $home = home_url();
        else
            $home = get_option('siteurl');
        $str .= $home . '/' . $wpcommentspopupfile . '?comments_popup=' . $id;
        $str .= '" onclick="wpopen(this.href); return false"';
    } else { // if comments_popup_script() is not in the template, display simple comment link
        if ( 0 == $number )
            $str .= get_permalink() . '#respond';
        else
            $str .= get_comments_link();
        $str .= '"';
    }
 
    if ( !empty( $css_class ) ) {
        $str .= ' class="'.$css_class.'" ';
    }
    $title = the_title_attribute( array('echo' => 0 ) );
 
    $str .= apply_filters( 'comments_popup_link_attributes', '' );
 
    $str .= ' title="' . esc_attr( sprintf( __('Comment on %s','minamaze'), $title ) ) . '">';
    $str .= thinkup_comments_returnstring( $zero, $one, $more );
    $str .= '</a>';
     
    return $str;
}
 
// Modifies WordPress's built-in comments_number() function to return string instead of echo
function thinkup_comments_returnstring( $zero = false, $one = false, $more = false, $deprecated = '' ) {
    if ( !empty( $deprecated ) )
        _deprecated_argument( __FUNCTION__, '1.3' );
 
    $number = get_comments_number();
 
    if ( $number > 1 )
        $output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __( '% Comments', 'minamaze' ) : $more);
    elseif ( $number == 0 )
        $output = ( false === $zero ) ? __( 'No Comments', 'minamaze' ) : $zero;
    else // must be one
        $output = ( false === $one ) ? __( '1 Comment', 'minamaze' ) : $one;
 
    return apply_filters('comments_number', $output, $number);
}


//----------------------------------------------------------------------------------
//	CHANGE FALLBACK WP_PAGE_MENU CLASSES TO MATCH WP_NAV_MENU CLASSES
//----------------------------------------------------------------------------------

function thinkup_input_menuclass( $ulclass ) {

	$ulclass = preg_replace( '/<ul>/', '<ul class="menu">', $ulclass, 1 );
	$ulclass = str_replace( 'children', 'sub-menu', $ulclass );

	return preg_replace('/<div (.*)>(.*)<\/div>/iU', '$2', $ulclass );
}
add_filter( 'wp_page_menu', 'thinkup_input_menuclass' );


//----------------------------------------------------------------------------------
//	DETERMINE IF THE PAGE IS A BLOG - USEFUL FOR HOMEPAGE BLOG.
//----------------------------------------------------------------------------------

// Credit to: http://www.poseidonwebstudios.com/web-development/wordpress-is_blog-function/
function thinkup_check_isblog() {
 
    global $post;
 
    //Post type must be 'post'.
    $post_type = get_post_type($post);
 
    //Check all blog-related conditional tags, as well as the current post type,
    //to determine if we're viewing a blog page.
    return (
        ( is_home() || is_archive() || is_single() )
        && ($post_type == 'post')
    ) ? true : false ;
 
}


//----------------------------------------------------------------------------------
//	ADD TAGS AND CATEGORIES TO PAGES.
//----------------------------------------------------------------------------------

// Register taxonomies for pages
function thinkup_taxonomy_pages() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
}
if ( ! is_admin() ) {
	add_action( 'pre_get_posts', 'thinkup_archives_category' );
	add_action( 'pre_get_posts', 'thinkup_archives_tags' );
}

// Add categories to pages
function thinkup_archives_category( $wp_query ) {
	if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
	$wp_query->set( 'post_type', 'any' );
}

// Add tags to pages
function thinkup_archives_tags( $wp_query ) {
	if ( $wp_query->get( 'tag' ) )
		$wp_query->set( 'post_type', 'any' );
}
add_action( 'init', 'thinkup_taxonomy_pages' );


//----------------------------------------------------------------------------------
//	ADD FEATURED IMAGE THUMBNAIL.
//----------------------------------------------------------------------------------

// Add featured images to posts
add_filter('manage_pages_columns', 'thinkup_posts_columns', 5);
add_filter('manage_posts_columns', 'thinkup_posts_columns', 5);
add_action('manage_posts_custom_column', 'thinkup_posts_custom_columns', 5, 2);
add_action('manage_pages_custom_column', 'thinkup_posts_custom_columns', 5, 2);
function thinkup_posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __( 'Thumbs', 'minamaze' );
    return $defaults;
}
function thinkup_posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'thumbnail' );
    }
}


//----------------------------------------------------------------------------------
//	GET EXCERPT BY ID.
//----------------------------------------------------------------------------------

function thinkup_input_excerptbyid( $post_id, $except_count = 55 ) {
	$the_post = get_post( $post_id );
	
	// Get post excerpt
	$the_excerpt = $the_post->post_excerpt;
	
	// Get post content if no excerp set
	if ( empty( $the_excerpt ) ) {
		$the_excerpt = $the_post->post_content;
	}

	//Sets excerpt length by word count
	$excerpt_length = $except_count;

	 //Strips tags and images
	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) );
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if( count( $words ) > $excerpt_length ) {
		array_pop( $words );
		array_push( $words, '…' );
		$the_excerpt = implode( ' ', $words );
	}

	if ( ! empty( $the_excerpt ) ) {
		$the_excerpt = '<p>' . $the_excerpt . '</p>';
	}
	return $the_excerpt;
}


//----------------------------------------------------------------------------------
//	ADD MORE BUTTONS TO VISUAL EDITOR.
//----------------------------------------------------------------------------------

function thinkup_visualeditor_morebuttons($buttons) {
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';

	return $buttons;
}
add_filter( 'mce_buttons_3', 'thinkup_visualeditor_morebuttons' );


//----------------------------------------------------------------------------------
//	MIGRATION OF REDUX GLOBAL VARIABLE IN PREPARATION FOR CUSTOMIZER SUPPORT - $redux -> $thinkup_redux_variables 
//----------------------------------------------------------------------------------

function thinkup_migrate_redux_option() {

	// try to get the new option
	$thinkup_redux_migrate   = get_option('thinkup_redux_migrate');
	$thinkup_redux_variables = get_option('thinkup_redux_variables');

	if ($thinkup_redux_variables && isset($thinkup_redux_variables['migrated']) && $thinkup_redux_variables['migrated'] == 1) {
		return;
	}

	// else add the new option
	else {

		$redux_option = get_option('redux');

		// Only migrate if not already migrated
		if ( $thinkup_redux_migrate != 1 ) {


			// Check if migration was already performed with old migration script
			if ( $redux_option['migrated'] !== 1 ) {

				// set the migrated	flag
				update_option('thinkup_redux_migrate', 1);
				update_option('thinkup_redux_variables',$redux_option);
			}
		}
	}	
}
add_action('init','thinkup_migrate_redux_option');


//----------------------------------------------------------------------------------
//	FIX JETPACK PHOTON IMAGE LOAD ISSUE 
//----------------------------------------------------------------------------------

function thinkup_output_photoncompat() {

	// Only execute if Jetpack plugin and Photon extension are activated
	if( class_exists( 'Jetpack' ) && method_exists( 'Jetpack', 'get_active_modules' ) && in_array( 'photon', Jetpack::get_active_modules() ) ) {
		$output = NULL;

		$output .= '<script>';
		$output .= 'jQuery(document).ready(function(){';

		// Prevent transparent.jpg image from loading over Photon CDN.
		$output .= 'jQuery("img[src*=' . wp_kses_decode_entities( '&#39;' ) . 'images/transparent.png' . wp_kses_decode_entities( '&#39;' ) . ']").each(function () {';
		$output .= 'jQuery(this).attr( "src", "' . get_template_directory_uri() . '/images/transparent.png" );';
		$output .= '});';

		$output .= '});';
		$output .= '</script>';

		echo $output;
	}

}
add_action( 'wp_head', 'thinkup_output_photoncompat' );


?>