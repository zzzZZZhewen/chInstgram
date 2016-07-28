<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn" class="login">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>

    <link rel="stylesheet" type="text/css" href="/chin/Public/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style-resposive.css" />


    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/green.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/square.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/red.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/iCheck/skins/square/blue.css" />

    <title>Chinstagram - Register</title>
</head>

<body class="login">

<div class="container">

    <form id="register_form" class="form-signin" method="post" enctype="multipart/form-data"  action="<?php echo U('register_success');?>">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Sing up</h1>
            <!--<img src="images/login-logo.png" alt=""/>-->
            <div style="padding-top: 10px" class="logo">
                <a style="margin:0px;" href="index.html"><img style="width: 200px;" src="/chin/Public/pic/index_logo.png" alt=""></a>
            </div>
            <i style="font-size: 8em;color: #6BC5A4;" class="fa fa-users"></i>
        </div>
        <div class="login-wrap">
            <p>Required</p>
            <input name="user_email" id="user_email" type="text" autofocus="" placeholder="User ID（email）"
                   class="form-control">
            <input name="user_password" id="user_password" type="password" placeholder="Password" class="form-control">
            <input name="user_password_again" id="user_password_again" type="password" placeholder="Password Confirmation"
                   class="form-control">
            <input name="user_nickname" id="user_nickname" type="text" placeholder="Nickname" class="form-control">

            <p>Optional</p>

            <input name="user_realname" id="user_realname" type="text" placeholder="Realname" class="form-control">
            <input name="user_tel" id="user_tel" type="number" placeholder="Cellphone" class="form-control">
            <input name="user_info" id="user_info" type="text" placeholder="brief introduction to yourself" class="form-control">
            gender
            <div class="icheck row" style="margin-bottom:5px;">

                <div class="square-green  col-lg-4 col-xs-4" style="margin: 0; padding-right:0;">
                    <label for="radio-00" class="label_radio"> secret </label>
                    <input type="radio" checked="" value="保密" id="radio-00" name="user_sex">
                </div>
                <div class="square-blue  col-lg-4 col-xs-4" style="margin: 0;padding:0;">
                    <label for="radio-01" class="label_radio ">male</label>
                    <input type="radio" value="男" id="radio-01" name="user_sex">
                </div>
                <div class="square-red  col-lg-4 col-xs-4" style="margin: 0;padding-left:0;">
                    <label for="radio-02" class="label_radio ">female</label>
                    <input type="radio" value="女" id="radio-02" name="user_sex">
                </div>

            </div>
            <div class="form-group last">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;">
                        <img src="/chin/Uploads/avatar/avatar_default.jpg" alt=""/>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                         style="max-width: 100%; max-height: 150px; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-default btn-file" style="margin-left: 0;">
                            <span class="fileupload-new"><i class="fa fa-upload"></i> Upload avatar </span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Second thought</span>
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
            <!--
                        <label class="checkbox">
                            <input type="checkbox" value="agree"> 我同意网站的服务与隐私条款
                        </label>-->
            <button id="register_btn" type="submit" class="btn btn-lg btn-login btn-block  spinner">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                Already registered？
                <a href="<?php echo U('Home/User/login');?>" class="">
                    Login
                </a>
            </div>

        </div>

        <a id="hint" style="display: none;" data-toggle="modal" href="#hintModal"></a>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hintModal"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 style="text-align: center;" class="modal-title">Oops! :(</h4>
                    </div>
                    <div class="modal-body">
                        <p style="text-align: center;" id="error_text"></p>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-block btn-primary" type="button">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>


<script type="text/javascript" src="/chin/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chin/Public/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/index.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.icheck.js"></script>
<script type="text/javascript" src="/chin/Public/js/icheck-init.js"></script>



<script type="text/javascript" src="/chin/Public/js/user_register.js"></script>

<script>

</script>
</body>

</html>