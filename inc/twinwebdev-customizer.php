<?php
/**
 * Twin Web Dev Theme Customizer
 *
 * @package twinwebdev
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function hex_to_rgb($hex) {
    $r = hexdec(substr($hex, 1, 2));
    $g = hexdec(substr($hex, 3, 2));
    $b = hexdec(substr($hex, 5, 2));

    $rgb = $r . ',' . $g . ',' . $b;
    return $rgb;
}

if ( ! function_exists( 'twinwebdev_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function twinwebdev_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'twinwebdev_theme_layout_options',
			array(
				'title'       => __( 'Front Page Settings', 'twinwebdev' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Settings for the Front Page', 'twinwebdev' ),
				'priority'    => apply_filters( 'understrap_theme_layout_options_priority', 160 ),
			)
		);

        $wp_customize->add_setting(
			'twinwebdev_header_background_image',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				// 'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

        $wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'twinwebdev_header_background_image',
				array(
					'label'       => __( 'Header Background Image', 'twinwebdev' ),
					'description' => __( 'Add a Background image to the Header', 'twinwebdev' ),
					'section'     => 'twinwebdev_theme_layout_options',
					'settings'    => 'twinwebdev_header_background_image',
                    'flex_width'  => true,
                    'flex_height' => true,
					'priority'    => apply_filters( 'understrap_container_type_priority', 10 ),
				)
			)
		);

        $wp_customize->add_setting(
			'twinwebdev_header_background_image_overlay',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			)
		);

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'twinwebdev_header_background_image_overlay', array(
            'label'     => __( 'Header Overlay Color', 'twinwebdev' ),
            'section'   => 'twinwebdev_theme_layout_options',
            'settings'  => 'twinwebdev_header_background_image_overlay',
        ) ) );

        $wp_customize->add_setting(
			'twinwebdev_header_background_image_overlay_second',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
			)
		);

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'twinwebdev_header_background_image_overlay_second', array(
            'label'     => __( 'Second Header Overlay Color', 'twinwebdev' ),
            'section'   => 'twinwebdev_theme_layout_options',
            'settings'  => 'twinwebdev_header_background_image_overlay_second',
        ) ) );

    }
} // endif function_exists( 'twinwebdev_theme_customize_register' ).
add_action( 'customize_register', 'twinwebdev_theme_customize_register' );

// Adds custom background image from customizer to twd-front template
function twinwebdev_customize_frontpage_header()
{
    $header_image_url = wp_get_attachment_image_src(get_theme_mod('twinwebdev_header_background_image'), 'full');
    $overlay_color_one =  hex_to_rgb(get_theme_mod('twinwebdev_header_background_image_overlay'));
    $overlay_color_two =  hex_to_rgb(get_theme_mod('twinwebdev_header_background_image_overlay_second'));

    // $bg_color;
    // if (get_theme_mod('twinwebdev_header_background_image_overlay_second') === ""){
    //     $bg_color = 'linear-gradient(140deg, rgba('.$overlay_color_one.', .07), rgba('. $overlay_color_one .', .09)),';
    // } else {
    //     $bg_color = 'linear-gradient(140deg, rgba('.$overlay_color_one.', 0.7), rgba('. $overlay_color_two .', 0.9)),';
    // }

    ?>
         <style type="text/css">
             .twd-front-page-header {
                 background: linear-gradient(140deg, rgba(<?php echo $overlay_color_one; ?>, 0.7), rgba(<?php echo get_theme_mod('twinwebdev_header_background_image_overlay_second') === "" ? $overlay_color_one : $overlay_color_two; ?>, 0.9)), url('<?php echo $header_image_url[0]; ?>');
                 /* background: <?php //echo $bg_color; ?> url('<?php //echo $header_image_url[0]; ?>'); */
                 background-size: cover;
                 background-repeat: no-repeat;
                 background-position: center;
             }
         </style>
    <?php
}
add_action( 'wp_head', 'twinwebdev_customize_frontpage_header');


// examples from understrap

	/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		// function understrap_theme_slug_sanitize_select( $input, $setting ) {

		// 	// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
		// 	$input = sanitize_key( $input );

		// 	// Get the list of possible select options.
		// 	$choices = $setting->manager->get_control( $setting->id )->choices;

		// 	// If the input is a valid key, return it; otherwise, return the default.
		// 	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		// }

		// $wp_customize->add_setting(
		// 	'understrap_container_type',
		// 	array(
		// 		'default'           => 'container',
		// 		'type'              => 'theme_mod',
		// 		'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
		// 		'capability'        => 'edit_theme_options',
		// 	)
		// );

		// $wp_customize->add_control(
		// 	new WP_Customize_Control(
		// 		$wp_customize,
		// 		'understrap_container_type',
		// 		array(
		// 			'label'       => __( 'Container Width', 'understrap' ),
		// 			'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
		// 			'section'     => 'understrap_theme_layout_options',
		// 			'settings'    => 'understrap_container_type',
		// 			'type'        => 'select',
		// 			'choices'     => array(
		// 				'container'       => __( 'Fixed width container', 'understrap' ),
		// 				'container-fluid' => __( 'Full width container', 'understrap' ),
		// 			),
		// 			'priority'    => apply_filters( 'understrap_container_type_priority', 10 ),
		// 		)
		// 	)
		// );



// a:8:{i:0;b:0;s:18:"nav_menu_locations";a:1:{s:7:"primary";i:3;}s:28:"understrap_posts_index_style";s:7:"default";s:27:"understrap_sidebar_position";s:5:"right";s:25:"understrap_container_type";s:9:"container";s:18:"custom_css_post_id";i:235;s:16:"sidebars_widgets";a:2:{s:4:"time";i:1621547522;s:4:"data";a:7:{s:19:"wp_inactive_widgets";a:8:{i:0;s:13:"media_image-3";i:1;s:13:"custom_html-3";i:2;s:10:"archives-2";i:3;s:6:"meta-2";i:4;s:8:"search-2";i:5;s:12:"categories-2";i:6;s:14:"recent-posts-2";i:7;s:17:"recent-comments-2";}s:13:"right-sidebar";a:0:{}s:12:"left-sidebar";a:0:{}s:4:"hero";a:0:{}s:10:"herocanvas";a:1:{i:0;s:13:"custom_html-5";}s:10:"statichero";a:0:{}s:10:"footerfull";a:2:{i:0;s:13:"custom_html-6";i:1;s:20:"ninja_forms_widget-2";}}}s:34:"twinwebdev_header_background_image";i:60;}