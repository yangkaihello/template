<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $fiction \common\models\FictionIndex
 * @var $model \common\models\FictionChapter
 * @var $chapterUp \common\models\FictionChapter
 * @var $chapterDown \common\models\FictionChapter
 * @var $freeStart \common\models\FictionChapter
 */

use common\models\MemberUserWechat;
use common\popular\Handle;
use common\popular\RequestHandle;
use yii\helpers\Url;

$this->title = $fiction->title;
$this->context->backHref = Url::to(['fiction/index','id' => $fiction->id],true);

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

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'template/js/jquery-1.11.3.min.js');
\mobile\assets\AppAsset::addScript($this,'template/js/mobile.js');


?>

<header class="header-title nobackcolor">
    <span onclick="window.history.back()" class="header-return"><i class="backIcon"></i></span><?= $fiction->title ?>
    <div class="model_switch" id="swtBox">
        <em class="boll"></em><span id="swtBut">日间</span>
    </div>
</header>
<div class="header-height"></div>
<div class="du-wrappy">
    <div class="du_con">
        <h2 class="du_title"><?= $model->title ?></h2>
        <?php if($model->isVip == $model::VIP_YES && isset($this->context->user) && $this->context->user->hasReadFictionOrDec($model)): ?>

            <?= Handle::formatContent($model->content) ?>

        <?php else: ?>

            <?php if($model->isVip == $model::VIP_YES): ?>
                <?= Handle::formatReduceContent($model->content) ?>
                <?php if(isset($this->context->user)): ?>
                    <a class="button" href="<?= Url::to(['member/pay']) ?>" >缺少书币</a>
                <?php else: ?>
                    <a class="button" href="<?= Url::to(['site/login-select']) ?>" >请先登陆</a>
                <?php endif; ?>
            <?php else: ?>
                <?= Handle::formatContent($model->content) ?>
            <?php endif; ?>

        <?php endif; ?>
    </div>
    <div class="du_bottom">
        <?php if($chapterUp): ?>
            <a href="<?= Url::to(['chapter/index','fiction_id' => $chapterUp->fiction_id,'sort' => $chapterUp->sort]) ?>">上一章</a>
        <?php else: ?>
            <a href="#this">起始章</a>
        <?php endif; ?>
        <a href="<?= Url::to(['fiction/chapter','id' => $fiction->id]) ?>">目录</a>

        <?php if($chapterDown): ?>
            <a href="<?= Url::to(['chapter/index','fiction_id' => $chapterDown->fiction_id,'sort' => $chapterDown->sort]) ?>">下一章</a>
        <?php else: ?>
            <a href="#this">已读完</a>
        <?php endif; ?>
    </div>
    <div class="du_bottom_height">

    </div>
</div>


<?php if(
    RequestHandle::isWechat(Yii::$app->request) &&
    isset($this->context->user) &&
    ((intval($model->sort - ($freeStart->sort ?? 10000)) == 4) || ($model->sort == 5)) &&
    !MemberUserWechat::findByApiUserInfo($this->context->user->id)
): ?>
    <div class="shade-mobile">
        <div class="close">&times;</div>
        <div class="shadow"></div>
        <div class="center">
            <div style="font-size: 0.2rem;background-color: #fff;padding: 0.1rem;text-align: center;">
                长按识别图中二维码；关注公众号，方便下次阅读
            </div>
            <div style="width: 3rem;height: 3rem;">
                <img width="100%" height="100%" src="/template/img/official-qrcode.jpg"  />
            </div>
        </div>
    </div>
<?php endif; ?>




<?php $this->beginBlock('window.js'); ?>

<script>

    function yangkaiMoveX(x,e)
    {
        if(x == 'left')
        {
            $(".sections .left a").trigger("click");
        }else{
            $(".sections .right a").trigger("click");
        }
    }

    var blackModel = StorageContent()

    $("#swtBox").click(function(){

        if(!blackModel)
        {
            $("#swtBut").text("夜间")
            $(this).addClass("active")
            $("body").addClass("black")
            StorageContent(0)
            blackModel = 1
        }
        else
        {
            $("#swtBut").text("日间")
            $(this).removeClass("active")
            $("body").removeClass("black")
            StorageContent(1)
            blackModel = 0
        }

    })


    $(function (){
        $("#swtBox").trigger("click");
    })

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    body{
        background: #f2fbee;
    }
    .du_con .button {
        width: 100%;
        display: inline-block;
        text-align: center;
        height: 1rem;
        line-height: 1rem;
        background: lightblue;
        color: cornflowerblue;
    }
</style>

<?php $this->endBlock(); ?>


