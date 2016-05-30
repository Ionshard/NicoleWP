<?php 
$link    = NULL;
$color   = NULL;
$size    = NULL;

$link    = $atts['link'];
$color   = $atts['color'];
$size    = $atts['size'];

if ( empty( $link ) ) { 
	$link = '#';
}
if ( empty( $color ) ) { 
	$color = 'aqua';
}
if ( empty( $size ) ) { 
	$size = 'medium';
}


echo '<a href="' . $link . '" class="button style2 ' . $color . ' ' . $size . '">' . $content . '</a>';


?>