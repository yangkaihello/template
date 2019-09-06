<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $type \common\models\PaymentType[]
 */

use common\popular\Handle;
use common\popular\RequestHandle;
use yii\helpers\Url;

$this->title = '充值中心';

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
\mobile\assets\AppAsset::addCss($this,'static/css/reChargeCenter.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'static/js/index.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<div class="top">
    <div class="top-left">
        <div class="avator">
            <img src="<?= Handle::getUploadSrc($this->context->user->icon,Handle::UPLOAD_SRC_MEMBER_ICON_M) ?>" />
        </div>
        <div class="avator-right">
            <p class='name'><?= $this->context->user->userInfo->showname ?></p>
            <p class='bookMoney'><span class='book-num'><?= $this->context->user->property->buy ?? 0 ?></span><span class='shubi'>书币</span></p>
        </div>
    </div>
    <!--<a href="my.html" class='detail'>明细</a>-->
</div>
<div class="money">
    <?php foreach($type as $value): ?>
    <div data-id="<?= $value->id ?>" class="money-i"><?= $value->price ?>元</div>
    <?php endforeach; ?>
</div>
<div class="tip">
    <p class="tip-item">1元=100书币</p>
    <p class="tip-item">2.阅读一章付费章节消耗<?= $setting->value ?>书币</p>
    <p class="tip-item">3.书币为虚拟商品，一经出售不得退换</p>
</div>
<div class="pay">
    <div class="pay-title">选择支付方式</div>
    <input type="hidden" name="member_id" value="<?= $this->context->user->id ?>" />

    <?php if(isset(Yii::$app->params['wechat']) && RequestHandle::isWechat(Yii::$app->request)): ?>
    <div class="pay-way">
        <div class="pay-way-left">
            <i class="pay-icon wx-icon"></i>
            <span>微信支付</span>
        </div>
        <div class="pay-way-right"><input type="radio" name='pay-way' class='pay-selection' value="<?= Yii::$app->params['thirdly.domain'] . Url::to( ['/wechat/pay/mobile'] ) ?>" ></div>
    </div>
    <?php endif; ?>

    <?php if(isset(Yii::$app->params['alipay']) && !RequestHandle::isWechat(Yii::$app->request)): ?>
    <div class="pay-way">
        <div class="pay-way-left">
            <i class="pay-icon zfb-icon"></i>
            <span>支付宝支付</span>
        </div>
        <div class="pay-way-right"><input type="radio" name='pay-way' class='pay-selection' value="<?= Yii::$app->params['thirdly.domain'] . Url::to( ['/alipay/pay/mobile'] ) ?>" ></div>
    </div>
    <?php endif; ?>

    <!--<div class="pay-way">
        <div class="pay-way-left">
            <i class="pay-icon yl-icon"></i>
            <span>银行卡支付</span>
        </div>
        <div class="pay-way-right"><input type="radio" name='pay-way' class='pay-selection'></div>
    </div>-->
</div>
<a href="#this" class='confirm'>确认支付</a>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>

    $('.money-i').on('click', function (e) {
        $(this).addClass('active').siblings().removeClass('active')
    });

    $(".pay-way").on('click',function (e){
        $(this).find("input").prop("checked",true);
    });

    $(".confirm").on('click',function (){

        if(!$('.money-i.active').data("id"))
        {
            alert("请选择充值金额");
            return false;
        }

        if($('.pay-selection:checked').length == 0)
        {
            alert("请选择充值方式");
            return false;
        }

        var param = [
            'type_id='+$('.money-i.active').data("id"),
            'member_id='+$('input[name=member_id]').val(),
        ];

        location.href= $('.pay-selection:checked').val() + "/?" + param.join("&");

    });

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    .avator img{
        width: 100%;
        height: 100%;
    }
</style>

<?php $this->endBlock(); ?>


