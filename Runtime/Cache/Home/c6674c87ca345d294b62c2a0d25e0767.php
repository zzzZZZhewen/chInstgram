<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/bootstrap-fileupload.min.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/green.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/square.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/red.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/blue.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/user_index.css" />
    <title>chInstgram - 用户档案</title>
</head>

<body>
<section>
    <nav class="left-side sticky-left-side">
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li>
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
                <li class="active">
                    <a href="<?php echo U('Home/User/index');?>"><i class="fa fa-user"></i> <span> 用户</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-content">
        <div class="header-section navbar-fixed-top">
            <a href="javascript:history.go(-1);" class="back-btn">
                <i class="fa fa-chevron-left"></i>
            </a>
            <span><?php echo ($Other_user["user_nickname"]); ?></span>

            <div class="menu-right hidden-xs">
                <ul class="notification-menu">
                    <li>
                        <a href="javascript:void(0);" class="btn btn-default dropdown-toggle"
                           data-toggle="dropdown">
                            <img src="/chinstgram/Uploads/avatar/<?php echo ($User["user_image_url"]); ?>" alt=""/>
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

        </div>
        <div class="wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget-info-twt turquoise-box">
                                <div class="avatar"><img alt=""
                                                         src="/chinstgram/Uploads/avatar/<?php echo ($Other_user["user_image_url"]); ?>">
                                </div>
                                <div class="followers" style="margin-bottom: 10px;">
                                    <h5><?php echo ($Other_user["user_nickname"]); ?></h5>
                                    <span class="subtitle"
                                          style="margin-bottom: 10px;"><?php echo ($Other_user["user_realname"]); ?></span>
                                    <span><?php echo ($Other_user["user_post_count"]); ?> 发布</span> |
                                    <span><?php echo ($Other_user["user_followed_count"]); ?> 关注</span> |
                                    <span><?php echo ($Other_user["user_follower_count"]); ?> 粉丝</span>
                                </div>
                                <?php if($Other_user["user_is_self"] == true): else: ?>
                                    <?php if($Other_user["user_is_followed"] == true): ?><a class="btn btn-primary btn-block"
                                           href="javascript:void(0);"><span><i></i>取消关注</span></a>
                                        <?php else: ?>
                                        <a class="btn btn-primary btn-block"
                                           href="javascript:void(0);"><span><i></i>关注</span></a><?php endif; ?>
                                    <a class="btn btn-warning btn-block"
                                       href="javascript:void(0);"><span><i></i>私信</span></a><?php endif; ?>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <ul class="p-info">
                                        <li>
                                            <div class="title">性别</div>
                                            <div class="desk"><?php echo ($Other_user["user_sex"]); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">手机</div>
                                            <div class="desk"><?php echo ($Other_user["user_tel"]); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">个人简介</div>
                                            <div class="desk"><?php echo ($Other_user["user_info"]); ?></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <section class="panel" style="border-bottom: none; box-shadow: none;">
                        <header class="panel-heading custom-tab turquoise-tab user-tabs">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a data-toggle="tab" href="#ths">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li class="active">
                                    <a data-toggle="tab" href="#bars">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" href="#likes">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body" style="padding-bottom: 0;">
                            <div class="tab-content">
                                <div id="ths" class="tab-pane ">
                                    <div class="media-gal">
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>
                                        <div class="item">
                                            <a>
                                                <img src="/chinstgram/Uploads/posts/post_default.jpg" alt=""/>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                                <div id="bars" class="tab-pane active">
                                    <div class="row blog" style="background:#eff0f4;">
                                        <div class="panel post-panel">
                                            <div class="panel-heading">
                                                <div class="dir-info">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <div class="avatar">
                                                                <img src="/chinstgram/Uploads/avatar/avatar_default.jpg"
                                                                     alt=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <a href="javascript:void(0);"><span class="poster-name"><?php echo ($User["user_nickname"]); ?></span></a>
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
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-mail-forward"></i></a>
                                                        </li>
                                                        <li class="pull-right">
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-ellipsis-h"></i></a>
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
                                        <div class="panel post-panel">
                                            <div class="panel-heading">
                                                <div class="dir-info">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <div class="avatar">
                                                                <img src="/chinstgram/Uploads/avatar/avatar_default.jpg"
                                                                     alt=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <a href="javascript:void(0);"><span class="poster-name"><?php echo ($User["user_nickname"]); ?></span></a>
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
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-mail-forward"></i></a>
                                                        </li>
                                                        <li class="pull-right">
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-ellipsis-h"></i></a>
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
                                    </div>
                                </div>
                                <div id="likes" class="tab-pane ">
                                    <div class="row blog" style="background:#eff0f4;">
                                        <div class="panel post-panel">
                                            <div class="panel-heading">
                                                <div class="dir-info">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <div class="avatar">
                                                                <img src="/chinstgram/Uploads/avatar/avatar_default.jpg"
                                                                     alt=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <a href="javascript:void(0);"><span class="poster-name">你赞过的人</span></a>
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
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-mail-forward"></i></a>
                                                        </li>
                                                        <li class="pull-right">
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-ellipsis-h"></i></a>
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
                                        <div class="panel post-panel">
                                            <div class="panel-heading">
                                                <div class="dir-info">
                                                    <div class="row">
                                                        <div class="col-xs-2">
                                                            <div class="avatar">
                                                                <img src="/chinstgram/Uploads/avatar/avatar_default.jpg"
                                                                     alt=""/>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8">
                                                            <a href="javascript:void(0);"><span class="poster-name">你赞过的人</span></a>
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
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-heart"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i class="fa fa-comment"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-mail-forward"></i></a>
                                                        </li>
                                                        <li class="pull-right">
                                                            <a href="javascript:void(0);"><i
                                                                    class="fa fa-ellipsis-h"></i></a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <footer class="hidden-xs">
            2015 &copy; chInstgram
        </footer>
    </div>
</section>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>


</body>

</html>