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
    <!-- Global Header -->
    <header class="global-header">

        <div class="global-header__bg"></div>

        <!-- Header Nav -->
        <nav class="header-nav">
            <div class="clearfix">
                <div class="global-logo left">
                    <a href="<?php echo get_site_url() . '/home'?>">
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/Escape-Orange.png';?>" alt="Escape Dance Holiday Logo" aria-labelledby="Escape Dance Holiday Logo" />
                    </a>
                </div>
                <input class="menu-btn" type="checkbox" id="menu-btn" />
                <label aria-label="Menu" class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                <?php wp_nav_menu( array('menu' => 'primary','container'=> '','items_wrap'=>'<ul class="menu">%3$s</ul>')); ?>
            </div>
        </nav>
    </header>