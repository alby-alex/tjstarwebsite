jQuery(document).ready(function() {

    function button_click(){
        jQuery('input.img-button').click(function(){
            $this = jQuery(this);
            window.send_to_editor = function(html){
                imgurl = jQuery('img',html).attr('src');
                $this.prev('input[type="text"]').val(imgurl);
                tb_remove();
            }
            tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true');
            return false;
        })
        jQuery('#theme_image_button').click(function(){
            window.send_to_editor = function(html){
                imgurl = jQuery('img',html).attr('src');
                jQuery('#tj_theme_image').val(imgurl);
                tb_remove();
            }
            tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true');
            return false;
        })
    }
    button_click();

});
