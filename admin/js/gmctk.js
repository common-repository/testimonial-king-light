jQuery(document).ready(function($) {

    var sortlist = $('#template-list');
    var name = '';
    var animation = $('#loading-animation');
    var settingsDiv = $('#settingsDiv');
  
       jQuery(sortlist).change(function() {
            name = $(this).val();
            animation.show();
            $('.gmctk-options').css('pointer-events','none');
         $.ajax({
                url: ajaxurl,
                type: 'POST',
                //dataType: 'json',
                data: {
                    action: 'gmctk_selected_tpl',
                    name: name,
                    security: WP_GMCTK.security
                },
                success: function(response) {
                  animation.hide();
                  $('.form').html($( response ).find('.form').html());
                  $('input[name="_wp_http_referer"]').val('/wp-admin/edit.php?post_type=gmctk_testimonial&page=gmctk_options');
                },
                error: function(error) {
                     console.log(error);

                }


            });

        });




});