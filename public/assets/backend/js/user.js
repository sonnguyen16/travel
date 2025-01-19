function clearSearch() {
    document.getElementById('search').value = '';
    document.getElementById("search-form").submit();
}
$(function () {
    $('input[type="checkbox"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green'
    });
})

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
    $('input[name="sex"][value="1"]').prop('checked', true);
    $('#super_user').iCheck('uncheck');
    $('#image').hide();
    $('#picture').val('');
});

function getUser(id){
    $.ajax({
        type: 'GET',
        url: 'user/edit' + '?id=' + id,
        success: function(data){
            $('#id').val(data.user.id);
            $('#user_name').val(data.user.user_name);
            $('#name').val(data.user.name);
            $('#email').val(data.user.email);
            $('#phone').val(data.user.phone);
            $('#birthday').val(data.user.birthday);
            $('input[name="sex"][value="' + data.user.sex + '"]').prop('checked', true);
            if (data.user.super_user == 1) {
                $('#super_user').iCheck('check');
            } else {
                $('#super_user').iCheck('uncheck');
            }
            if (data.user.image) {
                $('#image').attr('src', '/public/uploads/users/' + data.user.image.picture).show();
            } else {
                $('#image').hide();
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}