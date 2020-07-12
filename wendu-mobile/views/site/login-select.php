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

$this->title = "登录";

?>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,viewport-fit=cover">
    <title><?= $this->title ?></title>
    <link href="/template/css/reset.css" rel="stylesheet" />
    <link href="/template/css/style.css" rel="stylesheet" />
    <script type="text/javascript" src="/template/js/flexible.js"></script>
    <script type="text/javascript" src="/template/js/jquery-1.11.3.min.js"></script>
</head>

<body>

<div class="login-wrappy">
    <div class="login">
        <img class="login_img" src="/template/images/login/logo@2x.png" alt="">
    </div>
    <div class="input">
        <img class="iocn2" src="/template/images/login/手机icon@2x.png" alt="">
        <input class="plone" type="text" name="username" placeholder="请输入邮箱">
        <!--<img class="iocn3" src="/template/images/login/图层 13@2x.png" alt="">-->
    </div>
    <div class="input1">
        <img class="iocn4" src="/template/images/login/密码icon 8@2x.png" alt="">
        <input class="plone" type="password" name="password" placeholder="请输入密码">
    </div>

    <div class="input1 errors">
        <p></p>
    </div>

    <div class="immediately">
        <button class="login_immediately">立即登录</button>
    </div>
    <div class="login_existing">
        <p class="existing">
            <span></span>
            <a class="existing_mane" href="<?= Url::to(["site/register"]) ?>">立即注册</a>
        </p>
    </div>
    <div class="fast_name">
        <span class="border_left"></span>
        <a class="fast" href="#this">快速登录</a>
        <span class="border_right"></span>
    </div>

    <div class="way">
        <?php if( RequestHandle::isWechat(Yii::$app->request) ): ?>
            <a href="<?= \common\popular\ThirdlyHandle::getWechatLoginUrl() ?>" ><img class="log_way1" src="/template/images/login/wechat@2x.png" alt=""></a>
        <?php else: ?>
            <a href="<?= \common\popular\ThirdlyHandle::getQQLoginUrl() ?>"><img class="log_way3" src="/template/images/login/QQ@2x.png" alt=""></a>
        <?php endif; ?>

        <!--<img class="log_way2" src="./images/login/sina@2x.png" alt="">-->
    </div>
</div>

</body>

<script>

    $(".login_immediately").click(function (e){
        let inputUsername = $(this).parents(".login-wrappy").find("input[name=username]")
        let inputPassword = $(this).parents(".login-wrappy").find("input[name=password]")

        if(!inputUsername.val()){
            inputUsername.css("border","1px solid red")
            return false
        }

        if(!inputPassword.val()){
            inputPassword.css("border","1px solid red")
            return false
        }

        $.post("<?= \yii\helpers\Url::to(["site/login"]) ?>",{
            "username":inputUsername.val(),
            "password":inputPassword.val()
        },function (data){
            window.history.back();
        }).fail(function (data,status,xhr){
            $(".errors").show()
            $(".errors p").html(data.responseText)
            console.log(data);
        });

    });


</script>

<style>
    .errors{
        display: none;
        color: red;
    }
</style>