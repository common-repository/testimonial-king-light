<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register Taxonomy For Post 
 */
function gmctk_register_taxonomy() {
    $singular = 'Group';
    $pluler = 'Groups';
    $labels = array(
        'name' => $pluler,
        'singular_name' => $singular,
        'search_items' => 'Search ' . $pluler,
        'popular_items' => 'Popular ' . $pluler,
        'all_items' => 'All ' . $pluler,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Edit ' . $singular,
        'update_item' => 'Update ' . $singular,
        'add_new_item' => 'Add New ' . $singular,
        'new_item_name' => 'New ' . $singular . 'Name',
        'separate_items_with_comms' => 'Separate ' . $pluler . ' with commas',
        'add_or_remove_items' => 'Add or Remove ' . $pluler,
        'choose_from_most_used' => 'Choose from most used ' . $pluler,
        'not_found' => 'No ' . $pluler . ' Found',
        'menu_name' => $pluler
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'gmctk_testimonial_group')
    );
    register_taxonomy('gmctk_testimonial_group', 'gmctk_testimonial', $args);
}
add_action('init', 'gmctk_register_taxonomy');

