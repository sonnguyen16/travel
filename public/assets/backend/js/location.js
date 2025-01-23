function alertDelete(id) {
    $('#myModal').data('id', id);
    $('#myModal').modal('toggle');
  }
  $('#myModal button.delete').on('click', function(e) {
    e.preventDefault();
    window.location.href = "location/delete" + "?id=" + $('#myModal').data('id');
  });

  function alertLang(id) {
    $('#langModal').data('id', id);
    $('#langModal').modal('toggle');
  }

  $('#locationModal').on('hidden.bs.modal', function() {
      $('#id').val('');
      $('#name').val('');
      $('body').css('padding-right', '');
      $('#lang_code').text('VI');
      $('#language_id').val('1')
  });
  function getLocation(langId, langCode){
      $('#langModal').modal('hide');
      $('#lang_code').text(langCode);
      $.ajax({
          type: 'GET',
          url: 'location/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
          success: function(data){
              $('#id').val(data.location.id);
              $('#language_id').val(langId);
              $('#name').val(data.translation ? data.translation.name : '');
          },
          error: function(error){
              console.log(error);
          }
      })
  }
  