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
    <title>Chinstagram - Edit profile</title>
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
            <a href="javascript:void(0);" class="back-btn">
                <i class="fa fa-chevron-left"></i>
            </a>
            <span>Edit profile</span>

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
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

                    <form id="register_form" class="form-signin" method="post" enctype="multipart/form-data"
                          action="<?php echo U('edit_success');?>" style="margin: 0; max-width: none;">
                        <div class="login-wrap">
                            <p>Security</p>
                            <input type="hidden" name="user_id" value="<?php echo ($User["user_id"]); ?>">
                            <input disabled name="user_email" id="user_email" type="text" autofocus=""
                                   placeholder="User ID（email）"
                                   class="form-control" value="<?php echo ($User["user_email"]); ?>">
                            <input name="user_old_password" id="user_old_password" type="password" placeholder="old password"
                                   class="form-control">
                            <input name="user_new_password" id="user_new_password" type="password" placeholder="new password"
                                   class="form-control">
                            <input name="user_new_password_again" id="user_new_password_again" type="password"
                                   placeholder="confirmation"
                                   class="form-control">

                            <p>Personality</p>
                            <input name="user_nickname" id="user_nickname" type="text" placeholder="nickname"
                                   class="form-control" value="<?php echo ($User["user_nickname"]); ?>">

                            <input name="user_realname" id="user_realname" type="text" placeholder="real name"
                                   class="form-control" value="<?php echo ($User["user_realname"]); ?>">
                            <input name="user_tel" id="user_tel" type="number" placeholder="cell phone number" class="form-control"
                                   value="<?php echo ($User["user_tel"]); ?>">
                            <input name="user_info" id="user_info" type="text" placeholder="brief introduction" class="form-control"
                                   value="<?php echo ($User["user_info"]); ?>">

                            <div class="icheck row" style="margin-bottom:5px;">
                                <div class="square-green  col-lg-4 col-xs-4" style="margin: 0; padding-right: 0;">
                                    <label for="radio-00" class="label_radio"> secret </label>
                                    <?php if($User["user_sex"] == '保密' ): ?><input type="radio" value="保密" id="radio-00" name="user_sex" checked/>
                                        <?php else: ?>
                                        <input type="radio" value="保密" id="radio-00" name="user_sex"/><?php endif; ?>

                                </div>
                                <div class="square-blue  col-lg-4 col-xs-4" style="margin: 0; padding: 0;">
                                    <label for="radio-01" class="label_radio ">male</label>
                                    <?php if($User["user_sex"] == '男' ): ?><input type="radio" value="男" id="radio-01" name="user_sex" checked/>
                                        <?php else: ?>
                                        <input type="radio" value="男" id="radio-01" name="user_sex"/><?php endif; ?>

                                </div>
                                <div class="square-red  col-lg-4 col-xs-4" style="margin: 0; padding-left: 0;">
                                    <label for="radio-02" class="label_radio ">female</label>
                                    <?php if($User["user_sex"] == '女' ): ?><input type="radio" value="女" id="radio-02" name="user_sex" checked/>
                                        <?php else: ?>
                                        <input type="radio" value="女" id="radio-02" name="user_sex"/><?php endif; ?>

                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;">
                                        <img src="/chin/Uploads/avatar/<?php echo ($User["user_image_url"]); ?>" alt=""/>
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail"
                                         style="max-width: 100%; max-height: 150px; line-height: 20px;">
                                    </div>
                                    <div>
                        <span class="btn btn-default btn-file" style="margin-left: 0;">
                            <span class="fileupload-new"><i class="fa fa-upload"></i> upload avatar</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> second thought</span>
                            <input name="user_image_url" id="user_image_url" type="file" class="default"/>
                        </span>
                        <span href="javascript:void(0);" class="btn btn-danger fileupload-exists"
                              data-dismiss="fileupload"><i class="fa fa-trash"></i> regret</span>
                                    </div>
                                    <br/>
                                    <span class="label label-danger ">NOTE</span>
                                    <span>Do not exceed the limit of 3mb</span>
                                </div>

                            </div>
                            <button id="register_btn" type="submit" class="btn btn-lg btn-login btn-block  spinner">
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
                                        <h4 style="text-align: center;" class="modal-title">Oops! :(</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="text-align: center;" id="error_text"></p>

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default btn-block" type="button">
                                            OK
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
                                        <h4 class="modal-title">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="text-align: center;" id="hint_back_text">Leave without a save？</p>

                                    </div>
                                    <div class="modal-footer">
                                        <button onclick="history.back();"
                                                class="btn btn-danger btn-block" type="button">
                                            Yes
                                        </button>
                                        <button data-dismiss="modal" class="btn btn-primary btn-block"
                                                type="button">No
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
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
<script type="text/javascript" src="/chin/Public/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/index.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.icheck.js"></script>
<script type="text/javascript" src="/chin/Public/js/icheck-init.js"></script>
<script type="text/javascript" src="/chin/Public/js/user_edit.js"></script>


</body>

</html>