(function () {
    "use strict";

    // custom scrollbar

    //$("html").niceScroll({
    //    styler: "fb",
    //    cursorcolor: "#65cea7",
    //    cursorwidth: '6',
    //    cursorborderradius: '0px',
    //    background: '#424f63',
    //    spacebarenabled: false,
    //    cursorborder: '0',
    //    zindex: '1000'
    //});

    //$(".left-side").niceScroll({
    //    styler: "fb",
    //    cursorcolor: "#65cea7",
    //    cursorwidth: '3',
    //    cursorborderradius: '0px',
    //    background: '#424f63',
    //    spacebarenabled: false,
    //    cursorborder: '0'
    //});


    $(".left-side").getNiceScroll();
    if ($('body').hasClass('left-side-collapsed')) {
        $(".left-side").getNiceScroll().hide();
    }


    // Toggle Left Menu
    jQuery('.menu-list > a').click(function () {

        var parent = jQuery(this).parent();
        var sub = parent.find('> ul');

        if (!jQuery('body').hasClass('left-side-collapsed')) {
            if (sub.is(':visible')) {
                sub.slideUp(200, function () {
                    parent.removeClass('nav-active');
                    jQuery('.main-content').css({height: ''});
                    mainContentHeightAdjust();
                });
            } else {
                visibleSubMenuClose();
                parent.addClass('nav-active');
                sub.slideDown(200, function () {
                    mainContentHeightAdjust();
                });
            }
        }
        return false;
    });

    function visibleSubMenuClose() {
        jQuery('.menu-list').each(function () {
            var t = jQuery(this);
            if (t.hasClass('nav-active')) {
                t.find('> ul').slideUp(200, function () {
                    t.removeClass('nav-active');
                });
            }
        });
    }

    function mainContentHeightAdjust() {
        // Adjust main content height
        var docHeight = jQuery(document).height();
        if (docHeight > jQuery('.main-content').height())
            jQuery('.main-content').height(docHeight);
    }

    //  class add mouse hover
    jQuery('.custom-nav > li').hover(function () {
        jQuery(this).addClass('nav-hover');
    }, function () {
        jQuery(this).removeClass('nav-hover');
    });


    // Menu Toggle
    jQuery('.toggle-btn').click(function () {
        $(".left-side").getNiceScroll().hide();

        if ($('body').hasClass('left-side-collapsed')) {
            $(".left-side").getNiceScroll().hide();
        }
        var body = jQuery('body');
        var bodyposition = body.css('position');

        if (bodyposition != 'relative') {

            if (!body.hasClass('left-side-collapsed')) {
                body.addClass('left-side-collapsed');
                jQuery('.custom-nav ul').attr('style', '');

                jQuery(this).addClass('menu-collapsed');

            } else {
                body.removeClass('left-side-collapsed chat-view');
                jQuery('.custom-nav li.active ul').css({display: 'block'});

                jQuery(this).removeClass('menu-collapsed');

            }
        } else {

            if (body.hasClass('left-side-show'))
                body.removeClass('left-side-show');
            else
                body.addClass('left-side-show');

            mainContentHeightAdjust();
        }

    });


    searchform_reposition();

    jQuery(window).resize(function () {

        if (jQuery('body').css('position') == 'relative') {

            jQuery('body').removeClass('left-side-collapsed');

        } else {

            jQuery('body').css({left: '', marginRight: ''});
        }

        searchform_reposition();

    });

    function searchform_reposition() {
        if (jQuery('.searchform').css('position') == 'relative') {
            jQuery('.searchform').insertBefore('.left-side-inner .logged-user');
        } else {
            jQuery('.searchform').insertBefore('.menu-right');
        }
    }

    // panel collapsible
    $('.panel .tools .fa').click(function () {
        var el = $(this).parents(".panel").children(".panel-body");
        if ($(this).hasClass("fa-chevron-down")) {
            $(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
            el.slideUp(200);
        } else {
            $(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
            el.slideDown(200);
        }
    });

    $('.todo-check label').click(function () {
        $(this).parents('li').children('.todo-title').toggleClass('line-through');
    });

    $(document).on('click', '.todo-remove', function () {
        $(this).closest("li").remove();
        return false;
    });

    $("#sortable-todo").sortable();


    // panel close
    $('.panel .tools .fa-times').click(function () {
        $(this).parents(".panel").parent().remove();
    });


    // tool tips

    $('.tooltips').tooltip();

    // popovers

    $('.popovers').popover();




})(jQuery);

jQuery(document).ready(function ($) {
    var $window = $(window),
        window_height = $window.height();

    $window.resize(function () {
        $('.wrapper').css('min-height', window_height - 101 + 'px');
    });
    $('.wrapper').css('min-height', window_height - 101 + 'px');
});

function onloadcomment($postid, $page) {
    if(!$page) $page = 0;
    $.post('more_comments',
        {
            post_id: $postid,
            page: $page

        },
        function (data) {
            $("#load-comment-btn-" + $postid + "-" + $page).hide();
            $("#post-comment-" + $postid).fadeIn();
            $(data).appendTo("#post-comment-" + $postid).hide().fadeIn(1000);;
            //$('.btn-more').removeClass('hidden');
            //$('footer').removeClass('hidden');

        });
}

function onlike($postid) {

    if(!$("#like-btn-" + $postid).hasClass("active")) {

        $.post('like_post',
            {
                post_id: $postid
            },
            function (data) {
                if (!data['res']) {
                    $('#error_text').text("You have already liked this post.");

                } else {
                    $('#like-btn-' + $postid).addClass('active');
                    $('#error_text').text("You just liked a post.");
                    $('#like-btn-' + $postid + ' span').text(" "+(parseInt($('#like-btn-' + $postid + ' span').text()) + 1));
                }

                $('#hint').trigger('click');
            });

    } else {
        $('#error_text').text("We designed this website to encourage positive emotions, so we will not provide UNLIKING function in the near future");
        $('#hint').trigger('click');
    }
}

function onaddcomment($postid) {
    $.post('add_comment',
        {
            post_id: $postid,
            comment_content:$('#comment-input-' + $postid).val()

        },
        function (data) {
            if (!data['res']) {
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');

            } else {
                $('#comment-input-' + $postid).val("");
                $("#post-comment-" + $postid).empty().hide();

                $("#load-comment-btn-" + $postid + "-0").trigger("click");

                $('#error_text').text(data['error']);
                $('#comment-btn-' + $postid + ' span').text(" "+(parseInt($('#comment-btn-' + $postid + ' span').text()) + 1));
                $('#hint').trigger('click');
            }
        });
}

function onunfollow(user_id){
    $.post('unfollow',
        {
            user_id: user_id,
        },
        function (data) {
            if (!data['res']) {
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');

            } else {
                $('#follow_btn').show();
                $('#unfollow_btn').hide();
                $('#follower_count').text(" "+(parseInt($('#follower_count').text()) + 1));
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');
            }
        });
}

function onfollow(user_id){
    $.post('follow',
        {
            user_id: user_id,
        },
        function (data) {
            if (!data['res']) {
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');

            } else {
                $('#follow_btn').hide();
                $('#unfollow_btn').show();
                $('#follower_count').text(" "+(parseInt($('#follower_count').text()) - 1));
                $('#error_text').text(data['error']);
                $('#hint').trigger('click');
            }
        });
}