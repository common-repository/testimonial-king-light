<?php

if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Enqueue scripts  for new template (default empty)
 */
function gmctk_admin_scripts() {
    global $pagenow, $typenow;
    
        if ($pagenow == 'edit.php' && $typenow == 'gmctk_testimonial') { 
        wp_enqueue_script('gmctk-js', GMCTK_PLUGIN_URL.'/admin/js/gmctk.js', array('jquery'),'0.1', true);
        wp_localize_script('gmctk-js', 'WP_GMCTK', array(
            'security' => wp_create_nonce('wp-gmctk'),
            'success' => 'Setting loaded for choosen template',
            'failuer' => 'There was an error loading template'
        ));
        wp_enqueue_script( 'jquery-form' );
        wp_enqueue_script( 'wp-color-picker' );
       

    }
}
/**
 * Enqueue scripts and styles for new template (default empty)
 */
function gmctk_admin_styles() { 
      global $pagenow, $typenow;
     if ($pagenow == 'edit.php' && $typenow == 'gmctk_testimonial') { 
        wp_enqueue_style( 'wp-color-picker' );  
     }
}
/**
 * Enqueue a script in the WordPress admin, excluding edit.php. 
 */
add_action( 'admin_enqueue_scripts', 'gmctk_admin_scripts' );
add_action( 'admin_enqueue_scripts', 'gmctk_admin_styles' );


/**
 * declare sanitize_textarea_field methode for older version of wordpress
 */
if(!function_exists('sanitize_textarea_field')){
    function sanitize_textarea_field($str){
        
        $lines = explode( "\n", (string) $str );

        $lines = array_map( 'sanitize_text_field', (array) $lines );

        return implode( "\n", $lines );
        
    }
    
}

?>
