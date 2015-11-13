<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn" class="enroll_failed">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/chinstgram/Public/css/style-responsive.css" />
    <title>分享出现了故障:(</title>
</head>
<body class="login">
<div class="container">

    <section class="error-wrapper text-center" style="margin-top: 5%;">
        <h1><img alt="" src="/chinstgram/Public/pic/logo.png"></h1>

        <h2><?php echo ($error); ?></h2>

        <a class="back-btn" onclick="window.location.href=document.referrer;" href="javascript:void(0);">少侠重新来过</a>
    </section>

</div>


<script type="text/javascript" src="/chinstgram/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="/chinstgram/Public/js/index.js"></script>


<script type="text/javascript" src="/chinstgram/Public/js/app_enroll.js"></script>
<script>

</script>
</body>

</html>