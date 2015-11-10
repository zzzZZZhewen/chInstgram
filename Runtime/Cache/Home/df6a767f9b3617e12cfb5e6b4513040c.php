<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/home.css" />
    <title>chInstgram - 首页</title>
</head>

<body>
<section>
    <nav class="left-side sticky-left-side">
        <div class="left-side-inner">
            <!--sidebar nav start-->
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
                <li class="active">
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

    <div class="main-content">

        <!-- header section start-->
        <div class="header-section" >
            <span>chInstgram</span>
            <!--notification menu start -->
            <div class="menu-right hidden-xs">
                <ul class="notification-menu">
                    <li>
                        <a href="http://www.sucaihuo.com/templates" class="btn btn-default dropdown-toggle"
                           data-toggle="dropdown">
                            <img src="__UPLOAD__/images/photos/user-avatar.png" alt=""/>
                            John Doe
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="javascript:void(0)"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-sign-out"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <div class="panel">
                        <header class="panel-heading">
                            Chat
                        </header>
                        <div class="panel-body">
                            <ul class="chats normal-chat">
                                <li class="in">
                                    <img src="__UPLOAD__/images/photos/user1.png" alt="" class="avatar">
                                    <div class="message ">
                                        <span class="arrow"></span>
                                        <a class="name" href="http://www.sucaihuo.com/templates">Jone Doe</a>
                                        <span class="datetime">at Apr 28, 2014 1:33</span>
                                        <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. dolore magna aliquam erat volutpat. dolore magna aliquam erat volutpat.
                                        </span>
                                    </div>
                                </li>
                                <li class="out">
                                    <img src="__UPLOAD__/images/photos/user2.png" alt="" class="avatar">
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a class="name" href="http://www.sucaihuo.com/templates">Margarita Rose</a>
                                        <span class="datetime">at Apr 28, 2014 1:35</span>
                                        <span class="body">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                        </span>
                                    </div>
                                </li>
                                <li class="in">
                                    <img src="__UPLOAD__/images/photos/user1.png" alt="" class="avatar">
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a class="name" href="http://www.sucaihuo.com/templates">Jone Doe</a>
                                        <span class="datetime">at Apr 28, 2014 1:36</span>
                                        <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                        </span>
                                    </div>
                                </li>
                                <li class="out">
                                    <img src="__UPLOAD__/images/photos/user2.png" alt="" class="avatar">
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a class="name" href="http://www.sucaihuo.com/templates">Margarita Rose</a>
                                        <span class="datetime">at Apr 28, 2014 1:35</span>
                                        <span class="body">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                        </span>
                                    </div>
                                </li>
                                <li class="in">
                                    <img src="__UPLOAD__/images/photos/user1.png" alt="" class="avatar">
                                    <div class="message">
                                        <span class="arrow"></span>
                                        <a class="name" href="http://www.sucaihuo.com/templates">Jone Doe</a>
                                        <span class="datetime">at Apr 28, 2014 1:36</span>
                                        <span class="body">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                                        </span>
                                    </div>
                                </li>

                            </ul>
                            <div class="chat-form ">
                                <form role="form" class="form-inline">
                                    <div class="form-group">
                                        <input type="text" style="width: 100%" placeholder="Type a message here..." class="form-control">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer class="">
            2015 &copy; chInstgram
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>
</body>

</html>