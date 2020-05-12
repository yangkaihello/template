<?php

/**
 * @var $this \yii\web\View
 * @var $models \common\models\PaymentType[]
 * @var $setting \common\models\SystemSetting
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'] . "-书币充值";

/*$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => '原创小说;精品小说;长篇小说连载;优质小说阅读;都市情感小说;婚恋小说',
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => '',
]);*/

/* 预加载CSS */
//'template/css/style.css',
//'template/css/swiper.min.css',

/*预加载JS*/
//'template/js/jquery-1.11.3.min.js',
//'template/js/swiper.min.js',
//'template/js/action.js',

?>

<?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

<?php $this->endContent(); ?>

<div class="main_box">
    <div class="center_box" style="min-height: 800px;">

        <div class="sort_wrappy">
            <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

            <?php $this->endContent(); ?>
        </div>
        <?php if($this->context->user): ?>
        <div class="pay_wrappy">
            <h2 class="title">账户中心</h2>
            <div class="yuerpay">
                账户余额：
                <h3><?= $this->context->user->property->buy ?? 0 ?> 充值书币 | <?= $this->context->user->property->buy_give ?? 0 ?> 免费书币</h3>
            </div>
            <div class="pay_num">
                <h3>请选择充值金额</h3>
                <?php foreach ($models as $key=>$model): ?>
                <span data-price="<?= $model->price ?>"
                      data-buy="<?= $model->getBuyValue()->buy_money ?>"
                      data-id="<?= $model->id ?>"
                      <?php if($key == 0): ?>class="active"<?php endif; ?>
                      ><?= $model->title ?></span>
                <?php endforeach; ?>
                <span><input class="orderMonery" type="number" min="0" placeholder="其他金额">元</span>
            </div>

            <div class="pay_type">
                <h3>请选择充值方式</h3>
                <span class="active"><img src="/template/img/zhifubao.jpg"></span>
                <!--<span><img src="/template/img/wx.jpg"></span>-->
                <!--<span><img src="/template/img/yinlian.jpg"></span>-->
            </div>

            <div class="pay_butbox">
                <a href="#this" class="greenbut">去充值</a>
                <span class="pay_tisbox">可获得<em>0</em>书币</span>
            </div>

            <form id="pay-submit" method="post" action="<?= Url::to(["pay/submit"]) ?>">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>" />
                <input type="hidden" name="type_id" />
                <input type="hidden" name="price" />
                <input type="hidden" name="pay" value="alipay" />
            </form>
        </div>
        <?php else: ?>
            <h2 class="title" id="force-login" style="cursor:pointer; margin: 100px auto;display: table;background: #A04456;color: #fff;border-radius: 5px;padding: 10px 20px">点击登录</h2>
        <?php endif; ?>
    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>

</div>

<?php $this->beginBlock('window.js'); ?>

<script>

    $(".pay_wrappy .pay_num span").click(function (e){
        $(this).parents(".pay_num").find("span").removeClass("active");
        $(this).addClass("active");

        if ( !$(this).data("id") ){
            if(!$(this).find(".orderMonery").val()){
                setBuy(0)
                $("#pay-submit").find("input[name=type_id]").val(null);
                $("#pay-submit").find("input[name=price]").val($(this).data("price"));
            }
        }else{
            setBuy($(this).data("buy"));
            $(this).parents(".pay_num").find(".orderMonery").val(null);
            $("#pay-submit").find("input[name=type_id]").val($(this).data("id"));
            $("#pay-submit").find("input[name=price]").val($(this).data("price"));
        }
    });

    $(".pay_num .orderMonery").bind('input propertychange',function (e){
        setBuy($(this).val()*<?= $setting->value ?>)
        $("#pay-submit").find("input[name=price]").val($(this).val());
    });

    $(".pay_butbox .greenbut").click(function (e){
        $("#pay-submit").submit();
    });


    $(".pay_wrappy .pay_num span.active").click();
    function setBuy(number)
    {
        $(".pay_butbox .pay_tisbox em").html(number);
    }




</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>


</style>

<?php $this->endBlock(); ?>


