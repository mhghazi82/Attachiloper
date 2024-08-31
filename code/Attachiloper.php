<?php
/*
 * Plugin Name:       Attachiloper | اتچی‌لوپر
 * Plugin URI:        https://webiloper.ir
 * Description:       A plugin called ATTACHILOPER, programmed by the WEBILOPER team, to prevent arbitrary loading of css and js files. <b>Note: Before deactivating the plugin, take a backup of the website. By doing this, the website may have a problem.</b>
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Webiloper | وبی‌لوپر
 * Author URI:        https://webiloper.ir
 */

/*****************************************************************
 * Show All Scripts Name In Page with Shortcodes (pluginhandlesjs)
*****************************************************************/
function wpb_display_pluginhandles_js() {
    $wp_scripts = wp_scripts(); 
    $handlename .= "<ul>"; 
        foreach( $wp_scripts->queue as $handle ) :
          $handlename .=  '<li>' . $handle .'</li>';
        endforeach;
    $handlename .= "</ul>";
    return $handlename; 
    }
add_shortcode( 'pluginhandlesjs', 'wpb_display_pluginhandles');


/********************************
 * Remove Css File (All webpage)
********************************/
add_action('wp_print_style','disable_css_load',999);

function disable_css_load() {
    wp_deregister_style('style');
}


/********************************
 * Remove Css File (Unique webpage)
********************************/
add_action('wp_print_styles','disable_css_load_uniquepage',888);

function disable_css_load_uniquepage() {
    if (!is_page('page')) {
        wp_deregister_style( 'style' );
    }
}


/********************************
 * Remove Js File (All webpage)
********************************/
add_action('wp_print_scripts','disable_js_load',777);

function disable_js_load() {
    wp_deregister_script('script');
}


/********************************
 * Remove Js File (Unique page)
********************************/
add_action('wp_print_scripts','disable_js_load_uniquepage',666);

function disable_js_load_uniquepage() {
    if (!is_page('page')) {
        wp_deregister_script( 'script' );
    }
}