<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $category \common\models\FictionCategory[]
 * @var $models FictionIndex[]
 * @var $channel string
 */

use common\models\FictionIndex;
use common\models\MemberIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = '书库';

/*$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => '原创小说;精品小说;长篇小说连载;优质小说阅读;都市情感小说;婚恋小说',
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => '',
]);*/

/* 预加载CSS */
//'template/css/reset.css',
\mobile\assets\AppAsset::addCss($this,'static/css/my.css');
\mobile\assets\AppAsset::addCss($this,'static/css/foot.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'static/js/rank.js');


?>


<body>

<div class="head"><?= $this->title ?></div>
<div class="headbody">
    <div class="user"><img src="<?= Handle::getUploadSrc($this->context->user->icon,Handle::UPLOAD_SRC_MEMBER_ICON_M) ?>" alt=""></div>
    <div class="userDetail">
        <div class="userDetail1"><?= $this->context->user->userInfo->showname ?? "" ?></div>
        <div class="userDetail2">ID:<?= $this->context->user->id ?></div>
        <div class="userDetail3">
            <?php switch ($this->context->user->type):case MemberIndex::TYPE_DEFAULT: ?>
                    普通用户
                    <?php break;?>
                <?php case MemberIndex::TYPE_WECHAT: ?>
                    微信用户
                    <?php break;?>
                <?php case MemberIndex::TYPE_QQ: ?>
                    QQ用户
                    <?php break;?>
                <?php endswitch; ?>
        </div>
    </div>
</div>
<ul class="myul">
    <li>
        <a href="<?= Url::to(['member/pay'],true) ?>">
            <div class="firstLi">
                <img src="/static/img/my_06.png" alt="">
                <div>书币充值</div>
            </div>
            <div class="secondLi">
                <div>书币余额:<span><?= $this->context->user->property->buy ?? 0 ?></span></div>
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>
    </li>
    <!--<li>
        <a href="bookshelf.html">
            <div class="firstLi">
                <img src="/static/img/my_09.png" alt="">
                <div>我的书卷</div>
            </div>
            <div class="secondLi">
                <div><span>0</span>书卷</div>
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>
    </li>
    <li>
        <a href="link.html">
            <div class="firstLi">
                <img src="/static/img/my_11.png" alt="">
                <div>邀请好友</div>
            </div>
            <div class="secondLi">
                <div>邀请可获得<span>50</span>书币</div>
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>

    </li>-->
    <li>
        <a href="<?= Url::to(['member/order/index'],true) ?>">
            <div class="firstLi">
                <img src="/static/img/my_13.png" alt="">
                <div>充值记录</div>
            </div>
            <div class="secondLi">
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>

    </li>
    <li>
        <a href="<?= Url::to(['member/reader'],true) ?>">
            <div class="firstLi">
                <img src="/static/img/my_15.png" alt="">
                <div>阅读足迹</div>
            </div>
            <div class="secondLi">
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['member/service'],true) ?>">
            <div class="firstLi">
                <img src="/static/img/my_17.png" alt="">
                <div>联系客服</div>
            </div>
            <div class="secondLi">
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>
    </li>
    <!--<li>
        <a href="link.html">
            <div class="firstLi">
                <img src="/static/img/my_23.png" alt="">
                <div>手机绑定</div>
            </div>
            <div class="secondLi">
                <div>绑定手机号</div>
                <img src="/static/img/my_19.png" alt="">
            </div>
        </a>
    </li>-->

    <li>
        <a href="<?= Url::to(['site/logout'],true) ?>">
            <div class="firstLi">
                <img src="/static/img/my_18.png" alt="">
                <div>退出登陆</div>
            </div>
        </a>
    </li>
</ul>

<?php $this->beginContent('@mobile/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>


</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    a{
        color: inherit;
    }
    .line a:after{
        content: unset;
    }
    footer .bottom{
        display: none;
    }
</style>

<?php $this->endBlock(); ?>


