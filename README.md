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
before pasting, first create < div class="row"> and put the code inside < /div>

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
Here he goes to header.php and delete old path to href="assets/css/main.css" and puts the new php command, just before closing < /head> tag : <?php wp_head(); ?> , and to the footer.php and puts <?php wp_footer(); ?> just before closing < /body> tag in order to load these two files !

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
< script src="assets/js/jquery.min.js">< /script>

< script src="assets/js/jquery.dropotron.min.js">< /script>

11. Inside functions.php file: 

function wordpressdopetrope_scripts_enqueue(){

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue_script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue_script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue_script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
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
    wp_enqueue_script('jquery');
    wp_enqueue_script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue_script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue_script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue_script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');

14. Adding body_class function to header.php file
Source, read the documentation:
 Browse: Home / Reference / Functions / register_nav_menus() 
https://developer.wordpress.org/reference/functions/register_nav_menus/
 Browse: Home / Reference / Functions / body_class() 
https://developer.wordpress.org/reference/functions/body_class/

https://developer.wordpress.org/reference/functions/get_bloginfo/

15. Video 23: Displaying the WebSite Logo Uploaded via Dashboard
ADDING THE CUSTOM LOGO TO THE WebSite:
    <?php the_custom_logo(); ?>
TO COMMENT THE php script inside the .html PUT THE  /*  .....  */ around the code:
    <!-- Logo -->
                <?php /*the_custom_logo(); */ ?>
                <?php the_custom_logo(); ?>

16. Video 24: Making the Navigation Menu Items Dynamic 
Instead of hard coded navigation menu create Wordpress dynamic items. 

Inside the header.php remove all code between the < nav> and < /nav> tags. And use the Wordpress array method, using the menu id from - functions.php :
    register_nav_menus( array( 'primary' => __('Primary Menu', 'mythemename') )); 

Put inside the header.php:
            <!-- Nav -->
                < nav id="nav">
                    < ?php 
                        wp_nav_menu( 
                            array(
                                'theme_location' => 'primary',
                                'container' => ''
                            )
                        );
                    ?> 
                < /nav>

17. Styling the Menu and Sub-menu 
Wordpress adds to each menu item the class "current-menu-item" and other classes also.
In our style.css we have class inside the #nav current and we change this to: "current-menu-item"
Press: Ctrl+Shift+R together to do hard refresh and it will show the changes !!!
The correct code now looks like this: 
#nav > ul > li.current-menu-item > a {
    background: #d52349;
    color: #fff !important;
    font-weight: 700;
}

To see the submenu items with class="sub-menu" we have to change all "dropotron" classes to "sub-menu" - The first class .sub-menu was .dropetop
.sub-menu {
    border-radius: 5px;
    background-color: #252122;
    background-color: rgba(34, 30, 31, 0.98);
    padding: 1.25em 1.5em 1.25em 1.5em;
    font-style: italic;
    min-width: 13em;
    box-shadow: 0px 8px 15px 0px rgba(0, 0, 0, 0.5);
    text-align: left;
    margin-top: -1.25em;
    margin-left: -1px;
    list-style: none;
}

Duplicate the first #nav and add li:hover into the second

#nav > ul > li > ul {
    display: none;
}
/* For the 2nd level of sub-menu, change display: none TO block !!! */
#nav > ul > li:hover > .sub-menu {
    display: block;
}
/* For the another level of sub-menu */
#nav > ul > li:hover > .sub-menu .sub-menu {
    display: none;
}

/* For the next level of sub-menu */
#nav > ul > .sub-menu li:hover > .sub-menu {
    display: block;
}

NOW IT IS POPPING UP AND WE HAVE TO CHANGE sub-menu style:
.sub-menu {
    border-radius: 5px;
    background-color: #252122;
    background-color: rgba(34, 30, 31, 0.98);
    padding: 1.25em 1.5em 1.25em 1.5em;
    font-style: italic;
    min-width: 13em;
    box-shadow: 0px 8px 15px 0px rgba(0, 0, 0, 0.5);
    text-align: left;
    /*margin-top: -1.25em; WE DON'T WANT THIS ANY MORE !
    margin-left: -1px; */
    list-style: none;
    /* ADD DOWN NEW STYLES TO MAKE IT BETTER : */
    position: absolute;
    top: 100%;
    left: 50%;
}

18. Removing unwanted section from footer.php: 
Inside < div class="row"> In footer.php delete col-8 & col-4  < /div>  

19. Registering Main Sidebar Widget in functions.php file
IMPLEMENTED DOWN IN No. 20 !!!

20. Registering 3 Footer WIDGETS and the WHOLE CODE from No. 19-Sidebar WIDGETS together WITH 3 FOOTER WIDGETS CODE :

function wordpressdopetrope_widgets_init(){

    register_sidebar(array(
        'name' => __('Main Sidebar', 'wordpressdopetrope'),
        'id' => 'main-sidebar',
        'description' => 'Primary Right Sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2%s" >',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 1', 'wordpressdopetrope'),
        'id' => 'footer-widget-1',
        'description' => 'Footer Widget 1',
        'before_widget' => '<aside id="%1$s" class="widget %2%s" >',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 2', 'wordpressdopetrope'),
        'id' => 'footer-widget-2',
        'description' => 'Footer Widget 2',
        'before_widget' => '<aside id="%1$s" class="widget %2%s" >',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Footer Widget 3', 'wordpressdopetrope'),
        'id' => 'footer-widget-3',
        'description' => 'Footer Widget 3',
        'before_widget' => '<aside id="%1$s" class="widget %2%s" >',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

}
add_action('widgets_init', 'wordpressdopetrope_widgets_init');

21. Fetching POSTS from Wordpress Dashboard with WP_Query VIDEO 30: 
From front-page.php inside the section Blog remove: 
< div class="col-6 col-12-small">
        < section class="box">
... only one of the two sections with class="box" 

Browse: Home / Reference / Classes / WP_Query TO READ ABOUT EXTESIBILITY of WP_Query:
https://developer.wordpress.org/reference/classes/wp_query/
WP_query is a standard loop and is taking some arguments, but these arguments can be very extensive. 

Added PHP code for blog posts to appear : 

<?php
    $blog_arguments = array(
        'post_type' => 'post',
        'posts_per_page' => 2
    );
    $posts = new WP_query($blog_arguments);
    while($posts -> have_posts()){
        $posts->the_post();
?>


22. Creating Posts from Dashboard
THIS IS NOT CHECKED YET UNTIL I FINISH THE NEXT VIDEO No. 32

23. Display Post information for each Post - VIDEO No. 32
INSIDE front-page.php to display Featured Post Images Thumbnails ADD: 

< div class="col-6 col-12-small">
    < section class="box">
        < a href="<?php the_permalink(); ?>" class="image featured">
            < ?php the_post_thumbnail('home-featured'); ?>
        < /a>
        < header>
            < h3><?php the_title(); ?>< /h3>
            < p>Posted on <?php the_date(); ?> at <?php the_time(); ?>< /p>
        < /header>

        < ?php the_excerpt(); ?>
        
        < footer>
            <ul class="actions">
                <li><a href="<?php the_permalink(); ?>" class="button icon solid fa-file-alt">Continue Reading</a></li>
                <li><a href="<?php comments_link(); ?>" class="button alt icon solid fa-comment">"<?php echo get_commets_number(); ?>" comments</a></li>
            </ul>
        < /footer>
    < /section>
< /div>

