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
    $('#menu_id').val('4');
    $('#active').iCheck('uncheck');
    $('#image').hide();
    $('#div-toggle').show();
    CKEDITOR.instances['description'].setData('')
    CKEDITOR.instances['content'].setData('')
    $('#lang_code').text('VI');
    $('body').css('padding-right', '');
    $('#picture').prop('required', true);
    $('#picture').val('');
    $('#pictures').empty();
    $('#language_id').val('1')
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

            if (data.product.menu_id) {
                $('#menu_id').val(data.product.menu_id);
            } else {
                $('#menu_id').val('0');
            }
            if (data.image) {
                $('#image').attr('src', '/public/uploads/products/' + data.image.picture).show();
                $('#picture').prop('required', false);
            }
            if (data.product.active == 1) {
                $('#active').iCheck('check');
            } else {
                $('#active').iCheck('uncheck');
            }

            if (data.images) {
                let picturesDiv = $('#pictures');
                picturesDiv.empty();

                data.images.forEach(function (item) {
                    let imageHtml = `
                        <div class="col-md-2" style="flex: 0 0 auto; position: relative; ">
                            <div class="wrap-btn-delete" style="position: absolute;">
                                <a href="/admin/product/delete-img/${item.id}">
                                    <span class="btn-delete-image" style="color: red; font-size: 15px; margin-left: 1px; background-color: white; padding: 0 5px"><b>x</b></span>
                                </a>
                            </div>
                            <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="/public/uploads/products/${item.picture}" alt="Product Image">
                        </div>
                    `;

                    picturesDiv.append(imageHtml);
                });
            }
            CKEDITOR.instances['description'].setData(data.translation?.description ?? '')
            CKEDITOR.instances['content'].setData(data.translation?.content ?? '')
        },
        error: function (error) {
            console.log(error);
        }
    })
}