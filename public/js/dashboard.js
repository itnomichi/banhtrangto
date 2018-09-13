function fn_collapse_toggle(collapse_id) {
    if (jQuery("#" + collapse_id).hasClass('show')) {
        jQuery("#" + collapse_id).removeClass('show');
        if (collapse_id == 'collapse-0') {
            jQuery("#" + collapse_id).find('img').attr('src', '');
            jQuery("#" + collapse_id).find('input[name=img_file]').val('');
            jQuery("#" + collapse_id).find('input[name=img_title]').val('');
            jQuery("#" + collapse_id).find('input[name=img_money]').val('');
            jQuery("#" + collapse_id).find('textarea[name=img_content]').val('');
        }
    } else {
        jQuery("#" + collapse_id).addClass('show');
    }
}

function fn_attach_image(collapse_id) {
    jQuery("#" + collapse_id).find('input[name=img_file]').trigger('click');
}

function fn_img_cancel(collapse_id){
    fn_collapse_toggle(collapse_id);
}

function fn_img_file_change(collapse_id, self) {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        if(collapse_id == 'collapse-0')
            jQuery("#" + collapse_id).find('img').attr('src', e.target.result);
        else{
            jQuery("#" + collapse_id + "-img").find('img').attr('src', e.target.result);
        }
    };

    // read the image file as a data URL.
    reader.readAsDataURL(self.files[0]);
}