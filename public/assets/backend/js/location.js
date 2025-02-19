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
      $('#language_id').val('1');
      $('#picturesInput').val('');
      $('#pictures').empty();
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
              if (data.location.images) {
                let picturesDiv = $('#pictures');
                picturesDiv.empty();

                data.location.images.forEach(function (item) {
                    let imageHtml = `
                        <div class="col-md-2" style="flex: 0 0 auto; position: relative; margin-bottom: 10px;">
                            <div class="wrap-btn-delete" style="position: absolute;">
                                <button class="btn-delete-image" data-id="${item.id}" data-location-id="${data.location.id}" style="color: red; font-size: 15px; margin-left: 1px; border-radius:2px; margin-top: 1px; background-color: white; padding: 0 5px; border: none; cursor: pointer;">
                                    <b>x</b>
                                </button>
                            </div>
                            <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="/public/uploads/locations/${item.picture}" alt="Location Image">
                        </div>
                    `;

                    picturesDiv.append(imageHtml);
                });
            }
          },
          error: function(error){
              console.log(error);
          }
      })
  }

  $(document).on('click', '.btn-delete-image', function (e) {
    e.preventDefault();

    let imageId = $(this).data('id');
    let locationId = $(this).data('location-id');

    if (confirm('Bạn có chắc muốn xóa ảnh này không?')) {
        $.ajax({
            url: `/admin/location/delete-img/${imageId}/${locationId}`,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                if (response.success) {
                    let picturesDiv = $('#pictures');
                    picturesDiv.empty();

                    response.location.images.forEach(function (item) {
                        let imageHtml = `
                            <div class="col-md-2" style="flex: 0 0 auto; position: relative; margin-bottom: 10px;">
                                <div class="wrap-btn-delete" style="position: absolute;">
                                    <button class="btn-delete-image" data-id="${item.id}" data-location-id="${locationId}" style="color: red; font-size: 15px; margin-left: 1px; border-radius:2px; margin-top: 1px; background-color: white; padding: 0 5px; border: none; cursor: pointer;">
                                        <b>x</b>
                                    </button>
                                </div>
                                <img style="width: 100px; height: 80px; background-size: contain; display: block;" src="/public/uploads/locations/${item.picture}" alt="Location Image">
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