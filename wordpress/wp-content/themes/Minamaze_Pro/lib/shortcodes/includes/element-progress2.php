<?php
$style    = NULL;
$title    = NULL;
$progress = NULL;
$show     = NULL;

$style    = $atts['style'];
$title    = $atts['title'];
$progress = $atts['progress'];
$show     = $atts['show'];


if ( $style == 'info' ) {
	$style = ' bar-info';
} else if ($style == 'success' ) {
	$style = ' bar-success';
} else if ($style == 'warning' ) {
	$style = ' bar-warning';
} else if ($style == 'danger' ) {
	$style = ' bar-danger';
} else {
	$style = '';
}

if ( ! empty ( $title ) ) {	
	$title = '<span class="bar-title">' . $title . '</span>';
}

if ( empty( $progress ) ) { 
	$progress = '50'; 
}

if ( $show == "on" ) {
	$show = '<span class="bar-per">' . $progress . '%</span>';
} else {
	$show = '';
}

echo '<div class="progress progress-striped">',
	 '<div class="bar' . $style . '" data-width="' . $progress . '" style="width: 0%">' . $title . $show . '</div>',
	 '</div>';


?>