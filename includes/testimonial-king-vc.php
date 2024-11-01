<?php
if ( !defined( 'ABSPATH' ) )
    exit;

/**
 * Visual Composer Custom Parameter 
 */
function gmctk_param_settings_field( $settings, $value ){
   $groups = get_categories(array('taxonomy'=>'gmctk_testimonial_group'));  
   
   $html =  '<div class="my_param_block">'
             .'<select name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-input wpb-select groups dropdown">
			  <option selected value=""> --- All Testimonials --- </option>';
			 
   foreach ($groups as $group){
	         if($value == $group->name){
				 $sel = "selected";
			 }else{
				 $sel = "";
			 } 
             $html .= '<option '.$sel.' value="'.$group->name.'">'.$group->name.'</option>';
             }
             $html .= '</select></div>'; 
   return $html;// This is html markup that will be outputted in content elements edit form
}
 function gmctk_add_vc_shortcode_params() {
        if( function_exists('vc_add_shortcode_param') ) {
            vc_add_shortcode_param( 'gmctkgroup', 'gmctk_param_settings_field' );

        }
    }
	

add_action( 'init', 'gmctk_add_vc_shortcode_params' );


/**
 * Visual Composer Integration 
 */

function gmctkintegratewithVC() {
   if( function_exists('vc_map') ) {
   $groups = get_categories(array('taxonomy'=>'gmctk_testimonial_group'));  
   $group_array = array('All'=>'');
   foreach($groups as $group){
	 $group_array[$group->name]  = $group->name; 
   }
   vc_map( array(
      "name" => "Testimonial King",
      "base" => "GMCTK",
      "class" => "",
      "category" =>"Content", "my-text-domain",
      "icon" => GMCTK_PLUGIN_URL.'/admin/images/gmctk.PNG',
      "description" => "Testimonial With 20+ Styles And Animation Effect",
	   
      "params" => array(
         array(
            "type" => "dropdown",
            
            "class" => "",
            "heading" => "Choose a group",
            "param_name" => "groups",
			"admin_label" => true,
            "value" => $group_array,
			
            "description" =>"Only show testimonial for selected group."
         ),
		 array(
            "type" => "dropdown",
            
            "class" => "",
            "heading" => "Choose a template",
            "param_name" => "template",
			"admin_label" => true,
            "value" => array('one'),
			
            "description" =>"select template to display.default will show options active template."
         ),
		 array(
            "type" => "dropdown",
            
            "class" => "",
            "heading" => "Fade",
            "param_name" => "fade",
			"admin_label" => false,
            "value" => array('Off','On'),
			
            "description" =>"apply fade effect to slide,this will fade only one slide at a time."
         ),
		 array(
            "type" => "textfield",
            
            "class" => "",
            "heading" => "Speed",
			"param_name" => "speed",
            "value" => '1000',
			"admin_label" => false,
            "description" => "Set the speed of the slideshow cycling, in milliseconds"
         ),
          array(
            "type" => "textfield",
            
            "class" => "",
            "heading" => "Add Class",
			"param_name" => "class",
            "value" => '',
			"admin_label" => false,
            "description" => "Add class for custom styling"
         ),
           
      )
   ) );
  }
}
add_action( 'init', 'gmctkintegratewithVC' );