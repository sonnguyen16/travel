function alertDelete(id) {
   $('#myModal').data('id', id);
   $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
   e.preventDefault();
   window.location.href = "recruitment/delete" + "?id=" + $('#myModal').data('id');
});

function alertLang(id) {
  $('#langModal').data('id', id);
  $('#langModal').modal('toggle');
}
$('#recruitmentModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#name').val('');
    $('#address').val('');
    $('#salary').val('');
    $('#working_form').val('');
    $('#deadline').val('');
    // $('#unit_id').val('0');
    $('#unit').val('');
    $('#department').val('');
    $('#active').iCheck('uncheck');
    $('#image').hide();
    $('#div-toggle').show();
    CKEDITOR.instances['description'].setData(''); 
    $('#lang_code').text('VI');
    $('body').css('padding-right', '');
    $('#picture').prop('required', true);
    $('#picture').val('');
    $('#language_id').val('1')
});
function getRecruitment(langId, langCode){
    $('#langModal').on('hidden.bs.modal', function () {
        $('#recruitmentModal').modal('show');
        $(this).off('hidden.bs.modal');
    });
    $('#langModal').modal('hide'); 
    $('#lang_code').text(langCode);  
    $.ajax({
        type: 'GET',
        url: 'recruitment/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
        success: function(data){
            $('#id').val(data.recruitment.id);
            $('#language_id').val(langId);
            $('#name').val(data.translation?.name ?? '');
            $('#address').val(data.translation?.address ?? '');
            $('#deadline').val(data.recruitment.deadline ?? '');
            $('#salary').val(data.translation?.salary ?? '');
            $('#working_form').val(data.translation?.working_form ?? '');
            $('#unit').val(data.translation?.unit ?? '');
            $('#department').val(data.translation?.department ?? '');
            if (data.image) {
                $('#image').attr('src', '/public/uploads/recruitments/' + data.image.picture).show();
                $('#picture').prop('required', false);
                imageFromDb = '/public/uploads/recruitments/' + data.image.picture;

            }
            if (data.recruitment.active == 1) {
                $('#active').iCheck('check');
            } else {
                $('#active').iCheck('uncheck');
            }

            CKEDITOR.instances['description'].setData(data.translation ? data.translation.description : ''); 
        },
        error: function(error){
            console.log(error);
        }
    })
}