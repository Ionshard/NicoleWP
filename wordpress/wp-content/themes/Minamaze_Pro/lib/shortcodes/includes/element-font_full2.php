<?php
$title       = NULL;
$link        = NULL;
$button      = NULL;
$icon        = NULL;
$size        = NULL; 
$color       = NULL;
$background  = NULL;
$spin        = NULL;

$link_class  = NULL;
$link_icon   = NULL;

$title       = $atts['title'];
$link        = $atts['link'];
$button      = $atts['button'];
$icon        = $atts['icon'];
$size        = $atts['size'];
$color       = $atts['color'];
$background  = $atts['background'];
$spin        = $atts['spin'];


if ( empty( $icon )  ) {
	$icon = 'fa fa-file';
} else {
	$icon = 'fa fa-' . $icon;
}
if ( empty( $size ) or $size == 'small' ) {
	$size = ' fa-lg';
} else if ( $size == 'medium' ) {
	$size = ' fa-2x';
} else if ( $size == 'large' ) {
	$size = ' fa-3x';
} else if ( $size == 'extra large' ) {
	$size = ' fa-4x';
}
if ( $background == 'on' ) {
	$background = ' iconbackground';
} else {
	$background = '';
}
if ( $color == 'light' ) {
	$color = ' fa-inverse';
} else {
	$color = '';
}
if ( $spin == 'on' ) {
	$spin = ' fa-spin';
} else {
	$spin = '';
}
if ( ! empty( $title ) ) {
	$title = '<h3>' . $title. '</h3>';
} else {
	$title = '';
}
if ( ! empty( $link ) ) {

	if ( empty( $button ) ) {
		$button = 'Read More';
	}

	$link_class = ' iconlink';
	$link_icon  = '<p class="iconurl"><a href="' . $link . '">' . $button . '</a></p>';
}

echo     '<div class="iconfull style2' . $link_class . '">',
			 '<div class="iconimage">',
				 '<i class="' . $icon . $size .  $background .  $spin . $color .'"></i>',
				 $title,
			 '</div>',
			 '<div class="iconmain">',
				 '<p>' . $content . '</p>',
				 $link_icon,
			 '</div>',
	     '</div>';


?>