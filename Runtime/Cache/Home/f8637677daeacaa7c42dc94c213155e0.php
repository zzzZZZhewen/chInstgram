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
    <title>Chinstagram - chat with <?php echo ($Other_user["user_nickname"]); ?></title>
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
                <li class="active">
                    <a href="<?php echo U('Home/Message/index');?>"><i class="fa fa-envelope"></i> <span> Message</span></a>
                </li>
                <li>
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
            <span><a href='<?php echo U("User/other");?>?user_id=<?php echo ($Other_user["user_id"]); ?>'><?php echo ($Other_user["user_nickname"]); ?></a></span>

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
                <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="panel" style="min-height: 450px; max-height:450px; overflow: scroll; ">
                        <header class="panel-heading">

                        </header>
                        <div class="panel-body">
                            <ul class="chats cool-chat">

                            </ul>

                        </div>

                    </div>
                    <form class="chat-form " style="padding: 0;">
                        <div role="form" class="form-inline">
                            <div class="form-group">
                                <input id="message-input" type="text" style="width: 100%" placeholder="Type a message here..." class="form-control">
                            </div>
                            <button style="width: 15%;" class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i></button>
                        </div>
                    </form>
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
                        <p id="error_text"> something is wrong </p>

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
<script type="text/javascript" src="/chin/Public/js/message_chats.js"></script>


</body>
<script>

</script>


</html>