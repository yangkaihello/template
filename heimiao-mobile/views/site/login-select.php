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

    <script src="/static/js/rem.js"></script>
    <script src='/static/js/jquery-1.10.1.min.js'></script>
    <script src='/static/js/rank.js'></script>
    <link rel="stylesheet" href="/static/css/reset.css">
    <link rel="stylesheet" href="/static/css/log.css">

    <title><?= $this->title ?></title>
</head>
<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>


<div class="main">
    <div class="log-bg">
        <img src="/static/img/log-bg.png" alt="">
    </div>

    <div class="log-botton">

        <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=<?= Yii::$app->params['wechat']['app_id'] ?>&redirect_uri=<?= urlencode(Yii::$app->params['thirdly.domain'] . Url::to(['/wechat/login/info'])) ?>&response_type=code&scope=snsapi_userinfo&state=<?= Yii::$app->params['wap.domain'] ?>#wechat_redirect" >
            <div class="wx">
                <img src="/static/img/wx.png" alt="" class='icon-i'>
                <span>微信登录</span>
            </div>
        </a>

        <a href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=<?= Yii::$app->params['qq']['api_id'] ?>&redirect_uri=<?= urlencode(Yii::$app->params['thirdly.domain'] . Url::to(['/qq/login/info'])) ?>&state=<?= Yii::$app->params['wap.domain'] ?>" >
            <div class="qq">
                <img src="/static/img/qq.png" alt="" class='icon-i'>
                <span>QQ登陆</span>
            </div>
        </a>

        <!--<a>
            <div class="user">
                <img src="/static/img/user.png" alt="" class='icon-i'><span>账号登录</span>
            </div>
        </a>-->



    </div>

</div>

</body>
</html>

<script>

</script>
