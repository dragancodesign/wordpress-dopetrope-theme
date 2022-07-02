<?php
// Register Custom Post Type Portfolio
function create_portfolio_cpt() {

	$labels = array(
		'name' => _x( 'Portfolios', 'Post Type General Name', 'wordpressdopetrope' ),
		'singular_name' => _x( 'Portfolio', 'Post Type Singular Name', 'wordpressdopetrope' ),
		'menu_name' => _x( 'Portfolios', 'Admin Menu text', 'wordpressdopetrope' ),
		'name_admin_bar' => _x( 'Portfolio', 'Add New on Toolbar', 'wordpressdopetrope' ),
		'archives' => __( 'Portfolio Archives', 'wordpressdopetrope' ),
		'attributes' => __( 'Portfolio Attributes', 'wordpressdopetrope' ),
		'parent_item_colon' => __( 'Parent Portfolio:', 'wordpressdopetrope' ),
		'all_items' => __( 'All Portfolios', 'wordpressdopetrope' ),
		'add_new_item' => __( 'Add New Portfolio', 'wordpressdopetrope' ),
		'add_new' => __( 'Add New', 'wordpressdopetrope' ),
		'new_item' => __( 'New Portfolio', 'wordpressdopetrope' ),
		'edit_item' => __( 'Edit Portfolio', 'wordpressdopetrope' ),
		'update_item' => __( 'Update Portfolio', 'wordpressdopetrope' ),
		'view_item' => __( 'View Portfolio', 'wordpressdopetrope' ),
		'view_items' => __( 'View Portfolios', 'wordpressdopetrope' ),
		'search_items' => __( 'Search Portfolio', 'wordpressdopetrope' ),
		'not_found' => __( 'Not found', 'wordpressdopetrope' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'wordpressdopetrope' ),
		'featured_image' => __( 'Featured Image', 'wordpressdopetrope' ),
		'set_featured_image' => __( 'Set featured image', 'wordpressdopetrope' ),
		'remove_featured_image' => __( 'Remove featured image', 'wordpressdopetrope' ),
		'use_featured_image' => __( 'Use as featured image', 'wordpressdopetrope' ),
		'insert_into_item' => __( 'Insert into Portfolio', 'wordpressdopetrope' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'wordpressdopetrope' ),
		'items_list' => __( 'Portfolios list', 'wordpressdopetrope' ),
		'items_list_navigation' => __( 'Portfolios list navigation', 'wordpressdopetrope' ),
		'filter_items_list' => __( 'Filter Portfolios list', 'wordpressdopetrope' ),
	);
	$args = array(
		'label' => __( 'Portfolio', 'wordpressdopetrope' ),
		'description' => __( '', 'wordpressdopetrope' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-nametag',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'create_portfolio_cpt', 0 );