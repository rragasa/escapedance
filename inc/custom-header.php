<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 */

 /**
 * Set up the WordPress core custom header feature.
 *
 */
function escapedance_custom_header_setup() {

	/**
	 * Filter Escape Dance custom-header support arguments.
	 *
	 * @since Escape Dance 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image     		Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height     		Flex support for height of header.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'escapedance_custom_header_args', array(
		'default-image'      => get_parent_theme_file_uri( '/assets/images/Escape_Dance_Hol_31.jpg' ),
		'width'              => 2000,
		'height'             => 1200,
		'flex-height'        => true
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/Escape_Dance_Hol_31.jpg',
			'thumbnail_url' => '%s/assets/images/Escape_Dance_Hol_31.jpg',
			'description'   => __( 'Default Header Image', 'escapedance' ),
		),
	) );
}
add_action( 'after_setup_theme', 'escapedance_custom_header_setup' );
?>