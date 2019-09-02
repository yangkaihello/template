<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/31
 * Time: 下午4:05
 *
 *
 */
$this->title = "选择登陆";

?>


<!-- log.html -->
<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,minimum=1.0,user-scalable=no">

    <script src="/js/rem.js"></script>
    <script src='/js/jquery-1.10.1.min.js'></script>
    <script src='/js/rank.js'></script>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/log.css">

    <title><?= $this->title ?></title>
</head>
<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>


<div class="main">
    <div class="log-bg">
        <img src="/static/img/log-bg.png" alt="">
    </div>
    <div class="wx">
        <img src="/static/img/wx.png" alt="" class='wx-i'><span>微信登录</span>
    </div>
    <!--<div class="user">
        <img src="/static/img/user.png" alt="" class='user-i'><span>账号登录</span>
    </div>-->
</div>

</body>
</html>
