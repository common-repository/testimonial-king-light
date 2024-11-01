<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register ShortCode To Display Testimonials
 */
function gmctk_testimonial_form() {
ob_start();	
$postTitleError = '';


if ( isset( $_POST['submit'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
    $hasError = false;
    if ( isset( $_POST['title'] ) ) {
 
    if ( trim( $_POST['title'] ) === '' ) {
        $postTitleError .= 'Please enter  name.<br/>';
        $hasError = true;
    }
 
    }
    if ( isset( $_POST['description'] ) ) {

        if ( trim( $_POST['description'] ) === '' ) {
            $postTitleError .= 'Please enter  discription.';
            $hasError = true;
        }

    }
    
    if(!$hasError){
       if ( isset( $_FILES['userpic'] )) {
        $uploaddir = wp_upload_dir();
        $file = $_FILES['userpic'];
        $uploadfile = $uploaddir['path'] . '/' . basename( sanitize_file_name($file['name']) );

        move_uploaded_file( sanitize_file_name($file['tmp_name']) , $uploadfile );
        $filename = basename( $uploadfile );

        $wp_filetype = wp_check_filetype(basename($filename), null );

        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', $filename),
            'post_content' => '',
            'post_status' => 'inherit',
            
        );
        $attach_id = wp_insert_attachment( $attachment, $uploadfile );
    
       }  
        
    $post_information = array(
        'post_title' => wp_strip_all_tags(sanitize_title( $_POST['title']) ),
        'post_content' => sanitize_textarea_field($_POST['description']),
        'post_type' => 'gmctk_testimonial',
        'post_status' => 'pending',
        
    );
 
    $pid = wp_insert_post( $post_information );
    
    //we now use $pid (post id) to help add out post meta data
    add_post_meta($pid, 'citation', sanitize_text_field($_POST['citation']));
    add_post_meta($pid, 'email', sanitize_email($_POST['email']));
    add_post_meta($pid, 'star', sanitize_text_field($_POST['star']));
    set_post_thumbnail( $pid, $attach_id );
    $postTitleError = "success";
    }
}
wp_enqueue_script( 'gmctk-validation' );
wp_enqueue_script( 'gmctk-from-js' );
?>
<form id="gmctkform" action=""  method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="gmctkname">Full Name</label>
    <input type="text" class="form-control" name="title" value="<?php if ( isset( $_POST['title'] ) ) echo esc_attr(sanitize_text_field($_POST['title'])); ?>" id="gmctkname">
  </div>
  <div class="form-group">
    <label for="gmctemail">Email </label> (Note: Your email details will not be shown.)
    <input type="email" class="form-control" name="email" value="<?php if ( isset( $_POST['email'] ) ) echo esc_attr(sanitize_email($_POST['email'])); ?>" id="gmctemail">
  </div>
  <div class="form-group">
    <label for="gmctkcitation">Designation & Organization</label>
    <input type="text" class="form-control" name="citation" value="<?php if ( isset( $_POST['citation'] ) ) echo esc_attr(sanitize_text_field($_POST['citation'])); ?>" id="gmctkcitation">
  </div>
  <div class="form-group">
    <label for="gmctkdesc">Description</label>
    <textarea type="text" class="form-control" name="description" id="gmctkdesc"><?php if ( isset( $_POST['description'] ) ) echo esc_textarea(sanitize_textarea_field($_POST['description'])); ?></textarea>
  </div>
  
  <div class="form-group">
    <label for="gmctkstar">Stars</label>
    <select type="text" class="form-control" name="star" id="gmctkstar">
	<option value="0"  <?php echo (isset($_POST['star']) && $_POST['star'] == '0')? 'selected':''; ?>>NO</option>
        <option value="1"  <?php echo (isset($_POST['star']) && $_POST['star'] == '1')? 'selected':''; ?>>One</option>
        <option value="2"  <?php echo (isset($_POST['star']) && $_POST['star'] == '2')? 'selected':''; ?>>Two</option>
        <option value="3"  <?php echo (isset($_POST['star']) && $_POST['star'] == '3')? 'selected':''; ?>>Three</option>
        <option value="4"  <?php echo (isset($_POST['star']) && $_POST['star'] == '4')? 'selected':''; ?>>Four</option>
        <option value="5"  <?php echo (isset($_POST['star']) && $_POST['star'] == '5')? 'selected':''; ?>>Five</option>
    </select>
  </div>
  <div class="form-group">
    <label for="gmctkdesc">Image</label>
    <input type="file" class="form-control" name="userpic" id="gmctkcfile"/>
  </div>
  <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>  
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
<?php

if ( $postTitleError != '' ) { ?>
<span class="error" style="color: <?php echo ( $postTitleError == 'success' )? 'green' : 'red'; ?>;"><?php echo ( $postTitleError == 'success' )? 'Submited Successfully.' : $postTitleError; ?></span>
    <div class="clearfix"></div>
<?php } 

return ob_get_clean();
}
add_shortcode('GMCTK_FORM', 'gmctk_testimonial_form');

