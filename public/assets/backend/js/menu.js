function alertDelete(id) {
  $('#myModal').data('id', id);
  $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
  e.preventDefault();
  window.location.href = "menu/delete" + "?id=" + $('#myModal').data('id');
});
function deleteImg(){
    window.location.href = "menu/delete-img" + '?id=' + $('#langModal').data('id');
}
function alertLang(id) {
  $('#langModal').data('id', id);
  $('#langModal').modal('toggle');
}
$('#menuModal').on('show.bs.modal', function() {
    $('#div-image').hide();
});
$('#menuModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#name').val('');
    $('body').css('padding-right', '');
    $('#div-image').hide();
    $('#div-toggle').show();
    $('#lang_code').text('VI');
    $('#language_id').val('1')
    $('#picture').val('');
});
function getMenu(langId, langCode){
    $('#langModal').modal('hide');
    $('#lang_code').text(langCode);
    $.ajax({
        type: 'GET',
        url: 'menu/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
        success: function(data){
            $('#id').val(data.menu.id);
            $('#language_id').val(langId);
            $('#name').val(data.translation ? data.translation.name : '');

            if(langId == 1){
                if (data.menu.menu_fk) {
                    $('#menu_fk').val(data.menu.menu_fk); 
                } else {
                    $('#menu_fk').val('0'); 
                }

                if (data.menu.image) {
                    $('#div-image').show();
                    $('#image').attr('src', '/public/uploads/menus/' + data.menu.image.picture).show();
                }
            }else{
                $('#div-toggle').hide();
            }   
        },
        error: function(error){
            console.log(error);
        }
    })
}
