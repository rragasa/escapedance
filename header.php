<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://use.typekit.net/uac6wuv.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h"
        crossorigin="anonymous">
    <link href="https://unpkg.com/basscss@8.0.2/css/basscss.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css'; ?>">

    <title>Escape Dance Holiday</title>
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