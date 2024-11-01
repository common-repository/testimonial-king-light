<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register ShortCode To Display Testimonials
 */
function gmctk_testimonial_public($atts, $content = null) {
    global $gmctk_options,$active_temp;
   
    $atts = shortcode_atts(array(
        'title' => 'Testimonial',
        'template'=> '',
        'groups' => '',
        'fade' => 'Off',
        'speed' => '1000',
        'class' => ''
            ), $atts);
    
    if(empty($atts['template']))
        $template = $atts['template']= $gmctk_options['gmctk_active'] ;
    else
        $template = $atts['template'];
    
	if($atts['fade'] == 'On'){
			$atts['fade'] = 'true';
			
	}
	else{
			$atts['fade'] = 'false';
	}
	
	if(empty($atts['speed'])){
		
		$atts['speed'] = 1000;
	}
	
   
    if(!empty($atts['groups'])){
         $groups = explode(',', trim($atts['groups']));
         $terms =  array(
                                'taxonomy' => 'gmctk_testimonial_group',
                                'field' => 'slug',
                                'terms' => $groups
                            );
    } else {
        $terms = '';
    }
    
    $args = array(
        'post_type' => 'gmctk_testimonial',
        'tax_query' => array(
                           $terms
                        ),
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish',
        'no_found_rows' => true,
        'update_post_term_catche' => false,
       
    );
    
        //testimonial css
        wp_enqueue_style( "gmctk-slick");
        wp_enqueue_style( "gmctk-slick-theme");
        $directory_css = GMCTK_TESTIMONIAL_KING.'assets/'.$template.'/css';
        $scanned_directory = array_diff(scandir($directory_css), array('..', '.'));
        foreach($scanned_directory as $dir){
            if(strpos($dir, '.css'))
             wp_enqueue_style("gmctk-testimonial-$template".$dir);
        }
        
        
        //testimonial js
        wp_enqueue_script("jquery");
        wp_enqueue_script( "gmctk-testimonial-slick-min");
        wp_enqueue_script( "gmctk-testimonial-zindex");
        
    
    $posts = new WP_Query($args);

    if ($posts->have_posts()):
        
        gmctk_template_befor($atts);
        
        while ($posts->have_posts()): $posts->the_post();
    
            global $post,$gmctk_vars;
            $email = '';
            $id = get_the_id();
            $title = get_the_title();
            $content = get_the_content();
            $post_meta_data = get_post_meta($id);
            $citation = isset($post_meta_data['citation'][0]) ? $post_meta_data['citation'][0]: '';
            $star = isset($post_meta_data['star'][0]) ? $post_meta_data['star'][0]: '0';
            $email = isset($post_meta_data['email'][0]) ? $post_meta_data['email'][0]: '0';
            
            if (has_post_thumbnail( $id ) ){ 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'thumbnail' ); 
                $image_full = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'full' ); 

            }else{
                $image[0]= '';
                $image_full[0] = '';
            } 
            $terms = get_the_terms( $id , 'gmctk_testimonial_group' );       
           
            $gmctk_vars = array(
            'ID'        => sanitize_text_field($id),
            'TITLE'     => sanitize_title($title),
            'CONTENT'   => sanitize_textarea_field($content),
            'SRC'       => sanitize_text_field(esc_url($image[0])),
            'SRC_FULL'  => sanitize_text_field(esc_url($image_full[0])),    
            'CITATION'  => sanitize_text_field($citation),
            'STARS'     => sanitize_text_field($star) ,
            'EMAIL'     => sanitize_email($email)    
            );

            
            gmctk_template_loop($atts);
        endwhile;
       
        
          $template = gmctk_template_after($atts);

        return   $template;
    endif;
    wp_reset_postdata();
}
add_shortcode('GMCTK', 'gmctk_testimonial_public');

function gmctk_template_befor($atts){
    ob_start();
?>
<div class="gmctk-wrap">
    <div class="gmctk-main <?php echo $atts['template']; ?> <?php echo $atts['class']; ?>">
        <div class="gmctk-before">
        </div>
<?php

         gmctk_get_template(esc_html__($atts['template']),'header');
}
function gmctk_template_loop($atts){
    
         gmctk_get_template(esc_html__($atts['template']),'content');
         
}
function gmctk_template_after($atts){
    
         gmctk_get_template(esc_html__($atts['template']),'footer');
         
?>
       <div class="gmctk-after">
       </div> 
   </div>
</div>
<script>
jQuery(document).ready(function(){
	var prev = '<button type="button" data-role="none" class="slick-prev" aria-label="prev"><svg xmlns="" viewBox="0 0 24 24" version="1.1"><path fill="#FFFFFF" d="M 16,16.46 11.415,11.875 16,7.29 14.585,5.875 l -6,6 6,6 z" /></svg></button>',
    next = '<button type="button" data-role="none" class="slick-next" aria-label="next"><svg version="1.1" xmlns="" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M8.585 16.46l4.585-4.585-4.585-4.585 1.415-1.415 6 6-6 6z"></path></svg></button>';
var width = jQuery(window).width(), height = jQuery(window).height();
if ((width <= 480)) {

jQuery('.slider').addClass('single-item');
jQuery('.slider').removeClass('two-items');
jQuery('.slider').removeClass('three-items');
jQuery('.slider').removeClass('four-items');
jQuery('.slider').removeClass('multiple-items');

} 
jQuery('.single-item').slick({
    
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: <?php echo esc_attr($atts['speed']); ?>,
  cssEase: 'ease-in-out',
  prevArrow: prev,
  nextArrow: next,
  fade: <?php echo esc_attr($atts['fade']); ?>
});
jQuery('.two-items').slick({
  slidesToShow: <?php echo ($atts['fade'] == 'true')? 1:2 ; ?>,
  slidesToScroll: <?php echo ($atts['fade'] == 'true')? 1:2;  ?>,
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: <?php echo esc_attr($atts['speed']); ?>,
  cssEase: 'ease-in-out',
  prevArrow: prev,
  nextArrow: next,
  fade:<?php echo esc_attr($atts['fade']); ?>
});
jQuery('.three-items').slick({
  slidesToShow: <?php echo ($atts['fade'] == 'true')? 1:3 ; ?>,
  slidesToScroll: <?php echo ($atts['fade'] == 'true')? 1:3 ; ?>,
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: <?php echo esc_attr($atts['speed']); ?>,
  cssEase: 'ease-in-out',
  prevArrow: prev,
  nextArrow: next,
  fade:<?php echo esc_attr($atts['fade']); ?>
});
jQuery('.four-items').slick({
  slidesToShow: <?php echo ($atts['fade']  == 'true')? 1:4  ?>,
  slidesToScroll: <?php echo ($atts['fade']  == 'true')? 1:4  ?>,
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: <?php echo esc_attr($atts['speed']); ?>,
  cssEase: 'ease-in-out',
  prevArrow: prev,
  nextArrow: next,
  fade:<?php echo esc_attr($atts['fade']); ?> 
});
jQuery('.multiple-items').slick({
  slidesToShow: <?php echo ($atts['fade']  == 'true')? 1:2  ?>,
  slidesToScroll: <?php echo ($atts['fade']  == 'true')? 1:2  ?>,
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: <?php echo esc_attr($atts['speed']); ?>,
  cssEase: 'ease-in-out',
  prevArrow: prev,
  nextArrow: next,
  fade:<?php echo esc_attr($atts['fade']); ?> 
});
jQuery('.custom-paging').slick({
  
  infinite: true,
  dots: true,
  autoplay: true,
  autoplaySpeed: 4000,
  speed: <?php echo esc_attr($atts['speed']); ?>,
  cssEase: 'ease-in-out',
  prevArrow: prev,
  nextArrow: next,
  fade:<?php echo esc_attr($atts['fade']); ?>,
    customPaging : function(slider, i) {
         var thumb = jQuery(slider.$slides[i]).data('img');
         return '<a><img src="'+thumb+'"></a>';
     }
     
});


jQuery('.quote-container').mousedown(function(){
  jQuery('.single-item').addClass('dragging');
});
jQuery('.quote-container').mouseup(function(){
  jQuery('.single-item').removeClass('dragging');
});
})


</script>
<?php
return ob_get_clean();
}
function gmctk_get_template($folder,$tpl=''){
    global $gmctk_options,$gmctk_vars;
    
    //escaping each option
    $escaped_options = array();
    foreach ($gmctk_options as $key => $value) {
        $escaped_options[$key] = esc_attr($value);
    }
    $gmctk_options = $escaped_options;
    include 'template/'.$folder.'/'.$tpl.'.php';
}
