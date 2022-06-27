<?php 

function wordpressdopetrope_scripts_enqueue(){

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue__script('jquery');
    wp_enqueue__script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue__script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue__script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue__script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');