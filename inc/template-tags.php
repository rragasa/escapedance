<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
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