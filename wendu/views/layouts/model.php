<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2020/5/2
 * Time: 11:47
 *
 * @var $this yii\web\View
 */
use yii\helpers\Url;

?>

<!-- 这是一个登录弹窗 -->
<?php if(!$this->context->user): ?>
    <div class="shade_box" style="display: none;"></div>
    <div class="login_box" style="display: none;">
        <img class="logcloseBtn" src="/template/img/closebtn.png">
        <h1 class="title">温度中文网</h1>
        <form method="post" action="<?= Url::to(["site/login"])?>">
            <input name="<?= Yii::$app->request->csrfParam ?>" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="input_box">
                <i class="icons_peop"></i>
                <input name="username" type="text" required maxlength="28" placeholder="邮箱/手机号">
            </div>
            <div class="input_box">
                <i class="icons_pwd"></i>
                <input name="password" type="password" required maxlength="28" placeholder="密码">
            </div>
            <div class="orderCheckbox">
                <label> <input name="rememberMe" type="checkbox" value="true"> 自动登录 </label>
                <a href="#this">忘记密码请联系管理人员</a>
            </div>
            <div class="errors" style="color:red;padding-bottom: 10px;">

            </div>
            <div class="btn"><a id="login-button" href="#this">登录</a></div>

        </form>
        <div class="orderinfobox">
            <a href="#this">还没有帐号？立即免费注册</a>
            <!--<label> <input type="checkbox"> 记住我 </label>-->
        </div>
        <div class="iconsboxall">
            <a href="#this"><img src="/template/img/QQ.png"></a>
            <a href="#this"><img src="/template/img/wechat.png"></a>
            <a href="#this"><img src="/template/img/sina.png"></a>
        </div>
    </div>
<?php endif; ?>