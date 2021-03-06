<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function anubhava_setup() {
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in two locations.  
	register_nav_menus( array(  
	  'primary' => __( 'Header Navigation'),
	  'primary-2' => __( 'Header Navigation Second Column'),  
	  'secondary' => __('Footer Navigation')  
	) );

	// Gallery
	add_image_size( 'gallery_large_xl_8col', $width = 796, $height = 500, $crop = true );
	add_image_size( 'gallery_large_xl_4col', $width = 383, $height = 500, $crop = true );
}
add_action( 'after_setup_theme', 'anubhava_setup' );


function anubhava_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'anubhava-style', get_stylesheet_uri() );
	
	wp_register_script ( 'siema', get_template_directory_uri() . '/js/siema.min.js' );
	wp_enqueue_script ( 'siema' );
}
add_action( 'wp_enqueue_scripts', 'anubhava_scripts' );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
