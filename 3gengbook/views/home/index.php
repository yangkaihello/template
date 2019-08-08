<?php

/* @var $this yii\web\View */
/* @var $model \common\models\ContactForm */

use common\popular\Handle;
use yii\helpers\Url;
use yii\helpers\Html;
use common\models\SystemPlace;

$this->title = Yii::$app->params['platform.name'] . '-首页';

/* 预加载CSS */
//'css/bootstrap.min.css',
//'css/sprites.css',
//'css/app.css',

/*预加载JS*/
//'js/bootstrap.min.js',
//'js/app.js',


?>

    <!-- 轮播图块 -->
<?php $this->beginBlock('index.carousel'); ?>
    <div id="index_carousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#index_carousel" data-slide-to="0" class="active"></li>
            <li data-target="#index_carousel" data-slide-to="1"></li>
            <li data-target="#index_carousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <a href="<?= Url::to(['fiction/index','id' => 6]) ?>"><img src="/template/img/banner1.jpeg" alt="First slide"></a>
            </div>
            <div class="item">
                <a href="<?= Url::to(['fiction/index','id' => 2]) ?>"><img src="/template/img/banner2.jpeg" alt="Second slide"></a>
            </div>
            <div class="item">
                <a href="<?= Url::to(['chapter/short','id' => 4]) ?>"><img src="/template/img/banner3.jpeg" alt="Third slide"></a>
            </div>
        </div>
    </div>
<?php $this->endBlock(); ?>

    <!-- 公告栏块 -->
<?php $this->beginBlock('header.message'); ?>
    <!--<div class="header-meg clearfix">
        <div class="pull-left">
            <p><a href="#">平台有新功能上线了平台有新功能上线了平台有新功能上线了</a></p>
        </div>
        <div class="pull-right">
            <p>2018-10-12</p>
        </div>
    </div>-->
<?php $this->endBlock(); ?>

<body class="page1">

    <div class="index-bg wykz-bg"></div>
    <div class="wrap index clearfix">
        <?php $this->beginContent('@frontend.template/views/layouts/header.php'); ?>

        <?php $this->endContent(); ?>
        <div class="book-items">
            <div class="book-title">
                <div class="eye">
                </div><br>
                <img src="/template/img/t3.png" alt="">
            </div>
            <div class="heng clearfix">
                <div class="items">
                    <?php foreach($fictionShort as $value): ?>
                    <div class="item">
                        <div class="img-box">
                            <a href="<?= Url::to(['chapter/short','id' => $value->id]) ?>">
                                <img src="<?= Handle::getUploadSrc($value->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" height="100%" width="100%" alt="">
                            </a>
                        </div>
                        <p class="desc">
                            <a href="<?= Url::to(['chapter/short','id' => $value->id]) ?>">
                                <?= $value->title ?>
                            </a>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="book-items">
            <div class="book-title">
                <div class="eye">
                </div><br>
                <img src="/template/img/t2.png" alt="">
            </div>
            <div class="shu clearfix">
                <div class="items">
                    <?php foreach($fictionLong as $value): ?>
                    <div class="item">
                        <div class="img-box">
                            <a href="<?= Url::to(['fiction/index','id' => $value->id]) ?>">
                                <img src="<?= Handle::getUploadSrc($value->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" height="100%" width="100%" alt="">
                            </a>
                        </div>
                        <p class="title">
                            <a href="<?= Url::to(['fiction/index','id' => $value->id]) ?>"><?= $value->title ?></a>
                        </p>
                        <p class="user"><?= $value->member->authorInfo->penname ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="book-items">
            <div class="book-title">
                <div class="eye">
                </div><br>
                <img src="/template/img/t1.png" alt="">
            </div>
            <div class="san clearfix">
                <div class="items">
                    <div class="item">
                        <div class="img-box">
                            <img src="/template/img/wenxue.jpg" alt="">
                        </div>
                        <div class="title">
                            发行渠道商
                        </div>
                        <div class="box clearfix">
                            <div class="list">
                                <div class="logo-img">
                                    <img src="/template/img/homeLog/niuniutui-logo.jpg" height="100%" width="100%" alt="">
                                </div>
                                <p class="name">牛牛推</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img-box">
                            <img src="/template/img/yousheng.jpg" alt="">
                        </div>
                        <div class="title">
                            发行渠道商
                        </div>
                        <div class="box clearfix">
                            <div class="list">
                                <div class="logo-img">
                                    <img src="/template/img/homeLog/niuniutui-logo.jpg" height="100%" width="100%" alt="">
                                </div>
                                <p class="name">牛牛推</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="img-box">
                            <img src="/template/img/manhua.jpg" alt="">
                        </div>
                        <div class="title">
                            发行渠道商
                        </div>
                        <div class="box clearfix">
                            <div class="list">
                                <div class="logo-img">
                                    <img src="/template/img/homeLog/niuniutui-logo.jpg" height="100%" width="100%" alt="">
                                </div>
                                <p class="name">牛牛推</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="friend-chain">
            <p class="title">
                合作商
            </p>
            <ul class="clearfix">
                <li>
                    <a href="#this">青椒阅读</a>
                </li>
                <li>
                    <a href="#this">红书汇</a>
                </li>
                <li>
                    <a href="#this">热点文学</a>
                </li>
                <li>
                    <a href="#this">伏天文学</a>
                </li>
            </ul>
        </div>
        <?php $this->beginContent('@frontend.template/views/layouts/floating.php'); ?>

        <?php $this->endContent(); ?>
    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>
</body>

<?php $this->beginBlock('window.onload'); ?>

$("#index_carousel").carousel({
interval: 2000
});

<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['window.onload'],\yii\web\View::POS_END); ?>

