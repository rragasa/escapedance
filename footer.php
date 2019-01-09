<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 * @version 1.2
 */

?>
        </div><!-- #content -->

        <footer id="colophon" class="site-footer p2" role="contentinfo">
            <div class="clearfix">
                <?php get_template_part( 'template-parts/footer/footer', 'widgets' );?>
            </div>
        </footer> <!-- .footer -->
    </div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>