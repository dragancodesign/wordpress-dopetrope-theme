<?php 

function wordpressdopetrope_scripts_enqueue(){

    wp_enqueue_style('style', get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');