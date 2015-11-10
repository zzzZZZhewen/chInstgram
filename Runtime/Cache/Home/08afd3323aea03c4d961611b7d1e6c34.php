<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="login">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style-responsive.css" />

    <title>chInstgram - 注册</title>
</head>

<body class="login">

<div class="container">

    <form id="register_form" class="form-signin" method="post" action="<?php echo U('Home/User/register_success');?>">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">注册</h1>
            <!--<img src="images/login-logo.png" alt=""/>-->
            <i style="font-size: 8em;color: #6BC5A4;" class="fa fa-users"></i>
        </div>
        <div class="login-wrap">
            <p>输入您的账户安全信息</p>
            <input name="user_email" id="user_email" type="text" autofocus="" placeholder="用户名（邮箱）" class="form-control">
            <input name="user_password" id="user_password" type="password" placeholder="密码" class="form-control">
            <input name="user_password_again" id="user_password_again" type="password" placeholder="验证密码" class="form-control">

            <p>输入您的个性信息（可稍后再填）</p>
            <input name="user_realname" id="user_realname" type="text" placeholder="真实姓名" class="form-control">
            <input name="user_nickname" id="user_nickname" type="text" placeholder="昵称" class="form-control">
            <input name="user_tel" id="user_tel" type="number"  placeholder="手机" class="form-control">
            <input name="user_info" id="user_info" type="text" placeholder="个人描述" class="form-control">

            <div class="radios">
                <label for="radio-01" class="label_radio col-lg-4 col-xs-4">
                    <input type="radio" checked="" value="保密" id="radio-00" name="user_sex"> 保密
                </label>
                <label for="radio-01" class="label_radio col-lg-4 col-xs-4">
                    <input type="radio" value="男" id="radio-01" name="user_sex"> 男
                </label>
                <label for="radio-02" class="label_radio col-lg-4 col-xs-4">
                    <input type="radio" value="女" id="radio-02" name="user_sex"> 女
                </label>
            </div>

            <!--
                        <label class="checkbox">
                            <input type="checkbox" value="agree"> 我同意网站的服务与隐私条款
                        </label>-->
            <button id="register_btn" type="submit" class="btn btn-lg btn-login btn-block">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                已经注册？
                <a href="<?php echo U('Home/User/login');?>" class="">
                    用已知账户登录
                </a>
            </div>

        </div>
        <a id="hint" style="display: none;" data-toggle="modal" href="#hintModal"> 忘记密码?</a>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hintModal"
             class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">输入有误</h4>
                    </div>
                    <div class="modal-body">
                        <p id="error_text"></p>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">知道了</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>


<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>

<script type="text/javascript" src="/chinstgram/Public/js/user_register.js"></script>

<script>

</script>
</body>

</html>