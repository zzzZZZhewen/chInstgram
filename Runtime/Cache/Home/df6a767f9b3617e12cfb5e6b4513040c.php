<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/user_index.css" />
    <title>Chinstagram - Message</title>
</head>

<body>
<section>
    <!--两个导航栏-->
    <nav class="left-side sticky-left-side">
        <div style="padding-top: 10px" class="logo">
            <a href="<?php echo U('Home/Index/index');?>"><img style="width: 200px;" src="/chin/Public/pic/index_logo.png" alt=""></a>
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li>
                    <a href="<?php echo U('Home/Index/index');?>"><i class="fa fa-home"></i> <span> Home</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Search/index');?>"><i class="fa fa-search"></i> <span> Find</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Camera/index');?>"><i class="fa fa-camera"></i> <span> Camera</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo U('Home/Message/index');?>"><i class="fa fa-envelope"></i> <span> Message</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/User/index');?>"><i class="fa fa-user"></i> <span> User</span></a>
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
                <li>
                    <a href="<?php echo U('Home/Camera/index');?>">
                        <i class="fa fa-camera"></i>
                    </a>
                </li>
                <li class="active">
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
            <span><?php echo ($User["user_nickname"]); ?></span>

            <div class="menu-right hidden-xs">
                <ul class="notification-menu">
                    <li>
                        <a href="javascript:void(0);" class="btn btn-default dropdown-toggle"
                           data-toggle="dropdown">
                            <img src="/chin/Uploads/avatar/<?php echo ($User["user_image_url"]); ?>" alt=""/>
                            <?php echo ($User["user_nickname"]); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?php echo U('Home/User/index');?>"><i class="fa fa-cog"></i> profile</a></li>
                            <li><a id="logout_btn" href="<?php echo U('Home/User/logout');?>"><i class="fa fa-sign-out"></i> Signout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
        <div id="<?php echo ($User["user_id"]); ?>" class="wrapper">
            <div class="directory-info-row">

                <div class="row">

                        <?php if(is_array($ChatList)): $i = 0; $__LIST__ = $ChatList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Chat): $mod = ($i % 2 );++$i;?><div class="col-md-6 col-lg-4">
                                <div class="panel" style="cursor: pointer;"   onClick='window.location.href="<?php echo U("Message/chat");?>?user_id=<?php echo ($Chat["user_id"]); ?>"'>

                                    <div class="panel-body">

                                            <div class="media usr-info">
                                                <a class="pull-left" href='<?php echo U("User/other");?>?user_id=<?php echo ($Chat["user_id"]); ?>'>
                                                    <img alt="" src="/chin/Uploads/avatar/<?php echo ($Chat["user_image_url"]); ?>" class="thumb">
                                                </a>

                                                <div class="media-body">
                                                    <h4 class="media-heading"><?php echo ($Chat["user_nickname"]); ?></h4>
                                                    <p><?php echo ($Chat["message_content"]); ?></p>
                                                </div>
                                            </div>
                                    </div>
                                        <div class="panel-footer custom-trq-footer">
                                            <ul class="user-states" style="margin: 0 0 15px 0; padding: 0;">
                                                <li style="width: 100%;">
                                                    <i class="fa fa-calendar"></i>  <?php echo ($Chat["message_datetime"]); ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
        <footer class="hidden">
            2016 &copy; Chinstagram
        </footer>
        <a id="hint" style="display: none;" data-toggle="modal" href="#hintModal"></a>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hintModal"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">A Friendly Hint</h4>
                    </div>
                    <div class="modal-body">
                        <p id="error_text"></p>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-block btn-primary" type="button">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-show-img">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Photo Detail</h4>
                    </div>

                    <div class="modal-body row">
                        <div class="col-md-12 img-modal">
                            <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                            <!--<button data-dismiss="modal" class="btn btn-block btn-info" type="button"><i class="fa fa-heart"></i> Like</button>-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- modal -->
    </div>
</section>
<script type="text/javascript" src="/chin/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="/chin/Public/js/index.js"></script>


</body>

</html>