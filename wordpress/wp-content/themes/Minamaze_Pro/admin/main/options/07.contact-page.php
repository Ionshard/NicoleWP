<?php
/**
 * Special pages functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	GOOGLE MAP SHORTCODE
---------------------------------------------------------------------------------- */

/* Used in function thinkup_input_contact() */
function thinkup_contact_map() {
global 	$thinkup_contact_map;
	
	echo do_shortcode( $thinkup_contact_map );	
}


/* ----------------------------------------------------------------------------------
	CONTACT FORM SHORTCODE
---------------------------------------------------------------------------------- */

/* Used in function thinkup_input_contact() */
function thinkup_contact_form() {
global $thinkup_contact_form;

	echo do_shortcode( $thinkup_contact_form );
}


/* ----------------------------------------------------------------------------------
	COMPANY INFORMATION / ADDRESS DETAILS / CONTACT DETAIL
---------------------------------------------------------------------------------- */

/* Company Information - Used in function thinkup_input_contact() */
function thinkup_contact_info() {
global $thinkup_contact_info;

	echo do_shortcode( wpautop( $thinkup_contact_info ) );
}

/* Address Details - Used in function thinkup_input_contact() */
function thinkup_contact_address() {
global $thinkup_contact_line1;
global $thinkup_contact_line2;
global $thinkup_contact_city;
global $thinkup_contact_country;
global $thinkup_contact_zip;

	$output = NULL;

	if ( ! empty( $thinkup_contact_line1 ) )   { $output .= '<span class="line1">' . $thinkup_contact_line1 . ' </span><br />'; }
	if ( ! empty( $thinkup_contact_line2 ) )   { $output .= '<span class="line2">' . $thinkup_contact_line2 . ' </span><br />'; }
	if ( ! empty( $thinkup_contact_city ) )    { $output .= '<span class="city">' . $thinkup_contact_city . ' </span><br />'; }
	if ( ! empty( $thinkup_contact_country ) ) { $output .= '<span class="country">' . $thinkup_contact_country . ' </span><br />'; }
	if ( ! empty( $thinkup_contact_zip ) )     { $output .= '<span class="zip">' . $thinkup_contact_zip . '</span>'; }

	echo do_shortcode( $output ) . '<br />';
}

/* Contact Details - Used in function thinkup_input_contact() */
function thinkup_contact_details() {
global $thinkup_contact_telephone;
global $thinkup_contact_fax;
global $thinkup_contact_email;
global $thinkup_contact_website;

	$output = NULL;

	if ( ! empty( $thinkup_contact_telephone ) ) { $output .= '<span class="telephone">' . $thinkup_contact_telephone . '</span><br />'; }
	if ( ! empty( $thinkup_contact_fax ) )       { $output .= '<span class="fax">' . $thinkup_contact_fax . '</span><br />'; }
	if ( ! empty( $thinkup_contact_email ) )     { $output .= '<span class="email">' . $thinkup_contact_email . '</span><br />'; }	
	if ( ! empty( $thinkup_contact_website ) )   { $output .= '<span class="website">' . $thinkup_contact_website . '</span>'; }

	echo do_shortcode( $output );
}


/* ----------------------------------------------------------------------------------
	OUTPUT CONTACT PAGE
---------------------------------------------------------------------------------- */

function thinkup_input_contact() {

// Translation variables
global $thinkup_translate_contactformtitle;
global $thinkup_translate_contactaddresstitle;


	if( empty( $thinkup_translate_contactformtitle ) ) {
		$thinkup_translate_contactformtitle = __( 'Contact Form', 'minamaze' );
	}
	if( empty( $thinkup_translate_contactaddresstitle ) ) {
		$thinkup_translate_contactaddresstitle = __( 'Contact Address', 'minamaze' );
	}

	thinkup_contact_map();

	echo do_shortcode( '[margin size="30"]' );

	echo do_shortcode( '<div class="one_half"><h4>' . $thinkup_translate_contactformtitle . '</h4>' ),
	     thinkup_contact_form(),
	     do_shortcode( '</div>' );

	echo do_shortcode( '<div class="one_half last"><h4>' . $thinkup_translate_contactaddresstitle . '</h4>' ),
	     thinkup_contact_info(),
	     thinkup_contact_address(),
	     do_shortcode( '[margin size="20"]' ),
	     thinkup_contact_details(),
	     do_shortcode( '</div>' );

	echo '<div style="clear: both;"></div>';
}


?>