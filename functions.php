<?php 
// echo get_stylesheet_uri();
// echo get_template_directory_uri();
// exit();
function wordpressdopetrope_theme_setup(){

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('home-featured', 640, 400, array('center', 'center'));
    add_theme_support('automatic-feed-links');

    register_nav_menus( array(
        'primary' => __('Primary Menu', 'wordpressdopetrope')
    ));
}
add_action('after_setup_theme', 'wordpressdopetrope_theme_setup');

function wordpressdopetrope_scripts_enqueue(){
    
    // wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script('jquery');
    wp_enqueue_script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue_script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue_script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue_script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');

function wordpressdopetrope_widgets_init(){

    register_sidebar(array(
        'name' => __('Main Sidebar', 'wordpressdopetrope'),
        'id' => 'main-sidebar',
        'description' => 'Primary Right Sidebar',
        'before_widget' => '<section id="%1$s" class="box %2%s" >',
        'after_widget' => '</section>',
        'before_title' => '<header><h3 class="widget-title">',
        'after_title' => '</header></h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 1', 'wordpressdopetrope'),
        'id' => 'footer-widget-1',
        'description' => 'Footer Widget 1',
        'before_widget' => '<section id="%1$s" class="widget %2%s" >',
        'after_widget' => '</section>',
        'before_title' => '<header><h2 class="widget-title">',
        'after_title' => '</h2></header>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2', 'wordpressdopetrope'),
        'id' => 'footer-widget-2',
        'description' => 'Footer Widget 2',
        'before_widget' => '<section id="%1$s" class="widget %2%s" >',
        'after_widget' => '</section>',
        'before_title' => '<header><h2 class="widget-title">',
        'after_title' => '</h2></header>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 3', 'wordpressdopetrope'),
        'id' => 'footer-widget-3',
        'description' => 'Footer Widget 3',
        'before_widget' => '<section id="%1$s" class="widget %2%s" >',
        'after_widget' => '</section>',
        'before_title' => '<header><h2 class="widget-title">',
        'after_title' => '</h2></header>'
    ));

}
add_action('widgets_init', 'wordpressdopetrope_widgets_init');

// Adding Portfolio Custom Post Type
require get_template_directory().'/includes/portfolio.php';
