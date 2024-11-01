<?php
if ( !defined( 'ABSPATH' ) )
    exit;

/**
 * Setting Page View Called Add SubMenu Page 
 */
function gmctk_options_page_callback($tpl_short=''){
    
    $general = get_option( 'gmctk_general_options');
    if($tpl_short== ''){
      $tpl_short = 'one';
      $template = 'gmctk_template_'.$tpl_short;
      
    }
   
?>

<div class="gmctk-wrap">
   
<?php settings_errors(); ?>
     

<div class="gmc-notice">
        <h1></h1>
</div>
<div style="padding:20px;color:#fff;background: #0074a2;">
<table class="table"    style="display: inline-block;">
        <tbody>
            <tr>
                <th scope="row"><label for="customize-tpl" style="color:#fff;">Customize Template :</label>
                </th>
				
                <td><select name=""  id="template-list"  class="regular-text">
                       
                        <option value="one">One</option>
                        

                    </select>               

                </td>

           </tr>
        </tbody>
    </table>
	
    <a href="http://tk.ineeditright.com"  target="_blank"   style="color:#fff; vertical-align: super;">Click Here to read documentation.</a>

	<a href="http://tk.ineeditright.com" id="upgrade" target="_blank"  class="button-secondary" style="float: right;background:darkorange;color:#fff;"> Upgrade To Pro </a>

</div>
      
	<div style="height:20px;text-align:center;">
		<img id="loading-animation" style="display: none;position: relative;top: 10px;height: 100px;" src="<?php echo  GMCTK_PLUGIN_URL.'/admin/images/ajax-loader.gif'; ?>">

	</div>

    <div class="form">
        <form class="main-options-form" method="post" action="options.php" enctype="multipart/form-data">
                <div class="gmctk-options" style="padding: 20px;">
                    
                <?php
                    settings_fields( 'gmctk_general_options' );  
                    include GMCTK_TESTIMONIAL_KING.'includes/template/'.$tpl_short.'/'.$tpl_short.'.php';
                ?>
                </div>
                <p class="submit">
                    <input name="gmctk_general_options[template]" type="hidden" id="gmctk-background" value="gmctk_template_<?php echo $tpl_short; ?>" class="regular-text">
                    <input name="gmctk_general_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'gmctk'); ?>" />
                    <input name="gmctk_general_options[reset]" type="submit" class="button-secondary" value="<?php esc_attr_e('Reset Defaults', 'gmctk'); ?>" />

                </p>
                <script>
                 (function( $ ) {

                    // Add Color Picker to all inputs that have 'color-field' class
                    $(function() {
                        $('.gmctk-colour-picker').wpColorPicker();
                    });

                })( jQuery );
                </script>
        </form>
    </div>
</div> 

<?php
}
?>
