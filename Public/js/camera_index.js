$(document).ready(function () {

    var $post_content = $('#post_content'),
        $the_btn = $('#the_btn');

    $the_btn.on('click', function (e) {
        e.preventDefault();

        var lock = false;
        if (lock) {
            return;
        }
        lock = true;
        $the_btn.prop('disabled', true);
        $.post('',
            {
                post_content: $('#post_content').val()
            },
            function (data) {
                if (data['res'] == 1) {

                    $('#camera_form').submit();

                } else if (data['res'] == 0) {
                    lock = false;
                    $the_btn.prop('disabled', false);
                    $('#error_text').text(data['error']);
                    $('#hint').trigger('click');
                }
            });

    });

});