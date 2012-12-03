<?php
/**
 * @package BMS_Showhide
 * @author Mike Lathrop
 * @version 1.5.1
 */
/*
Plugin Name: BMS Showhide
Plugin URI: http://bigmikestudios.com
Description: Creates a shortcode to display jquery "show/hide" divs
Version: 0.0.1
Author URI: http://bigmikestudios.com
*/

$cr = "\r\n";

// include stuff


wp_register_script('bms_showhide', plugins_url() .'/bms-showhide/bms_showhide.js', array('jquery'));
wp_enqueue_script('bms_showhide');

wp_register_style('bms_showhide', plugins_url() .'/bms-showhide/bms_showhide.css');
wp_enqueue_style('bms_showhide');

// shortcode for readmore
function bms_showhide ($atts, $content=null)
{
	extract( shortcode_atts( array(
      'label' => 'Read more&gt;&gt;',
	  'readless' => false,
	  'label_wrapper' => false,
      ), $atts ) );
	$return = "<div class='bms-sh'>".$cr;
	$return .= "<div class='bms-sh-label'>".$cr;
	$content = ltrim($content, "</p>");
	$content = rtrim($content, "<p>");
	if ($label_wrapper) $return.= "<".$label_wrapper.">";
	if ($readless) {
		$return .= "<span class='bms-sh-more'>".$label."</span><span class='bms-sh-less'>".$readless."</span>".$cr;
	} else {
		$return .= $atts['label'];
	}
	if ($label_wrapper) $return.= "</".$label_wrapper.">";
	// execute shortcodes in content
	$content = do_shortcode($content);
	$return .= "</div><!-- /.bms-sh-label -->";
	$return .= "<div class='bms-sh-moreinfo'>";
	$return .= $content;
	$return .= "</div><!-- /.bms-sh-moreinfo -->".$cr;
	$return .= "</div><!-- /.bms-sh -->".$cr;
	return $return;
	
}
add_shortcode('bms_showhide', 'bms_showhide');

?>