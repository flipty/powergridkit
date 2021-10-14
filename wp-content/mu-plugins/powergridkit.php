<?php
/*Plugin Name: Power Grid Kit Functionality
Description: Custom post types and functionality for the Power Grid Kit website
Version: 1.0
License: GPLv2
*/

// Create New Custom Post Types
add_action('init', 'powergridkit_create_post_types');

// register custom post types
function powergridkit_create_post_types() {

  // Set up Partners
  $partnerLabels = array(
    'name' => 'Partners',
    'singular_name' => 'Partner',
    'add_new' => 'Add New Partner',
    'add_new_item' => 'Add New Partner',
    'edit_item' => 'Edit Partner',
    'new_item' => 'New Partner',
    'all_items' => 'All Partners',
    'view_item' => 'View Partner',
    'search_items' => 'Search Partners',
    'not_found' =>  'No Partners Found',
    'not_found_in_trash' => 'No Partners found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Partners'
  );

  register_post_type('partner', array(
    'labels' => $partnerLabels,
    'has_archive' => true,
    'public' => true,
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes'),
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-groups',
    'rewrite' => array('slug' => 'partner')
    )
  );

  // Set up Products
  $productLabels = array(
    'name' => 'Products',
    'singular_name' => 'Product',
    'add_new' => 'Add New Product',
    'add_new_item' => 'Add New Product',
    'edit_item' => 'Edit Product',
    'new_item' => 'New Product',
    'all_items' => 'All Products',
    'view_item' => 'View Product',
    'search_items' => 'Search Products',
    'not_found' =>  'No Products Found',
    'not_found_in_trash' => 'No Products found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Products'
  );

  register_post_type('product', array(
    'labels' => $productLabels,
    'has_archive' => true,
    'public' => true,
    'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes'),
    'exclude_from_search' => false,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-cart',
    'rewrite' => array('slug' => 'product')
    )
  );

}

//add Featured Image for standard Post 
add_theme_support( 'post-thumbnails' );

?>
