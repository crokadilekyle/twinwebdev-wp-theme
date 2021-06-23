<?php
/**
 * Twin Web Development enqueue scripts
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'twinwebdev_scripts' ) ) {

function twinwebdev_scripts() {
    $the_theme     = wp_get_theme();
    $theme_version = $the_theme->get( 'Version' );
    $js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/twd-animations.js' );

    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/835f14fa66.js', array(), '1.0.0', true );
    wp_enqueue_script( 'twinwebdev-animations', get_template_directory_uri() . '/js/twd-animations.js', array(), $js_version, true );
}

add_action( 'wp_enqueue_scripts', 'twinwebdev_scripts' );

}

add_filter( 'script_loader_tag', 'twinwebdev_add_attribs_to_scripts', 10, 3 );
function twinwebdev_add_attribs_to_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$crossorigin = ['font-awesome'];

	if ( in_array( $handle, $crossorigin ) ) {
		return '<script type="text/javascript" src="' . $src . '" crossorigin="anonymous"></script>' . "\n";
	}

	return $tag;
} 