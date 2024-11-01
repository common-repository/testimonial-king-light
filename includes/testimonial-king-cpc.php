<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Add Custom Column In Post List 
 */
function gmctk_custom_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'featured_image' => 'Image',
        'gmctk_testimonial_group'=>'Groups',
        'citation' => 'Citation',
        'date' => 'Date'
     );
    return $columns;
}
add_filter('manage_gmctk_testimonial_posts_columns' , 'gmctk_custom_columns');

/**
 * Data To Display In Custom Column  Post List 
 */
function gmctk_custom_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_image':
        echo the_post_thumbnail( 'thumbnail' );
        break;
    case 'gmctk_testimonial_group':
        echo the_terms($post_id, 'gmctk_testimonial_group');
        break;
    case 'citation' :
        $citation = get_post_meta( $post_id, 'citation', true );
        echo __( $citation );
        break;
    }
    
   
}
add_action( 'manage_gmctk_testimonial_posts_custom_column' , 'gmctk_custom_columns_data', 10, 2 ); 

