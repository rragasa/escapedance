
<?php
/**
 * Escape Dance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function escapedance_setup() {
    // Register navigation menu
    register_nav_menu('primary', __('Primary menu'));
}

add_action( 'after_setup_theme', 'escapedance_setup' );

/**
 * Enqueue scripts and styles.
 */
function escapedance_scripts() {

    // Typekit stylesheet.
    wp_enqueue_style( 'escapedance-typekit', 'https://use.typekit.net/uac6wuv.css', 'all' );

    // Source Pro Font
    wp_enqueue_style( 'escapedance-sourcepro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i', 'all' );

    // Font Awesome
    wp_enqueue_style( 'escapedance-fontawesome', 'https://use.fontawesome.com/releases/v5.6.0/css/all.css', 'all' );

    // BASSCSS
    wp_enqueue_style( 'escapedance-basscss', 'https://unpkg.com/basscss@8.0.2/css/basscss.min.css', 'all' );

    // Theme stylesheet.
    wp_enqueue_style( 'escapedance-style', get_stylesheet_uri() );


    // Theme custom script.
	wp_enqueue_script( 'escapedance-js', get_template_directory_uri() . '/assets/js/scripts.js', true );

    // Jquery
    wp_enqueue_script( 'escapedance-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array('jquery'), '1.1.0', true );

    // Parallax JS
    wp_enqueue_script( 'escapedance-parallax', 'https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js',  true );
}
add_action( 'wp_enqueue_scripts', 'escapedance_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );
?>