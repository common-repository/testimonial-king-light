<?php
 //$gmctk_options are already escaped

    if($gmctk_options['gmctk_image_position_one'] == 'bottom' ||$gmctk_options['gmctk_image_position_one'] == 'top')
        $bottom = 'gmctk-bottom';
    elseif($gmctk_options['gmctk_image_position_one'] == 'right')
        $bottom = 'gmctk-right';
    else
        $bottom = '';
    
    
   
    $stars = 0;
    if(isset($gmctk_vars['STARS']) && $gmctk_vars['STARS'] != '0'){
            $stars= (int)$gmctk_vars['STARS'];
            
          }
?>
<div class="quote-container <?php echo $bottom; ?>">
<?php
    
    if($gmctk_vars['SRC'] != '' || $gmctk_vars['EMAIL'] != ''){
     if($gmctk_vars['EMAIL'] != '' && $gmctk_vars['SRC'] == ''){
        $email = $gmctk_vars['EMAIL'];
       
        $gravatar = 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $email ) ) );
        $gmctk_vars['SRC'] = $gravatar;
    }   
    $img_type=$position ='';
    if($gmctk_options['gmctk_image_type_one'] == '0px')
        $img_type= 'gmctk-image-normal';
    elseif ($gmctk_options['gmctk_image_type_one'] == '30px')
        $img_type= 'gmctk-image-rounded';
    elseif ($gmctk_options['gmctk_image_type_one'] == '70px')
        $img_type= 'gmctk-image-circle';

    if($gmctk_options['gmctk_image_position_one'] == 'left' || $gmctk_options['gmctk_image_position_one'] == 'top'){ 
        if($gmctk_options['gmctk_image_position_one'] == 'left')
            $position = 'gmctk-image-left';
        else
            $position = 'gmctk-image-top';
?>
    <div  class="portrait <?php echo $position.' '.$img_type; ?>"><img  src="<?php echo esc_url($gmctk_vars['SRC']); ?>" alt=""/></div>
    <?php
        }
    }
    ?>
    <div class="quote" >
        <blockquote>
          <p style="min-height: 140px;color: <?php echo $gmctk_options['text_colour_one']; ?>;"><?php echo esc_attr($gmctk_vars['CONTENT']); ?></p>
          <cite style="color: <?php echo $gmctk_options['meta_colour_one']; ?>;"><span style="color: <?php echo $gmctk_options['meta_title_colour_one']; ?>;"><?php echo esc_attr($gmctk_vars['TITLE']); ?></span><br/><?php echo esc_attr($gmctk_vars['CITATION']); ?></cite>
         
        </blockquote>
    </div>
    <?php
    
     if($gmctk_vars['SRC'] != '' || $gmctk_vars['EMAIL'] != ''){
         if($gmctk_vars['EMAIL'] != '' && $gmctk_vars['SRC'] == ''){
            $email = $gmctk_vars['EMAIL'];
            
            $gravatar = 'https://www.gravatar.com/avatar/' . md5( strtolower( trim( $email ) ) );
            $gmctk_vars['SRC'] = $gravatar;
        } 
        if($gmctk_options['gmctk_image_position_one'] == 'right' || $gmctk_options['gmctk_image_position_one'] == 'bottom'){ 
            if($gmctk_options['gmctk_image_position_one'] == 'right'){
                $position = 'gmctk-image-right';
            }
            else{
                $position = 'gmctk-image-bottom';
            }
    ?>
    <div class="portrait <?php echo $position.' '.$img_type; ?>"><img src="<?php echo esc_url($gmctk_vars['SRC']); ?>" alt=""/></div>
    <?php
        }
       }
    ?>
</div>