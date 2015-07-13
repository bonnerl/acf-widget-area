<?php

/*
Plugin Name: Advanced Custom Fields: Widget Area
Plugin URI: https://github.com/bonnerl/acf-widget-area.git
Description: This plugin adds a "Widget Area" field to Advanced Custom Fields 5.
Version: 1.0.0
Author: lbonner
Author URI: http://lucasbonner.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/



// Include field type for ACF5
function include_field_types_widget_area( $version ) {
	
	include_once('acf-widget-area-v5.php');
	
}
add_action('acf/include_field_types', 'include_field_types_widget_area');	


// Include field type for ACF4
function register_fields_widget_area() {
	
	include_once('acf-widget-area-v4.php');
	
}
add_action('acf/register_fields', 'register_fields_widget_area');	
