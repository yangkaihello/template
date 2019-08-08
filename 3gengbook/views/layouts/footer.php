<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div id="footer">
    <p>© 2018 <?= Yii::$app->params['platform.name'] ?>3gengbook.com 赣ICP备17002727号</p>
</div>

<?php if( !isset($this->context->user) ): ?>
    <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><!--&times;--></span></button>
                    <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
                </div>
                <div class="modal-body">
                    <div class="tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab"
                                                                      data-toggle="tab">登录</a></li>
                            <li role="presentation"><a href="#register" aria-controls="profile" role="tab" data-toggle="tab">注册</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="login">
                            <div class="form-box">
                                <form class="login-form" method="post" action="<?= Url::to(['site/login']) ?>">
                                    <input name="_csrf-frontend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">
                                    <div class="dol clearfix">
                                        <i class="user-icon"></i>
                                        <input type="text" name="username" required placeholder="请输入用户名">
                                    </div>
                                    <div class="dol clearfix">
                                        <i class="mm-icon"></i>
                                        <input type="password" name="password" required placeholder="请输入密码">
                                        <label class="error password-error"></label>
                                    </div>
                                    <div class="dol clearfix">
                                        <div class="pull-left">
                                            <label for="wjmm">
                                                <input name="rememberMe" id="wjmm" type="checkbox" value=1>
                                                <label></label>
                                                <span class="check">自动登录</span>
                                            </label>
                                        </div>
                                        <!--<div class="pull-right">
                                            <a href="#">忘记密码？</a>
                                        </div>-->
                                    </div>
                                    <div class="dol">
                                        <button type="submit">登录</button>
                                    </div>
                                </form>
                                <!--<div class="qt-title">其他登录方式</div>
                                <ul class="qt-fx clearfix">
                                    <li class="weix"><a href="#">
                                            <img src="./img/weixin.png" alt="">
                                        </a></li>
                                    <li class="qq"><a href="#">
                                            <img src="./img/tenxun.png" alt="">
                                        </a></li>
                                    <li class="weibo"><a href="#">
                                            <img src="./img/weibo.png" alt="">
                                        </a></li>
                                </ul>-->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="register">
                            <div class="form-box">
                                <form class="register-form" method="post" action="<?= Url::to(['site/signup']) ?>">
                                    <input name="_csrf-frontend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">
                                    <div class="dol clearfix">
                                        <i class="user-icon"></i>
                                        <input type="text" required name="username"  placeholder="请输入用户名，包含字母和数字">
                                        <label class="error username-error" for="username"></label>
                                    </div>
                                    <div class="dol clearfix">
                                        <i class="mm-icon"></i>
                                        <input type="password" required id="password" name="password" placeholder="设置密码">
                                    </div>
                                    <div class="dol clearfix">
                                        <i class="mm-icon"></i>
                                        <input type="password" required name="password_again" placeholder="请再次输入密码">
                                        <label class="error password-error"></label>
                                    </div>
                                    <div class="dol clearfix">
                                        <i class="mm-icon"></i>
                                        <input type="text" name="verifyCode" required style="width:205px" placeholder="请填写验证码">
                                        <label class="error verifyCode-error" for="verifyCode"></label>
                                        <?php echo \yii\captcha\Captcha::widget([
                                            'name'  => 'captcha',
                                            'captchaAction'=>['site/captcha'],
                                            'imageOptions'=>
                                                [
                                                    'id'=>'captcha',
                                                    'title'=>'换一个',
                                                    'alt'=>'换一个',
                                                    'class'=>'code-img',
                                                    'style'=>'cursor:pointer;',
                                                ],
                                            'template'=>'{image}',
                                        ]); ?>
                                    </div>

                                    <!--<div class="dol clearfix">
                                        <div class="pull-left">
                                            <label for="tongyi">
                                                <input id="tongyi" checked type="checkbox">
                                                <label></label>
                                                <span class="check">我已阅读并同意 <a href="#">《<?= Yii::$app->params['platform.name'] ?>用户协议》</a> </span>
                                            </label>
                                        </div>
                                    </div>-->
                                    <div class="dol">
                                        <button type="submit">注册</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <?php $this->beginBlock('window.onload'); ?>

    $("#register form").submit(function (e){
    var $this = $(this);
    $.post($(this).attr("action"),$(this).serialize(),function (data){
    window.location.reload();
    }).fail(function (data,status,xhr) {
    $this.find("label.error").html(null);
    for (item in data.responseJSON)
    {
    $this.find("."+item+"-error").html(data.responseJSON[item]);
    }
    });
    return false;
    });

    $("#login form").submit(function (e){
    var $this = $(this);
    $.post($(this).attr("action"),$(this).serialize(),function (data){
    window.location.reload();
    }).fail(function (data,status,xhr) {
    $this.find("label.error").html(null);
    for (item in data.responseJSON)
    {
    $this.find("."+item+"-error").html(data.responseJSON[item]);
    }
    });
    return false;
    });

    <?php $this->endBlock(); ?>
    <?php $this->registerJs($this->blocks['window.onload'],\yii\web\View::POS_END); ?>


<?php endif; ?>

