<?php
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Add SubMenu Page For Plugin
 */
function gmctk_add_sub_menupage() {
    add_submenu_page(
            'edit.php?post_type=gmctk_testimonial', 'Testimonial King Options', 'Options', 'manage_options', 'gmctk_options', 'gmctk_options_page_callback'
    );
}
add_action('admin_menu', 'gmctk_add_sub_menupage');

function gmctk_admin_options_callback(){
    
}

/**
 * Register Setting And Validate Call
 */
function gmctk_options_settings_init() {
    register_setting( 'gmctk_general_options', 'gmctk_general_options', 'gmctk_general_options_validate' );
    
   
}
add_action( 'admin_init', 'gmctk_options_settings_init' );

/**
 * Default Options Array
 */
function gmctk_get_default_options($name = '') {
    $options = array(       
        
                    'gmctk_template_one' =>array(
                        'gmctk_style_one' => 'default',
                        'inner_background_colour_one' => 'rgba(200,200,200,.8)',
                        'outer_background_colour_one' => '#000',
                        'text_colour_one'=>'#fff',
                        'meta_title_colour_one'=>'#666666',
                        'meta_colour_one'=>'#666666',
                        'gmctk_button_one'=>'block',
                        'button_colour_one'=>'#000',
                        'gmctk_button_type_one'=>'0px',
                        'gmctk_dots_one' => 'block',
                        'dots_colour_one' => '#FFFFFF',
                        'colour_animation_one' => 'on',
                        'animation_colour_first_one' => '#053c6d',
                        'animation_colour_second_one' => '#a70b4c',
                        'gmctk_image_type_one'=> '70px',
                        'gmctk_image_position_one' => 'left',
                        'gmctk_item_no_one' => 'one',
                        'gmctk_active'=>'one'
                        
                    ),
                    'gmctk_template_two' =>array(
                        'gmctk_style_two' => 'gmctkone',
                        'inner_background_colour_two' => '#777',
                        'outer_background_colour_two' => 'rgba(0, 0, 0, 0.23)',
                        'text_colour_two'=>'#fff',
                        'meta_title_colour_two'=>'#666666',
                        'meta_colour_two'=>'#666666',
                        'gmctk_button_two'=>'block',
                        'button_colour_two'=>'#000',
                        'gmctk_button_type_two'=>'30px',
                        'gmctk_dots_two' => 'block',
                        'dots_colour_two' => '#FFFFFF',
                        'colour_animation_two' => 'off',
                        'animation_colour_first_two' => '#053c6d',
                        'animation_colour_second_two' => '#a70b4c',
                        'gmctk_image_type_two'=> '70px',
                        'gmctk_image_position_two' => 'left',
                        'gmctk_item_no_two' => 'two',
                        
                        
                    ),
         'gmctk_template_three' =>array(
                        'gmctk_style_three' => 'default',
                        'inner_background_colour_three' => '#000',
                        'outer_background_colour_three' => 'inherit',
                        'text_colour_three'=>'#fff',
                        'meta_title_colour_three'=>'#666666',
                        'meta_colour_three'=>'#666666',
                        'gmctk_button_three'=>'block',
                        'button_colour_three'=>'#000',
                        'gmctk_button_type_three'=>'30px',
                        'gmctk_dots_three' => 'block',
                        'dots_colour_three' => '#FFFFFF',
                        'colour_animation_three' => 'on',
                        'animation_colour_first_three' => '#053c6d',
                        'animation_colour_second_three' => '#a70b4c',
                        'gmctk_image_type_three'=> '70px',
                        'gmctk_image_position_three' => 'left',
                        'gmctk_item_no_three' => 'two',
                        
                        
                    ),
        'gmctk_template_four' =>array(
                        'gmctk_style_four' => 'default',
                        'inner_background_colour_four' => '#000',
                        'outer_background_colour_four' => 'inherit',
                        'text_colour_four'=>'#fff',
                        'meta_title_colour_four'=>'#666666',
                        'meta_colour_four'=>'#666666',
                        'gmctk_button_four'=>'block',
                        'button_colour_four'=>'#000',
                        'gmctk_button_type_four'=>'30px',
                        'gmctk_dots_four' => 'block',
                        'dots_colour_four' => '#FFFFFF',
                        'colour_animation_four' => 'on',
                        'animation_colour_first_four' => '#053c6d',
                        'animation_colour_second_four' => '#a70b4c',
                        'gmctk_image_type_four'=> '70px',
                        'gmctk_image_position_four' => 'left',
                        'gmctk_item_no_four' => 'two',
                        
                        
                    ),
        'gmctk_template_five' =>array(
                        'gmctk_style_five' => 'default',
                        'inner_background_colour_five' => '#000',
                        'outer_background_colour_five' => '#000',
                        'text_colour_five'=>'#fff',
                        'meta_title_colour_five'=>'#666666',
                        'meta_colour_five'=>'#666666',
                        'gmctk_button_five'=>'block',
                        'button_colour_five'=>'#000',
                        'gmctk_button_type_five'=>'30px',
                        'gmctk_dots_five' => 'block',
                        'dots_colour_five' => '#FFFFFF',
                        'colour_animation_five' => 'on',
                        'animation_colour_first_five' => '#053c6d',
                        'animation_colour_second_five' => '#a70b4c',
                        'gmctk_image_type_five'=> '100px',
                        'gmctk_image_position_five' => 'left',
                        'gmctk_item_no_five' => 'one',
                        
                        
                    )
        
            
                   );
   
    if(!$name == ''){
        foreach($options as $key => $value){
            if($key == $name){
                 return $value;
            } 
            }
    }
    else{
        return $options;
    }
    
   
}

/**
 * Save Default Option In DB If Not.
 */
function gmctk_options_init() {
    
    $gmctk_general_options = get_option('gmctk_general_options');
    $gmctk_options = gmctk_get_default_options();
    $options_array = array();
   
    // Are our options saved in the DB?
    if ( false === $gmctk_general_options ) {
        foreach($gmctk_options as $key => $value){
           
            if(is_array($value)){
                foreach($value as $name => $val){
                $options_array[$name] = sanitize_text_field($val);
            }
            }
       
       
        }
        update_option( 'gmctk_general_options', $options_array );
        
    }
    // In other case we don't need to update the DB
}

/**
 * Option Validate Function Called In Register 
 */
function gmctk_general_options_validate($input){
    $all_saved_options = get_option( 'gmctk_general_options');
    $default_options = gmctk_get_default_options($input['template']);
    $valid_input = wp_parse_args($all_saved_options,$default_options);
    
    if ( ! empty($input['submit']) )
        $valid_input =  wp_parse_args($input,$valid_input); 
    elseif ( ! empty($input['reset']) )
        $valid_input =  wp_parse_args( $default_options,  $valid_input  );
    
 
    return $valid_input;
}

/**
 * Ajax Callback For selected Template
 */
function gmctk_selected_tpl() { 
    if (!check_ajax_referer('wp-gmctk', 'security')) {
        return wp_send_json_error("Invalid Nonce");
    }
    if (!current_user_can("manage_options")) {
        return wp_send_json_error("you are not allowed to do this.");
    }
    if (isset($_POST['name'])) {
        gmctk_options_page_callback(sanitize_text_field($_POST['name']));
    }
    wp_die();
}
add_action('wp_ajax_gmctk_selected_tpl', 'gmctk_selected_tpl');