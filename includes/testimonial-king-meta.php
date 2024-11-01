<?php
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Add Metabox For Post 
 */
function gmctk_add_custom_metabox() {
    add_meta_box(
            'gmctk_metabox_citation', __('Details'), 'gmctk_meta_callback_citation', 'gmctk_testimonial', 'normal'
    );

}
add_action('add_meta_boxes', 'gmctk_add_custom_metabox');

/**
 * Metabox Callback Added in gmctk_add_custom_metabox();
 */
function gmctk_meta_callback_citation($post) {

    wp_nonce_field(basename(__FILE__), 'gmctk_jobs_nonce');
    $gmctk_stored_meta = get_post_meta($post->ID);
    
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="citation" class="gwp-row-title"><?php _e('Designation & Organization', 'gmctk'); ?></label><br/>
            </div>
            <div class='meta-td'>
                <input type="text" class='gmctk_row_content' style="width:400px"  name="citation" id="citation" value="<?php
                if (!empty($gmctk_stored_meta['citation'])) {
                    echo esc_attr($gmctk_stored_meta['citation'][0]);
                }
                ?>"/>
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="email" class="gwp-row-title"><?php _e('Email ', 'gmctk'); ?></label><br/>
            </div>
            <div class='meta-td'>
                <input type="text" class='gmctk_row_content' style="width:400px" name="email" id="email" value="<?php
                if (!empty($gmctk_stored_meta['email'])) {
                    echo esc_attr(sanitize_email($gmctk_stored_meta['email'][0]));
                }
                ?>"/>
            </div>
        </div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="star" class="gwp-row-star"><?php _e('Stars ', 'gmctk'); ?></label><br/>
            </div>
            <div class='meta-td'>
                    <select name="star"  id="template-list"  class="regular-text" style="width:400px">
                        <option value="0"  <?php echo (isset($gmctk_stored_meta['star'][0]) && $gmctk_stored_meta['star'][0] == '0')? 'selected':''; ?>>NO</option>
                        <option value="1"  <?php echo (isset($gmctk_stored_meta['star'][0]) && $gmctk_stored_meta['star'][0] == '1')? 'selected':''; ?>>One</option>
                        <option value="2"  <?php echo (isset($gmctk_stored_meta['star'][0]) &&$gmctk_stored_meta['star'][0] == '2')? 'selected':''; ?>>Two</option>
                        <option value="3" <?php echo (isset($gmctk_stored_meta['star'][0]) &&$gmctk_stored_meta['star'][0] == '3')? 'selected':''; ?>>Three</option>
                        <option value="4" <?php echo (isset($gmctk_stored_meta['star'][0]) &&$gmctk_stored_meta['star'][0] == '4')? 'selected':''; ?>>Four</option>
                        <option value="5" <?php echo (isset($gmctk_stored_meta['star'][0]) &&$gmctk_stored_meta['star'][0] == '5')? 'selected':''; ?>>Five</option>
                    </select>
                
            </div>
        </div>
        
    </div>

    <?php
}


/**
 * Post Data Saving
 */
function gmctk_meta_save($post_id) {
    //checks save status
    $is_auto_save = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['gmctk_jobs_nonce']) && wp_verify_nonce($_POST['gmctk_jobs_nonce'], basename(__FILE__))) ? 'true' : 'false';

    if ($is_auto_save || $is_revision || !$is_valid_nonce) {
        return;
    }
    if (isset($_POST['citation'])) {
        update_post_meta($post_id, 'citation', sanitize_text_field($_POST['citation']));
    }
    if (isset($_POST['email'])) {
        update_post_meta($post_id, 'email', sanitize_email($_POST['email']));
    }
    if (isset($_POST['star'])) {
        update_post_meta($post_id, 'star', sanitize_text_field($_POST['star']));
    }
}
add_action('save_post', 'gmctk_meta_save');
