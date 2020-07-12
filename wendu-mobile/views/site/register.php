<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
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
        <input class="plone" type="text" name="username" placeholder="邮箱">
        <!--<img class="iocn3" src="/template/images/login/图层 13@2x.png" alt="">-->
    </div>
    <div class="input1">
        <img class="iocn4" src="/template/images/login/密码icon 8@2x.png" alt="">
        <input class="plone" type="password" name="password" placeholder="设置密码">
    </div>
    <div class="input1">
        <img class="iocn4" src="/template/images/login/密码icon 8@2x.png" alt="">
        <input class="plone" type="password" name="password_again" placeholder="确认密码">
    </div>
    <div class="input1">
        <img class="iocn5" src="/template/images/login/验证码@2x.png" alt="">
        <input class="plone" type="text" name="verifyCode" placeholder="验证码">
        <button class="verification_code">获取验证码</button>
    </div>

    <div class="input1 errors">
        <p></p>
    </div>

    <div class="immediately">
        <button class="login_immediately">立即注册</button>
    </div>
    <div class="login_existing">
        <p class="existing">
            <span>已有账号，</span>
            <a class="existing_mane" href="<?= \yii\helpers\Url::to(["site/login-select"]) ?>">立即登录</a>
        </p>
    </div>
</div>
</body>

<script>

    $(".verification_code").click(function (e){
        let email = $(".login-wrappy").find("input[name=username]").val()
        if(!email){
            alert("邮箱不能为空");
            return false;
        }

        $.post("<?= \yii\helpers\Url::to(["site/email-register"]) ?>",{email:email},function (){
            alert("验证码已发送至邮箱!")
        }).fail(function (data,status,xhr){
            console.log(data.responseJSON);
        });
    });

    $(".login_immediately").click(function (e){
        let inputUsername = $(this).parents(".login-wrappy").find("input[name=username]")
        let inputPassword = $(this).parents(".login-wrappy").find("input[name=password]")
        let inputPasswordAgain = $(this).parents(".login-wrappy").find("input[name=password_again]")
        let inputVerifyCode = $(this).parents(".login-wrappy").find("input[name=verifyCode]")

        if(!inputUsername.val()){
            inputUsername.css("border","1px solid red")
            return false
        }

        if(!inputPassword.val()){
            inputPassword.css("border","1px solid red")
            return false
        }

        if(!inputPasswordAgain.val()){
            inputPasswordAgain.css("border","1px solid red")
            return false
        }

        if(!inputVerifyCode.val()){
            inputVerifyCode.css("border","1px solid red")
            return false
        }

        $.post("<?= \yii\helpers\Url::to(["site/register-submit"]) ?>",{
            "username":inputUsername.val(),
            "password":inputPassword.val(),
            "password_again":inputPasswordAgain.val(),
            "verifyCode":inputVerifyCode.val()
        },function (data){
            window.location.href = "/";
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