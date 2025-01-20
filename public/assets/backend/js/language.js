function alertDelete(id) {
    $('#myModal').data('id', id);
    $('#myModal').modal('toggle');
  }
  $('#myModal button.delete').on('click', function(e) {
    e.preventDefault();
    window.location.href = "language/delete" + "?id=" + $('#myModal').data('id');
  });
  $('#languageModal').on('hidden.bs.modal', function() {
      $('#id').val('');
      $('#name').val('');
      $('#code').val('');
      $('#active').iCheck('uncheck');
  });

  function getLanguage(id){
      $.ajax({
          type: 'GET',
          url: 'language/edit' + '?id=' + id,
          success: function(data){
              $('#id').val(data.language.id);
              $('#name').val(data.language.name);
              $('#code').val(data.language.code);
              if (data.language.active == 1) {
                  $('#active').iCheck('check');
              } else {
                  $('#active').iCheck('uncheck');
              }
          },
          error: function(error){
              console.log(error);
          }
      })
  }