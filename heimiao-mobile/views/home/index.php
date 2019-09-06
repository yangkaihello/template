<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\SystemPlace[]
 * @var $model \common\models\FictionIndex
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'];

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
\mobile\assets\AppAsset::addCss($this,'static/css/swiper.min.css');
\mobile\assets\AppAsset::addCss($this,'static/css/index.css');
\mobile\assets\AppAsset::addCss($this,'static/css/foot.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'static/js/index.js');
\mobile\assets\AppAsset::addScript($this,'static/js/swiper.min.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>


<section>

    <!--<div class="search-box">
        <form method="get" action="<?/*= Url::to(['home/books']) */?>">
            <div class="search-input">
                <i class='search-icon'></i>
                <input type="text" name="keywords" class="search" placeholder="请输入书名搜索">
            </div>
        </form>
    </div>-->
    <!-- banner -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="<?= Url::to(['fiction/index','id' => 4],true) ?>">
                    <img src="/static/img/lunbo.jpg" alt="" class='banner-img'>
                </a>
            </div>
            <div class="swiper-slide">
                <a href="<?= Url::to(['fiction/index','id' => 1],true) ?>">
                    <img src="/static/img/lunbo1.jpg" alt="" class='banner-img'>
                </a>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <div class="nav">
        <a class="nav-item" href="<?= Url::to(['home/books'],true) ?>">
            <div class="nav-icon-box"><img src="/static/img/index-icon1.png" alt="" class='nav-icon'></div>
            <p class='nav-item-txt'>书库</p>
        </a>
        <a class="nav-item" href="<?= Url::to(['home/rank'],true) ?>">
            <div class="nav-icon-box"><img src="/static/img/index-icon2.png" alt="" class='nav-icon'></div>
            <p class='nav-item-txt'>榜单</p>
        </a>
        <a class="nav-item" href="<?= Url::to(['home/free'],true) ?>">
            <div class="nav-icon-box"><img src="/static/img/index-icon3.png" alt="" class='nav-icon'></div>
            <p class='nav-item-txt'>免费</p>
        </a>
        <a class="nav-item" href="<?= Url::to(['member/pay'],true) ?>">
            <div class="nav-icon-box"><img src="/static/img/index-icon4.png" alt="" class='nav-icon'></div>
            <p class='nav-item-txt'>充值</p>
        </a>
    </div>
    <div class="common">
        <div class="common-title">
            <span class="common-title-left"><?= $models['home_hot']->title ?></span>
            <span class="common-title-right"><a href="<?= Url::to(['home/recommend','category' => $models['home_hot']->SourceTypeSplit()[1] ],true) ?>">查看更多</a></span>
        </div>
        <div class="common-main">
            <?php foreach($models['home_hot']->findBooks([],6) as $key => $model): ?>
            <a class="common-item" href="<?= Url::to(['fiction/index','id' => $model->id ],true) ?>">
                <div class="common-cover"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt=""></div>
                <p class='common-name'><?= $model->title ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="common">
        <div class="common-title">
            <span class="common-title-left"><?= $models['home_edit']->title ?></span>
            <span class="common-title-right"><a href="<?= Url::to(['home/recommend','category' => $models['home_edit']->SourceTypeSplit()[1] ],true) ?>">查看更多</a></span>
        </div>
        <div class="common-main">
            <?php foreach($models['home_edit']->findBooks([],6) as $key => $model): ?>
                <a class="common-item" href="<?= Url::to(['fiction/index','id' => $model->id ],true) ?>">
                    <div class="common-cover"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt=""></div>
                    <p class='common-name'><?= $model->title ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="common">
        <div class="common-title">
            <span class="common-title-left"><?= $models['home_girl']->title ?></span>
            <span class="common-title-right"><a href="<?= Url::to(['home/recommend','category' => $models['home_girl']->SourceTypeSplit()[1] ],true) ?>">查看更多</a></span>
        </div>
        <div class="common-main">
            <?php foreach($models['home_girl']->findBooks([],6) as $key => $model): ?>
                <a class="common-item" href="<?= Url::to(['fiction/index','id' => $model->id ],true) ?>">
                    <div class="common-cover"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt=""></div>
                    <p class='common-name'><?= $model->title ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="list">
        <div class="list-body">
            <?php foreach($models['home_girl']->findBooks(['member','category'],[6,3]) as $key => $model): ?>
                <a class="item" href="<?= Url::to(['fiction/index','id' => $model->id ],true) ?>">
                    <div class="item_left"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="" class='cover'></div>
                    <div class="item_right">
                        <h3 class='bookName'><?= $model->title ?></h3>
                        <p class='bookInfo'>
                            <?= $model->description ?>
                        </p>
                        <p class='auth-info'>
                            <span class='auth'><?= $model->member->authorInfo->penname ?></span>
                            <span class="desc">
                                <span class="classify"><?= $model->category->name ?></span>
                                <span class='status'><?= $model::STATUS_LIST[$model->status] ?></span>
                            </span>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="common">
        <div class="common-title">
            <span class="common-title-left"><?= $models['home_boy']->title ?></span>
            <span class="common-title-right"><a href="<?= Url::to(['home/recommend','category' => $models['home_boy']->SourceTypeSplit()[1] ],true) ?>">查看更多</a></span>
        </div>
        <div class="common-main">
            <?php foreach($models['home_boy']->findBooks([],6) as $key => $model): ?>
                <a class="common-item" href="<?= Url::to(['fiction/index','id' => $model->id ],true) ?>">
                    <div class="common-cover"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt=""></div>
                    <p class='common-name'><?= $model->title ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="list">
        <div class="list-body">

            <?php foreach($models['home_girl']->findBooks(['member','category'],[6,3]) as $key => $model): ?>
                <a class="item" href="<?= Url::to(['fiction/index','id' => $model->id ],true) ?>">
                    <div class="item_left"><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="" class='cover'></div>
                    <div class="item_right">
                        <h3 class='bookName'><?= $model->title ?></h3>
                        <p class='bookInfo'>
                            <?= $model->description ?>
                        </p>
                        <p class='auth-info'>
                            <span class='auth'><?= $model->member->authorInfo->penname ?></span>
                            <span class="desc">
                                <span class="classify"><?= $model->category->name ?></span>
                                <span class='status <?php if($model->status == $model::STATUS_EXIST): ?>serial<?php endif; ?>'><?= $model::STATUS_LIST[$model->status] ?></span>
                            </span>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
    </div>

</section>

<?php $this->beginContent('@mobile/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>


