function alertDelete(id) {
  $('#myModal').data('id', id);
  $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
  e.preventDefault();
  window.location.href = "banner/delete" + "?id=" + $('#myModal').data('id');
});
// Kiểm tra và hiển thị trường chọn nhiều hình ảnh dựa trên tên banner
function toggleMultipleImagesField() {
    if ($('#name').val() === 'Banner trang chủ') {
        $('.single-image').hide();
        $('.multiple-images').show();
        $('#picture').prop('required', false);
    } else {
        $('.single-image').show();
        $('.multiple-images').hide();
        $('#pictures-input').val('');
        $('#pictures-preview').empty();
    }
}

// Xử lý khi tên banner thay đổi
$('#name').on('change', function() {
    toggleMultipleImagesField();
});

$('#bannerModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#name').val('');
    // $('#item').val('1');
    // $('#link').val('');
    // $('#active').iCheck('uncheck');
    $('#image').hide();
    $('body').css('padding-right', '');
    $('#picture').val('');
    $('#picture').prop('required', true);
    $('#pictures-input').val('');
    $('#pictures-preview').empty();
    $('#existing-images').empty();
    $('.single-image').show();
    $('.multiple-images').hide();
});

// Xử lý xem trước nhiều hình ảnh
$('#pictures-input').on('change', function(event) {
    var files = event.target.files;
    var previewDiv = $('#pictures-preview');

    previewDiv.empty();

    if (files.length === 0) {
        return;
    }

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onload = function(e) {
            var imageHtml = `
                <div class="col-md-4 mb-2">
                    <img src="${e.target.result}" class="img-thumbnail" style="height: 150px; object-fit: cover;">
                </div>
            `;
            previewDiv.append(imageHtml);
        };

        reader.readAsDataURL(file);
    }
});

// Hàm xóa hình ảnh
function deleteImage(imageId) {
    if (confirm('Bạn có chắc chắn muốn xóa hình ảnh này?')) {
        $.ajax({
            type: 'POST',
            url: 'banner/delete-image',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                image_id: imageId
            },
            success: function(response) {
                if (response.success) {
                    // Xóa phần tử HTML
                    $(`input[name="existing_images[]"][value="${imageId}"]`).closest('.existing-image-container').remove();
                }
            },
            error: function(error) {
                console.log(error);
                alert('Có lỗi xảy ra khi xóa hình ảnh!');
            }
        });
    }
}

function getBanner(bannerId){
    $('#bannerModal').modal('toggle');
    $.ajax({
        type: 'GET',
        url: 'banner/edit' + '?id=' + bannerId,
        success: function(data){
            $('#id').val(data.banner.id);
            $('#name').val(data.banner.name ?? '');
            // $('#link').val(data.banner.link ?? '');
            // $('#item').val(data.banner.item ?? '');

            // Kiểm tra và hiển thị trường chọn nhiều hình ảnh dựa trên tên banner
            toggleMultipleImagesField();

            if (data.banner.picture) {
                $('#picture').prop('required', false);
                $('#image').attr('src', '/public/uploads/banners/' + data.banner.picture).show();
                imageFromDb = '/public/uploads/banners/' + data.banner.picture;
            }

            // Hiển thị các hình ảnh đã tồn tại nếu là Banner trang chủ
            if (data.banner.name === 'Banner trang chủ' && data.banner.images && data.banner.images.length > 0) {
                $('#existing-images').empty();
                data.banner.images.forEach(function(image) {
                    var imageHtml = `
                        <div class="col-md-4 mb-2 existing-image-container">
                            <div class="position-relative">
                                <img src="/public/uploads/banners/${image.picture}" class="img-thumbnail" style="height: 150px; object-fit: cover;">
                                <button type="button" class="btn btn-danger btn-sm" style="position: absolute; top: -5px; right: 5px;"
                                    onclick="deleteImage(${image.id})">
                                    <i class="fa fa-times"></i>
                                </button>
                                <input type="hidden" name="existing_images[]" value="${image.id}">
                            </div>
                        </div>
                    `;
                    $('#existing-images').append(imageHtml);
                });
            }

            // if (data.banner.active == 1) {
            //     $('#active').iCheck('check');
            // } else {
            //     $('#active').iCheck('uncheck');
            // }
        },
        error: function(error){
            console.log(error);
        }
    })
}
