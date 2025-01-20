
function alertDelete(id) {
   $('#myModal').data('id', id);
   $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
   e.preventDefault(); 
   window.location.href = "blog/delete" + "?id=" + $('#myModal').data('id');
});
function alertLang(id, isDiemDen) {
    $('#langModal').data('id', id);
    if (isDiemDen) {
        $("#gotoActivity").show();

        $("#gotoActivity").on("click", function () {
            window.location.href = "/admin/blog/activity" + "?blog_id=" + id;
        });
    } else {
        $("#gotoActivity").hide();
    }
    $('#langModal').modal('toggle');
}
$('#blogModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#name').val('');
    $('#menu_id').val('2'); 
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
function getBlog(langId, langCode){
    $('#langModal').on('hidden.bs.modal', function () {
        $('#blogModal').modal('show');
        $(this).off('hidden.bs.modal');
    });
    $('#langModal').modal('hide'); 
    $('#lang_code').text(langCode); 
    $.ajax({
        type: 'GET',
        url: 'blog/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
        success: function(data){
            $('#id').val(data.blog.id);
            $('#language_id').val(langId);
            $('#name').val(data.translation?.name ?? '');
            $('#menu_id').val(data.blog.menu_id); 
            if (data.image) {
                $('#image').attr('src', '/public/uploads/blogs/' + data.image.picture).show();
                $('#picture').prop('required', false); 
            }
            if (data.blog.active == 1) {
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
                                <a href="/admin/blog/delete-img/${item.id}">
                                    <span class="btn-delete-image" style="color: red; font-size: 15px; margin-left: 1px; background-color: white; padding: 0 5px"><b>x</b></span>
                                </a>
                            </div>
                            <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="/public/uploads/blogs/${item.picture}" alt="Blog Image">
                        </div>
                    `;

                    picturesDiv.append(imageHtml);
                });
            }
            CKEDITOR.instances['description'].setData(data.translation?.description ?? '') 
            CKEDITOR.instances['content'].setData(data.translation?.content ?? '') 
        },
        error: function(error){
            console.log(error);
        }
    })
}