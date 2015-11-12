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
    <title>chInstgram - 相机</title>
</head>

<body>
<section>
    <!--两个导航栏-->
    <nav class="left-side sticky-left-side">
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li>
                    <a href="<?php echo U('Home/Index/index');?>"><i class="fa fa-home"></i> <span> 首页</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Search/index');?>"><i class="fa fa-search"></i> <span> 搜索</span></a>
                </li>
                <li class="active">
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
                <li>
                    <a href="<?php echo U('Home/Index/index');?>">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Search/index');?>">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
                <li class="active">
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

    <div class="main-content">

        <div class="header-section navbar-fixed-top">
            <a href="javascript:void(0);" class="toggle-btn hidden-xs">
                <i class="fa fa-bars"></i>
            </a>
            <span>相机</span>

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
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

                    <form id="camera_form" class="form-signin" method="post" enctype="multipart/form-data"
                          action="<?php echo U('Home/Camera/post_success');?>" style="margin: 0; max-width: none;">
                        <div class="login-wrap">
                            <div class="form-group last">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 300px;">
                                        <img src="/chinstgram/Uploads/avatar/<?php echo ($User["user_image_url"]); ?>" alt=""/>
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail"
                                         style="max-width: 100%; max-height: 300px; line-height: 20px;">
                                    </div>
                                    <div>
                                    <span class="btn btn-warning btn-file btn-block" style="margin-left: 0;">
                                        <span class="fileupload-new"><i class="fa fa-upload"></i> 上传图片</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> 换一张</span>
                                        <input name="post_url" id="post_url" type="file" class="default"/>
                                    </span>
                                    </div>
                                </div>

                            </div>

                            <p>图片描述</p>
                            <div class="form-group">
                                <div class="iconic-input">
                                    <i class="fa fa-info-circle" style="line-height: 90px"></i>

                                    <input name="post_content" id="post_content" type="text" class="form-control"
                                           placeholder="添加有趣的图片描述吧（请勿超过140个字符）"
                                            style="line-height: 70px; ">
                                </div>
                            </div>

                            <button id="the_btn" type="submit" class="btn btn-lg btn-login btn-block">
                                <i class="fa fa-check"></i>
                            </button>

                        </div>


                        <a id="hint" style="display: none;" data-toggle="modal" href="#hintModal"></a>

                        <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
                             id="hintModal"
                             class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">输入有误</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p id="error_text"></p>

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default btn-block" type="button">
                                            知道了
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a id="hint_back" style="display: none;" data-toggle="modal" href="#hint_backModal"></a>

                        <!-- Modal -->
                        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
                             id="hint_backModal"
                             class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">确认转跳</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p id="hint_back_text">确定不保存修改而返回么？</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button onclick="window.location.href=document.referrer;"
                                                class="btn btn-danger btn-block" type="button">
                                            确定
                                        </button>
                                        <button data-dismiss="modal" class="btn btn-primary btn-block"
                                                type="button">取消
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <footer class="" >
            2015 &copy; chInstgram
        </footer>
    </div>
</section>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.icheck.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/icheck-init.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/camera_index.js"></script>


</body>

</html>