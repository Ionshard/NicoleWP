<?php
/**
 * @package   Thinkupshortcodes
 * @author    Think Up Themes Ltd <contact@thinkupthemes.com>
 * @license   GPL-2.0+
 * @link      www.thinkupthemes.com
 * @copyright 2016 Think Up Themes Ltd
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( get_template_directory() . '/lib/shortcodes/class-thinkupshortcodes.php' );
require_once( get_template_directory() . '/lib/shortcodes/includes/functions-thinkup_builder_thinkupslider.php' );

require_once( get_template_directory() . '/lib/shortcodes/includes/widget-thinkup_builder_sliderimage.php' );
require_once( get_template_directory() . '/lib/shortcodes/includes/widget-thinkup_builder_tabs.php' );
require_once( get_template_directory() . '/lib/shortcodes/includes/widget-thinkup_builder_toggle.php' );
require_once( get_template_directory() . '/lib/shortcodes/includes/widget-thinkup_builder_thinkupslider.php' );



return Thinkupshortcodes::get_instance();
?>