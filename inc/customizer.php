<?php
/**
 * Escape Dance: Customizer
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function escapedance_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'escapedance_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'escapedance_customize_partial_blogdescription',
	) );

	/**
	 * Theme options.
	 */
	$wp_customize->add_section( 'theme_options', array(
		'title'    => __( 'Theme Options', 'escapedance' ),
		'priority' => 130, // Before Additional CSS.
	) );

	/**
	 * Filter number of front page sections in Escape Dance.
	 *
	 * @since Escape Dance 1.0
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'escapedance_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'escapedance' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'escapedance' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'escapedance_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'escapedance_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'escapedance_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Escape Dance 1.0
 * @see escapedance_customize_register()
 *
 * @return void
 */
function escapedance_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Escape Dance 1.0
 * @see escapedance_customize_register()
 *
 * @return void
 */
function escapedance_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function escapedance_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}


/**
 * Bind JS handlers to instantly live-preview changes.
 */
function escapedance_customize_preview_js() {
	wp_enqueue_script( 'escapedance-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'escapedance_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function escapedance_panels_js() {
	wp_enqueue_script( 'escapedance-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'escapedance_panels_js' );
