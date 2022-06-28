<?php 

function wordpressdopetrope_theme_setup(){

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('home-featured', 680, 400, array('center', 'center'));
    add_theme_support('automatic-feed-links');

    register_nav_menus( array(
        'primary' => __('Primary Menu', 'wordpressdopetrope')
    ));
}
add_action('after_setup_theme', 'wordpressdopetrope_theme_setup');


function wordpressdopetrope_scripts_enqueue(){

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue__script('jquery');
    wp_enqueue__script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue__script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue__script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue__script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');