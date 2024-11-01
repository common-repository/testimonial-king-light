<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue scripts and styles.
 */
function gmctk_assets() {
        global $gmctk_options;
        $gmctk_options = get_option('gmctk_general_options');
        $template = $gmctk_options['gmctk_active'];
        $templates =array('one');
        foreach($templates as $template ){
        //testimonial css
        $directory_css = GMCTK_TESTIMONIAL_KING.'assets/'.$template.'/css';
        $scanned_directory = array_diff(scandir($directory_css), array('..', '.'));
        foreach($scanned_directory as $dir){
            if(strpos($dir, '.css'))
             wp_register_style( "gmctk-testimonial-$template".$dir, GMCTK_PLUGIN_URL.'/assets/'.$template.'/css/'.$dir );
        }
        }
        wp_register_style( 'gmctk-slick', GMCTK_PLUGIN_URL.'/admin/css/slick.css' );
        wp_register_style( 'gmctk-slick-theme', GMCTK_PLUGIN_URL.'/admin/css/slick-theme.css' );

        //testimonial slick js
        wp_register_script( 'gmctk-testimonial-slick-min',GMCTK_PLUGIN_URL.'/admin/js/slick.min.js','' , '', true );
        
        // custom jquery
        wp_register_script( 'gmctk-from-js', GMCTK_PLUGIN_URL.'/admin/js/form.js', array( 'jquery' ), '0.1', TRUE );
        
        // validation
        wp_register_script( 'gmctk-validation',GMCTK_PLUGIN_URL.'/admin/js/jquery.validate.min.js' );
       
       
}
add_action( 'wp_enqueue_scripts', 'gmctk_assets' );

?>