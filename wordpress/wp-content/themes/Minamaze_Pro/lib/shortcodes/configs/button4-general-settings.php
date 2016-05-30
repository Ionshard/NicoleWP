<?php
/**
*
* fieldconfig for thinkupshortcodes/General Settings
*
* @package Thinkupshortcodes
* @author Think Up Themes Ltd contact@thinkupthemes.com
* @license GPL-2.0+
* @link www.thinkupthemes.com
* @copyright 2016 Think Up Themes Ltd
*/


$group = array(
	'label' => __('General Settings','thinkupshortcodes'),
	'id' => '41139102',
	'master' => 'size',
	'fields' => array(
		'size'	=>	array(
			'label'		=> 	__('Size','thinkupshortcodes'),
			'caption'	=>	__('This is info 1.','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'small,medium,large',
		),
		'color'	=>	array(
			'label'		=> 	__('Color','thinkupshortcodes'),
			'caption'	=>	__('Choose a button color.','thinkupshortcodes'),
			'type'		=>	'dropdown',
			'default'	=> 	'aqua,black,blue_dark,blue_light,brown,green_dark,green_light,grey,red_dark,red_light,pink,purple',
		),
		'link'	=>	array(
			'label'		=> 	__('Link','thinkupshortcodes'),
			'caption'	=>	__('Add a link. Make sure to use http:// for external links.','thinkupshortcodes'),
			'type'		=>	'textfield',
			'default'	=> 	'',
		),
	),
	'multiple'	=> false,
);

