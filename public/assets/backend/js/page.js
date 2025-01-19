function alertDelete(id) {
    $('#myModal').data('id', id);
    $('#myModal').modal('toggle');
 }
 $('#myModal button.delete').on('click', function(e) {
    e.preventDefault(); 
    window.location.href = "page/delete" + "?id=" + $('#myModal').data('id');
 });
 function alertLang(id) {
   $('#langModal').data('id', id);
   $('#langModal').modal('toggle');
 }

 $('#pageModal').on('hidden.bs.modal', function() {
     $('#id').val('');
     $('#name').val('');
     $('#description').val('');
     CKEDITOR.instances['content'].setData('');
     $('#lang_code').text('VI');
     $('body').css('padding-right', '');
     $('#language_id').val('1')
 });
 function getPage(langId, langCode){
     $('#langModal').on('hidden.bs.modal', function () {
         $('#pageModal').modal('show');
         $(this).off('hidden.bs.modal');
     });
     $('#langModal').modal('hide');
     $('#lang_code').text(langCode);
     $.ajax({
         type: 'GET',
         url: 'page/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
         success: function(data){
             $('#id').val(data.page.id);
             $('#language_id').val(langId);
             $('#name').val(data.translation?.name ?? '');
             $('#description').val(data.translation?.description ?? '');
             CKEDITOR.instances['content'].setData(data.translation?.content ?? '')  
         },
         error: function(error){
             console.log(error);
         }
     })
 }