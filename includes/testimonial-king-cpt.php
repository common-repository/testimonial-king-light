<?php
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Register Custom Post Type 
 */
function gmctk_add_post_types() {    
    $singular = 'Testimonial';
    $pluler = 'Testimonials';
    $labels = array(
        'name' => _x('Testimonial King','Post Type General Name','gmctk'),
        'singular_name' => _x($singular,'Post Type Singular Name','gmctk'),
        'add_name' => __( 'Add New','gmctk'),
        'add_new_item' => __('Add New ' . $singular,'gmctk'),
        'edit' => __('Edit','gmctk'),
        'edit_item' => __('Edit ' . $singular,'gmctk'),
        'new_item' => __('New ' . $singular,'gmctk'),
        'all_items'  => __( 'All Testimonial','gmctk'), 
        'view' => __('View ' . $singular,'gmctk'),
        'view_item' => __('View ' . $singular,'gmctk'),
        'search_term' => __('Search ' . $pluler,'gmctk'),
        'parent' => __('Parent ' . $singular,'gmctk'),
        'not_found' => __('No ' . $pluler . ' Found','gmctk'),
        'not_found_in_trash' => __('No ' . $pluler . ' Found in Trash','gmctk'),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'compability_type' => 'page',
        'rewrite' => array(
            'slug' => 'gmctk_testimonial'
        ),
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions',
            'page-attributes'
        ),
        'menu_icon' => GMCTK_PLUGIN_URL.'/admin/images/gmctk.PNG'
    );

    register_post_type('gmctk_testimonial', $args);

}
add_action('init', 'gmctk_add_post_types');

