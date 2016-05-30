<?php
/**
 * Custom styling functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	CONTROL THEME STYLES
---------------------------------------------------------------------------------- */

/* Input custom color scheme */
function thinkup_input_stylecustom(){
global $thinkup_styles_colorswitch;
global $thinkup_styles_colorcustom;

	if ( $thinkup_styles_colorswitch == '1' and ! empty($thinkup_styles_colorcustom) ) {

		echo "\n" . '<style type="text/css">' . "\n",
			 'a,' . "\n",
			 '.pag li a:hover,' . "\n",
			 '#header .menu > li.menu-hover > a,' . "\n",
			 '#header .menu > li.current_page_item > a,' . "\n",
			 '#header .menu > li.current-menu-ancestor > a,' . "\n",
			 '#header .menu > li > a:hover,' . "\n",
			 '#breadcrumbs .delimiter,' . "\n",
			 '#breadcrumbs a:hover,' . "\n",
			 '#footer-core a,' . "\n",
			 '#sub-footer-core a:hover,' . "\n",
			 '#footer .popular-posts a:hover,' . "\n",
			 '#footer .recent-comments a:hover,' . "\n",
			 '#footer .recent-posts a:hover,' . "\n",
			 '#footer .thinkup_widget_tagscloud a:hover,' . "\n",
			 '.thinkup_widget_childmenu li a.active,' . "\n",
			 '.thinkup_widget_childmenu li a:hover,' . "\n",
			 '.thinkup_widget_childmenu li > a.active:before,' . "\n",
			 '.thinkup_widget_childmenu li > a:hover:before,' . "\n",
			 '.thinkup_widget_recentcomments .quote:before,' . "\n",
			 '#sidebar .thinkup_widget_twitterfeed a,' . "\n",
			 '.widget li a:hover,' . "\n",
			 '.entry-meta a:hover,' . "\n",
			 '.comment .reply a,' . "\n",
			 '.comment-author a:hover,' . "\n",
			 '.comment-meta a:hover,' . "\n",
			 '.page-template-template-sitemap-php #main-core a:hover,' . "\n",
			 '.iconfull.style1 i,' . "\n",
			 '.iconfull.style2 i,' . "\n",
			 '.services-builder.style2 .iconurl a:hover,' . "\n",
			 '#filter.portfolio-filter li a:hover,' . "\n",
			 '#filter.portfolio-filter li a.selected,' . "\n",
			 '#header-responsive li a:hover,' . "\n",
			 '#header-responsive li.current_page_item > a {' . "\n",
			 '	color: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '.nav-previous a,' . "\n",
			 '.nav-next a,' . "\n",
			 '.pag li.current span,' . "\n",
			 '.themebutton,' . "\n",
			 'button,' . "\n",
			 'html input[type="button"],' . "\n",
			 'input[type="reset"],' . "\n",
			 'input[type="submit"],' . "\n",
			 '#slider .featured-link a:hover,' . "\n",
			 '.thinkup_widget_categories li a:hover,' . "\n",
			 '#footer .thinkup_widget_search .searchsubmit,' . "\n",
			 '.sc-carousel .entry-header .hover-link:hover,' . "\n",
			 '.sc-carousel .entry-header .hover-zoom:hover,' . "\n",
			 '#filter.portfolio-filter li a:hover,' . "\n",
			 '#filter.portfolio-filter li a.selected {' . "\n",
			 '	background: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '.thinkup_widget_flickr a .image-overlay,' . "\n",
			 '.popular-posts a .image-overlay,' . "\n",
			 '.recent-comments a .image-overlay,' . "\n",
			 '.recent-posts a .image-overlay,' . "\n",
			 '#footer .widget_search .searchsubmit,' . "\n",
			 '#project-accordion .accordion-toggle:before,' . "\n",
			 '.panel-grid-cell #introaction .style1,' . "\n",
			 '.panel-grid-cell #introaction .style2,' . "\n",
			 '.panel-grid-cell #introaction .style4:hover,' . "\n",
			 '.panel-grid-cell #introaction .style6:hover,' . "\n",
			 '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.prev:hover,' . "\n",
			 '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.next:hover,' . "\n",
			 '.carousel-portfolio-builder.style2 .sc-carousel-button:hover,' . "\n",
			 'img.hover-link:hover,' . "\n",
			 'img.hover-zoom:hover,' . "\n",
			 '.da-thumbs a.prettyPhoto img:hover {' . "\n",
			 '	background-color: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '.pag li a:hover,' . "\n",
			 '.pag li.current span,' . "\n",
			 '#slider .featured-link a:hover,' . "\n",
			 '#sidebar .thinkup_widget_tagscloud a:hover,' . "\n",
			 '#footer .thinkup_widget_tagscloud a:hover,' . "\n",
			 '#sidebar .widget_tag_cloud a:hover,' . "\n",
			 '#footer .widget_tag_cloud a:hover,' . "\n",
			 '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.prev:hover,' . "\n",
			 '.carousel-portfolio-builder.style2 .sc-carousel.carousel-portfolio a.next:hover,' . "\n",
			 '.carousel-portfolio-builder.style2 .sc-carousel-button:hover {' . "\n",
			 '	border-color: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '#sidebar .thinkup_widget_tabs .nav .active h3.widget-title {' . "\n",
			 '	border-top: 3px solid ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '#footer {' . "\n",
			 '	border-top: 6px solid ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '#intro.option1 #intro-core:after,' . "\n",
			 '#sidebar h3.widget-title:after {' . "\n",
			 '	border-bottom: 3px solid ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 'blockquote, q {' . "\n",
			 '	border-left: 2px solid ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '/* WooCommerce Styles */' . "\n",
			 '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins,' . "\n",
			 '.products a:hover h3,' . "\n",
			 '.products .price ins,' . "\n",
			 '.products .column-1 a:hover h3,' . "\n",
			 '.single-product .woocommerce-review-link:hover,' . "\n",
			 '.shop_table .product-name a:hover,' . "\n",
			 '.cart-collaterals h2 a:hover,' . "\n",
			 '#myaccount-tabs li.active a,' . "\n",
			 '#myaccount-tabs .nav-tabs > li > a:hover,' . "\n",
			 '#myaccount-tabs .nav-tabs > li:active > a:hover {' . "\n",
			 '	color: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '.woo-meta a,' . "\n",
			 '.chosen-container .chosen-results li.highlighted,' . "\n",
			 '.post-type-archive-product .products .added_to_cart:hover,' . "\n",
			 '.single-product .variations .value input[type=radio]:checked + label {' . "\n",
			 '	background: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '.single-product .variations .value input[type=radio]:checked + label {' . "\n",
			 '	border-color: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '}' . "\n",
			 '@media only screen and (max-width: 568px) {' . "\n",
			 '	#thinkupshortcodestabswoo.tabs .nav-tabs > li > a:hover,' . "\n",
			 '	#thinkupshortcodestabswoo.tabs .nav-tabs > .active > a, ' . "\n",
			 '	#thinkupshortcodestabswoo.tabs .nav-tabs > .active > a:hover,' . "\n",
			 '	#thinkupshortcodestabswoo.tabs .nav-tabs > .active > a:focus {' . "\n",
			 '		background: ' . $thinkup_styles_colorcustom . ';' . "\n",
			 '	}' . "\n",
			 '}' . "\n",
			 '</style>' . "\n";
	}
}
add_action( 'wp_head','thinkup_input_stylecustom', '11' );


/* ----------------------------------------------------------------------------------
	CUSTOM STYLING
---------------------------------------------------------------------------------- */

/* Input advanced custom styling */
function thinkup_input_stylecustomtargeted(){
global $thinkup_styles_mainswitch;
global $thinkup_styles_mainbg;
global $thinkup_styles_mainheading;
global $thinkup_styles_maintext;
global $thinkup_styles_mainlink;
global $thinkup_styles_mainlinkhover;
global $thinkup_styles_preheaderswitch;
global $thinkup_styles_preheaderbg;
global $thinkup_styles_preheaderbghover;
global $thinkup_styles_preheadertext;
global $thinkup_styles_preheadertexthover;
global $thinkup_styles_preheaderdropbg;
global $thinkup_styles_preheaderdropbghover;
global $thinkup_styles_preheaderdroptext;
global $thinkup_styles_preheaderdroptexthover;
global $thinkup_styles_preheaderdropborder;
global $thinkup_styles_headerswitch;
global $thinkup_styles_headerbg;
global $thinkup_styles_headerbghover;
global $thinkup_styles_headertext;
global $thinkup_styles_headertexthover;
global $thinkup_styles_headerdropbg;
global $thinkup_styles_headerdropbghover;
global $thinkup_styles_headerdroptext;
global $thinkup_styles_headerdroptexthover;
global $thinkup_styles_headerdropborder;

global $thinkup_styles_headerresswitch;
global $thinkup_styles_headerresbg;
global $thinkup_styles_headerresbghover;
global $thinkup_styles_headerresdropbg;
global $thinkup_styles_headerresdropbghover;
global $thinkup_styles_headerresdroptext;
global $thinkup_styles_headerresdroptexthover;
global $thinkup_styles_headerresdropborder;
global $thinkup_styles_footerswitch;
global $thinkup_styles_footerbg;
global $thinkup_styles_footertitle;
global $thinkup_styles_footertext;
global $thinkup_styles_footerlink;
global $thinkup_styles_footerlinkhover;
global $thinkup_styles_postfooterswitch;
global $thinkup_styles_postfooterbg;
global $thinkup_styles_postfootertext;
global $thinkup_styles_postfooterlink;
global $thinkup_styles_postfooterlinkhover;

$output = NULL;

	// Main Content
	if ( $thinkup_styles_mainswitch == '1' ) {
		if ( ! empty( $thinkup_styles_mainbg ) and $thinkup_styles_mainbg !== 'transparent' ) {
			$output .= '#body-core {';
			$output .= 'background: ' . $thinkup_styles_mainbg . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_mainheading ) and $thinkup_styles_mainheading !== 'transparent' ) {
			$output .= 'h1,h2,h3,h4,h5,h6 {';
			$output .= 'color: ' . $thinkup_styles_mainheading . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_maintext ) and $thinkup_styles_maintext !== 'transparent' ) {
			$output .= 'body,';
			$output .= 'button,';
			$output .= 'input,';
			$output .= 'select,';
			$output .= 'textarea {';
			$output .= 'color: ' . $thinkup_styles_maintext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_mainlink ) and $thinkup_styles_mainlink !== 'transparent' ) {
			$output .= '#content a {';
			$output .= 'color: ' . $thinkup_styles_mainlink . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_mainlinkhover ) and $thinkup_styles_mainlinkhover !== 'transparent' ) {
			$output .= '#content a:hover {';
			$output .= 'color: ' . $thinkup_styles_mainlinkhover . ';';
			$output .= '}';
		}
	}

	// Pre Header Styling
	if ( $thinkup_styles_preheaderswitch == '1' ) {
		if ( ! empty( $thinkup_styles_preheaderbg ) and $thinkup_styles_preheaderbg !== 'transparent' ) {
			$output .= '#pre-header {';
			$output .= 'background: ' . $thinkup_styles_preheaderbg . ';';
			$output .= 'border: none;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderbghover ) and $thinkup_styles_preheaderbghover !== 'transparent' ) {
			$output .= '#pre-header .header-links .menu-hover > a,';
			$output .= '#pre-header .header-links > ul > li > a:hover {';
			$output .= 'background: ' . $thinkup_styles_preheaderbghover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheadertext ) and $thinkup_styles_preheadertext !== 'transparent' ) {
			$output .= '#pre-header .header-links > ul > li a,';
			$output .= '#pre-header-social li {';
			$output .= 'color: ' . $thinkup_styles_preheadertext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheadertexthover ) and $thinkup_styles_preheadertexthover !== 'transparent' ) {
			$output .= '#pre-header .header-links .menu-hover > a,';
			$output .= '#pre-header .menu > li.current_page_item > a,';
			$output .= '#pre-header .menu > li.current-menu-ancestor > a,';
			$output .= '#pre-header .header-links > ul > li > a:hover {';
			$output .= 'color: ' . $thinkup_styles_preheadertexthover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdropbg ) and $thinkup_styles_preheaderdropbg !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu {';
			$output .= 'background: ' . $thinkup_styles_preheaderdropbg . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdropbghover ) and $thinkup_styles_preheaderdropbghover !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu a:hover {';
			$output .= 'background: ' . $thinkup_styles_preheaderdropbghover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdroptext ) and $thinkup_styles_preheaderdroptext !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu a {';
			$output .= 'color: ' . $thinkup_styles_preheaderdroptext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdroptexthover ) and $thinkup_styles_preheaderdroptexthover !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu a:hover,';
			$output .= '#pre-header .header-links .sub-menu .current-menu-item a {';
			$output .= 'color: ' . $thinkup_styles_preheaderdroptexthover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_preheaderdropborder ) and $thinkup_styles_preheaderdropborder !== 'transparent' ) {
			$output .= '#pre-header .header-links .sub-menu,';
			$output .= '#pre-header .header-links .sub-menu li {';
			$output .= 'border-color: ' . $thinkup_styles_preheaderdropborder . ';';
			$output .= '}';
		}
	}

	// Main Header Styling
	if ( $thinkup_styles_headerswitch == '1' ) {
		if ( ! empty( $thinkup_styles_headerbg ) and $thinkup_styles_headerbg !== 'transparent' ) {
			$output .= '#header,';
			$output .= '.header-style2.header-sticky #header-links {';
			$output .= 'background: ' . $thinkup_styles_headerbg . ' !important;';
			$output .= '}';
			$output .= '.header-style2.header-sticky .is-sticky #header-links {';
			$output .= 'border: none;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerbghover ) and $thinkup_styles_headerbghover !== 'transparent' ) {
			$output .= '#header .menu > li.menu-hover > a,';
			$output .= '#header .menu > li.current_page_item > a,';
			$output .= '#header .menu > li.current-menu-ancestor > a,';
			$output .= '#header .menu > li > a:hover {';
			$output .= 'background: ' . $thinkup_styles_headerbghover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headertext ) and $thinkup_styles_headertext !== 'transparent' ) {
			$output .= '#header .header-links > ul > li a {';
			$output .= 'color: ' . $thinkup_styles_headertext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headertexthover ) and $thinkup_styles_headertexthover !== 'transparent' ) {
			$output .= '#header .menu > li.menu-hover > a,';
			$output .= '#header .menu > li.current_page_item > a,';
			$output .= '#header .menu > li.current-menu-ancestor > a,';
			$output .= '#header .menu > li > a:hover {';
			$output .= 'color: ' . $thinkup_styles_headertexthover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdropbg ) and $thinkup_styles_headerdropbg !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu {';
			$output .= 'background: ' . $thinkup_styles_headerdropbg . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdropbghover ) and $thinkup_styles_headerdropbghover !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu li:hover,';
			$output .= '#header .header-links .sub-menu .current-menu-item {';
			$output .= 'background: ' . $thinkup_styles_headerdropbghover . ';';
			$output .= '}';
			$output .= '#header .header-links .sub-menu a {';
			$output .= 'border: none;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdroptext ) and $thinkup_styles_headerdroptext !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu a {';
			$output .= 'color: ' . $thinkup_styles_headerdroptext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdroptexthover ) and $thinkup_styles_headerdroptexthover !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu a:hover,';
			$output .= '#header .header-links .sub-menu .current-menu-item a {';
			$output .= 'color: ' . $thinkup_styles_headerdroptexthover . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerdropborder ) and $thinkup_styles_headerdropborder !== 'transparent' ) {
			$output .= '#header .header-links .sub-menu,';
			$output .= '#header .header-links .sub-menu li,';
			$output .= '.header-style2 #header-links {';
			$output .= 'border-color: ' . $thinkup_styles_headerdropborder . ';';
			$output .= '}';
			$output .= '#header .header-links .sub-menu a {';
			$output .= 'border: none;';
			$output .= '}';
		}
	}

	// Responsive Header Styling
	if ( $thinkup_styles_headerresswitch == '1' ) {
		if ( ! empty( $thinkup_styles_headerresbg ) and $thinkup_styles_headerresbg !== 'transparent' ) {
			$output .= '#header-responsive .btn-navbar {';
			$output .= 'background-color: ' . $thinkup_styles_headerresbg . ' !important;';
			$output .= 'border-color: ' . $thinkup_styles_headerresbg . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresbghover ) and $thinkup_styles_headerresbghover !== 'transparent' ) {
			$output .= '#header-responsive .btn-navbar:hover {';
			$output .= 'background-color: ' . $thinkup_styles_headerresbghover . ' !important;';
			$output .= 'border-color: ' . $thinkup_styles_headerresbghover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdropbg ) and $thinkup_styles_headerresdropbg !== 'transparent' ) {
			$output .= '#header-responsive-inner {';
			$output .= 'background: ' . $thinkup_styles_headerresdropbg . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdropbghover ) and $thinkup_styles_headerresdropbghover !== 'transparent' ) {
			$output .= '#header-responsive li a:hover,';
			$output .= '#header-responsive li.current_page_item > a {';
			$output .= 'background: ' . $thinkup_styles_headerresdropbghover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdroptext ) and $thinkup_styles_headerresdroptext !== 'transparent' ) {
			$output .= '#header-responsive li a {';
			$output .= 'color: ' . $thinkup_styles_headerresdroptext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdroptexthover ) and $thinkup_styles_headerresdroptexthover !== 'transparent' ) {
			$output .= '#header-responsive li a:hover,';
			$output .= '#header-responsive li.current_page_item > a {';
			$output .= 'color: ' . $thinkup_styles_headerresdroptexthover . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_headerresdropborder ) and $thinkup_styles_headerresdropborder !== 'transparent' ) {
			$output .= '#header-responsive-inner,';
			$output .= '#header-responsive li a {';
			$output .= 'border-color: ' . $thinkup_styles_headerresdropborder . ' !important;';
			$output .= '}';
		}
	}

	// Main Footer Styling
	if ( $thinkup_styles_footerswitch == '1' ) {
		if ( ! empty( $thinkup_styles_footerbg ) and $thinkup_styles_footerbg !== 'transparent' ) {
			$output .= '#footer {';
			$output .= 'background: ' . $thinkup_styles_footerbg . ';';
			$output .= 'border: none;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footertitle ) and $thinkup_styles_footertitle !== 'transparent' ) {
			$output .= '#footer-core h3 {';
			$output .= 'color: ' . $thinkup_styles_footertitle . ';';
			$output .= 'border: none;';
			$output .= '-webkit-box-shadow: none;';
			$output .= '-moz-box-shadow: none;';
			$output .= '-ms-box-shadow: none;';
			$output .= '-o-box-shadow: none;';
			$output .= 'box-shadow: none;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footertext ) and $thinkup_styles_footertext !== 'transparent' ) {
			$output .= '#footer-core,';
			$output .= '#footer-core p {';
			$output .= 'color: ' . $thinkup_styles_footertext . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footerlink ) and $thinkup_styles_footerlink !== 'transparent' ) {
			$output .= '#footer-core a {';
			$output .= 'color: ' . $thinkup_styles_footerlink . ' !important;';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_footerlinkhover ) and $thinkup_styles_footerlinkhover !== 'transparent' ) {
			$output .= '#footer-core a:hover {';
			$output .= 'color: ' . $thinkup_styles_footerlinkhover . ' !important;';
			$output .= '}';
		}
	}

	// Post Footer Styling
	if ( $thinkup_styles_postfooterswitch == '1' ) {
		if ( ! empty( $thinkup_styles_postfooterbg ) and $thinkup_styles_postfooterbg !== 'transparent' ) {
			$output .= '#sub-footer {';
			$output .= 'background: ' . $thinkup_styles_postfooterbg . ';';
			$output .= 'border-color: ' . $thinkup_styles_postfooterbg . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_postfootertext ) and $thinkup_styles_postfootertext !== 'transparent' ) {
			$output .= '#sub-footer-core {';
			$output .= 'color: ' . $thinkup_styles_postfootertext . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_postfooterlink ) and $thinkup_styles_postfooterlink !== 'transparent' ) {
			$output .= '#sub-footer-core a {';
			$output .= 'color: ' . $thinkup_styles_postfooterlink . ';';
			$output .= '}';
		}
		if ( ! empty( $thinkup_styles_postfooterlinkhover ) and $thinkup_styles_postfooterlinkhover !== 'transparent' ) {
			$output .= '#sub-footer-core a:hover {';
			$output .= 'color: ' . $thinkup_styles_postfooterlinkhover . ';';
			$output .= '}';
		}
	}
	
	if ( ! empty( $output ) ) {
		echo '<style>' . $output . '</style>';
	}
}
add_action( 'wp_head','thinkup_input_stylecustomtargeted', '11' );


?>