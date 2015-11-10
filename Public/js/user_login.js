$(document).ready(function () {

    var $user_email = $('#user_email'),
        $user_password = $('#user_password');

    $('#login_btn').on('click', function (e) {
        e.preventDefault();

        $.post('',
            {
                user_email: $user_email.val(),
                user_password: $user_password.val()
            },
            function (data) {
                if (data['res'] == 1) {
                    $('#login_form').submit();
                } else if (data['res'] == 0) {
                    $('#login_hint_btn').trigger('click');
                }
            });
    });

});