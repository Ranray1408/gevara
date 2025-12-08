<?php
/**
 * Taxonomy events category
 *
 * @package WP-rock
 * @since 4.4.0
 */

$labels = array(
    'name' => __( 'Products categories', 'white-list' ),
    'singular_name' => __( 'Products category', 'white-list' ),
    'search_items' => __( 'Search for products category', 'white-list' ),
    'all_items' => __( 'All Products categories', 'white-list' ),
    'parent_item' => __( 'Parent Products category', 'white-list' ),
    'parent_item_colon' => __( 'Parent Products category:', 'white-list' ),
    'edit_item' => __( 'Edit Products category', 'white-list' ),
    'update_item' => __( 'Update Products category', 'white-list' ),
    'add_new_item' => __( 'Add New Products category', 'white-list' ),
    'new_item_name' => __( 'New Products category', 'white-list' ),
);

register_taxonomy(
    'products-category',
    array( 'products' ),
    array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'product-category' ),
    )
);

