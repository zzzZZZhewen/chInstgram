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
                <li>
                    <a href="<?php echo U('Home/Message/index');?>"><i class="fa fa-envelope"></i> <span>Message</span></a>
                </li>
                <li class="active">
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
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-pic text-center">
                                        <img alt="" src="/Upload/images/photos/user1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <ul class="p-info">
                                        <li>
                                            <div class="title">Gender</div>
                                            <div class="desk">Male</div>
                                        </li>
                                        <li>
                                            <div class="title">Founder</div>
                                            <div class="desk">ABC Inc.</div>
                                        </li>
                                        <li>
                                            <div class="title">Education</div>
                                            <div class="desk">BSC. in CSE</div>
                                        </li>
                                        <li>
                                            <div class="title">Project Done</div>
                                            <div class="desk">50+</div>
                                        </li>
                                        <li>
                                            <div class="title">Skills</div>
                                            <div class="desk">HTML, CSS, JavaScript.</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Total <span>Sales</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>$ 5,600</h3>
                                    </div>
                                    <div id="expense" class="chart-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states green-box">
                                    <div class="summary pull-left">
                                        <h4>Product <span>refund</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>160</h3>
                                    </div>
                                    <div id="pro-refund" class="chart-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states">
                                    <div class="summary pull-left">
                                        <h4>Total <span>Earning</span></h4>
                                        <span>Monthly Summary</span>
                                        <h3>$ 51,2600</h3>
                                    </div>
                                    <div id="expense2" class="chart-bar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="profile-desk">
                                        <h1>john doe</h1>
                                        <span class="designation">PRODUCT DESIGNER (UX / UI / Visual Interaction)</span>
                                        <p>
                                            I have 10 years of experience designing for the web, and specialize in the areas of user interface design, interaction design, visual design and prototyping. I’ve worked with notable startups including Pearl Street Software.
                                        </p>
                                        <a class="btn p-follow-btn pull-left" href="http://www.sucaihuo.com/templates"> <i class="fa fa-check"></i> Following</a>

                                        <ul class="p-social-link pull-right">
                                            <li>
                                                <a href="http://www.sucaihuo.com/templates">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="http://www.sucaihuo.com/templates">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="http://www.sucaihuo.com/templates">
                                                    <i class="fa fa-google-plus"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <form>
                                    <textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
                                </form>
                                <footer class="panel-footer">
                                    <button class="btn btn-post pull-right">Post</button>
                                    <ul class="nav nav-pills p-option">
                                        <li>
                                            <a href="http://www.sucaihuo.com/templates"><i class="fa fa-user"></i></a>
                                        </li>
                                        <li>
                                            <a href="http://www.sucaihuo.com/templates"><i class="fa fa-camera"></i></a>
                                        </li>
                                        <li>
                                            <a href="http://www.sucaihuo.com/templates"><i class="fa  fa-location-arrow"></i></a>
                                        </li>
                                        <li>
                                            <a href="http://www.sucaihuo.com/templates"><i class="fa fa-meh-o"></i></a>
                                        </li>
                                    </ul>
                                </footer>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    recent activities
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="fa fa-times" href="javascript:;"></a>
                                     </span>
                                </header>
                                <div class="panel-body">
                                    <ul class="activity-list">
                                        <li>
                                            <div class="avatar">
                                                <img src="/Upload/images/photos/user1.png" alt=""/>
                                            </div>
                                            <div class="activity-desk">
                                                <h5><a href="http://www.sucaihuo.com/templates">Jonathan Smith</a> <span>Uploaded 5 new photos</span></h5>
                                                <p class="text-muted">7 minutes ago near Alaska, USA</p>
                                                <div class="album">
                                                    <a href="http://www.sucaihuo.com/templates">
                                                        <img alt="" src="/Upload/images/gallery/image1.jpg">
                                                    </a>
                                                    <a href="http://www.sucaihuo.com/templates">
                                                        <img alt="" src="/Upload/images/gallery/image2.jpg">
                                                    </a>
                                                    <a href="http://www.sucaihuo.com/templates">
                                                        <img alt="" src="/Upload/images/gallery/image3.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="/Upload/images/photos/user3.png" alt=""/>
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="http://www.sucaihuo.com/templates">Jonathan Smith</a> <span>attended a meeting with</span>
                                                    <a href="http://www.sucaihuo.com/templates">John Doe.</a></h5>
                                                <p class="text-muted">2 days ago near Alaska, USA</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="/Upload/images/photos/user4.png" alt=""/>
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="http://www.sucaihuo.com/templates">Jonathan Smith</a> <span>completed the task “wireframe design” within the dead line</span></h5>
                                                <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="/Upload/images/photos/user5.png" alt=""/>
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="http://www.sucaihuo.com/templates">Jonathan Smith</a> <span>was absent office due to sickness</span></h5>
                                                <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>


                                    </ul>
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