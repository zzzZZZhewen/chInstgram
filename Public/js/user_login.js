$(document).ready(function () {

    $user_emal_input = $('#user_email_input');
    $user_password_input = $('#user_password_input');

    $('#login_btn').on('click', function (e) {
        e.preventDefault();


        $.post('/Home/User/login',
            {
                action: 'login',
                user_email: $user_emal_input.val(),
                user_password: $user_password_input.val()
            },
            function (data) {
                if (data['res'] == 1) {
                    window.location.href="/Home/Index/index";
                } else if (data['res'] == 0) {

                }
            });
    });

});