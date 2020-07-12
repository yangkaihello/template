<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/31
 * Time: 下午4:05
 *
 *
 */
use common\popular\RequestHandle;
use yii\helpers\Url;

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

    <script src="/template/js/rem.js"></script>
    <script src='/template/js/jquery-1.10.1.min.js'></script>
    <script src='/template/js/rank.js'></script>
    <link rel="stylesheet" href="/template/css/reset.css">
    <link rel="stylesheet" href="/template/css/log.css?v=1.0">

    <title><?= $this->title ?></title>
</head>
<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>


<div class="main">
    <div class="log-bg">
        <img src="/template/img/log-bg.png" alt="">
    </div>

    <div class="log-botton">
        <?php if( RequestHandle::isWechat(Yii::$app->request) ): ?>

            <a href="<?= \common\popular\ThirdlyHandle::getWechatLoginUrl() ?>" >
                <div class="wx">
                    <img src="/template/img/wx.png" alt="" class='icon-i'>
                    <span>微信登录</span>
                </div>
            </a>

        <?php else: ?>

            <a href="<?= \common\popular\ThirdlyHandle::getQQLoginUrl() ?>" >
                <div class="qq">
                    <img src="/template/img/qq.png" alt="" class='icon-i'>
                    <span>QQ登陆</span>
                </div>
            </a>

        <?php endif; ?>



        <!--<a>
            <div class="user">
                <img src="/template/img/user.png" alt="" class='icon-i'><span>账号登录</span>
            </div>
        </a>-->



    </div>

</div>

</body>
</html>

<script>

</script>
