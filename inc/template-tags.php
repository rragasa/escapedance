<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 */

if ( ! function_exists( 'escapedance_edit_link' ) ) :
    /**
     * Returns an accessibility-friendly link to edit a post or page.
     *
     * This also gives us a little context about what exactly we're editing
     * (post or page?) so that users understand a bit more where they are in terms
     * of the template hierarchy and their content. Helpful when/if the single-page
     * layout with multiple posts/pages shown gets confusing.
     */
    function escapedance_edit_link() {
        edit_post_link(
            sprintf(
                /* translators: %s: Name of current post */
                __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'escapedance' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
    endif;


/**
 * Display a front page section.
 *
 * @param WP_Customize_Partial $partial Partial associated with a selective refresh request.
 * @param integer              $id Front page section to display.
 */
function escapedance_front_page_section( $partial = null, $id = 0 ) {
	if ( is_a( $partial, 'WP_Customize_Partial' ) ) {
		// Find out the id and set it up during a selective refresh.
		global $escapedancecounter;
		$id = str_replace( 'panel_', '', $partial->id );
		$escapedancecounter = $id;
	}

	global $post; // Modify the global post object before setting up post data.
	if ( get_theme_mod( 'panel_' . $id ) ) {
		$post = get_post( get_theme_mod( 'panel_' . $id ) );
		setup_postdata( $post );
		set_query_var( 'panel', $id );

		get_template_part( 'template-parts/page/content', 'front-page-panels' );

		wp_reset_postdata();
	} elseif ( is_customize_preview() ) {
		// The output placeholder anchor.
		echo '<article class="panel-placeholder panel twentyseventeen-panel twentyseventeen-panel' . $id . '" id="panel' . $id . '"><span class="twentyseventeen-panel-title">' . sprintf( __( 'Front Page Section %1$s Placeholder', 'twentyseventeen' ), $id ) . '</span></article>';
	}
}