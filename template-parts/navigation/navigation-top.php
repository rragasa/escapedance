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
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo escapedanceholiday_get_svg( array( 'icon' => 'bars' ) );
		echo escapedanceholiday_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'escapedanceholiday' );
		?>
	</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( escapedanceholiday_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo escapedanceholiday_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'escapedanceholiday' ); ?></span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
