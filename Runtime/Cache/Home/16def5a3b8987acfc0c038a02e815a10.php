<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn" class="login">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chin/Public/css/style-responsive.css" />

    <title>Chinstagram - Login</title>
</head>

<body class="login">

<div class="container">

    <form id="login_form" class="form-signin" action="<?php echo U('Home/User/login_success');?>" method="post">

        <div class="form-signin-heading text-center">

            <h1 class="sign-title">Sign In</h1>
            <!--<img src="images/login-logo.png" alt=""/>-->
            <div style="padding-top: 10px" class="logo">
                <a style="margin:0px;" href="index.html"><img style="width: 200px;" src="/chin/Public/pic/index_logo.png" alt=""></a>
            </div>
            <i style="font-size: 8em;color: #6BC5A4;" class="fa fa-user"></i>

        </div>
        <div class="login-wrap">

            <div class="form-group">
                <div class="iconic-input">
                    <i class="fa fa-envelope" style=""></i>
                    <input name="user_email" id="user_email" type="text" class="form-control" placeholder="User ID（email）"
                           autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="iconic-input">
                    <i class="fa fa-key" style=""></i>

                    <input name="user_password" id="user_password" type="password" class="form-control"
                           placeholder="Password">
                </div>
            </div>


            <button id="login_btn" class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>


            <div class="registration">
                Not a member yet? 
                <a class="" href="<?php echo U('Home/User/register');?>">
                    Signup
                </a>
            </div>
        </div>

    </form>

    <!-- hint -->
    <a id="login_hint_btn" class="hidden" data-toggle="modal" href="#login_hint"> 忘记密码?</a>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="login_hint"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 style="text-align: center;" class="modal-title">Oops! :(</h4>
                </div>
                <div class="modal-body">
                    <p style="text-align: center;">Told you not to give others your password</p>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-primary btn-block" type="button">OK</button>
                </div>
            </div>
        </div>
    </div>

</div>


<script type="text/javascript" src="/chin/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chin/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chin/Public/js/index.js"></script>


<script type="text/javascript" src="/chin/Public/js/user_login.js"></script>
<script>

</script>
</body>

</html>