<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 * @version 1.0
 */

?>

<?php
if ( is_active_sidebar('sidebar-1') ||is_active_sidebar( 'sidebar-2' ) ||
	 is_active_sidebar( 'sidebar-3' ) ) :
?>

	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'escapedance' ); ?>">
        <?php
        if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
            <div class="global-logo center col col-12 sm-col-4">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div>
        <?php }
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div class="col col-12 sm-col-5 md-col-4">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php }
		if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
			<div class="center col col-12 sm-col-3">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div>
		<?php } ?>
	</aside><!-- .widget-area -->

<?php endif; ?>