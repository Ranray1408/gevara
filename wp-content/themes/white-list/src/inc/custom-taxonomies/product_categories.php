<?php
/**
 * Taxonomy events category
 *
 * @package WP-rock
 * @since 4.4.0
 */

$labels = array(
    'name'                  => __( 'Каталог', 'white-list' ),
    'singular_name'         => __( 'Продукт', 'white-list' ),
    'search_items'          => __( 'Поиск по каталогу', 'white-list' ),
    'all_items'             => __( 'Все продукты', 'white-list' ),
    'parent_item'           => __( 'Родительская категория', 'white-list' ),
    'parent_item_colon'     => __( 'Родительская категория:', 'white-list' ),
    'edit_item'             => __( 'Редактировать продукт', 'white-list' ),
    'update_item'           => __( 'Обновить продукт', 'white-list' ),
    'add_new_item'          => __( 'Добавить новый продукт', 'white-list' ),
    'new_item_name'         => __( 'Название нового продукта', 'white-list' ),
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

