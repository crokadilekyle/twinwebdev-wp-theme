<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );

function twinwebdev_scripts() {
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/835f14fa66.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'twinwebdev_scripts' );

add_filter( 'script_loader_tag', 'twinwebdev_add_attribs_to_scripts', 10, 3 );
function twinwebdev_add_attribs_to_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$crossorigin = ['font-awesome'];

	if ( in_array( $handle, $crossorigin ) ) {
		return '<script type="text/javascript" src="' . $src . '" crossorigin="anonymous"></script>' . "\n";
	}

	return $tag;
} 
