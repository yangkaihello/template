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
\mobile\assets\AppAsset::addCss($this,'template/css/readingPages.css');
\mobile\assets\AppAsset::addCss($this,'template/css/shade.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'template/js/mobile.js?v1.1');
\mobile\assets\AppAsset::addScript($this,'template/js/shade.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<section>

    <div class="book">
        <div class="title">
            <?= $model->title ?>
        </div>
        <div>
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
    </div>
    <div class="sections">

        <div class="left">
            <?php if($chapterUp): ?>
                <a href="<?= Url::to(['chapter/index','fiction_id' => $chapterUp->fiction_id,'sort' => $chapterUp->sort]) ?>">上一章</a>
            <?php else: ?>
                <a href="#this">起始章</a>
            <?php endif; ?>
        </div>
        <div><a href="<?= Url::to(['fiction/chapter','id' => $fiction->id]) ?>">目录</a></div>
        <div class="right">
            <?php if($chapterDown): ?>
                <a href="<?= Url::to(['chapter/index','fiction_id' => $chapterDown->fiction_id,'sort' => $chapterDown->sort]) ?>">下一章</a>
            <?php else: ?>
                <a class="red" href="#this">已读完</a>
            <?php endif; ?>
        </div>
    </div>

</section>

</body>
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

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    a{
        color: inherit;
    }
    .book a.button{
        width: 1.5rem;
        height: 0.4rem;
        line-height: 0.4rem;
        margin: 0 auto;
        margin-top: 0.8rem;
        display: block;
        text-align: center;
        border: 1px solid darkorange;
        border-radius: 4px;
        color: #fff;
        background-color: coral;
    }
    .red{
        color:red;
    }

</style>

<?php $this->endBlock(); ?>


