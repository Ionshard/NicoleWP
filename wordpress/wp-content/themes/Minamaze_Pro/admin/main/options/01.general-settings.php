<?php
/**
 * General settings functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	Logo Settings
---------------------------------------------------------------------------------- */
 
function thinkup_custom_logo() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolink;
global $thinkup_general_sitetitle;
global $thinkup_general_sitedescription;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolink ) ) {
			echo '<img src="' . $thinkup_general_logolink . '" alt="Logo">';
		} 
	} else if ( $thinkup_general_logoswitch == "option2" or empty( $thinkup_general_logoswitch ) ) {
		if ( empty( $thinkup_general_sitetitle ) ) {
			echo '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . get_bloginfo( 'name' ) . '</h1>';
		} else {
			echo '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . $thinkup_general_sitetitle . '</h1>';
		}
		if ( ! empty( $thinkup_general_sitedescription ) ) {
			echo '<h2 class="site-description">' . $thinkup_general_sitedescription . '</h2>';
		}
	}
}

// Output retina js script if retina logo is set
function thinkup_input_logoretina() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolinkretina;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolinkretina ) ) {
			wp_enqueue_script( 'retina' );
		} 
	}
}	
add_action( 'wp_enqueue_scripts', 'thinkup_input_logoretina', 11 );


/* ----------------------------------------------------------------------------------
	Custom Favicon
---------------------------------------------------------------------------------- */

function thinkup_custom_favicon() {
global $thinkup_general_faviconlink;

	if ( ! empty( $thinkup_general_faviconlink ) ) {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . $thinkup_general_faviconlink . '" />';
	}	
}
add_action('wp_head', 'thinkup_custom_favicon');


/* ----------------------------------------------------------------------------------
	Page Layout
---------------------------------------------------------------------------------- */

/* Add Custom Sidebar css */
function thinkup_sidebar_css() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;
global $thinkup_portfolio_layout;
global $thinkup_project_layout;
global $thinkup_woocommerce_layout;
global $thinkup_woocommerce_layoutproduct;

global $post;
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );
}

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
			echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $thinkup_homepage_layout == "option3" ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				wp_enqueue_style ( 'sidebarleft' );
			} else if ( $thinkup_general_layout == "option3" ) {
				wp_enqueue_style ( 'sidebarright' );
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) and ! is_post_type_archive( 'product' ) ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $thinkup_blog_layout == "option3" ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
				echo '';
			} else if ( $thinkup_blog_layout == "option2" ) {
				wp_enqueue_style ( 'sidebarleft' );
			} else if ( $thinkup_blog_layout == "option3" ) {
				wp_enqueue_style ( 'sidebarright' );
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( is_post_type_archive( 'product' ) or is_tax( 'product_cat' ) or is_tax( 'product_tag' ) ) {
		if ( $thinkup_woocommerce_layout == "option1" or empty( $thinkup_woocommerce_layout ) ) {
			echo '';
		} else if ( $thinkup_woocommerce_layout == "option5" or $thinkup_woocommerce_layout == "option7" ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $thinkup_woocommerce_layout == "option6" or $thinkup_woocommerce_layout == "option8" ) {
			wp_enqueue_style ( 'sidebarright' );
		} else {
			echo '';
		}
	} else if ( is_singular( 'post' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {		
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				wp_enqueue_style ( 'sidebarleft' );
			} else if ( $thinkup_post_layout == "option3" ) {
				wp_enqueue_style ( 'sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_project_layout == "option1" or empty( $thinkup_project_layout ) ) {		
				echo '';
			} else if ( $thinkup_project_layout == "option2" ) {
				wp_enqueue_style ( 'sidebarleft' );
			} else if ( $thinkup_project_layout == "option3" ) {
				wp_enqueue_style ( 'sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( is_singular( 'product' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_woocommerce_layoutproduct == "option1" or empty( $thinkup_woocommerce_layoutproduct ) ) {		
				echo '';
			} else if ( $thinkup_woocommerce_layoutproduct == "option2" ) {
				wp_enqueue_style ( 'sidebarleft' );
			} else if ( $thinkup_woocommerce_layoutproduct == "option3" ) {
				wp_enqueue_style ( 'sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ($thinkup_general_layout == "option3") {
			wp_enqueue_style ( 'sidebarright' );
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'sidebarright' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_sidebar_css', '11' );

/* Add Custom Sidebar html */
function thinkup_sidebar_html() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;
global $thinkup_portfolio_layout;
global $thinkup_project_layout;
global $thinkup_woocommerce_layout;
global $thinkup_woocommerce_layoutproduct;

global $post;
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );
}

do_action('thinkup_sidebar_html');

	if ( is_front_page() ) {	
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
				echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
				echo get_sidebar(); 
		} else if ( $thinkup_homepage_layout == "option3" ) {
				echo get_sidebar();
		}
	} else if ( is_page() and !is_page_template( 'template-blog.php' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_general_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
				echo '';
			} else if ( $thinkup_blog_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_blog_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) and ! is_post_type_archive( 'product' ) ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		if ( $thinkup_portfolio_layout == "option1" or empty( $thinkup_portfolio_layout ) ) {		
			echo '';
		} else if ( $thinkup_portfolio_layout == "option5" or $thinkup_portfolio_layout == "option7" ) {
			echo get_sidebar();
		} else if ( $thinkup_portfolio_layout == "option6" or $thinkup_portfolio_layout == "option8" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_post_type_archive( 'product' ) or is_tax( 'product_cat' ) or is_tax( 'product_tag' ) ) {	
		if ( $thinkup_woocommerce_layout == "option1" or empty( $thinkup_woocommerce_layout ) ) {		
			echo '';
		} else if ( $thinkup_woocommerce_layout == "option5" or $thinkup_woocommerce_layout == "option7" ) {
			echo get_sidebar();
		} else if ( $thinkup_woocommerce_layout == "option6" or $thinkup_woocommerce_layout == "option8" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_singular( 'post' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_post_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_project_layout == "option1" or empty( $thinkup_project_layout ) ) {		
				echo '';
			} else if ( $thinkup_project_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_project_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_singular( 'product' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_woocommerce_layoutproduct == "option1" or empty( $thinkup_woocommerce_layoutproduct ) ) {		
				echo '';
			} else if ( $thinkup_woocommerce_layoutproduct == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_woocommerce_layoutproduct == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == 'option1' or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			get_sidebar();
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			get_sidebar();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Select a Sidebar
---------------------------------------------------------------------------------- */

/* Add Selected Sidebar To Specific Pages */
function thinkup_input_sidebars() {
global $thinkup_general_sidebars;
global $thinkup_homepage_sidebars;
global $thinkup_blog_sidebars;
global $thinkup_post_sidebars;
global $thinkup_portfolio_sidebars;
global $thinkup_project_sidebars;
global $thinkup_woocommerce_sidebars;
global $thinkup_woocommerce_sidebarsproduct;

global $post;
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );
	$_thinkup_meta_sidebars = get_post_meta( $post->ID, '_thinkup_meta_sidebars', true );
}

	if ( is_front_page() ) {
			$output = $thinkup_homepage_sidebars;
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_general_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_blog_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}	
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) and ! is_post_type_archive( 'product' ) ) {
		$output = $thinkup_blog_sidebars;
	} else if ( is_post_type_archive( 'portfolio' ) ) {
		$output = $thinkup_portfolio_sidebars;
	} else if ( is_post_type_archive( 'product' ) or is_tax( 'product_cat' ) or is_tax( 'product_tag' ) ) {
		$output = $thinkup_woocommerce_sidebars;
	} else if ( is_singular( 'post' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_post_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_project_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_singular( 'product' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_woocommerce_sidebarsproduct;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_search() ) {
		$output = $thinkup_general_sidebars;
	} else {
		$output = $_thinkup_meta_sidebars;
	}

	if ( empty( $output ) or $output == 'Select a sidebar:' ) {
		$output = 'Sidebar';
	}

return $output;
}


/* ----------------------------------------------------------------------------------
	Intro Default options
---------------------------------------------------------------------------------- */

/* Add custom intro section [Extend for more options in future update] */
function thinkup_custom_intro() {
global $thinkup_general_introswitch;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_intro       = NULL;

// Assign meta data variable (check that it's not an archive / search page)
if ( ! empty( $post->ID ) and thinkup_check_currentpage() == get_permalink() ) {
	$_thinkup_meta_intro = get_post_meta( $post->ID, '_thinkup_meta_intro', true );
}

	if ( ! is_front_page() ) {
	
		// Output intro with breadcrumbs if set
		if( empty( $_thinkup_meta_intro ) or $_thinkup_meta_intro == 'option1' ) {
			if ( empty( $thinkup_general_introswitch) or $thinkup_general_introswitch == '1' ) {
			echo	'<div id="intro" class="option1"><div id="intro-core">',
					'<h1 class="page-title">',
					thinkup_title_select(),
					'</h1>',
					thinkup_input_breadcrumbswitch(),
					'</div></div>';
			}
		} else if( $_thinkup_meta_intro == 'option2' ) {
			echo	'<div id="intro" class="option1"><div id="intro-core">',
					'<h1 class="page-title">',
					thinkup_title_select(),
					'</h1>',
					thinkup_input_breadcrumbswitch(),
					'</div></div>';
		}
	}

	// Hook to after content after intro (e.g. WooCommerce intro)
	do_action('thinkup_hook_custom_intro');
}


/* ----------------------------------------------------------------------------------
	Enable Responsive Layout
---------------------------------------------------------------------------------- */

/* http://wordpress.stackexchange.com/questions/40753/add-parent-class-to-parent-menu-items */
class Walker_Nav_Menu_Responsive extends Walker_Nav_Menu{

    public function start_el(&$output, $item, $depth = 0, $args=array(), $id = 0){

      // add spacing to the title based on the current depth
      if ( $depth > 0 ) {
            $item->title = str_repeat('&nbsp; ', $depth *  4 ) . '&#45; ' . $item->title;
      }
      parent::start_el($output, $item, $depth, $args);
    } 
}

// Fallback responsive menu when custom header menu has not been set.
function thinkup_input_responsivefall() {

	$output = wp_list_pages('echo=0&title_li=');

	echo '<div id="header-responsive-inner" class="responsive-links nav-collapse collapse"><ul>',
		 $output,
		 '</ul></div>';
}

function thinkup_input_responsivehtml() {
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {

		$args =  array(
			'container_class' => 'responsive-links nav-collapse collapse', 
			'container_id'    => 'header-responsive-inner', 
			'menu_class'      => '', 
			'theme_location'  => 'header_menu', 
			'walker'          => new Walker_Nav_Menu_Responsive(), 
			'fallback_cb'     => 'thinkup_input_responsivefall',
		);

		echo '<div id="header-responsive">',
			 '<a class="btn-navbar" data-toggle="collapse" data-target=".nav-collapse">',
			 '<span class="icon-bar"></span>',
			 '<span class="icon-bar"></span>',
			 '<span class="icon-bar"></span>',
			 '</a>',
			wp_nav_menu( $args ),
			'</div>',
			'<!-- #header-responsive -->';
	}
}

function thinkup_input_responsivecss() {
global $thinkup_general_fixedlayoutswitch;
	
	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_responsivecss', '12' );

function thinkup_input_responsiveclass($classes){
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';	
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_responsiveclass');


/* ----------------------------------------------------------------------------------
	Enable Boxed Layout
---------------------------------------------------------------------------------- */
function thinkup_input_boxedclass($classes){
global $post;
global $thinkup_general_boxlayout;

// Set variables to avoid php non-object notice error
$_thinkup_meta_boxed = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_boxed = get_post_meta( $post->ID, '_thinkup_meta_boxed', true );
}

	if ( empty( $_thinkup_meta_boxed ) or $_thinkup_meta_boxed == 'option1' ) {
		if ( $thinkup_general_boxlayout == '1' ) {
			$classes[] = 'layout-boxed';
		} else {
			$classes[] = 'layout-wide';		
		}
	} else if ( $_thinkup_meta_boxed == 'option2' ) {
		$classes[] = 'layout-boxed';
	} else {
		$classes[] = 'layout-wide';		
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_boxedclass');

function thinkup_input_boxedstyle(){
global $thinkup_general_boxlayout;
global $thinkup_general_boxbackgroundimage;
global $thinkup_general_boxbackgroundcolor;
global $thinkup_general_boxedposition;
global $thinkup_general_boxedrepeat;
global $thinkup_general_boxedsize;
global $thinkup_general_boxedattachment;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_boxed = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_boxed = get_post_meta( $post->ID, '_thinkup_meta_boxed', true );
}

	if ( ! empty( $thinkup_general_boxbackgroundimage ) ) {
		$image = 'background: url(' . $thinkup_general_boxbackgroundimage . ');';
	}
	if ( ! empty( $thinkup_general_boxedposition ) ) {
		$position = 'background-position: ' . $thinkup_general_boxedposition . ';';
	}
	if ( ! empty( $thinkup_general_boxedrepeat ) ) {
		$repeat = 'background-repeat: ' . $thinkup_general_boxedrepeat . ';';
	}
	if ( ! empty( $thinkup_general_boxedsize ) ) {
		$size = 'background-size: ' . $thinkup_general_boxedsize . ';';
	}
	if ( ! empty( $thinkup_general_boxedattachment ) ) {
		$attachment = 'background-attachment: ' . $thinkup_general_boxedattachment . ';';
	}

	if ( $thinkup_general_boxlayout == '1' or $_thinkup_meta_boxed == 'option2' ) {
		if ( ! empty( $thinkup_general_boxbackgroundimage ) ) {
			echo	' style="' . $image . $position . $repeat . $size . $attachment . '"';
		} else if ( ! empty( $thinkup_general_boxbackgroundcolor ) ) {
			echo	' style="background: ' . $thinkup_general_boxbackgroundcolor . ';"';
		}
	}
}
add_action( 'thinkup_bodystyle', 'thinkup_input_boxedstyle');


/* ----------------------------------------------------------------------------------
	Enable Breadcrumbs
---------------------------------------------------------------------------------- */

/* Toggle Breadcrumbs */
function thinkup_input_breadcrumbswitch() {
global $thinkup_general_breadcrumbswitch;

global $post;
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_breadcrumbs = get_post_meta( $post->ID, '_thinkup_meta_breadcrumbs', true );
}

	if( ! is_front_page() ) {
		if ( empty( $_thinkup_meta_breadcrumbs ) or $_thinkup_meta_breadcrumbs == 'option1' ) {
			if ( $thinkup_general_breadcrumbswitch == '0' or empty( $thinkup_general_breadcrumbswitch ) ) {
				echo '';
			} else if ( $thinkup_general_breadcrumbswitch == '1' ) {
				wp_bac_breadcrumb();
			}
		} else if ( $_thinkup_meta_breadcrumbs == 'option2' ) {
			wp_bac_breadcrumb();
		}
	}
}


/* ----------------------------------------------------------------------------------
	Enable Comments on Pages
---------------------------------------------------------------------------------- */

/* Code can be found in blog.php under heading ALLOW USER COMMENTS */

/* ----------------------------------------------------------------------------------
	Google Analytics Code
---------------------------------------------------------------------------------- */

/* Add Google Analytics Code - Header */
function thinkup_input_analytics_header() {
global $thinkup_general_analyticscode;
global $thinkup_general_analyticscodeposition;

	if ( ! empty( $thinkup_general_analyticscode ) and $thinkup_general_analyticscodeposition == '1' ) {
		echo "\n" . $thinkup_general_analyticscode . "\n";
	}
}

/* Add Google Analytics Code - Footer */
function thinkup_input_analytics_footer() {
global $thinkup_general_analyticscode;
global $thinkup_general_analyticscodeposition;

	if ( ! empty( $thinkup_general_analyticscode ) and $thinkup_general_analyticscodeposition !== '1' ) {
		echo  "\n" . $thinkup_general_analyticscode . "\n";
	}
}

add_action( 'wp_head', 'thinkup_input_analytics_header' );
add_action( 'wp_footer', 'thinkup_input_analytics_footer' );


/* ----------------------------------------------------------------------------------
	Custom CSS
---------------------------------------------------------------------------------- */

/* Add Custom CSS */
function thinkup_custom_css() {
global $thinkup_general_customcss;

global $post;
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_customcss = get_post_meta( $post->ID, '_thinkup_meta_customcss', true );
}

	if ( ! empty( $thinkup_general_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				$thinkup_general_customcss . "\n",
				'</style>' . "\n";
	}
	if ( ! is_front_page() and ! empty( $_thinkup_meta_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				$_thinkup_meta_customcss . "\n",
				'</style>' . "\n";
	}
}
add_action( 'wp_head','thinkup_custom_css', '12' );


/* ----------------------------------------------------------------------------------
	Custom JavaScript - Front End
---------------------------------------------------------------------------------- */

/* Add Custom Front-End Javascript */
function thinkup_custom_javafront() {
global $thinkup_general_customjavafront;

global $post;
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_customjava = get_post_meta( $post->ID, '_thinkup_meta_customjava', true );
}

	if ( ! empty( $thinkup_general_customjavafront ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $thinkup_general_customjavafront ) . "\n",
			'</script>' . "\n";
	}
	if ( ! empty( $_thinkup_meta_customjava ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $_thinkup_meta_customjava ) . "\n",
			'</script>' . "\n";
	}
}
add_action( 'wp_footer', 'thinkup_custom_javafront' );


?>