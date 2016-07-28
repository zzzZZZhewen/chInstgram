var last_user_datetime;
var opponent = $(".wrapper").attr('id');
$(document).ready(function () {
    var $user_id = $(".wrapper").attr('id');
    onloadchat($user_id);
    $(".chat-form").submit(function() {
        onaddmessage($user_id);
        return false;
    });
});

function onloadchat(user_id){
    $.post('more_message',
        {
            user_id: user_id,
        },
        function (data) {
            if (!data['res']) {
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');

            } else {
                last_user_datetime = data['last_user_datetime'];
                $(data['content']).prependTo($('.chats')).hide().fadeIn(1000);
                $('.panel').scrollTop(100000);
                setTimeout(continueload,5000)
            }

        });
}

function continueload(){
    $.post('continue_load_message',
        {
            user_id: opponent,
            last_user_datetime: last_user_datetime
        },
        function (data) {
            if (!data['res']) {
                setTimeout(continueload, 5000);
            } else {
                last_user_datetime = data['last_user_datetime'];
                $(data['content']).appendTo($('.chats')).hide().fadeIn(1000);
                $('.panel').scrollTop(100000);
                setTimeout(continueload, 1000);
            }
        });
}


function onaddmessage(user_id) {
    $.post('add_message',
        {
            user_id: user_id,
            message_content:$('#message-input').val()

        },
        function (data) {
            if (!data['res']) {
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');

            } else {
                $('#message-input').val("");
                $(data['content']).appendTo($('.chats')).hide().fadeIn(1000);
                $('.panel').scrollTop(100000);
            }
        });
}
