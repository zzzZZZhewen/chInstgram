<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/search_index.css" />
    <title>Chinstagram - Find</title>
</head>

<body>
<section>
    <nav class="left-side sticky-left-side">
        <div style="padding-top: 10px" class="logo">
            <a href="<?php echo U('Home/Index/index');?>"><img style="width: 200px;" src="/chin/Public/pic/index_logo.png" alt=""></a>
        </div>
        <div class="left-side-inner">
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li>
                    <a href="<?php echo U('Home/Index/index');?>"><i class="fa fa-home"></i> <span> Home</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo U('Home/Search/index');?>"><i class="fa fa-search"></i> <span> Find</span></a>
                </li>
                <li>
                    <a href="<?php echo U('Home/Camera/index');?>"><i class="fa fa-camera"></i> <span> Camera</span></a>
                </li>
                <li>
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
                <li class="active">
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

        <div class="wrapper">
            <div class="row blog">
                <div class="col-md-4" >
                    <div class="panel">
                        <div class="panel-body">
                            <input id="search-box" type="text" placeholder="Search" class="form-control blog-search">
                        </div>
                    </div>
                    <div id="search-advice-box" class="panel">
                        <div class="panel-body">
                            <ul class="list-group">
                                <!--<li id="search-advice-topic" class="list-group-item"><a href="javascript:void(0);">Search by ker words</a></li>-->
                                <li id="search-advice-user" class="list-group-item"><a href="javascript:void(0);" onclick="searchbyusername();">Search by user name</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div id="like-panel" class="panel">
                        <div class="panel-body">
                            <h4>you might like...</h4>

                            <div id="gallery" class="media-gal">
                                <div class="images item ">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                                    </a>

                                </div>

                                <div class=" audio item ">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                                    </a>

                                </div>

                                <div class=" video item ">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                                    </a>

                                </div>

                                <div class=" images audio item ">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                                    </a>

                                </div>

                                <div class=" images documents item ">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                                    </a>

                                </div>

                                <div class=" audio item ">
                                    <a href="#myModal" data-toggle="modal">
                                        <img src="/chin/Uploads/posts/post_default.jpg" alt=""/>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer class="">
            2016 &copy; Chinstagram
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<script type="text/javascript" src="/chin/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chin/Public/js/owl.carousel.min.js"></script>

<script type="text/javascript" src="/chin/Public/js/index.js"></script>
<script type="text/javascript" src="/chin/Public/js/search_index.js"></script>
</body>

</html>