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
    <title>Chinstagram - <?php echo ($User["user_nickname"]); ?></title>
</head>

<body>
<section>
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
            <span><?php echo ($Other_user["user_nickname"]); ?></span>

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
        <div id="<?php echo ($Other_user["user_id"]); ?>" class="wrapper">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel widget-info-twt turquoise-box">
                                <div class="panel-body">

                                <div class="avatar"><img alt=""
                                                         src="/chin/Uploads/avatar/<?php echo ($Other_user["user_image_url"]); ?>">
                                </div>
                                <div class="followers" style="margin-bottom: 10px;">
                                    <h5><?php echo ($Other_user["user_nickname"]); ?></h5>
                                </div>
                                <div class="panel-footer custom-trq-footer" style="background: none repeat scroll 0 0 #65CEA7; box-shadow: 0 0 0 #65CEA7; margin-bottom: 5px">
                                    <ul class="user-states" style="margin: 0 0 20px 0; padding: 0; ">
                                        <li style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/other");?>?user_id=<?php echo ($Other_user["user_id"]); ?>"'>
                                            <i class="fa fa-picture-o"></i> <?php echo ($Other_user["user_post_count"]); ?>
                                        </li>
                                        <li style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/follow_list");?>?user_id=<?php echo ($Other_user["user_id"]); ?>"'>
                                            <i class="fa fa-eye"></i> <?php echo ($Other_user["user_followed_count"]); ?>
                                        </li>
                                        <li style="cursor: pointer;"   onClick='window.location.href="<?php echo U("User/follower_list");?>?user_id=<?php echo ($Other_user["user_id"]); ?>"'>
                                            <i class="fa fa-users"></i> <?php echo ($Other_user["user_follower_count"]); ?>
                                        </li>
                                    </ul>
                                </div>
                                <?php if($Other_user["user_is_self"] == true): ?><a class="btn btn-primary btn-block"
                                       href="<?php echo U('Home/User/edit');?>"><span><i></i>Edit Profile</span></a>
                                    <a class="btn btn-danger btn-block"
                                       href="<?php echo U('Home/User/logout');?>"><span><i></i>Sign Out</span></a>

                                    <?php else: ?>
                                    <?php if($Other_user["user_is_followed"] == true): ?><a id="follow_btn" class="btn btn-primary btn-block" style="display: none;"
                                           href="javascript:void(0);" onclick="onfollow('<?php echo ($Other_user["user_id"]); ?>')"><span><i></i>Follow</span></a>
                                        <a id="unfollow_btn" class="btn btn-primary btn-block"
                                           href="javascript:void(0);" onclick="onunfollow('<?php echo ($Other_user["user_id"]); ?>')"><span><i></i>Unfollow</span></a>
                                        <?php else: ?>
                                        <a id="follow_btn" class="btn btn-primary btn-block"
                                           href="javascript:void(0);" onclick="onfollow('<?php echo ($Other_user["user_id"]); ?>')"><span><i></i>Follow</span></a>
                                        <a id="unfollow_btn" class="btn btn-primary btn-block" style="display: none;"
                                           href="javascript:void(0);" onclick="onunfollow('<?php echo ($Other_user["user_id"]); ?>')"><span><i></i>Unfollow</span></a><?php endif; ?>
                                    <a class="btn btn-warning btn-block"
                                       href="<?php echo U('Home/Message/chat');?>?user_id=<?php echo ($Other_user["user_id"]); ?>"><span><i></i>Message</span></a><?php endif; ?>
                                    </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <ul class="p-info">
                                        <li>
                                            <div class="title">gen.</div>
                                            <div class="desk">
                                                <?php if($Other_user["user_sex"] == '保密' ): ?>secret<?php endif; ?>
                                                <?php if($Other_user["user_sex"] == '男' ): ?>male<?php endif; ?>
                                                <?php if($Other_user["user_sex"] == '女' ): ?>female<?php endif; ?>

                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">tel.</div>
                                            <div class="desk"><?php echo ($Other_user["user_tel"]); ?></div>
                                        </li>
                                        <li>
                                            <div class="title">intro.</div>
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
                                    <a onclick="loadalbum(<?php echo ($Other_user["user_id"]); ?>,0)" data-toggle="tab" href="#ths">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li onclick="loaduserpost(<?php echo ($Other_user["user_id"]); ?>,0)" class="active">
                                    <a data-toggle="tab" href="#bars">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                <li onclick="loadlikes(<?php echo ($Other_user["user_id"]); ?>,0)" class="">
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

                                        <!--<a class="btn-more btn btn-primary hidden">more</a>-->

                                    </div>
                                </div>
                                <div id="bars" class="tab-pane active">
                                    <div class="row blog" style="background:#eff0f4;">
                                        <div class="posts-div">


                                        </div>
                                        <?php if($post_has_more == true): ?><a id="more-post" class="btn-more btn btn-primary hidden">more</a><?php endif; ?>
                                    </div>
                                </div>
                                <div id="likes" class="tab-pane ">
                                    <div class="row blog" style="background:#eff0f4;">
                                        <div class="likes-div">


                                        </div>
                                        <?php if($like_has_more == true): ?><a id="more-like" class="btn-more btn btn-primary hidden">more</a><?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    </section>
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
<script type="text/javascript" src="/chin/Public/js/user_posts.js"></script>


</body>



</html>