<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/Public/css/home.css" />
    <title>chInstgram - 首页</title>
</head>

<body>
<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">
        <!--logo and iconic logo start
        <div class="logo">
            <a href="index.html"><img src="/Upload/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/Upload/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->
        <div class="left-side-inner">
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li>
                    <a href="<?php echo U('Home/Index/index');?>"><i class="fa fa-home"></i> <span>Home</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-search"></i> <span>Search</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-camera"></i> <span>Camera</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo U('Home/Message/index');?>"><i class="fa fa-envelope"></i> <span>Message</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/User/index');?>"><i class="fa fa-user"></i> <span>User</span></a>
                </li>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->

    <!-- main content start-->
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
                            <img src="/Upload/images/photos/user-avatar.png" alt=""/>
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
                                    <img src="/Upload/images/photos/user1.png" alt="" class="avatar">
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
                                    <img src="/Upload/images/photos/user2.png" alt="" class="avatar">
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
                                    <img src="/Upload/images/photos/user1.png" alt="" class="avatar">
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
                                    <img src="/Upload/images/photos/user2.png" alt="" class="avatar">
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
                                    <img src="/Upload/images/photos/user1.png" alt="" class="avatar">
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

<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.nicescroll.js"></script>

<script type="text/javascript" src="/Public/js/index.js"></script>
</body>

</html>