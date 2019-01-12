<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 */

/**
 * Count our number of active panels.
 *
 * Primarily used to see if we have any panels active, duh.
 */
function escapedance_panel_count() {

	$panel_count = 0;

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
		if ( get_theme_mod( 'panel_' . $i ) ) {
			$panel_count++;
		}
	}

	return $panel_count;
}