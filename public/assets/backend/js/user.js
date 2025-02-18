function alertDelete(id) {
  $('#myModal').data('id', id);
  $('#myModal').modal('toggle');
}
$('#myModal button.delete').on('click', function(e) {
  e.preventDefault()
  window.location.href = "user/delete" + "?id=" + $('#myModal').data('id');
});
$('#userModal').on('hidden.bs.modal', function() {
    $('#id').val('');
    $('#user_name').val('');
    $('#password').val('');
    $('#password_confirmation').val('');
    $('#name').val('');
    $('#email').val('');
    $('#phone').val('');
    $('#birthday').val('');
    $('#super_user').iCheck('uncheck');
    $('#image').hide();
    $('#picture').val('');
    $('#password').prop('required', true);
});

function getUser(id){
    $.ajax({
        type: 'GET',
        url: 'user/edit' + '?id=' + id,
        success: function(data){
            $('#password').prop('required', false);
            $('#id').val(data.user.id);
            $('#user_name').val(data.user.user_name);
            $('#name').val(data.user.name);
            $('#email').val(data.user.email);
            $('#phone').val(data.user.phone);
            $('#birthday').val(data.user.birthday);
            if (data.user.super_user == 1) {
                $('#super_user').iCheck('check');
            } else {
                $('#super_user').iCheck('uncheck');
            }
            if (data.user.image) {
                $('#image').attr('src', '/public/uploads/users/' + data.user.image.picture).show();
                imageFromDb = '/public/uploads/users/' + data.image.picture;
            } else {
                $('#image').hide();
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}   
