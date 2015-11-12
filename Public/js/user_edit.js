$(document).ready(function () {

    var $user_email = $('#user_email'),
        $user_old_password = $('#user_old_password'),
        $user_new_password = $('#user_new_password'),
        $user_new_password_again = $('#user_new_password_again'),
        $user_realname = $('#user_realname'),
        $user_nickname = $('#user_nickname'),
        $user_tel = $('#user_tel'),
        $user_info = $('#user_info'),
        $user_sex = $('input[name="user_sex_radio"]'),
        $register_btn = $('#register_btn'),
        $back_btn = $('.back-btn');

    $back_btn.on('click', function (e) {
        e.preventDefault();

        $('#hint_back').trigger('click');

    });

    $register_btn.on('click', function (e) {
        e.preventDefault();

        var lock = false;
        if (lock) {
            return;
        }
        lock = true;
        $.post('',
            {
                user_email: $user_email.val(),
                user_old_password: $user_old_password.val(),
                user_new_password: $user_new_password.val(),
                user_new_password_again: $user_new_password_again.val(),
                user_realname: $user_realname.val(),
                user_nickname: $user_nickname.val(),
                user_tel: $user_tel.val(),
                user_sex: $user_sex.val(),
                user_info: $user_info.val()
            },
            function (data) {

                if (data['res'] == 1) {
                    $('#register_form').submit();

                } else if (data['res'] == 0) {
                    lock = false;
                    $register_btn.prop('disabled', false);
                    $('#error_text').text(data['error']);
                    $('#hint').trigger('click');
                }
            });

    });

});
