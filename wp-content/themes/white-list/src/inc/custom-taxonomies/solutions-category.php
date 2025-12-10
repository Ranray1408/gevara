<?php

/**
 * Taxonomy events category
 *
 * @package WP-rock
 * @since 4.4.0
 */



$labels = array(
    'name'                  => __('Решения категории', 'white-list'),
    'singular_name'         => __('Решение категории', 'white-list'),
    'search_items'          => __('Поиск по решениям', 'white-list'),
    'all_items'             => __('Все решения', 'white-list'),
    'parent_item'           => __('Родительская категория решений', 'white-list'),
    'parent_item_colon'     => __('Родительская категория решений:', 'white-list'),
    'edit_item'             => __('Редактировать решение', 'white-list'),
    'update_item'           => __('Обновить решение', 'white-list'),
    'add_new_item'          => __('Добавить новое решение', 'white-list'),
    'new_item_name'         => __('Название нового решения', 'white-list'),
);


register_taxonomy(
    'solutions-category',
    array('solutions'),
    array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'solutions-category'),
    )
);
