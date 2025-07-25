function clearSearch() {
    document.getElementById('search').value = '';
    document.getElementById('search-form').submit();
}
function alertDelete(id) {
    $('#myModal').data('id', id);
    $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function (e) {
    e.preventDefault();
    window.location.href = "product/delete" + "?id=" + $('#myModal').data('id');
});
function alertLang(id) {
    $('#langModal').data('id', id);
    $('#langModal').modal('toggle');
}
$('#productModal').on('hidden.bs.modal', function () {
    $('#id').val('');
    $('#name').val('');
    $('#price').val('');
    $('#price_child').val('');
    $('#location_id').val('4');
    $('#booking_time_start').val('');
    $('#booking_time_end').val('');
    $('#booking_time_start_hour').val('');
    $('#booking_time_start_minute').val('');
    $('#booking_time_end_hour').val('');
    $('#booking_time_end_minute').val('');
    $('#active').iCheck('uncheck');
    $('#is_maintenance').iCheck('uncheck');
    $('#maintenance_message').val('');
    $('#maintenance-message-group').hide();
    $('#image').hide();
    $('#div-toggle').show();
    CKEDITOR.instances['description'].setData('');
    CKEDITOR.instances['content'].setData('');
    $('#lang_code').text('VI');
    $('body').css('padding-right', '');
    $('#picture').val('');
    $('#pictures').empty();
    $('#language_id').val('1')
});

// Xử lý dropdown giờ và phút cho thời gian bắt đầu
$('#booking_time_start_hour, #booking_time_start_minute').on('change', function() {
    var hour = $('#booking_time_start_hour').val();
    var minute = $('#booking_time_start_minute').val();
    
    if (hour && minute) {
        $('#booking_time_start').val(hour + ':' + minute);
    } else {
        $('#booking_time_start').val('');
    }
});

// Xử lý dropdown giờ và phút cho thời gian kết thúc
$('#booking_time_end_hour, #booking_time_end_minute').on('change', function() {
    var hour = $('#booking_time_end_hour').val();
    var minute = $('#booking_time_end_minute').val();
    
    if (hour && minute) {
        $('#booking_time_end').val(hour + ':' + minute);
    } else {
        $('#booking_time_end').val('');
    }
});

// Xử lý hiển thị/ẩn ô tin nhắn bảo trì
$('#is_maintenance').on('ifChecked', function() {
    $('#maintenance-message-group').show();
});

$('#is_maintenance').on('ifUnchecked', function() {
    $('#maintenance-message-group').hide();
    $('#maintenance_message').val('');
});
function getProduct(langId, langCode) {
    $('#langModal').on('hidden.bs.modal', function () {
        $('#productModal').modal('show');
        $(this).off('hidden.bs.modal');
    });
    $('#langModal').modal('hide');
    $('#lang_code').text(langCode);

    $.ajax({
        type: 'GET',
        url: 'product/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
        success: function (data) {
            $('#id').val(data.product.id);
            $('#language_id').val(langId);
            $('#name').val(data.translation?.name ?? '');

            if (langId == 1) {
                $('#div-toggle').show();
            } else {
                $('#div-toggle').hide();
            }

            $('#price').val(data.product.price ?? '');
            $('#price_child').val(data.product.price_child ?? '');
            $('#booking_time_start').val(data.product.booking_time_start ?? '');
            $('#booking_time_end').val(data.product.booking_time_end ?? '');
            
            // Xử lý hiển thị giờ và phút từ giá trị thời gian bắt đầu
            if (data.product.booking_time_start) {
                var startTimeParts = data.product.booking_time_start.split(':');
                if (startTimeParts.length >= 2) {
                    $('#booking_time_start_hour').val(startTimeParts[0]);
                    $('#booking_time_start_minute').val(startTimeParts[1]);
                }
            }
            
            // Xử lý hiển thị giờ và phút từ giá trị thời gian kết thúc
            if (data.product.booking_time_end) {
                var endTimeParts = data.product.booking_time_end.split(':');
                if (endTimeParts.length >= 2) {
                    $('#booking_time_end_hour').val(endTimeParts[0]);
                    $('#booking_time_end_minute').val(endTimeParts[1]);
                }
            }

            if (data.product.location_id) {
                $('#location_id').val(data.product.location_id);
            } else {
                $('#location_id').val('0');
            }
            if (data.image) {
                $('#image').attr('src', '/public/uploads/products/' + data.image.picture).show();
                $('#picture').prop('required', false);
                imageFromDb = '/public/uploads/products/' + data.image.picture;
            }
            if (data.product.active == 1) {
                $('#active').iCheck('check');
            } else {
                $('#active').iCheck('uncheck');
            }
            
            if (data.product.is_maintenance == 1) {
                $('#is_maintenance').iCheck('check');
                $('#maintenance-message-group').show();
                $('#maintenance_message').val(data.translation ? data.translation.maintenance_message : '');
            } else {
                $('#is_maintenance').iCheck('uncheck');
                $('#maintenance-message-group').hide();
            }

            CKEDITOR.instances['description'].setData(data.translation ? data.translation.description : '');
            CKEDITOR.instances['content'].setData(data.translation ? data.translation.content : '');
        },
        error: function (error) {
            console.log(error);
        }
    })
}
