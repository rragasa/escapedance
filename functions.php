
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
    /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
    add_theme_support( 'title-tag' );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'escapedance-featured-image', 2000, 1200, true );

	add_image_size( 'escapedance-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'escapedance' ),
		'social' => __( 'Social Links Menu', 'escapedance' ),
    ) );

    /*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
    ) );

    /*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'quote',
		'link',
		'gallery',
    ) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo');

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'escapedance_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function escapedance_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Logo', 'escapedance' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'escapedance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'escapedance' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'escapedance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'escapedance' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'escapedance' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'escapedance_widgets_init' );

/**
 * Remove customizer panels.
 */
function escapedance_remove_customizer_panels()
{
    global $wp_customize;
    $wp_customize->remove_section( 'colors');
    $wp_customize->remove_section( 'custom_css');
}
add_action( 'customize_register', 'escapedance_remove_customizer_panels' );

/**
 * Enqueue scripts and styles.
 */
function escapedance_scripts() {

    // Typekit stylesheet.
    wp_enqueue_style( 'escapedance-typekit', 'https://use.typekit.net/uac6wuv.css');

    // Source Pro Font
    wp_enqueue_style( 'escapedance-sourcepro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i');

    // Font Awesome
    wp_enqueue_style( 'escapedance-fontawesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    // BASSCSS
    wp_enqueue_style( 'escapedance-basscss', 'https://unpkg.com/basscss@8.0.2/css/basscss.min.css');

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
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Escape Dance 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function escapedance_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'escapedance_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

