<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage escapedance
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escape Dance Holiday</title>
    <?php wp_head(); ?>
</head>

<body>
    <div id="page">
        <header id="masthead" class="global-header">
            <div class="global-header__bg"></div>

            <?php if ( has_nav_menu( 'top' ) ) : ?>
            <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
            <?php endif; ?>

        </header><!-- #masthead -->

        <?php get_template_part( 'template-parts/header/header', 'image' ); ?>

        <div class="site-content-contain">
            <div id="#content" class="site-content">