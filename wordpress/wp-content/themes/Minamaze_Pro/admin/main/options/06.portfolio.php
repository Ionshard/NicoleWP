<?php
/**
 * Portfolio functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	PORTFOLIO LAYOUT
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliolayout() {
global $thinkup_portfolio_layout;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliolayout = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolayout', true );

	if ( empty( $_thinkup_meta_portfoliolayout ) or $_thinkup_meta_portfoliolayout == 'option1' ) {
		if ( empty( $thinkup_portfolio_layout ) ) {
			echo 'column-2';
		} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
			echo 'column-1';
		} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
			echo 'column-2';
		} else if ( $thinkup_portfolio_layout == 'option3' ) {
			echo 'column-3';
		} else if ( $thinkup_portfolio_layout == 'option4' ) {
			echo 'column-4';
		}
	} else if ( $_thinkup_meta_portfoliolayout == 'option2' ) {
		echo 'column-1';
	} else if ( $_thinkup_meta_portfoliolayout == 'option3' ) {
		echo 'column-2';
	} else if ( $_thinkup_meta_portfoliolayout == 'option4' ) {
		echo 'column-3';
	} else if ( $_thinkup_meta_portfoliolayout == 'option5' ) {
		echo 'column-4';
	}
}

function thinkup_input_portfoliosize() {
global $thinkup_portfolio_layout;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfoliolayout = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolayout', true );

	if ( empty( $_thinkup_meta_portfoliolayout ) or $_thinkup_meta_portfoliolayout == 'option1' ) {
		if ( empty( $thinkup_portfolio_layout ) ) {
			the_post_thumbnail( 'column2-3/5' );
		} else if ( $thinkup_portfolio_layout == 'option1' or $thinkup_portfolio_layout == 'option5' or $thinkup_portfolio_layout == 'option6' ) {
			the_post_thumbnail( 'column1-2/5' );
		} else if ( $thinkup_portfolio_layout == 'option2' or $thinkup_portfolio_layout == 'option7' or $thinkup_portfolio_layout == 'option8' ) {
			the_post_thumbnail( 'column2-3/5' );
		} else if ( $thinkup_portfolio_layout == 'option3' ) {
			the_post_thumbnail( 'column3-2/3' );
		} else if ( $thinkup_portfolio_layout == 'option4' ) {
			the_post_thumbnail( 'column4-2/3' );
		}
	} else if ( $_thinkup_meta_portfoliolayout == 'option2' ) {
		the_post_thumbnail( 'column1-2/5' );
	} else if ( $_thinkup_meta_portfoliolayout == 'option3' ) {
		the_post_thumbnail( 'column2-3/5' );
	} else if ( $_thinkup_meta_portfoliolayout == 'option4' ) {
		the_post_thumbnail( 'column3-2/3' );
	} else if ( $_thinkup_meta_portfoliolayout == 'option5' ) {
		the_post_thumbnail( 'column4-2/3' );
	}
}


/* ----------------------------------------------------------------------------------
	PORTFOLIO HOVER CONTENT 
---------------------------------------------------------------------------------- */

function thinkup_input_portfoliohover() {
global $thinkup_portfolio_style;
global $thinkup_portfolio_hovertitle;
global $thinkup_portfolio_hoverexcerpt;
global $thinkup_portfolio_hoverproject;
global $thinkup_portfolio_hoverimage;

global $post;
global $thinkup_portfolio_pageid;
$_thinkup_meta_portfolioswitch = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfolioswitch', true );
$_thinkup_meta_portfoliotitle = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliotitle', true );
$_thinkup_meta_portfolioexcerpt = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfolioexcerpt', true );
$_thinkup_meta_portfoliolink = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolink', true );
$_thinkup_meta_portfoliolightbox = get_post_meta( $thinkup_portfolio_pageid, '_thinkup_meta_portfoliolightbox', true );

	if ( $_thinkup_meta_portfolioswitch !== 'on' ) {
		echo	'<article class="da-animate"><div class="image-overlay"></div><div class="entry-content">';
			if ( $thinkup_portfolio_hovertitle == '1' ) { 
				echo	'<h3 class="hover-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>'; 
			}
			if ( $thinkup_portfolio_hoverexcerpt == '1' ) { 
				echo '<div class="hover-excerpt">' . get_the_excerpt() . '</div>'; 
			}

			if ( $thinkup_portfolio_hoverproject == '1' or $thinkup_portfolio_hoverimage == '1') { 
			
			echo '<div class="hover-links">'; 
				if ( $thinkup_portfolio_hoverproject == '1' ) { 
					echo	'<a href="' . get_permalink() . '"><img class="hover-link" src="' . get_template_directory_uri() . '/images/transparent.png" /></a>'; 
				}
				if ( $thinkup_portfolio_hoverimage == '1' ) {
					if ( has_post_thumbnail( $post->ID ) ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						echo	'<a href="' . $image[0] . '"><img class="hover-zoom" src="' . get_template_directory_uri() . '/images/transparent.png" alt="' . get_the_title() . '" /></a>'; 
					}
				}
			echo '</div>'; 
			}
		echo	'</div></article>';
	} else if ( $_thinkup_meta_portfolioswitch == 'on' ) {
		echo	'<article class="da-animate"><div class="image-overlay"></div><div class="entry-content">';
			if ( $_thinkup_meta_portfoliotitle == 'on' ) {
				echo	'<h3 class="hover-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>'; 
			}
			if ( $_thinkup_meta_portfolioexcerpt == 'on' ) { 
				echo '<div class="hover-excerpt">' . get_the_excerpt() . '</div>'; 
			}

			if ( $_thinkup_meta_portfoliolink == 'on' or $_thinkup_meta_portfoliolightbox == 'on') { 
			
			echo '<div class="hover-links">'; 
				if ( $_thinkup_meta_portfoliolink == 'on' ) { 
					echo	'<a href="' . get_permalink() . '"><img class="hover-link" src="' . get_template_directory_uri() . '/images/transparent.png" /></a>'; 
				}
				if ( $_thinkup_meta_portfoliolightbox == 'on' ) {
					if ( has_post_thumbnail( $post->ID ) ) {
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						echo	'<a href="' . $image[0] . '"><img class="hover-zoom" src="' . get_template_directory_uri() . '/images/transparent.png" alt="' . get_the_title() . '" /></a>'; 
					}
				}
			echo '</div>'; 
			}
		echo	'</div></article>';
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT INFORMATION
---------------------------------------------------------------------------------- */

/* Input meta data */
function thinkup_input_projectinfo() {
global $thinkup_project_client;
global $thinkup_project_task;
global $thinkup_project_skill;
global $thinkup_project_url;

global $post;
$_thinkup_meta_projectdescription  = get_post_meta( $post->ID, '_thinkup_meta_projectdescription', true );
$_thinkup_meta_projectclient       = get_post_meta( $post->ID, '_thinkup_meta_projectclient', true );
$_thinkup_meta_projecttask         = get_post_meta( $post->ID, '_thinkup_meta_projecttask', true );
$_thinkup_meta_projectskills       = get_post_meta( $post->ID, '_thinkup_meta_projectskills', true );
$_thinkup_meta_projecturl          = get_post_meta( $post->ID, '_thinkup_meta_projecturl', true );

// Change text for project details
$_thinkup_meta_projectdescriptiontitle = get_post_meta( $post->ID, '_thinkup_meta_projectdescriptiontitle', true );
$_thinkup_meta_projectdetailstitle     = get_post_meta( $post->ID, '_thinkup_meta_projectdetailstitle', true );
$_thinkup_meta_projectclienttitle      = get_post_meta( $post->ID, '_thinkup_meta_projectclienttitle', true );
$_thinkup_meta_projecttasktitle        = get_post_meta( $post->ID, '_thinkup_meta_projecttasktitle', true );
$_thinkup_meta_projectskillstitle      = get_post_meta( $post->ID, '_thinkup_meta_projectskillstitle', true );

	// Set titles for toggles
	if ( empty( $_thinkup_meta_projectdescriptiontitle ) ) {
		$projectdescriptiontitle_input = __( 'Project Description', 'minamaze' );
	} else {
		$projectdescriptiontitle_input = $_thinkup_meta_projectdescriptiontitle;	
	}
	if ( empty( $_thinkup_meta_projectdetailstitle ) ) {
		$projectdetailstitle_input = __( 'More Details', 'minamaze' );
	} else {
		$projectdetailstitle_input = $_thinkup_meta_projectdetailstitle;	
	}
	if ( empty( $_thinkup_meta_projectclienttitle ) ) {
		$projectclienttitle_input = __( 'Client', 'minamaze' );
	} else {
		$projectclienttitle_input = $_thinkup_meta_projectclienttitle;	
	}
	if ( empty( $_thinkup_meta_projecttasktitle ) ) {
		$projecttasktitle_input   = __( 'Our Task', 'minamaze' );
	} else {
		$projecttasktitle_input   = $_thinkup_meta_projecttasktitle;	
	}
	if ( empty( $_thinkup_meta_projectskillstitle ) ) {
		$projectskillstitle_input = __( 'Skills Used', 'minamaze' );
	} else {
		$projectskillstitle_input = $_thinkup_meta_projectskillstitle;	
	}

	echo '<div class="two_third">';
	echo '<h4 class="project-title">' . $projectdescriptiontitle_input . '</h4>';

	if ( !empty( $_thinkup_meta_projectdescription ) ) {
		echo do_shortcode(wpautop($_thinkup_meta_projectdescription));
	}
	if ( !empty( $_thinkup_meta_projecturl ) and $thinkup_project_url !== '1' ) {
		if ( strpos( $_thinkup_meta_projecturl, 'http://' ) == 'true' ) {
			$_thinkup_meta_projecturl = str_replace( 'http://', '', $_thinkup_meta_projecturl );
		}
		echo '<a class="" href="http://' . $_thinkup_meta_projecturl . '"><h5 class="project-button themebutton">' . __( 'Visit Website', 'minamaze' ) . '<h5></a>';
	}
	echo '</div>';

	if ( ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) or
		 ( !empty( $_thinkup_meta_projecttask ) and $thinkup_project_task !== '1' ) or
		 ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) ) {

	echo '<div class="one_third last">';
		echo '<h4 class="project-title">' . $projectdetailstitle_input . '</h4>';

		echo '<div id="project-accordion" class="accordion">';

		if ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) {

			if ( !empty( $_thinkup_meta_projectclient ) and $thinkup_project_client !== '1' ) {
				$output_client .=  '<div class="accordion-group">';
				$output_client .=     '<div class="accordion-heading">';
				$output_client .=       '<a class="accordion-toggle" data-toggle="collapse" data-parent="#project-accordion" href="#client">';
				$output_client .=         $projectclienttitle_input;
				$output_client .=       '</a>';
				$output_client .=     '</div>';
				$output_client .=     '<div id="client" class="accordion-body collapse in">';
				$output_client .=       '<div class="accordion-inner">';
				$output_client .=         $_thinkup_meta_projectclient;
				$output_client .=       '</div>';
				$output_client .=     '</div>';
				$output_client .=   '</div>';

				echo $output_client;
			}
		}

		if ( !empty( $_thinkup_meta_projecttask ) and $thinkup_project_task !== '1' ) {
			if ( !empty( $_thinkup_meta_projecttask ) and $thinkup_project_task !== '1' ) {
				$output_task .=  '<div class="accordion-group">';
				$output_task .=    '<div class="accordion-heading">';
				$output_task .=      '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#project-accordion" href="#task">';
				$output_task .=        $projecttasktitle_input;
				$output_task .=      '</a>';
				$output_task .=    '</div>';
				$output_task .=    '<div id="task" class="accordion-body collapse">';
				$output_task .=      '<div class="accordion-inner">';
				$output_task .=        $_thinkup_meta_projecttask;
				$output_task .=      '</div>';
				$output_task .=    '</div>';
				$output_task .=  '</div>';

				echo $output_task;
			}
		}
			
		if ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) {			
			if ( !empty( $_thinkup_meta_projectskills ) and $thinkup_project_skill !== '1' ) {
				$output_skill .=  '<div class="accordion-group">';
				$output_skill .=    '<div class="accordion-heading">';
				$output_skill .=      '<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#project-accordion" href="#skill">';
				$output_skill .=        $projectskillstitle_input;
				$output_skill .=      '</a>';
				$output_skill .=    '</div>';
				$output_skill .=    '<div id="skill" class="accordion-body collapse">';
				$output_skill .=      '<div class="accordion-inner">';
				$output_skill .=        $_thinkup_meta_projectskills;
				$output_skill .=      '</div>';
				$output_skill .=    '</div>';
				$output_skill .=  '</div>';

				echo $output_skill;
			}
		}

		echo '</div>';
	echo '</div>';
	}
}


/* ----------------------------------------------------------------------------------
	PROJECT NAVIGATION
---------------------------------------------------------------------------------- */

function thinkup_input_portfolionavigation() {
global $thinkup_project_navigationswitch;

	if ( $thinkup_project_navigationswitch == '1' ) {
		thinkup_input_nav( 'nav-below' );
	}
}


?>