<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn" class="login">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>

    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style-resposive.css" />


    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/green.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/square.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/red.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/iCheck/skins/square/blue.css" />

    <title>chInstgram - 注册</title>
</head>

<body class="login">

<div class="container">

    <form id="register_form" class="form-signin" method="post" enctype="multipart/form-data"  action="<?php echo U('register_success');?>">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">注册</h1>
            <!--<img src="images/login-logo.png" alt=""/>-->
            <i style="font-size: 8em;color: #6BC5A4;" class="fa fa-users"></i>
        </div>
        <div class="login-wrap">
            <p>必须填写的信息</p>
            <input name="user_email" id="user_email" type="text" autofocus="" placeholder="用户名（邮箱）"
                   class="form-control">
            <input name="user_password" id="user_password" type="password" placeholder="密码" class="form-control">
            <input name="user_password_again" id="user_password_again" type="password" placeholder="验证密码"
                   class="form-control">
            <input name="user_nickname" id="user_nickname" type="text" placeholder="昵称" class="form-control">

            <p>输入您的个性信息（可稍后再填）</p>

            <input name="user_realname" id="user_realname" type="text" placeholder="真实姓名" class="form-control">
            <input name="user_tel" id="user_tel" type="number" placeholder="手机" class="form-control">
            <input name="user_info" id="user_info" type="text" placeholder="个人描述" class="form-control">
            <div class="icheck row" style="margin-bottom:5px;">
                <div class="square-green  col-lg-4 col-xs-4" style="margin: 0;">
                    <label for="radio-00" class="label_radio"> 保密 </label>
                    <input type="radio" checked="" value="保密" id="radio-00" name="user_sex">
                </div>
                <div class="square-blue  col-lg-4 col-xs-4" style="margin: 0;">
                    <label for="radio-01" class="label_radio ">男</label>
                    <input type="radio" value="男" id="radio-01" name="user_sex">
                </div>
                <div class="square-red  col-lg-4 col-xs-4" style="margin: 0;">
                    <label for="radio-02" class="label_radio ">女</label>
                    <input type="radio" value="女" id="radio-02" name="user_sex">
                </div>

            </div>
            <div class="form-group last">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 100%; height: 150px;">
                        <img src="/chinstgram/Uploads/avatar/avatar_default.jpg" alt=""/>
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                         style="max-width: 100%; max-height: 150px; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-default btn-file" style="margin-left: 0;">
                            <span class="fileupload-new"><i class="fa fa-upload"></i> 上传头像</span>
                            <span class="fileupload-exists"><i class="fa fa-undo"></i> 换一张</span>
                            <input name="user_image_url" id="user_image_url" type="file" class="default"/>
                        </span>
                        <span href="javascript:void(0);" class="btn btn-danger fileupload-exists"
                           data-dismiss="fileupload"><i class="fa fa-trash"></i> 删除</span>
                    </div>
                    <br/>
                    <span class="label label-danger ">NOTE</span>
                    <span>头像图片请不要超过3MB</span>
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
                已经注册？
                <a href="<?php echo U('Home/User/login');?>" class="">
                    用已知账户登录
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
                        <h4 class="modal-title">输入有误</h4>
                    </div>
                    <div class="modal-body">
                        <p id="error_text"></p>

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-block btn-primary" type="button">知道了</button>
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
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.icheck.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/icheck-init.js"></script>



<script type="text/javascript" src="/chinstgram/Public/js/user_register.js"></script>

<script>

</script>
</body>

</html>