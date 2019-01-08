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
                <footer class="footer p2">
                    <div class="clearfix">
                        <div class="global-logo center col col-12 sm-col-4">
                            <a href="<?php echo get_site_url() . '/home'?>">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/Escape-Orange.png'; ?>" alt="Escape Dance Holiday Logo" aria-labelledby="Escape Dance Holiday Logo" />
                            </a>
                        </div>

                        <ul class="footer-menu col col-12 sm-col-5 md-col-4">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#watch">Watch</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">The Team</a></li>
                            <li><a href="#">Booking</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="https://www.instagram.com/escapedanceholiday/">Facebook</a></li>
                            <li><a href="https://www.facebook.com/escapedanceholiday">Instagram</a></li>
                        </ul>
                        <div class="center col col-12 sm-col-3">
                            <button class="btn btn--orange">Book Now</button>
                        </div>
                    </div>
                </footer> <!-- .footer -->
            </div><!-- .site-content-contain -->
        </div><!-- #page -->
    <?php wp_footer(); ?>

</body>
</html>