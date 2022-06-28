# wordpress-dopetrope-theme
WordPress theme base on free Dopetrope HTML5 theme

Credits to HTML template creator
https://html5up.net/

* * * 
GitHub COMMANDS IMPORTANT :
This way is used when the repository is already created :
✓ ✓ ✓ GitHub Steps in the beginning, one by one:
1) git init
git status
2) git add .
3) git remote add origin https://github.com/dragancodesign/wordpress-dopetrope-theme.git
4) git commit -m "Initial commit"
5) git branch -M main
6) git push -u origin main
* * * 

1. Creating all theme .php files and css file: 
Create: 
index.php, 
style.css, 
functions.php, 
header.php, 
footer.php, 
front-page.php, 
single.php, 
page.php, 
sidebar.php, 
archive.php, 
search.php

2. Download free html template from https://html5up.net. 
When you make WordPress Theme you can sell it into Envato Market or elsewhere, 
but it is much better to create your own HTML template to avoid licencing issues. 
It is much better create your own theme from the scratch. 

3. Adjusting the static .html template to fit our theme layout 
- Cut Intro section from Header section and paste it inside Main section, 
before pasting, first create <div class="row"> and put the code inside </div>

4. Setting theme information / description inside the style.css file. 
WHAT TO PUT IN DESCRIPTION OF MY THEME ? - is here and this is the source how to create WP Themes:
https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/

DESCRIPTION SAMPLE:
/*
Theme Name: Custom WP Theme based on Dopetrope HTML template
Theme URI: https://developer.wordpress.org/themes/custom-dopetrope-theme
Author: Custom Wordpress Theme Author
Author URI: https://developer.wordpress.org/themes/custom-wordpress-theme-author
Description: Custom Wordpress theme created from HTML template by: Custom Wordpress Theme Author. I have made this for testing purposes, so no liabilities. Creation started on 27th June 2022. 
Tags: blog, one-column, left-sidebar, right-sidebar, custom-logo, dropdown-menu, full-width-template. 
Version: 1.0.0
Requires at least: 6.0
Tested up to: ∞ ∞ ∞ ^-rm this:(Wordpress version number 5.9, 6.0 or any currenct that is tested and works)^
Requires PHP: 7.0 and greater (Here I use 8.0)
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Custom Wordpress Theme based on HTML template
This theme, like WordPress, is licensed under the GPL, Custom Wordpress Theme Author
*/

5. Create preview image using: 
https://app.diagrams.net
export it as .png file and put it inside the theme folder. 

6. Moving static to header, footer, front-page.php, and css to style.css

7. wp_head & wp_footer functions
Here he goes to header.php and delete old path to href="assets/css/main.css" and puts the new php command, just before closing </head> tag : <?php wp_head(); ?> , and to the footer.php and puts <?php wp_footer(); ?> just before closing </body> tag in order to load these two files !

8. Inside functions.php :
<?php 
function wordpressdopetrope_scripts_enqueue(){
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');

9. Inside front-page.php add :
<?php get_header(); ?> AT THE BEGINNING
<?php get_footer(); ?> AT THE END

10. From footer.php 
We don't want: 
jquery.min.js - because Wordpress provides us jquery file
dropotron.min.js - because we don't want JavaScript to use this, we want CSS to do that
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>

11. Inside functions.php file: 

function wordpressdopetrope_scripts_enqueue(){

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue__script('jquery');
    wp_enqueue__script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue__script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue__script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue__script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');

WE STILL HAVE SOME ERRORS BUT FOR NOW WE WILL IGNORE images ERRORS and be concentrated only on JavaScript file path errors !

12. Fixing console errors for missing js files
a) from footer.php delete unused js links
b) from main.js delete Dropdowns code section:
	// Dropdowns.
		$('#nav > ul').dropotron({
			mode: 'fade',
			noOpenerFade: true,
			alignment: 'center'
		});

13. Adding Multiple Theme Support 
https://developer.wordpress.org/reference/functions/add_theme_support/
Inside functions.php:

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

14. Adding body_class function to header.php file
Source, read the documentation:
 Browse: Home / Reference / Functions / register_nav_menus() 
https://developer.wordpress.org/reference/functions/register_nav_menus/
 Browse: Home / Reference / Functions / body_class() 
https://developer.wordpress.org/reference/functions/body_class/

https://developer.wordpress.org/reference/functions/get_bloginfo/
