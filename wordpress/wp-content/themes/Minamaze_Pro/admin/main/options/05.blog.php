<?php
/**
 * Blog functions.
 *
 * @package ThinkUpThemes
 */


/* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function thinkup_input_blogclass($classes){
global $thinkup_blog_style;

global $post;

// Set variables to avoid php non-object notice error
$_thinkup_meta_blogstyle       = NULL;
$_thinkup_meta_blogstylelayout = NULL;

// Assign meta data variable
if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_blogstyle       = get_post_meta( $post->ID, '_thinkup_meta_blogstyle', true );
	$_thinkup_meta_blogstylelayout = get_post_meta( $post->ID, '_thinkup_meta_blogstylelayout', true );
}

	if ( thinkup_check_isblog() ) {
		if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1' ) {
			$classes[] = 'blog-style1';
		} else {
			$classes[] = 'blog-style2';
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( empty( $thinkup_blog_style ) or $thinkup_blog_style == 'option1' ) {
				$classes[] = 'blog-style1';
			} else {
				$classes[] = 'blog-style2';
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			$classes[] = 'blog-style1';
		} else if ( $_thinkup_meta_blogstyle == 'option3' ) {
			$classes[] = 'blog-style2';
		}
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_blogclass');


/* ----------------------------------------------------------------------------------
	BLOG STYLE
---------------------------------------------------------------------------------- */

function thinkup_input_stylelayout() {
global $thinkup_blog_style;
global $thinkup_blog_stylegrid;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle       = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstylelayout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstylelayout', true );
  
	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_style !== 'option2' ) {
			echo ' column-1';
		} else if ( $thinkup_blog_style == 'option2' ) {			
			if ( empty($thinkup_blog_stylegrid) or $thinkup_blog_stylegrid == 'option1' ) {
				echo ' column-1';
			} else if ( $thinkup_blog_stylegrid == 'option2' ) {
				echo ' column-2';
			} else if ( $thinkup_blog_stylegrid == 'option3' ) {
				echo ' column-3';
			} else if ( $thinkup_blog_stylegrid == 'option4' ) {
				echo ' column-4';
			}
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( $thinkup_blog_style !== 'option2' ) {
				echo ' column-1';
			} else if ( $thinkup_blog_style == 'option2' ) {		
				if ( empty($thinkup_blog_stylegrid) or $thinkup_blog_stylegrid == 'option1' ) {
					echo ' column-1';
				} else if ( $thinkup_blog_stylegrid == 'option2' ) {
					echo ' column-2';
				} else if ( $thinkup_blog_stylegrid == 'option3' ) {
					echo ' column-3';
				} else if ( $thinkup_blog_stylegrid == 'option4' ) {
					echo ' column-4';
				}
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			echo ' column-1';	
		} else if ( $_thinkup_meta_blogstyle == 'option3' ) {
			if ( empty($_thinkup_meta_blogstylelayout) or $_thinkup_meta_blogstylelayout == 'option1' ) {
				echo ' column-1';
			} else if ( $_thinkup_meta_blogstylelayout == 'option2' ) {
				echo ' column-2';
			} else if ( $_thinkup_meta_blogstylelayout == 'option3' ) {
				echo ' column-3';
			} else if ( $_thinkup_meta_blogstylelayout == 'option4' ) {
				echo ' column-4';
			}
		}
	}
}

/* ----------------------------------------------------------------------------------
	BLOG STYLE - CLASSES FOR STYLE 1
---------------------------------------------------------------------------------- */

function thinkup_input_stylelayout_class1() {
global $post;
global $thinkup_blog_postswitch;
global $thinkup_blog_style;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle       = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstylelayout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstylelayout', true );

	if ( has_post_thumbnail( $post->ID ) and $thinkup_blog_postswitch !== 'option2' ) {
		if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
			if ( $thinkup_blog_style !== 'option2' ) {
				echo ' two_fifth';
			}
		} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
			if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
				if ( $thinkup_blog_style !== 'option2' ) {
					echo ' two_fifth';
				}
			} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
				echo ' two_fifth';
			}
		}
	}
}

function thinkup_input_stylelayout_class2() {
global $post;
global $thinkup_blog_postswitch;
global $thinkup_blog_style;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle       = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstylelayout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstylelayout', true );

	if ( has_post_thumbnail( $post->ID ) and $thinkup_blog_postswitch !== 'option2' ) {
		if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
			if ( $thinkup_blog_style !== 'option2' ) {
				echo ' three_fifth last';
			}
		} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
			if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
				if ( $thinkup_blog_style !== 'option2' ) {
					echo ' three_fifth last';
				}
			} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
				echo '  three_fifth last';
			}
		}
	}
}


/* ----------------------------------------------------------------------------------
	HIDE POST TITLE
---------------------------------------------------------------------------------- */

function think_input_blogtitle() {
global $thinkup_blog_title;
global $thinkup_blog_title;

	if ( $thinkup_blog_title !== '1' ) {
		echo	'<h2 class="blog-title">',
				'<a href="' . get_permalink() . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'minamaze' ), the_title_attribute( 'echo=0' ) ) ) . '">' . get_the_title() . '</a>',
				'</h2>';
	}
}


/* ----------------------------------------------------------------------------------
	BLOG CONTENT
---------------------------------------------------------------------------------- */


// Input post thumbnail / featured media
function thinkup_input_blogimage() {
global $post;
global $wp_embed;
global $thinkup_blog_style;
global $thinkup_blog_stylegrid;

global $thinkup_blog_pageid;
$_thinkup_meta_blogstyle       = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstyle', true );
$_thinkup_meta_blogstylelayout = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogstylelayout', true );

if ( ! empty( $post->ID ) ) {
	$_thinkup_meta_featuredmedia   = get_post_meta( $post->ID, '_thinkup_meta_featuredmedia', true );
	$_thinkup_meta_featuredgallery = get_post_meta( $post->ID, '_thinkup_meta_featuredgallery', true ); 
}

	$size  = NULL;
	$link  = NULL;
	$media = NULL;

	// Set image size for blog thumbnail
	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_style !== 'option2' ) {
			$size = 'column2-3/5';
		} else if ( $thinkup_blog_style == 'option2' ) {			
			if ( empty($thinkup_blog_stylegrid) or $thinkup_blog_stylegrid == 'option1' ) {
				$size = 'column1-1/3';
			} else if ( $thinkup_blog_stylegrid == 'option2' ) {
				$size = 'column2-1/2';
			} else if ( $thinkup_blog_stylegrid == 'option3' ) {
				$size = 'column3-1/2';
			} else if ( $thinkup_blog_stylegrid == 'option4' ) {
				$size = 'column4-1/2';
			}
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( empty( $_thinkup_meta_blogstyle ) or $_thinkup_meta_blogstyle == 'option1' ) {
			if ( $thinkup_blog_style !== 'option2' ) {
				$size = 'column2-3/5';
			} else if ( $thinkup_blog_style == 'option2' ) {		
				if ( empty($thinkup_blog_stylegrid) or $thinkup_blog_stylegrid == 'option1' ) {
					$size = 'column1-1/3';
				} else if ( $thinkup_blog_stylegrid == 'option2' ) {
					$size = 'column2-1/2';
				} else if ( $thinkup_blog_stylegrid == 'option3' ) {
					$size = 'column3-1/2';
				} else if ( $thinkup_blog_stylegrid == 'option4' ) {
					$size = 'column4-1/2';
				}
			}
		} else if ( $_thinkup_meta_blogstyle == 'option2' ) {
			$size = 'column2-3/5';
		} else if ( $_thinkup_meta_blogstyle == 'option3' ) {
			if ( empty($_thinkup_meta_blogstylelayout) or $_thinkup_meta_blogstylelayout == 'option1' ) {
				$size = 'column1-1/3';
			} else if ( $_thinkup_meta_blogstylelayout == 'option2' ) {
				$size = 'column2-1/2';
			} else if ( $_thinkup_meta_blogstylelayout == 'option3' ) {
				$size = 'column3-1/2';
			} else if ( $_thinkup_meta_blogstylelayout == 'option4' ) {
				$size = 'column4-1/2';
			}
		}
	}

	$featured_id = get_post_thumbnail_id( $post->ID );
	$featured_img = wp_get_attachment_image_src($featured_id,'full', true);

	// Determing featured media to input
	if ( get_post_format() == 'video' and ! empty( $_thinkup_meta_featuredmedia ) ) {

		// Remove http:// and https:// from video link
		if ( strpos( $_thinkup_meta_featuredmedia, 'https://' ) !== false ) {
			$_thinkup_meta_featuredmedia = 'https://' . str_replace( 'https://', '', $_thinkup_meta_featuredmedia );
		} else {
			$_thinkup_meta_featuredmedia = 'http://' . str_replace( 'http://', '', $_thinkup_meta_featuredmedia );
		}

		$link  = $_thinkup_meta_featuredmedia;
		$media = $wp_embed->run_shortcode('[embed]' . $_thinkup_meta_featuredmedia . '[/embed]');
	} else if ( get_post_format() == 'gallery' and ! empty( $_thinkup_meta_featuredgallery ) ) {

		if ( is_array( $_thinkup_meta_featuredgallery ) ) $slide_height = $_thinkup_meta_featuredgallery['height'];

		if ( empty( $slide_height ) ) $slide_height = '200';

		$media .= '<div class="rslides-sc" data-height="' . $slide_height . '">';
		$media .= '<div class="rslides-container">';
		$media .= '<div class="rslides-inner">';
		$media .= '<ul class="slides">';

		$count = 0;

		// Begin loop to import gallery images
		foreach ( $_thinkup_meta_featuredgallery['image'] as $slide => $list) {

			$slide_id = $_thinkup_meta_featuredgallery['image'][ $count ];

			$slide_img   = wp_get_attachment_image_src( $slide_id, true );
			$slide_image = 'background: url(' . $slide_img[0] . ') no-repeat center; background-size: cover;';

			$media .= '<li>';
			$media .= '<img src="' . get_template_directory_uri() . '/images/transparent.png" style="' . $slide_image . '" alt="Image" />';
			$media .= '</li>';

		$count++;
		}

		$media .= '</ul>';
		$media .= '</div>';
		$media .= '</div>';
		$media .= '</div>';

	} else {
		$link  = $featured_img[0];
		$media = get_the_post_thumbnail( $post->ID, $size );
	}

	// Output media on blog page
	if ( get_post_format() == 'gallery' and ! empty( $_thinkup_meta_featuredgallery ) ) {
		echo '<div class="blog-thumb gallery">',
			 '<a href="'. get_permalink($post->ID) . '">' . $media . '</a>',
			 '</div>';
	} else if ( get_post_format() == 'video' and ! empty( $_thinkup_meta_featuredmedia ) ) {
		echo '<div class="blog-thumb">',
			 '<a href="'. get_permalink($post->ID) . '">' . $media . '</a>',
			 '</div>';
	} else if ( ! empty( $featured_id ) ) {
		echo '<div class="blog-thumb">',
			 '<a href="'. get_permalink($post->ID) . '">' . $media . '</a>',
			 '</div>';
	}
}

/* Input post excerpt / content to blog page */
function thinkup_input_blogtext() {
global $post;
global $thinkup_blog_postswitch;

	// Output post content
	if ( is_search() ) {
		the_excerpt();
	} else if ( ! is_search() ) {
		if ( ( empty( $thinkup_blog_postswitch ) or $thinkup_blog_postswitch == 'option1' ) and ! is_numeric( strpos( $post->post_content, '<!--more-->' ) ) ) {
			the_excerpt();
		} else if ( $thinkup_blog_postswitch == 'option2' ) {
			the_content();
		}
	}
}


/* ----------------------------------------------------------------------------------
	BLOG POST EXCERPT
---------------------------------------------------------------------------------- */

function thinkup_input_blogpostexcerpt() {
global $thinkup_blog_postswitch;
global $thinkup_blog_postexcerpt;

global $thinkup_blog_pageid;
$_thinkup_meta_blogpostexcerpts = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogpostexcerpts', true );

	if ( $thinkup_blog_postswitch == 'option1' or empty( $thinkup_blog_postswitch ) ) {

		if ( thinkup_check_isblog() or get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {

			if ( ! is_numeric( $_thinkup_meta_blogpostexcerpts ) ) {
				if ( is_numeric( $thinkup_blog_postexcerpt ) ) {
					return $thinkup_blog_postexcerpt;
				}
			} else if ( is_numeric( $_thinkup_meta_blogpostexcerpts ) ) {
				return $_thinkup_meta_blogpostexcerpts;
			}
		}
	}

	// return default value if not triggered above
	return 55;
}
add_filter( 'excerpt_length', 'thinkup_input_blogpostexcerpt', 999 );

function thinkup_input_blogpostcount() {
global $thinkup_blog_pageid;

global $thinkup_blog_pageid;
$_thinkup_meta_blogpostcount = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogpostcount', true );

	if ( empty( $_thinkup_meta_blogpostcount ) or $_thinkup_meta_blogpostcount == 'default' ) {
		return get_option('posts_per_page');
	} else {
		return $_thinkup_meta_blogpostcount;
	}
}


/* ----------------------------------------------------------------------------------
	BLOG META CONTENT & POST META CONTENT
---------------------------------------------------------------------------------- */

// Input sticky post
function thinkup_input_sticky() {
	printf( '<span class="sticky"><i class="icon-pushpin"></i><a href="%1$s" title="%2$s">' . __( 'Sticky', 'minamaze' ) . '</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() )
	);
}

/* Input blog date*/
function thinkup_input_blogdate() {
	printf( __( '<span class="date"><i class="icon-calendar-empty"></i><a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></span>', 'minamaze' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}

/* Input blog comments */
function thinkup_input_blogcomment() {

	if ( '0' != get_comments_number() ) {
	echo	'<span class="comment"><i class="icon-comments"></i>';
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {;
			comments_popup_link( __( '0 comments', 'minamaze' ), __( '1 comment', 'minamaze' ), __( '% comments', 'minamaze' ) );
		};
	echo	'</span>';
	}
}

/* Input blog categories */
function thinkup_input_blogcategory() {
$categories_list = get_the_category_list( __( ', ', 'minamaze' ) );

	if ( $categories_list && thinkup_input_categorizedblog() ) {
		echo	'<span class="category"><i class="icon-folder-open"></i>';
		printf( __( '%1$s', 'minamaze' ), $categories_list );
		echo	'</span>';
	};
}

/* Input blog tags */
function thinkup_input_blogtag() {
$tags_list = get_the_tag_list( '', __( ', ', 'minamaze' ) );

	if ( $tags_list ) {
		echo	'<span class="tags"><i class="icon-tags"></i>';
		printf( __( '%1$s', 'minamaze' ), $tags_list );
		echo	'</span>';
	};
}

/* Input blog author */
function thinkup_input_blogauthor() {
	printf( __( '<span class="author"><i class="icon-pencil"></i>By <a href="%1$s" title="%2$s" rel="author">%3$s</a></span>', 'minamaze' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'minamaze' ), get_the_author() ) ),
		get_the_author()
	);
}

/* Input 'Read more' link */
function thinkup_input_readmore() {
global $post;
global $thinkup_blog_postswitch;
global $thinkup_translate_blogreadmore;

		// Output Read More button if full content option is not selected
	if ( $thinkup_blog_postswitch !== 'option2' ) {

		if ( empty( $thinkup_translate_blogreadmore ) ) {
			$thinkup_translate_blogreadmore = __('Read More', 'minamaze');
		}

		printf( '<p><a href="%1$s" class="more-link themebutton">' . $thinkup_translate_blogreadmore . '</a></p>',
			get_permalink($post->ID)
		);
	}
}


/* ----------------------------------------------------------------------------------
	INPUT BLOG META CONTENT
---------------------------------------------------------------------------------- */

function thinkup_input_blogmeta() {
global $thinkup_blog_date;
global $thinkup_blog_author;
global $thinkup_blog_comment;
global $thinkup_blog_category;
global $thinkup_blog_tag;

global $post;
global $thinkup_blog_pageid;
$_thinkup_meta_blogdate     = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogdate', true );
$_thinkup_meta_blogauthor   = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogauthor', true );
$_thinkup_meta_blogcomment  = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogcomment', true );
$_thinkup_meta_blogcategory = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogcategory', true );
$_thinkup_meta_blogtags     = get_post_meta( $thinkup_blog_pageid, '_thinkup_meta_blogtags', true );

	if ( get_page_template_slug( $thinkup_blog_pageid ) !== 'template-blog.php' ) {
		if ( $thinkup_blog_author !== '1' or
			$thinkup_blog_date !== '1' or  
			$thinkup_blog_comment !== '1' or 
			$thinkup_blog_category !== '1' or 
			$thinkup_blog_tag !== '1') {

			echo '<div class="entry-meta">';
				if ( is_sticky() && is_home() && ! is_paged() ) { thinkup_input_sticky(); }

				if ($thinkup_blog_author !== '1')   { thinkup_input_blogauthor();   }
				if ($thinkup_blog_date !== '1')     { thinkup_input_blogdate();     }
				if ($thinkup_blog_comment !== '1')  { thinkup_input_blogcomment();  }	
				if ($thinkup_blog_category !== '1') { thinkup_input_blogcategory(); }
				if ($thinkup_blog_tag !== '1')      { thinkup_input_blogtag();      }
			echo '</div>';
		}
	} else if ( get_page_template_slug( $thinkup_blog_pageid ) == 'template-blog.php' ) {
		if ( $_thinkup_meta_blogauthor == 'on' or
			$_thinkup_meta_blogdate == 'on' or  
			$_thinkup_meta_blogcomment == 'on' or 
			$_thinkup_meta_blogcategory == 'on' or 
			$_thinkup_meta_blogtags == 'on') {

			echo '<div class="entry-meta">';
				if ($_thinkup_meta_blogauthor == 'on')   { thinkup_input_blogauthor();   }
				if ($_thinkup_meta_blogdate == 'on')     { thinkup_input_blogdate();     }
				if ($_thinkup_meta_blogcomment == 'on')  { thinkup_input_blogcomment();  }	
				if ($_thinkup_meta_blogcategory == 'on') { thinkup_input_blogcategory(); }
				if ($_thinkup_meta_blogtags == 'on')      { thinkup_input_blogtag();      }
			echo '</div>';
		}
	}
}


/* ----------------------------------------------------------------------------------
	INPUT POST META CONTENT
---------------------------------------------------------------------------------- */
function thinkup_input_postmeta() {
global $thinkup_post_date;
global $thinkup_post_author;
global $thinkup_post_comment;
global $thinkup_post_category;
global $thinkup_post_tag;

	if ( $thinkup_post_date !== '1' or 
		$thinkup_post_author !== '1' or 
		$thinkup_post_comment !== '1' or 
		$thinkup_post_category !== '1' or 
		$thinkup_post_tag !== '1') {

		echo '<header class="entry-header entry-meta">';
			if ($thinkup_post_author !== '1')   { thinkup_input_blogauthor();   }
			if ($thinkup_post_date !== '1')     { thinkup_input_blogdate();     }
			if ($thinkup_post_comment !== '1')  { thinkup_input_blogcomment();  }	
			if ($thinkup_post_category !== '1') { thinkup_input_blogcategory(); }
			if ($thinkup_post_tag !== '1')      { thinkup_input_blogtag();      }
		echo '</header><!-- .entry-header -->';
	}
}


/* ----------------------------------------------------------------------------------
	SHOW AUTHOR BIO
---------------------------------------------------------------------------------- */

/* HTML for Author Bio */
function thinkup_input_postauthorbiocode() {

	echo	'<div id="author-bio">',
			'<div id="author-image" class="one_sixth">',
			'<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '"/>' . get_avatar( get_the_author_meta( 'email' ), '90' ) . '</a>',
			'</div>',
			'<div id="author-text" class="five_sixth last">',
			'<h3>About the author</h3>',
			wpautop( get_the_author_meta( 'description' ) ),
			'</div>',
			'</div>';
}

/* Output Author Bio */
function thinkup_input_postauthorbio() {
global $thinkup_post_authorbio;

global $post;
$_thinkup_meta_authorbio = get_post_meta( $post->ID, '_thinkup_meta_authorbio', true );

	if ( empty( $_thinkup_meta_authorbio ) or $_thinkup_meta_authorbio == 'option1' )  {
		if ( $thinkup_post_authorbio == '1' ) {
			thinkup_input_postauthorbiocode();
		}
	} else if ( $_thinkup_meta_authorbio == 'option2' ) {
		thinkup_input_postauthorbiocode();
	}
}


/* ----------------------------------------------------------------------------------
	SHOW SOCIAL SHARING
---------------------------------------------------------------------------------- */

/* HTML for Social Sharing */
function thinkup_input_sharecode() {
global $thinkup_post_sharemessage;
global $thinkup_post_sharefacebook;
global $thinkup_post_sharetwitter;
global $thinkup_post_sharegoogle;
global $thinkup_post_sharelinkedin;
global $thinkup_post_sharetumblr;
global $thinkup_post_sharepinterest;
global $thinkup_post_shareemail;

	/* Remove white spaces from title */
	$page_title = str_replace(' ', '%20', get_the_title());

	echo	'<div id="sharepost">';
		echo	'<div id="sharemessage">';
		if ( ! empty( $thinkup_post_sharemessage ) ) { 
			echo '<h3>' . $thinkup_post_sharemessage . '</h3>';
		} else {
			echo '<h3>Spread the word. Share this post!</h3>'; 
		}
		echo	'</div>';
		echo	'<div id="shareicons" class="">';
		if ( $thinkup_post_sharefacebook == '1' ) {
			echo '<a class="shareicon facebook" onclick="MyWindow=window.open(&#39;//www.facebook.com/sharer.php?u=' . get_permalink() . '&#38;t=' . $page_title . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//www.facebook.com/sharer.php?u=' . get_permalink() . '&#38;t=' . $page_title . '" data-tip="top" data-original-title="Facebook"><i class="icon-facebook"></i></a>';
		}
		if ( $thinkup_post_sharetwitter == '1' ) {
			echo '<a class="shareicon twitter" onclick="MyWindow=window.open(&#39;//twitter.com/home?status=Check%20this%20out!%20' . $page_title . '%20at%20' . get_permalink() . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//twitter.com/home?status=Check%20this%20out!%20' . $page_title . '%20at%20' . get_permalink() . '" data-tip="top" data-original-title="Twitter"><i class="icon-twitter"></i></a>';
		}
		if ( $thinkup_post_sharegoogle == '1' ) {
			echo '<a class="shareicon Google" onclick="MyWindow=window.open(&#39;//plus.google.com/share?url=' . get_permalink() . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//plus.google.com/share?url=' . get_permalink() . '" data-tip="top" data-original-title="Google+"><i class="icon-google-plus"></i></a>';
		}
		if ( $thinkup_post_sharelinkedin =='1' ) {
			echo '<a class="shareicon linkedin" onclick="MyWindow=window.open(&#39;//linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&summary=' . $page_title . '&source=LinkedIn&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&summary=' . $page_title . '&source=LinkedIn" data-tip="top" data-original-title="LinkedIn"><i class="icon-linkedin"></i></a>';
		}
		if ( $thinkup_post_sharetumblr == '1' ) {
			echo '<a class="shareicon tumblr" data-tip="top" data-original-title="Tumblr" onclick="MyWindow=window.open(&#39;//www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode($post->post_title) . '&amp;description=' . urlencode(get_the_excerpt()) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode($post->post_title) . '&amp;description=' . urlencode(get_the_excerpt()) . '"><i class="icon-tumblr"></i></a>';
		}
		if ( $thinkup_post_sharepinterest == '1' ) {
			echo '<a class="shareicon pinterest" data-tip="top" data-original-title="Pinterest" onclick="MyWindow=window.open(&#39;//pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . urlencode(get_the_title()) . '&amp;media=' . urlencode(wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="//pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . urlencode(get_the_title()) . '&amp;media=' . urlencode(wp_get_attachment_url( get_post_thumbnail_id($post->ID) )) . '"><i class="icon-pinterest"></i></a>';
		}
		if ( $thinkup_post_shareemail == '1' ) {
			echo	'<a class="shareicon email" data-tip="top" data-original-title="Email" onclick="MyWindow=window.open(&#39;mailto:?subject=' . get_the_title() . '&amp;body=' . get_permalink() . '&#39;,&#39;MyWindow&#39;,width=650,height=450); return false;" href="mailto:?subject=' . get_the_title() . '&amp;body=' . get_permalink() . '"><i class="icon-envelope"></i></a>';
		}
		echo	'</div>';		
	echo	'</div>';
}

/* Output Social Sharing */
function thinkup_input_share() {
global $thinkup_post_share;

global $post;
$_thinkup_meta_share = get_post_meta($post->ID, '_thinkup_meta_share', true);

	if ( empty( $_thinkup_meta_share ) or $_thinkup_meta_share == 'option1' )  {
		if ( $thinkup_post_share == '1' ) {
			thinkup_input_sharecode();
		}
	} else if ( $_thinkup_meta_share == 'option2' ) {
		thinkup_input_sharecode();
	}
}


/* ----------------------------------------------------------------------------------
	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
---------------------------------------------------------------------------------- */
function thinkup_input_commenttemplate( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'minamaze'); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'minamaze' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">

			<header>
				<?php echo get_avatar( $comment, 60 ); ?>

				<span class="comment-author">
					<?php printf( '%s', sprintf( '%s', get_comment_author_link() ) ); ?>
				</span>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'minamaze'); ?></em>
					<br />
				<?php endif; ?>

				<span class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( '%1$s', get_comment_date() ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', 'minamaze' ), ' ' );
					?>
				</span>

				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span>
			</header>

			<footer>
				<div class="comment-content"><?php comment_text(); ?></div>
			</footer>
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}


/* List comments in single page */
function thinkup_input_comments() {
	$args = array( 
		'callback' => 'thinkup_input_commenttemplate', 
	);
	wp_list_comments( $args );
}


?>