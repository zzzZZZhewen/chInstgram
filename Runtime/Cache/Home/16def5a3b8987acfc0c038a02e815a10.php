<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="login">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/style-responsive.css" />

    <link rel="stylesheet" type="text/css" href="/Public/css/home.css" />
    <title>chInstgram - 登录</title>
</head>

<body class="login">

<div class="container">

    <form class="form-signin">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">登录</h1>
            <!--<img src="images/login-logo.png" alt=""/>-->
            <i style="font-size: 8em;color: #6BC5A4;" class="fa fa-user"></i>
        </div>
        <div class="login-wrap">
            <input id="user_email_input" type="text" class="form-control" placeholder="用户帐号（邮箱）" autofocus>
            <input id="user_password_input" type="password" class="form-control" placeholder="密码">

            <button id="login_btn" class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>


            <div class="registration">
                还不是会员?
                <a class="" href="<?php echo U('Home/User/register');?>">
                    注册
                </a>
            </div>


            <label class="checkbox">
                <input type="checkbox" value="remember-me"> 记住我
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> 忘记密码?</a>
                </span>
            </label>

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off"
                               class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>


<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/Public/js/index.js"></script>


<script type="text/javascript" src="/Public/js/user_login.js"></script>
<script>

</script>
</body>

</html>