function fn_collapse_toggle(collapse_id) {
    if (jQuery("#collapse-" + collapse_id).hasClass('show')) {
        jQuery("#collapse-" + collapse_id).removeClass('show');
        if (collapse_id == '0') {
            jQuery("#collapse-" + collapse_id).find('img').attr('src', '');
            jQuery("#collapse-" + collapse_id).find('input[name=img_file]').val('');
            jQuery("#collapse-" + collapse_id).find('input[name=img_title]').val('');
            jQuery("#collapse-" + collapse_id).find('input[name=img_money]').val('');
            jQuery("#collapse-" + collapse_id).find('textarea[name=img_content]').val('');
        }
    } else {
        jQuery("#collapse-" + collapse_id).addClass('show');
    }
}

function fn_attach_image(self) {
    jQuery(self).closest("div[id=card]").find('input[name=img_file]').trigger('click');
}

function fn_img_cancel(collapse_id) {
    fn_collapse_toggle(collapse_id);
}

function fn_img_file_change(self) {
    var reader = new FileReader();

    reader.onload = function (e) {

        var image = new Image();
        image.src = e.target.result;

        image.onload = function () {
            var img = jQuery(self).closest("div[id=card]").find('img');
            if (image.width > image.height) {
                img.addClass('img-rw');
                img.removeClass('img-rh');
            } else {
                img.removeClass('img-rw');
                img.addClass('img-rh');
            }
            // get loaded data and render thumbnail.
            img.attr('src', image.src);
        };
    };

    // read the image file as a data URL.
    reader.readAsDataURL(self.files[0]);
}

function fn_collapse_toggle(collapse_id, self) {

    if (jQuery("#collapse-" + collapse_id).hasClass('show')) {
        jQuery("#collapse-" + collapse_id).removeClass('show')
    } else {
        jQuery("#collapse-" + collapse_id).addClass('show')
    }

    if (typeof self !== 'undefined') {
        if (jQuery(self).find('span').hasClass('mbri-arrow-down')) {
            jQuery(self).find('span').removeClass('mbri-arrow-down');
            jQuery(self).find('span').addClass('mbri-arrow-up');
        } else {
            jQuery(self).find('span').removeClass('mbri-arrow-up');
            jQuery(self).find('span').addClass('mbri-arrow-down');
        }
    }
}

function fn_img_type_toggle(img_type, self) {
    var card = jQuery(self).closest("div[id=card]");
    card.find('input[name=img_type]').val(img_type);
    card.find('a.img-type').addClass('btn-warning');
    card.find('a.img-type').removeClass('btn-success-cst');
    jQuery(self).removeClass('btn-warning');
    jQuery(self).addClass('btn-success-cst');
}

function fn_login() {

    var data = new FormData(document.querySelector("form[name=login-frm]"));
    jQuery.ajax({
        type: "POST",
        url: '/auth',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success == true) {
                window.location.href = "/admin";
            } else {
                jQuery('div#login-alert').show();
            }
        },
        error: function (response) {
            alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
        }
    });
}

function fn_save(self) {
    var form = self.closest('#card').querySelector('form');
    var data = new FormData(form);
    jQuery.ajax({
        type: "POST",
        url: '/save',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
        },
        error: function (response) {
            alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
        }
    });
}

function fn_delete(self) {

}