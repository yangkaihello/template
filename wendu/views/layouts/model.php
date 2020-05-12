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

<?php else: ?>
    <div class="shade_box" style="display: none;"></div>
    <div class="dateTime_box" style="display: none;">
        <img class="logcloseBtn" onclick="hideQd()" src="/template/img/clonef.png">
        <div class="dateTime_header">
            <h1> <span class="buy">0</span> <span class="pi">币</span></h1>
            <h2>已累计获得的书币</h2>
        </div>
        <div class="dayBox">
            <div id="calendar">

            </div>
            <div class="qiandaotishi">您已连续签到 <b>0</b> 天</div>
            <a id="sign-submit" class="qiandaobtn" href="javascript:">签 到</a>
        </div>
    </div>
<?php endif; ?>