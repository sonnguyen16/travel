function alertDelete(id, blog_id) {
   $('#myModal').data('id', id);
   $('#myModal').data('blog_id', blog_id);
   $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
   e.preventDefault(); 
   window.location.href = "activity/delete" + "?id=" + $('#myModal').data('id') + "&blog_id=" + $('#myModal').data('blog_id');
});
function alertLang(id) {
    $('#langModal').data('id', id);
    $('#langModal').modal('toggle');
}
$('#activityModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#name').val('');
    $('#active').iCheck('uncheck');
    $('#image').hide();
    $('#div-toggle').show();
    CKEDITOR.instances['content'].setData('') ;
    $('#lang_code').text('VI');
    $('body').css('padding-right', '');
    $('#picture').val('');
    $('#picture').prop('required', true);
    $('#language_id').val('1')
});
function getActivity(langId, langCode){
    $('#langModal').on('hidden.bs.modal', function () {
        $('#activityModal').modal('show');
        $(this).off('hidden.bs.modal');
    });
    $('#langModal').modal('hide'); 
    $('#lang_code').text(langCode);
    $.ajax({
        type: 'GET',
        url: 'activity/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
        success: function(data){
            $('#id').val(data.activity.id);
            $('#language_id').val(langId);
            $('#name').val(data.translation?.name ?? '');
            if(langId == 1){
                $('#div-toggle').show();
            }else{
                $('#div-toggle').hide();
            }
            if (data.activity.image) {
                $('#picture').prop('required', false);  
                $('#image').attr('src', '/public/uploads/activities/' + data.activity.image.picture).show();
                imageFromDb = '/public/uploads/activities/' + data.activity.image.picture;

            }
            if (data.activity.active == 1) {
                $('#active').iCheck('check');
            } else {
                $('#active').iCheck('uncheck');
            }

            CKEDITOR.instances['content'].setData(data.translation ? data.translation.content : '');
        },
        error: function(error){
            console.log(error);
        }
    })
}