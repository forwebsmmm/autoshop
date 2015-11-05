<?php
add_action( 'init', 'register_cpt_products' );

function register_cpt_products() {


//Product Post type

  $labels = array( 
        'name' => _x( 'Products', 'ig_product' ),
        'singular_name' => _x( 'Product', 'ig_product' ),
        'add_new' => _x( 'Add New', 'ig_product' ),
        'add_new_item' => _x( 'Add New Product', 'ig_product' ),
        'edit_item' => _x( 'Edit Product', 'ig_product' ),
        'new_item' => _x( 'New Product', 'ig_product' ),
        'view_item' => _x( 'View Product', 'ig_product' ),
        'search_items' => _x( 'Search Products', 'ig_product' ),
        'not_found' => _x( 'No products found', 'ig_product' ),
        'not_found_in_trash' => _x( 'No products found in Trash', 'ig_product' ),
        'parent_item_colon' => _x( 'Parent Product:', 'ig_product' ),
        'menu_name' => _x( 'Products', 'ig_product' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'comments' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'products', $args );
 
 
 //Department Taxonomy
 
 $labels = array( 
        'name' => _x( 'Departments', 'departments' ),
        'singular_name' => _x( 'Department', 'departments' ),
        'search_items' => _x( 'Search Departments', 'departments' ),
        'popular_items' => _x( 'Popular Departments', 'departments' ),
        'all_items' => _x( 'All Departments', 'departments' ),
        'parent_item' => _x( 'Parent Department', 'departments' ),
        'parent_item_colon' => _x( 'Parent Department:', 'departments' ),
        'edit_item' => _x( 'Edit Department', 'departments' ),
        'update_item' => _x( 'Update Department', 'departments' ),
        'add_new_item' => _x( 'Add New Department', 'departments' ),
        'new_item_name' => _x( 'New Department', 'departments' ),
        'separate_items_with_commas' => _x( 'Separate departments with commas', 'departments' ),
        'add_or_remove_items' => _x( 'Add or remove Departments', 'departments' ),
        'choose_from_most_used' => _x( 'Choose from most used Departments', 'departments' ),
        'menu_name' => _x( 'Departments', 'departments' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => false,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'departments', array('products'), $args );
 

 
    }
    
function cart66_popup_screens() { 
    return array('products');
  }  
  add_filter('cart66_add_popup_screens', 'cart66_popup_screens');