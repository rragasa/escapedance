<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Escape_Dance_Holiday
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'escapedanceholiday' ); ?></a>

	<header id="masthead" class="site-header js-header site-header--visible" role="banner">
        <div class="site-header-bg">
            <?php if ( has_nav_menu( 'top' ) ) : ?>
            <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            <?php endif; ?>
        </div>
    </header><!-- #masthead -->

    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>

	<div class="site-content-contain">
		<div id="content" class="site-content">
