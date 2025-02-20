var imageFromDb = '';

function checkMenuSelection() {
    var selectedValue = $("#menu_id").val();

    // Ẩn tất cả trước
    $("#type_child").hide();
    $("#type_child select").prop('required', false).val(""); // Xóa required & reset value
    $("#type_menu").removeClass("col-md-3").addClass("col-md-6");

    // Kiểm tra giá trị được chọn
    if (selectedValue == 2) {
        $("#type_child").show();
        $("#type_menu").removeClass("col-md-6").addClass("col-md-3");

        // Chỉ hiển thị "Loại tin tức"
        $("#news_id").closest('.form-group').show();
        $("#news_id").prop('required', true);

        // Ẩn "Thuộc địa điểm"
        $("#news_id").closest('.form-group').next().hide();
        $("#news_id").closest('.form-group').next().find("select").prop('required', false).val("");
    } else if (selectedValue == 7) {
        $("#type_child").show();
        $("#type_menu").removeClass("col-md-6").addClass("col-md-3");

        // Ẩn "Loại tin tức"
        $("#news_id").closest('.form-group').hide();
        $("#news_id").prop('required', false).val("");

        // Hiển thị "Thuộc địa điểm"
        var locationSelect = $("#news_id").closest('.form-group').next();
        locationSelect.show();
        locationSelect.find("select").prop('required', true);
    }
}

$("#menu_id").change(checkMenuSelection);

function alertDelete(id) {
    $('#myModal').data('id', id);
    $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function (e) {
    e.preventDefault();
    window.location.href = "blog/delete" + "?id=" + $('#myModal').data('id');
});
function alertLang(id, isDiemDen) {
    $('#langModal').data('id', id);
    $("#gotoActivity").on("click", function () {
        window.location.href = "/admin/blog/activity" + "?blog_id=" + id;
    });
    // if (isDiemDen) {
    //     $("#gotoActivity").show();

    //     $("#gotoActivity").on("click", function () {
    //         window.location.href = "/admin/blog/activity" + "?blog_id=" + id;
    //     });
    // } else {
    //     $("#gotoActivity").hide();
    // }
    $('#langModal').modal('toggle');
}
$('#blogModal').on('show.bs.modal', function () {
    checkMenuSelection();
});
$('#blogModal').on('hidden.bs.modal', function () {
    $('#id').val('');
    $('#name').val('');
    $('#menu_id').val('2');
    $('#news_id').val('');
    $('#address').val('');
    $('#location_id').val('');
    $('#active').iCheck('uncheck');
    $('#image').hide();
    $('#div-toggle').show();
    CKEDITOR.instances['description'].setData('');
    CKEDITOR.instances['content'].setData('');
    $('#lang_code').text('VI');
    $('body').css('padding-right', '');
    $('#picture').prop('required', true);
    $('#picture').val('');
    $('#pictures').empty();
    $('#picturesInput').val('');
    $('#language_id').val('1')
});
function getBlog(langId, langCode) {
    $('#langModal').on('hidden.bs.modal', function () {
        $('#blogModal').modal('show');
        checkMenuSelection();
        $(this).off('hidden.bs.modal');
    });
    $('#langModal').modal('hide');
    $('#lang_code').text(langCode);
    $.ajax({
        type: 'GET',
        url: 'blog/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
        success: function (data) {
            $('#id').val(data.blog.id);
            $('#language_id').val(langId);
            $('#name').val(data.translation?.name ?? '');
            $('#menu_id').val(data.blog.menu_id);
            setTimeout(() => {
                $("#news_id").val(data.blog.news_id).trigger("change");
                $("#location_id").val(data.blog.location_id).trigger("change");
            }, 300);
            checkMenuSelection();
            if (data.image) {
                $('#image').attr('src', '/public/uploads/blogs/' + data.image.picture).show();
                $('#picture').prop('required', false);
                imageFromDb = '/public/uploads/blogs/' + data.image.picture;
            }
            if (data.blog.active == 1) {
                $('#active').iCheck('check');
            } else {
                $('#active').iCheck('uncheck');
            }
            $('#address').val(data.translation?.address ?? '');
            if (data.images) {
                let picturesDiv = $('#pictures');
                picturesDiv.empty();

                data.images.forEach(function (item) {
                    let imageHtml = `
                        <div class="col-md-2" style="flex: 0 0 auto; position: relative; margin-bottom: 10px;">
                            <div class="wrap-btn-delete" style="position: absolute;">
                                <!-- Thêm thuộc tính data-id và data-blog-id -->
                                <button class="btn-delete-image" data-id="${item.id}" data-blog-id="${data.blog.id}" data-lang-id="${langId}" style="color: red; font-size: 15px; margin-left: 1px; border-radius:2px; margin-top: 1px; background-color: white; padding: 0 5px; border: none; cursor: pointer;">
                                    <b>x</b>
                                </button>
                            </div>
                            <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="/public/uploads/blogs/${item.picture}" alt="Blog Image">
                        </div>
                    `;

                    picturesDiv.append(imageHtml);
                });
            }


            CKEDITOR.instances['description'].setData(data.translation ? data.translation.description : '');
            CKEDITOR.instances['content'].setData(data.translation ? data.translation.content : '');
        },
        error: function (error) {
            console.log(error);
        }
    })
}

$(document).on('click', '.btn-delete-image', function (e) {
    e.preventDefault();

    let imageId = $(this).data('id');
    let blogId = $(this).data('blog-id');
    let langId = $(this).data('lang-id');

    if (confirm('Bạn có chắc muốn xóa ảnh này không?')) {
        $.ajax({
            url: `/admin/blog/delete-img/${imageId}/${blogId}/${langId}`,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                if (response.success) {
                    let picturesDiv = $('#pictures');
                    picturesDiv.empty();

                    response.images.forEach(function (item) {
                        let imageHtml = `
                            <div class="col-md-2" style="flex: 0 0 auto; position: relative; margin-bottom: 10px;">
                                <div class="wrap-btn-delete" style="position: absolute;">
                                    <button class="btn-delete-image" data-id="${item.id}" data-blog-id="${blogId}" data-lang-id="${langId}" style="color: red; font-size: 15px; margin-left: 1px; border-radius:2px; margin-top: 1px; background-color: white; padding: 0 5px; border: none; cursor: pointer;">
                                        <b>x</b>
                                    </button>
                                </div>
                                <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="/public/uploads/blogs/${item.picture}" alt="Blog Image">
                            </div>
                        `;
                        picturesDiv.append(imageHtml);
                    });
                } else {
                    alert('Xóa ảnh không thành công: ' + response.message);
                }
            },
            error: function () {
                alert('Đã xảy ra lỗi, vui lòng thử lại.');
            },
        });
    }
});

$('#picture').on('change', function(event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
            $('#image').show();
        };
        reader.readAsDataURL(file);
    } else {
        if (imageFromDb != ''){
            $('#image').attr('src', imageFromDb).show();
        }else{
            $('#image').attr('src', imageFromDb).hide();
        }
    }
});

$('#picturesInput').on('change', function(event) {
    var files = event.target.files; 
    var picturesDiv = $('#pictures');
    
    picturesDiv.find('.new-image').remove();

    if (files.length === 0) {
        return;
    }

    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();
        
        reader.onload = function(e) {
            var imageHtml = `
                <div class="col-md-2 new-image" style="flex: 0 0 auto; position: relative; margin-bottom: 10px;">
                    <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="${e.target.result}" alt="Selected Image">
                </div>
            `;
            picturesDiv.append(imageHtml);
        };
        
        reader.readAsDataURL(file);
    }
});