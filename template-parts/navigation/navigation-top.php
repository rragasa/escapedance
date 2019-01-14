<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Escape_Dance_Holiday
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'escapedanceholiday' ); ?>">

    <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label aria-label="Menu" class="menu-icon" for="menu-btn"><span class="navicon"></span></label>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>
</nav><!-- #site-navigation -->
