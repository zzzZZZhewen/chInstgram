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
                    <!--post panel start  -->
                    <div class="panel post-panel">
                        <div class="panel-heading">
                            <div class="dir-info">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="avatar">
                                            <img src="/chinstgram/Uploads/avatar/avatar_default.jpg" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="javascript:void(0);"><span class="poster-name">这是发这条动态的人的名字</span></a>
                                    </div>
                                    <div class="col-xs-2 ">
                                        <span class="post-time">刚刚</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="post-img">
                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt="">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="post-widgets">
                                <ul class="nav nav-pills p-option">
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-mail-forward"></i></a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="javascript:void(0);"><i class="fa fa-ellipsis-h"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="post-content">
                                1,024次赞
                                <br/>
                                <a>WILD AWAKE</a>  这里是作者对图片的描述
                            </div>
                            <div class="post-comment">
                                全部256条评论
                                <br/><a href="javascript:void(0);">mzw</a> 评论
                                <br/><a href="javascript:void(0);">mzw</a> 评论
                                <br/><a href="javascript:void(0);">mzw</a> 评论
                            </div>
                        </div>
                    </div>
                    <!--post panel end  -->
                    <div class="panel post-panel">
                        <div class="panel-heading">
                            <div class="dir-info">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <div class="avatar">
                                            <img src="/chinstgram/Uploads/avatar/avatar_default.jpg" alt=""/>
                                        </div>
                                    </div>
                                    <div class="col-xs-8">
                                        <a href="javascript:void(0);"><span class="poster-name">Wild Awake</span></a>
                                    </div>
                                    <div class="col-xs-2 ">
                                        <span class="post-time">刚刚</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="post-img">
                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt="">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="post-widgets">
                                <ul class="nav nav-pills p-option">
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-mail-forward"></i></a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="javascript:void(0);"><i class="fa fa-ellipsis-h"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="post-content">
                                <p>
                                    1024次赞
                                </p>

                                <p>Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue
                                    egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed
                                    congue orci.
                                </p>
                            </div>
                            <div class="post-comment">
                                <p>
                                    全部256条评论
                                </p>

                                <p><a href="javascript:void(0);">mzw</a> 评论
                                    <br/><a href="javascript:void(0);">mzw</a> 评论
                                    <br/><a href="javascript:void(0);">mzw</a> 评论
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <footer class="">
            2015 &copy; chInstgram
        </footer>
    </main>
</section>

<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/index_index.js"></script>

</body>

</html>