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
