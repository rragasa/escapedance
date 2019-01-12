<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'escapedance' ); ?>">
    <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label aria-label="Menu" class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <?php wp_nav_menu( array(
        'theme_location' => 'top',
        'menu_id'=> 'top-menu',
        'container'=> '',
        'items_wrap'=>'<ul class="menu">%3$s</ul>'
    ) ); ?>
</nav><!-- #site-navigation -->
