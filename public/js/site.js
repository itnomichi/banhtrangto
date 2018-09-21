function fn_cancel(self) {
    var card = jQuery(self).closest("div[id=card]");
    var collapse = card.find('div.collapse');
    if (collapse.hasClass('show')) {

        collapse.removeClass('show');

        if (card.find('input[name=id]').val() == '0') {
            fn_clear_card(card);
        }
    } else {
        collapse.addClass('show');
    }
}

function fn_clear_card(card) {
    card.find('img').attr('src', '/images/blank.png');
    card.find('input[name=img_type]').val('1');
    card.find('input[name=img_file]').val('');
    card.find('input[name=img_title]').val('');
    card.find('input[name=img_money]').val('');
    card.find('textarea[name=img_content]').val('');
    card.find('a.img-type').addClass('btn-warning');
    card.find('a.img-type').removeClass('btn-success-cst');
    card.find('a.img-type').first().removeClass('btn-warning');
    card.find('a.img-type').first().addClass('btn-success-cst');
    card.find('span.mbr-icl').removeClass('mbri-arrow-up');
    card.find('span.mbr-icl').addClass('mbri-arrow-down');
}

function fn_attach_image(self) {
    jQuery(self).closest("div[id=card]").find('input[name=img_file]').trigger('click');
}

function fn_img_cancel(self) {
    fn_collapse_toggle(self);
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

function fn_collapse_toggle(self) {

    var card = jQuery(self).closest("div[id=card]");
    var collapse = card.find('div.collapse');
    if (collapse.hasClass('show')) {
        collapse.removeClass('show')
    } else {
        collapse.addClass('show')
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
            if (response.success == true) {
                var card = jQuery(self).closest('#card');
                var id = card.find('input[name=id]').val();
                if (id == '0') {
                    card.after(response.card_html);
                    fn_clear_card(card);
                } else {
                    card.replaceWith(response.card_html);
                }
            } else {
                alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
            }
        },
        error: function (response) {
            alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
        }
    });
}

function fn_delete(self, id) {
    var form = self.closest('#card').querySelector('form');
    var data = new FormData(form);
    data.append('delete_flg', '1');
    jQuery.ajax({
        type: "POST",
        url: '/save',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success == true) {
                jQuery(self).closest('#card').remove();
            } else {
                alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
            }
        },
        error: function (response) {
            alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
        }
    });
}

function fn_order(self, event) {
    event.preventDefault();
    var order = jQuery(self).closest("div[id=order]");
    var collapse = order.find('div.collapse');
    if (collapse.hasClass('show')) {
        jQuery(self).html('Đặt hàng');
        collapse.removeClass('show');
        order.find('input[name=ord_quantity]').val("1");
        order.find('input[name=ord_phone]').val("");
        order.find('textarea[name=ord_notes]').val("");
    } else {
        jQuery(self).html('Hủy');
        collapse.addClass('show');
    }
}

function fn_order_confirm(self, event) {
    event.preventDefault();
    var order = jQuery(self).closest("div[id=order]");
    var img_id = order.find('input[name=img_id]').val();
    var _token = jQuery('input[name=_token]').val();
    var ord_quantity = order.find('input[name=ord_quantity]').val();
    var ord_phone = order.find('input[name=ord_phone]').val();
    var ord_notes = order.find('textarea[name=ord_notes]').val();
    if (ord_quantity == '' || ord_quantity == '0' || isNaN(ord_quantity)) {
        alert('Xin vui lòng nhập số lượng');
        return false;
    }

    if (ord_phone == '') {
        alert('Xin vui lòng nhập số điện thoại');
        return false;
    }

    var data = new FormData();
    data.append('_token', _token);
    data.append('img_id', img_id);
    data.append('ord_quantity', ord_quantity);
    data.append('ord_phone', ord_phone);
    data.append('ord_notes', ord_notes);

    jQuery.ajax({
        type: "POST",
        url: '/order',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success == true) {
                alert("Đặt hàng thành công.");
                jQuery("#btn-dathang").trigger('click');
            } else {
                alert("Có lỗi đã xảy ra. \rVui lòng liên hệ trực tiếp qua điện thoại.");
            }
        },
        error: function (response) {
            alert("Có lỗi đã xảy ra. \rVui lòng liên hệ với quản trị viên.");
        }
    });

}