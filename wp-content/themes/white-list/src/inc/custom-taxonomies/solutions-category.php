<?php
/**
 * Taxonomy events category
 *
 * @package WP-rock
 * @since 4.4.0
 */



$labels = array(
    'name' => __( 'Solutions categories', 'white-list' ),
    'singular_name' => __( 'Solutions category', 'white-list' ),
    'search_items' => __( 'Search for Solutions category', 'white-list' ),
    'all_items' => __( 'All Solutions categories', 'white-list' ),
    'parent_item' => __( 'Parent Solutions category', 'white-list' ),
    'parent_item_colon' => __( 'Parent Solutions category:', 'white-list' ),
    'edit_item' => __( 'Edit Solutions category', 'white-list' ),
    'update_item' => __( 'Update Solutions category', 'white-list' ),
    'add_new_item' => __( 'Add New Solutions category', 'white-list' ),
    'new_item_name' => __( 'New Solutions category', 'white-list' ),
);

register_taxonomy(
    'solutions-category',
    array( 'solutions' ),
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

