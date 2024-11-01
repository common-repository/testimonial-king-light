<style>
 .gmctk-testimonial-board-on {
  background: -webkit-linear-gradient(320deg,<?php echo $gmctk_options['animation_colour_first_one']; ?>, <?php echo $gmctk_options['animation_colour_second_one']; ?>);
  background: linear-gradient(130deg,<?php echo $gmctk_options['animation_colour_first_one']; ?>, <?php echo $gmctk_options['animation_colour_second_one']; ?>);
  background-size: 400% 400%;
  -webkit-animation: gradient 16s ease infinite;
  animation: gradient 16s ease infinite;
}
.gmctk-testimonial-board-on .gmctk-testimonial{
    background: transparent !important;
}
.gmctk-testimonial button,.gmctk-testimonial button:focus{
    background: <?php echo $gmctk_options['button_colour_one']; ?>;
    border-radius: <?php echo $gmctk_options['gmctk_button_type_one']; ?>;
    display : <?php echo $gmctk_options['gmctk_button_one']; ?> !important;
}
.slick-dots li button:before{
    color: <?php echo $gmctk_options['dots_colour_one']; ?> !important;
}
.slick-dots li button{
    display : <?php echo $gmctk_options['gmctk_dots_one']; ?> !important;
  
}

<?php 
if($gmctk_options['gmctk_item_no_one'] == 'one')
    $items = 'single-item';
else
    $items = 'multiple-items'; 
?>
</style>
<div class="<?php echo 'gmctk-testimonial-board-'.$gmctk_options['colour_animation_one'];  ?>" style="background-color: <?php echo $gmctk_options['outer_background_colour_one'] ?>;">
    <div class="gmctk-testimonial <?php echo $gmctk_options['gmctk_style_one'];  ?>" style="width:<?php echo ($items == 'single-item' )? '80%':'95%'; ?> ; background-color:<?php echo $gmctk_options['inner_background_colour_one'] ?>;" >
  <div class="slider <?php echo $items; ?>">

