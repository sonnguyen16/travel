var imageFromDb = '';
$('#picture').on('change', function(event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
            $('#image').show();
        };
        reader.readAsDataURL(file);
    } else {
        if (imageFromDb != ''){
            $('#image').attr('src', imageFromDb).show();
        }else{
            $('#image').attr('src', imageFromDb).hide();
        }
    }
});
var imageFromDbP = '';
$('#picture_p').on('change', function(event) {
    var file = event.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_p').attr('src', e.target.result);
            $('#image_p').show();
        };
        reader.readAsDataURL(file);
    } else {
        if (imageFromDbP != ''){
            $('#image_p').attr('src', imageFromDbP).show();
        }else{
            $('#image_p').attr('src', imageFromDbP).hide();
        }
    }
});
$(function () {
    $('input[type="checkbox"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green'
    });
})
function clearSearch() {
    document.getElementById('search').value = '';
    document.getElementById('search-form').submit();
}
document.addEventListener("DOMContentLoaded", function () {
    const alertElement = document.querySelector(".alert");
    if (alertElement) {
        alertElement.classList.add("show");
        setTimeout(() => {
            alertElement.classList.remove("show");
            alertElement.style.display = "none";
        }, 15000);
    }
});
function getProfile(id){
    $.ajax({
        type: 'GET',
        url: 'user/edit' + '?id=' + id,
        success: function(data){
            $('#id_p').val(data.user.id);
            $('#user_name_p').val(data.user.user_name);
            $('#name_p').val(data.user.name);
            $('#email_p').val(data.user.email);
            $('#phone_p').val(data.user.phone);
            $('#birthday_p').val(data.user.birthday);
            $('#super_user_p').val(data.user.super_user);
            if (data.user.image) {
                $('#image_p').attr('src', '/public/uploads/users/' + data.user.image.picture).show();
                imageFromDbP = '/public/uploads/users/' + data.user.image.picture;
                $('#image_p').show();
            }else{
                $('#image_p').hide();
            }
        },
        error: function(error){
            console.log(error);
        }
    })
}   
