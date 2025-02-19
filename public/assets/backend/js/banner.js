function alertDelete(id) {
  $('#myModal').data('id', id);
  $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
  e.preventDefault();
  window.location.href = "banner/delete" + "?id=" + $('#myModal').data('id');
});
$('#bannerModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#name').val('');
    $('#item').val('1');
    $('#link').val('');
    $('#active').iCheck('uncheck');
    $('#image').hide();
    $('body').css('padding-right', '');
    $('#picture').val('');
    $('#picture').prop('required', true);
});

function getBanner(bannerId){
    $('#bannerModal').modal('toggle');
    $.ajax({
        type: 'GET',
        url: 'banner/edit' + '?id=' + bannerId,
        success: function(data){
            $('#id').val(data.banner.id);
            $('#name').val(data.banner.name ?? '');
            $('#link').val(data.banner.link ?? '');
            $('#item').val(data.banner.item ?? '');
            if (data.banner.image) {
                $('#picture').prop('required', false);  
                $('#image').attr('src', '/public/uploads/banners/' + data.banner.image.picture).show();
                imageFromDb = '/public/uploads/banners/' + data.banner.image.picture;
            }
            if (data.banner.active == 1) {
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