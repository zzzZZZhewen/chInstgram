<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/bootstrap-fileupload.min.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/green.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/square.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/red.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/blue.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/user_index.css" />
    <title>Chinstagram - <?php echo ($title); ?></title>
</head>

<body>
<section>
    <nav class="left-side sticky-left-side">
        <div style="padding-top: 10px" class="logo">
            <a href="index.html"><img style="width: 200px;" src="/chin/Public/pic/index_logo.png" alt=""></a>
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
                <li>
                    <a href="<?php echo U('Home/Message/index');?>"><i class="fa fa-envelope"></i> <span> Message</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo U('Home/User/index');?>"><i class="fa fa-user"></i> <span> User</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-content">
        <div class="header-section navbar-fixed-top">
            <a href="javascript:history.back();" class="back-btn">
                <i class="fa fa-chevron-left"></i>
            </a>
            <span><?php echo ($title); ?></span>

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
        <div class="wrapper">

                <div class="directory-info-row">
                    <div class="row">

                        <?php if(is_array($Results)): $i = 0; $__LIST__ = $Results;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Result): $mod = ($i % 2 );++$i;?><div class="col-md-6 col-lg-4">
                                <div class="panel">
                                    <div class="panel-body" style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/other");?>?user_id=<?php echo ($Result["user_id"]); ?>"'>
                                        <div class="media usr-info">
                                            <a class="pull-left" href='<?php echo U("User/other");?>?user_id=<?php echo ($Result["user_id"]); ?>'>
                                                <img alt="" src="/chin/Uploads/avatar/<?php echo ($Result["user_image_url"]); ?>" class="thumb">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo ($Result["user_nickname"]); ?></h4>
                                                <span >
                                                    <?php if($Result["user_sex"] == '保密' ): ?>secret<?php endif; ?>
                                                    <?php if($Result["user_sex"] == '男' ): ?>male<?php endif; ?>
                                                    <?php if($Result["user_sex"] == '女' ): ?>female<?php endif; ?>
                                                </span>
                                                <p><?php echo ($Result["user_info"]); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer custom-trq-footer">
                                        <ul class="user-states" style="margin: 0 0 15px 0; padding: 0;">
                                            <li style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/other");?>?user_id=<?php echo ($Result["user_id"]); ?>"'>
                                                <i class="fa fa-picture-o"></i> <?php echo ($Result["post_count"]); ?>
                                            </li>
                                            <li style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/follow_list");?>?user_id=<?php echo ($Result["user_id"]); ?>"'>
                                                <i class="fa fa-eye"></i> <?php echo ($Result["follow_count"]); ?>
                                            </li>
                                            <li style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/follower_list");?>?user_id=<?php echo ($Result["user_id"]); ?>"'>
                                                <i class="fa fa-users"></i> <?php echo ($Result["follower_count"]); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>

                </div>
            <a id="more-like" class="btn-more btn btn-primary hidden">more</a>

        </div>
        <footer class="hidden-xs">
            2016 &copy; Chinstagram
        </footer>
    </div>
</section>
<script type="text/javascript" src="/chin/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chin/Public/js/index.js"></script>
<script type="text/javascript" src="/chin/Public/js/search_user_result.js"></script>


</body>

</html>