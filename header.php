<!DOCTYPE HTML>
    <!--
    Dopetrope by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <?php get_template_directory_uri() . '/js/easing/jquery.easing.1.3.js' ?>

    <!-- ADDED LINK TO HEAD LINKS -->
    <?php wp_head(); ?>
    
</head>

<body <?php body_class('homepage is-preload'); ?>>
    <div id="page-wrapper">

    <!-- Header -->
        <section id="header">

            <!-- Logo -->
            <!-- Logo code works perfectly !!! -->
            <?php /*the_custom_logo(); */ ?>
                <?php
                    $site_title = get_bloginfo( 'name' );
                    $site_url = network_site_url( '/' );
                    $site_description = get_bloginfo( 'description' );
                ?>

                <h1><a href="<?php echo $site_url; ?>"><?php echo $site_title; ?></a></h1>
                <small><?php echo $site_description; ?></small>

            <!-- Nav -->
                <nav id="nav">
                    <?php 
                        wp_nav_menu( 
                            array(
                                'theme_location' => 'primary',
                                'container' => ''
                            )
                        );
                    ?> 
                </nav>
        </section>
