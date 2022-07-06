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

### 🎯 A. Testing the Markdown to make tables in it - 2 examples ! ! ! 
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

### 1. From the ENVATO Tuts+ different sources :

https://webdesign.tutsplus.com/categories/wordpress/courses#

**Learn PHP for WordPress** - Rachel McCollin - Apr 28, 2020 - FREE  
Lessons: 15 - Length: 2.3 hours  
**IMPORTANT LESSON:**    
**Mixing HTML and PHP (8:46)**  
https://code.tutsplus.com/courses/learn-php-for-wordpress/lessons/mixing-html-and-php  

### Create Template page:  

* #### 1st phase ONLY the PHP and Comment :  

```php 
/******************************
    * Tempate Name: Demo Page Template
    * The template for displaying demo pages
******************************/
get_header();  

if( have_posts() ) {

    while( have_posts() ) {
        the_post();
    }
}
else {
    // what happens if there are no posts  
}
get_sidebar();  
get_footer();  

?>
```

* * * * 

* #### 2nd STEP adding HTML into the PHP & PHP inside the HTML tags :   

```php
/*********************************************
    * Tempate Name: Demo Page Template
    * The template for displaying demo pages
**********************************************/
get_header();  

if( have_posts() ) {

    while( have_posts() ) {
        
        the_post();
        ?>

        <article id="<?php the_ID(); ?>" "<?php post_class(); ?>" >
            <?php the_content() ?>
        </article>
        
        <?php

    }
}
else {
    // what happens if there are no posts  
}
get_sidebar();  
get_footer();  
```

#### Instead of writing :  
```php
/* Comment can be only one *
* and this is used just to remember 
*/
<article id="<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php the_content() ?>
</article>
```
#### We can also write :  

```php
        echo 'article id="' . the_ID() . '"' . post_class() . '>';
            the_content()
        echo '</article>';
```
#### If we have a lot of HTML inside the file, we have to 'echo' every single HTML line and this can be time consuming.  
So we may use opening and closing PHP tags <?php ... ?>
* * * * 

#### My page sample with all code used and unused take care :

```php
/*********************************************
    * Tempate Name: Demo Page Template
    * The template for displaying demo pages
**********************************************/
get_header();  

if( have_posts() ) {

    while( have_posts() ) {
        
        the_post();
        ?>

        <article id="<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php the_content() ?>
        </article>
        
        <?php
// OR USE THE CODE FROM BELLOW for this "article" tag :   
        echo 'article id="' . the_ID() . '"' . post_class() . '>';
            the_content()
        echo '</article>';

    }
}
else {
    // what happens if there are no posts  
}
get_sidebar();  
get_footer();  

```


* * * *  

NOW AT:  
https://code.tutsplus.com/courses/learn-php-for-wordpress/lessons/comments-in-php  

https://webdesign.tutsplus.com/tutorials/adding-to-the-body-class-in-wordpress--cms-21077  


