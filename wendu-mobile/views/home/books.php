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
\mobile\assets\AppAsset::addCss($this,'template/css/bookLibrary.css');
\mobile\assets\AppAsset::addCss($this,'template/css/foot.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'template/js/rank.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<header class='nav'>
    <div class="nav-item <?php if($channel == FictionIndex::CHANNEL_BOY): ?>active<?php endif; ?>">
        <a href="<?= Url::to(['home/books','channel' => FictionIndex::CHANNEL_BOY],true) ?>">男生频道</a>
    </div>
    <div class="nav-item <?php if($channel == FictionIndex::CHANNEL_GIRL): ?>active<?php endif; ?>">
        <a href="<?= Url::to(['home/books','channel' => FictionIndex::CHANNEL_GIRL],true) ?>">女生频道</a>
    </div>
</header>

<div class="classify">
    <div data-name="category_id" class="line">
        <div class="all">
            <div class="classify-all">
                <a data-value="all" <?php if("all" == Yii::$app->request->get('category_id','all')): ?>class="active"<?php endif; ?>>全部</a>
            </div>
        </div>
        <div class="classify-right">
            <?php foreach($category as $value): ?>
            <div class="classify-item">
                <a data-value="<?= $value->id ?>" <?php if($value->id == Yii::$app->request->get('category_id')): ?>class="active"<?php endif; ?> ><?= $value->name ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div data-name="status" class="line">
        <div class="all">
            <div class="classify-all">
                <a data-value="all" <?php if("all" == Yii::$app->request->get('status','all')): ?>class="active"<?php endif; ?>>全部</a>
            </div>
        </div>
        <div class="classify-right">
            <?php foreach(FictionIndex::STATUS_LIST as $key=>$value): ?>
            <div class="classify-item">
                <a data-value="<?= $key ?>" <?php if($key == Yii::$app->request->get('status')): ?>class="active"<?php endif; ?> ><?= $value ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<div class="list">
    <div class="list-body">
        <?php foreach($models as $key => $model): ?>
        <a class="item" href="<?= Url::to(['fiction/index','id' => $model->id],true) ?>">
            <div class="item_left"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER)?>" alt="" class='cover'></div>
            <div class="item_right">
                <h3 class='bookName'><?= $model->title ?></h3>
                <p class='bookInfo'>
                    <?= $model->description ?>
                </p>
                <p class='auth-info'>
                    <span class='auth'><?= $model->member->authorInfo->penname ?></span>

                    <span class="desc">
                      <span class="classify"><?= $model->category->name ?></span>
                      <span class='status <?php if($model->status == $model::STATUS_EXIST): ?>serial<?php endif; ?>'>
                          <?= $model::STATUS_LIST[$model->status] ?>
                      </span>
                    </span>
                </p>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?php $this->beginContent('@mobile/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>

    $(".classify .line a").click(function (e){

        $(this).parents(".line").find("a").removeClass('active');
        $(this).addClass('active');

        var href = [];
        $(".classify .line").each(function (key,value){
            var name = $(value).data("name");
            var selected = $(value).find("a[class=active]").data('value');

            href.push(name+"="+selected);
        });

        window.location = window.location.pathname + "?" + href.join("&");
    });

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

</style>

<?php $this->endBlock(); ?>


