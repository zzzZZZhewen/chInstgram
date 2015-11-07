$(document).ready(function () {

    $user_email_input = $('#user_email_input');
    $user_password_input = $('#user_password_input');
    $user_password_again_input = $('#user_password_again_input');
    $user_realname_input = $('#user_realname_input');
    $user_nickname_input = $('#user_nickname_input');
    $user_tel_input = $('#user_tel_input');
    $user_sex_radio = $('inpu[name="user_sex_radio"]');

    $('#register_btn').on('click', function (e) {
        e.preventDefault();



        $.post('/Home/User/register',
            {
                action: 'register',
                user_email: $user_email_input.val(),
                user_password: $user_password_input.val(),
                user_password_again: $user_password_again_input.val(),
                user_realname: $user_realname_input.val(),
                user_nickname: $user_nickname_input.val(),
                user_tel: $user_tel_input.val(),
                user_sex: $user_sex_radio.val(),
            },
            function (data) {
                if (data['res'] == 1) {
                    window.location.href = "/Home/User/Login";
                } else if (data['res'] == 0) {
                    $('#error_text').text(data['error']);
                    $('#hint').trigger('click');
                }
            });

    });

});