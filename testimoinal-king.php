<?php
/*
 * Plugin Name: Testimonial King Light
 * Plugin URI:  http://testimonialking.websitemaster.in
 * Description: Make A Testimonial Look Awesome With Unlimited Styles as Visualization And Animation Effect, Fully Customization Options.
 * Version:     0.1
 * Author:      SVC
 * Author URI:  http://tk.ineeditright.com
 * License:     GPLv3 or later 
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}
define( 'GMCTK_TESTIMONIAL_KING', plugin_dir_path( __FILE__ ) );
define( 'GMCTK_PLUGIN_URL', plugins_url('',__FILE__ ) );

require_once( GMCTK_TESTIMONIAL_KING.'includes/testimonial-king-inc.php' );

function gmctk_setup_post_types()
{   
    // trigger our function that registers the custom post type
    gmctk_add_post_types();
    gmctk_options_init();
    // clear the permalinks after the post type has been registered  
    flush_rewrite_rules();
   
}
 function gmctk_deactivation()
{
   // clear the permalinks to remove our post type's rules
    flush_rewrite_rules();
}
 function gmctk_deletion()
{
   //delete all saved options
    delete_option('gmctk_general_options');
}
// trigger our function that registers the custom post type
register_activation_hook( __FILE__,'gmctk_setup_post_types' );
// trigger our function that clears data after deactivation 
register_deactivation_hook( __FILE__,'gmctk_deactivation'  );
// trigger our function that delete options after deletions
register_uninstall_hook(__FILE__, 'gmctk_deletion');

