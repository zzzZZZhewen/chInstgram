var auto_more = false;
var $page = 0;

var like_auto_more = false;
var $like_page = 0;

var tab = "list";
var $albumLoaded = false;
var $likesLoaded = false;

$(document).ready(function () {
    var $user_id = $(".wrapper").attr('id');

    $.post('more_user_posts',
        {
            page: $page,
            user_id: $user_id,
        },
        function (data) {
            $(data).appendTo($('.posts-div')).hide().fadeIn(1000);
            $('#more-post').removeClass('hidden');
            $('footer').removeClass('hidden');
            $page++;
        });

    $('#more-post').on('click', function () {
        $('#more-post').hide();

        $.post('more_user_posts',
            {
                page: $page,
                user_id: $user_id,
            },
            function (data) {
                $(data).appendTo($('.posts-div')).hide().fadeIn(1000);
                auto_more = true;
                $page++;
            });

    });

    $('#more-like').on('click', function () {
        $('#more-like').hide();

        $.post('more_like_posts',
            {
                page: $like_page,
                user_id: $user_id,
            },
            function (data) {
                $(data).appendTo($('.likes-div')).hide().fadeIn(1000);
                like_auto_more = true;
                $like_page++;
            });

    });

    var $contentLoadTriggered = false;
    $(window).on('scroll',
        function () {
            if (tab == "list" && auto_more && ($(document).scrollTop() >= $(document).height() - $(window).height())
                && !$contentLoadTriggered) {
                $contentLoadTriggered = true;

                $.post('more_user_posts',
                    {
                        page: $page,
                        user_id: $user_id
                    },
                    function (data) {
                        $(data).appendTo($('.posts-div')).hide().fadeIn(1000);
                        $page++;
                        $contentLoadTriggered = false;
                    });
            }
            if (tab == "likes" && like_auto_more && ($(document).scrollTop() >= $(document).height() - $(window).height())
                && !$contentLoadTriggered) {
                $contentLoadTriggered = true;

                $.post('more_like_posts',
                    {
                        page: $like_page,
                        user_id: $user_id
                    },
                    function (data) {
                        $(data).appendTo($('.likes-div')).hide().fadeIn(1000);
                        $like_page++;
                        $contentLoadTriggered = false;
                    });
            }
        }
    );


});

function loadalbum($user_id,$page) {
    tab = "album";
    if (!($page == 0 && $albumLoaded))
        $.post('more_album',
            {
                user_id: $user_id,
                page: $page

            },
            function (data) {
                $albumLoaded = true;
                $("#more-album-btn-" + $user_id + "-" + $page).remove();
                $(data).appendTo($('.media-gal')).hide().fadeIn(1000);
            });
}

function loaduserpost($user_id,$page) {
    tab = "list";
}
function loadlikes($user_id,$page) {
    tab = "likes";
    if ($page == 0)
    $.post('more_like_posts',
        {
            page: $like_page,
            user_id: $user_id,
        },
        function (data) {
            $(data).appendTo($('.likes-div')).hide().fadeIn(1000);
            $('#more-like').removeClass('hidden');
            $like_page++;
        });
}

function loadbigpic($url) {
    $(".img-modal img").attr("src",$url);
}