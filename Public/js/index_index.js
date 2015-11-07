$(document).ready(function () {


    $('#logout_btn').on('click', function (e) {
        e.preventDefault();

        $.post('/Home/User/logout',
            {
                action: 'logout',
            },
            function (data) {
                if (data['res'] == 1) {
                    window.location.href = "/Home/User/Login";
                } else if (data['res'] == 0) {

                }
            });

    });

});