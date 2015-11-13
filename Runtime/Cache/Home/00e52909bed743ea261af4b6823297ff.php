<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/index_index.css" />
    <title>chInstgram - 首页</title>
</head>

<body>
<section>
    <!--两个导航栏-->
    <nav class="left-side sticky-left-side">
        <div class="left-side-inner">
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active">
                    <a href="<?php echo U('Home/Index/index');?>"><i class="fa fa-home"></i> <span> 首页</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Search/index');?>"><i class="fa fa-search"></i> <span> 搜索</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Camera/index');?>"><i class="fa fa-camera"></i> <span> 相机</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Message/index');?>"><i class="fa fa-envelope"></i> <span> 消息</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/User/index');?>"><i class="fa fa-user"></i> <span> 用户</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar navbar-default navbar-fixed-bottom  bottom-tabs hidden-md hidden-lg hidden-sm">
        <header class="panel-heading custom-tab turquoise-tab">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="<?php echo U('Home/Index/index');?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Search/index');?>">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Camera/index');?>">
                        <i class="fa fa-camera"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Message/index');?>">
                        <i class="fa fa-envelope"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/User/index');?>">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
            </ul>
        </header>
    </nav>
    <!--两个导航栏-->

    <main class="main-content">

        <header class="header-section navbar-fixed-top">
            <a href="javascript:void(0);" class="toggle-btn hidden-xs">
                <i class="fa fa-bars"></i>
            </a>
            <span>chInstgram</span>

            <div class="menu-right hidden-xs">
                <ul class="notification-menu">
                    <li>
                        <a href="javascript:void(0);" class="btn btn-default dropdown-toggle"
                           data-toggle="dropdown">
                            <img src="/chinstgram/Uploads/avatar/avatar_default.jpg" alt=""/>
                            <?php echo ($User["user_nickname"]); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?php echo U('Home/User/index');?>"><i class="fa fa-cog"></i> 档案</a></li>
                            <li><a id="logout_btn" href="<?php echo U('Home/User/logout');?>"><i class="fa fa-sign-out"></i> 登出</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </header>

        <div class="wrapper">
            <div class="row blog">

                <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="posts-div">


                    </div>
                    <?php if($post_has_more == true): ?><a class="btn-more btn btn-primary hidden">加载更多</a><?php endif; ?>
                </div>

            </div>
        </div>
        <footer class="hidden">
            2015 &copy; chInstgram
        </footer>
    </main>
</section>

<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/post.js"></script>
<script>
    var auto_more = false;
    var $page = 0;
    $(document).ready(function () {
        $.post('more_index_posts',
                {
                    page: 0
                },
                function (data) {
                    $(data).appendTo($('.posts-div')).hide().fadeIn(1000);
                    $('.btn-more').removeClass('hidden').hide().fadeIn(1000);
                    $('footer').removeClass('hidden').hide().fadeIn(1000);
                    $page++;
                });

        $('.btn-more').on('click', function () {
            $('.btn-more').hide();

            $.post('more_index_posts',
                    {
                        page: $page
                    },
                    function (data) {
                        $(data).appendTo($('.posts-div')).hide().fadeIn(1000);
                        auto_more = true;
                        $page++;
                    });

        });

        $contentLoadTriggered = false;
        $(window).on('scroll',
                function () {
                    if (!auto_more) return;
                    if (($(document).scrollTop() >= $(document).height() - $(window).height())
                            && $contentLoadTriggered == false) {
                        $contentLoadTriggered = true;

                        $.post('more_index_posts',
                                {
                                    page: $page
                                },
                                function (data) {
                                    $(data).appendTo($('.posts-div')).hide().fadeIn(1000);
                                    $page++;
                                    $contentLoadTriggered = false;
                                });
                    }
                }
        );


    });
</script>


</body>

</html>