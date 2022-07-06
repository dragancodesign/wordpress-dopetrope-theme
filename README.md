# wordpress-dopetrope-theme
WordPress theme based on free Dopetrope HTML5 theme  
Credits to HTML template creator
https://html5up.net/

## The steps to create a custom Wordpress theme from HTML file

* * * 
**_GitHub COMMANDS IMPORTANT - WORKS :_**
1. First create the repository on the GitHub
2. Create directory with the relevant name 
3. **cd** into the local directory / folder
4. GitHub Steps in the beginning, one by one:  
- __git init__
- **git status**
- **git add .**
- **git remote add origin https://github.com/username/repository-name.git**
- **git commit -m "Initial commit = commit 01 - short description name"**
- **git branch -M main**
- **git push -u origin main**

* * * 

#### Testing the Markdown to make tables in it - 2 examples ! ! ! 
EXAMPLE FOUND ON :  
https://gist.github.com/shaunlebron/746476e6e7a4d698b373

1.  Example of making table layout 

The code:

| Date | Who | What |
| - | - | - |
| 2022-06-01 | I did it | 1. Change handling of url pattern to add numbers <br> 2. Added script to GitHub.|


2.  An Example of making another table layout  

The code:

| Date | Who | What |
| - | - | - |
| 2022-06-01 | I did it again | 1. Change handling of url pattern to add numbers.|
| | | 2. Added script to GitHub.|  

3. An Example of making one more table layout 

| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| zebra stripes | are neat      |    $1 |


* * * 
#### 1. Create all empty .php and .css files for the Theme 
__*Create:*__  
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

#### 2. Download free html template 
from https://html5up.net  
or from anywhere, but first start with a simple template

When you make WordPress Theme you can sell it into Envato Market or elsewhere,  
but it is much better to create your own HTML template to avoid licencing issues.  
It is much better create your own theme from the scratch, it's the best way for learning

#### 3. Adjusting the static .html template to fit our theme layout 
- Cut Intro section from Header section and paste it inside Main section,  
before pasting, first create  

```html
<div class="row"> ... and paste the code inside ... </div>
```

#### 4. Setting theme information / description inside the style.css file. 
WHAT TO PUT IN DESCRIPTION OF MY THEME ?  
- Here is the descrtiption and source how to create WP Themes:
https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/

**DESCRIPTION EXAMPLE, put it on the top of the style.css file:**

```css
/*
Theme Name: Custom WP Theme based on Dopetrope HTML template
Theme URI: https://developer.wordpress.org/themes/custom-dopetrope-theme
Author: Custom Wordpress Theme Author
Author URI: https://developer.wordpress.org/themes/custom-wordpress-theme-author
Description: Custom Wordpress theme created from HTML template by: Custom Wordpress Theme Author. I have made this for testing purposes only. Creation started on 27th June 2022. 
Tags: blog, one-column, left-sidebar, right-sidebar, custom-logo, dropdown-menu, full-width-template. 
Version: 1.0.0
Requires at least: 6.0
Tested up to: ∞ ∞ ∞ ^-rm this:(Wordpress version number 5.9, 6.0 or any currenct that is tested and works)^
Requires PHP: 7.0 and greater  
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Custom Wordpress Theme based on HTML template
This theme, like WordPress, is licensed under the GPL, Custom Wordpress Theme Author
*/
```

#### 5. Create preview image using: 
Create screenshot.png file, this can be done online on the site:    
https://app.diagrams.net  
export it as .png file and put it inside the theme folder. 

#### 6. Moving static to header, footer, front-page.php, and css to style.css

### 7. wp_head & wp_footer functions
Here he goes to **header.php** and delete old path to `href="assets/css/main.css"` and puts the new php command, just before closing `</head>` tag : `<?php wp_head(); ?>` , and to the **footer.php** and puts `<?php wp_footer(); ?>` just before closing `</body>` tag in order to load these two files !

#### 8. Inside functions.php :

```php
<?php 
function wordpressdopetrope_scripts_enqueue(){
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');
```

#### 9. Inside front-page.php add :

```php
<?php get_header(); ?> AT THE BEGINNING
<?php get_footer(); ?> AT THE END
```

#### 10. From footer.php 
We don't want: **jquery.min.js** because Wordpress provides us jquery file 
**dropotron.min.js** because we don't want JavaScript to use this, we want CSS to do that

```html
<script src="assets/js/jquery.min.js">< /script>

<script src="assets/js/jquery.dropotron.min.js">< /script>
```

#### 11. Inside functions.php file: 

```php
function wordpressdopetrope_scripts_enqueue(){

    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('wordpressdopetrope-browser', get_template_directory_uri(). 'assets/js/browser.min.js');
    wp_enqueue_script('wordpressdopetrope-breakpoints', get_template_directory_uri(). 'assets/js/breakpoints.min.js');
    wp_enqueue_script('wordpressdopetrope-util', get_template_directory_uri(). 'assets/js/util.js');
    wp_enqueue_script('wordpressdopetrope-main', get_template_directory_uri(). 'assets/js/main.js');
}
add_action('wp_enqueue_scripts', 'wordpressdopetrope_scripts_enqueue');
```

WE STILL HAVE SOME ERRORS BUT FOR NOW WE WILL IGNORE images ERRORS   
and be concentrated only on JavaScript file path errors !

#### 12. Fixing console errors for missing js files
a) from footer.php delete unused js links
b) from main.js delete Dropdowns code section:

```php
// Dropdowns.
    $('#nav > ul').dropotron({
        mode: 'fade',
        noOpenerFade: true,
        alignment: 'center'
    });
```

#### 13. Adding Multiple Theme Support 
https://developer.wordpress.org/reference/functions/add_theme_support/  
Inside **functions.php**:
```php
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
```

#### 14. Adding body_class function to header.php file
Source, read the documentation:  
 *Browse: Home / Reference / Functions / register_nav_menus()*  
https://developer.wordpress.org/reference/functions/register_nav_menus/  
 *Browse: Home / Reference / Functions / body_class()*  
https://developer.wordpress.org/reference/functions/body_class/  
https://developer.wordpress.org/reference/functions/get_bloginfo/    

#### 15. Video 23: Displaying the WebSite Logo Uploaded via Dashboard
ADDING THE CUSTOM LOGO TO THE WebSite:  
###### *↓ ↓ ↓ TO COMMENT THE php script inside the .html ↓ ↓ ↓* ####
###### *↓ ↓ ↓ PUT THE  `/*  .....  */` around the code, EXAMPLE: ↓ ↓ ↓* ####

```php
<?php the_custom_logo(); ?>
/* <!-- Logo --> */
    <?php /* the_custom_logo(); */ ?>
    <?php the_custom_logo(); ?>
```

#### 16. Video 24: Making the Navigation Menu Items Dynamic 
Instead of hard coded navigation menu create Wordpress dynamic items. 

Inside the header.php remove all code between the < nav> and < /nav> tags. And use the Wordpress array method, using the menu id from - functions.php :  

```html
register_nav_menus( array( 'primary' => __('Primary Menu', 'mythemename') ));   

Put inside the header.php:
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
```

#### 17. Styling the Menu and Sub-menu 
Wordpress adds to each menu item the class "current-menu-item" and other classes also.
In our style.css we have class inside the #nav current and we change this to: "current-menu-item"
Press: Ctrl+Shift+R together to do hard refresh and it will show the changes !!!
The correct code now looks like this: 
```css
#nav > ul > li.current-menu-item > a {
    background: #d52349;
    color: #fff !important;
    font-weight: 700;
}
```

To see the submenu items with class="sub-menu" we have to change all "dropotron" classes to "sub-menu" - The first class .sub-menu was .dropetop
```css 
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
```
Duplicate the first #nav and add li:hover into the second  
```css
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

/* NOW IT IS POPPING UP AND WE HAVE TO CHANGE sub-menu style:   */
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
```

#### 18. Removing unwanted section from footer.php: 
Inside 
```html
<div class="row"> In footer.php delete col-8 & col-4  </div>  
```

#### 19. Registering Main Sidebar Widget in functions.php file
Implemented down in the No. 20 !

#### 20. Registering 3 Footer WIDGETS and the WHOLE CODE from No. 19-Sidebar WIDGETS together WITH 3 FOOTER WIDGETS CODE :
```php
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
```

#### 21. Fetching POSTS from Wordpress Dashboard with WP_Query VIDEO 30: 
From front-page.php inside the section Blog remove:

```html
<div class="col-6 col-12-small">  
        <section class="box">  
```
... only one of the two sections with class="box"  

Browse: Home / Reference / Classes / WP_Query TO READ ABOUT EXTESIBILITY of WP_Query:  
https://developer.wordpress.org/reference/classes/wp_query/  
WP_query is a standard loop and is taking some arguments, but these arguments can be very extensive.  

Added PHP code for blog posts to appear :  

```php
<?php  
    $blog_arguments = array(
        'post_type' => 'post',
        'posts_per_page' => 2
    );
    $posts = new WP_query($blog_arguments);
    while($posts -> have_posts()){
        $posts->the_post();
?>
```

#### 22. Creating Posts from Dashboard
TH3IS IS NOT CHECKED YET UNTIL I FINISH THE NEXT VIDEO No. 32

#### 23. Display Post information for each Post - VIDEO No. 32
INSIDE front-page.php to display Featured Post Images Thumbnails ADD:  

```html
<div class="col-6 col-12-small">  
    <section class="box">  
        <a href="< ?php the_permalink(); ?>" class="image featured">  
            <?php the_post_thumbnail('home-featured'); ?>  
        </a>  
        <header>
            <h3><?php the_title(); ?>< /h3>
            <p>Posted on <?php the_date(); ?> at <?php the_time(); ?></p>
        </header>
        <?php the_excerpt(); ?>
        <footer>
            <ul class="actions">
                <li>< a href="<?php the_permalink(); ?>" class="button icon solid fa-file-alt">Continue Reading< /a>< /li>
                <li><a href="< ?php comments_link(); ?>" class="button alt icon solid fa-comment"> < ?php echo get_comments_number(); ?>" comments< /a>< /li>
            </ul>
        </footer>
    </section>
</div>
```

#### 24. Creating Custom Post Type
Go to:  
https://www.wp-hasty.com/tools/wordpress-custom-post-type-generator/  
Hasty is the best way to generate custom code for your WordPress project easily and fast.

##### 1) In Generators WordPress Custom Post Type Generator, in link start selecting the type you want.
https://www.wp-hasty.com/tools/wordpress-custom-post-type-generator/
When generating use for Text Domain: wordpressdopetrope that we have in our style.css file,  
and if it is for Portfolio posts use:  
Post Type Name (Singular): Portfolio,   
Post Type Name (Plural): Portfolios,  
Post Type Key: portfolio,  
Text-Domain: wordpressdopetrope  

THEN PRESS: Copy code, from the bottom of the page  

##### 2) Inside Theme folder create create: includes/portfolio.php and PASTE the code generated from: wp-hasty.com
Add <?php at the beginning of the document to make it .php file !!!

Paste the code generated from wp-hasty.com

##### 3) Inside functions.php add the description:
// Adding Portfolio Custom Post Type  
require get_template_directory().'/includes/portfolio.php';  

NOW GO TO front-page.php  
Delete all existing Portfolios HTML code except of the one for the sample to write our own code !  
To achieve this we will copy everything that we have done with the Blog post code and apply some changes !!!  

```html
 <!-- Portfolio -->
<section>  
    < header class="major">  
        <h2>Our Portfolio< /h2>
    </header>
    <div class="row">

    <?php
        $portfolio_arguments = array(
            'post_type' => 'portfolio',
            'posts_per_page' => 6
        );
        $portfolios = new WP_query($portfolio_arguments);
        while($portfolios -> have_posts()){
            $portfolios->the_post();
    ?>
        
<div class="col-4 col-6-medium col-12-small">
<section class="box">
    <a href="<?php the_permalink(); ?>" class="image featured">
        <?php the_post_thumbnail('home-featured'); ?>
    </a>
    <header>
        <h3>< ?php the_title(); ?>< /h3>
    < header>
<?php the_excerpt(); ?>
    <footer>
        <ul class="actions">
            <li>
                <a href="<?php the_permalink(); ?>" class="button alt">Find out more< /a>
            </li>
        </ul>
    </footer>
</section>
</div>

<!-- Down closing php while loop  -->
<?php } ?>

<?php wp_reset_postdata(); ?>

    </div>
</section>
```

#### 25. Making Hero Section Dynamic with Custom Fields

That what we have done in previous examples, is creating and applying Widget approach, but now we will use another method !!!  
To install plugin, search: "ACF" : Advanced Custom Fields from Delicious Brains to add Custom Fields to a Page, Blog Post to wherever we want !  

Adding Custom Field to our Front Page Hero section.  
Custom Fields -> Add New (Field Group) -> FP Hero Section -> Add  
FP Hero Section
    FP Hero Title
    FP Hero Subtitle
    FP Hero Image -> Image -> Image URL => Now make sure you select: Image URL !!!
    & finally -> PUBLISH
We can choose many CHOICES from TYPES of FIELDS to be : 
Basic:
Text, Text Area, Number, Range, Email, URL, Image, Wysiwyg Editor ....
Content:
Choice:
Relational:
jQuery:
Layout:

Here we have 2 fields where we want to assign values dynamically.  
In customization process we will choose the Rules :  
Rules  
Create a set of rules to determine which edit screens will use these advanced custom fields  
__*Show this field group if (IN the SETTIGNS):*__

- **Page Type (-> is equal to ->) Front Page**
- To show Advanced Custom Fields Options on the bottom !!!  


AND **publish this field**, so it will appear when we are adding new Page !  

**UNFORTUNATELY on the Front page THIS DOESN'T SHOW ANYTHING except from the small black box ???, no Title, no Subtitle, no Image:**

**It has to do something with conflict of Advanced Custom Fields plugin**

```html
<!-- Banner -->
<section id="banner">  
    <header>  
        <h2>Howdy. This is Dopetrope Theme Customized< /h2>  
    <!-- CHANGE TO:   -->
        <h2><?php the_field('fp_hero_title'); ?>< /h2>  
<!-- AND: ( not working ! )   -->
< p>A responsive theme Customized< /p>  
<!-- CHANGE TO: ( not working ! )   -->
< p>< ?php the_field('fp_hero_subtitle'); ?>< /p>  
<!-- CREATE :   -->
        <img src="<?php the_field('fp_hero_image'); ?>" style="width: 100%; hight: 50vh;" alt="">  
    </header>  
</section>  

\$ fp_hero_image = get_field(  'fp_hero_image');  
```


#### I HAVE TO COME BACK TO SOLVE THIS PROBLEM ! ! !
--> a. Advanced Custom Fields and Wordpress 6.0 or some other plugin -> NOT WORKING ==>  
Found solution: Set the Template Page as: Front Page

Or may be better code my own for excercise:  
**--> b. CODE MY OWN WIDGETS and apply them, so NO 3rd party plugins headache !**


#### 26. Registering custom taxonomy to custom post types = sample here Portfolios  
We have created custom post types as Portfolio, so we will create custom categories so we will assign custom portfolios to them.  

COPIED THIS CODE and PASTED IT INSIDE functions.php __*(from the video)*__ :  

```php
function register_portfolio_taxonomy (){ 
    $args = array(
        'public'=>true,
        'label'=>'Portfolio type',
        'rewrite'=>false,
        'supports'=>array('title','editor','author','thumbnail','excerpt')
    );
    register_taxonomy('portfolio_type', 'portfolio', $args); 
//adds this custom taxonomy to our custom post type portfolio and the name 'portfolio' should match !!!
}
add_action('init', 'register_portfolio_taxonomy');
```

__*FILES UPDATED AND THIS PART IS WORKING PERFECTLY ! ! !*__  
It appears also in THE Appearance -> Menu section -> added and it appears in the Menu == GREAT !!!  


#### 27. Working with single.php and Sidebar for details page
__*THE PROBLEM STARTS HERE AND HAS TO BE SOLVED, BECAUSE I GET BLANK PAGE INSTEAD OF HAVING THE CONTENT IN IT !*__  
Video 40. Working on Single php and Sidebar for details page:  
**single.php** file is nothing else but details page on any blog click or any portfolio click,  
that appears every time when 

In functions.php change in function widgets_init the < aside ...> to < section> !  
Class instead of "widget" rename to "box"  

##### sidebar.php CODE: ( takes the name from: 'id' => 'main-sidebar' from functions.php )  

```html
<div class="col-4 col-12-medium">  
    <?php dynamic_sidebar('main-sidebar'); ?>
</div>  
```

#### 28. Showing dynamic content on details page single.php  

First include code for our sidebar :  
`<?php get_sidebar(); ?>` 

FOR NOW our Content is static and we want to make it dynamic:  

```html
<!-- Content == OLD STATIC CODE ==  -->  
<article class="box post">  
    <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>  
    <header>  
        <h2>Right sidebar</h2>  
        <p>Lorem ipsum dolor sit amet feugiat</p>  
    </header>  
</article>  
```

--> The example down has inside it the loop to call post: 

#### HUSTON, I HAVE A PROBLEM ! But now somewhere else :-) 

```html
<?php get_header(); ?>   
<section id="main">  
    <div class="container">   
        <div class="row">  
            <div class="col-8 col-12-medium">  
                <?php  
                if(have_posts()){  // LOOP IS HERE TO CHECK  
                    while(have_posts()){  
                        the_post(); ?>  
                        <!-- Content -->  
                        <article class="box post">  
                            <a href="<?php the_permalink(); ?>" class="image featured">  
                                <?php the_post_thumbnail('home-featured'); ?>  
                            </a>  
                            <header>  
                                <h3><?php the_title(); ?></h3>  
                                <p>Posted on <?php the_date(); ?> at <?php the_time(); ?></p>  
                            </header>  
                            <?php the_content(); ?>  
                        </article>         
                  <?php }  
                }  
            ?>  
        </div>  
        <?php get_sidebar(); ?>  
    </div>  
</div>  
</section>  
<?php get_footer(): ?>  
```

##### The problem is either in the single.php OR functions.php ???  
When I go to the post page there is the message:  
There has been a critical error on this website.  
Learn more about troubleshooting WordPress.  
(with the link to the: https://wordpress.org/support/article/faq-troubleshooting/)  

#### 29. Testing the code and finding bugs ! ! ! 

I have copied and pasted the same code from: original mythme/archive.php to archive.php, index.php and page.php, 
so they are completely the same !   
```php 
<?php 
<?php get_header(); ?>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-8 col-12-medium">
            <?php 
                if(have_posts()){
                    while(have_posts()){
                        the_post(); ?>
                        <!-- Content -->
                        <article class="box post">
                            <a href="<?php the_permalink(); ?>" class="image featured">
                                <?php the_post_thumbnail('home-featured'); ?>
                            </a>
                            <header>
                                <h3><?php the_title(); ?></h3>
                                <p>Posted on <?php the_date(); ?> at <?php the_time(); ?></p>
                            </header>
                            <?php the_content(); ?>
                        </article>
                        
                  <?php }
                }
            ?>
                
            </div>
            <?php get_sidebar(); ?>

        </div>
    </div>
</section>

<?php get_footer(): ?>
?>

``` 
Trying to escape error using: 

```html
<!-- <p>Posted on <?php the_date();?> at <?php the_time();?></p> -->
<p><span style="font-size: small;">Posted on <?php the_date();?> at <?php the_time();?></span></p>
```
