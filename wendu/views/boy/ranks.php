<?php

/**
 * @var $this \yii\web\View
 * @var $model FictionIndex
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'] . "-全部排行";

$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => Yii::$app->params['platform.name'] . ";全部排行",
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => Yii::$app->params['platform.name'] . "-全部排行",
]);

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
<div class="greyStyle">

    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main_box">
        <div class="center_box" style="min-height: 800px;">

            <div class="sort_wrappy">
                <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

                <?php $this->endContent(); ?>
            </div>

            <!--  -->
            <div class="sbannerbox">
                <a target="_blank" href="<?= $ad["header"]["one"]["url"] ?>"><img src="<?= $ad["header"]["one"]["image"] ?>"></a>
            </div>
            <!--  -->
            <div class="ph_box clear">
                <div class="phleft_box">
                    <div style="cursor: pointer;" class="comtitle" onclick=" window.location.href= '<?= Url::to(["home/ranks"]) ?>' ">全部排行榜</div>
                    <?php foreach($ranks as $key=>$rank): ?>
                        <div class="phi"><a href="<?= Url::to(["home/rank","type" => $key]) ?>"><?= $rank["title"] ?></a></div>
                    <?php endforeach; ?>
                </div>
                <div class="phright_box">
                    <?php foreach ($ranks as $rank): ?>
                        <div class="phitems">
                            <div class="com_booklist">
                                <div class="comtitle"><?= $rank["title"]?></div>
                                <div class="ec">
                                    <!-- 循环 第一个默认给上active-->
                                    <?php foreach($rank["models"] as $key=>$model): ?>
                                        <div class="combookitem <?php if($key == 0): ?>active<?php endif; ?>" onclick=" window.location.href= '<?= Url::to(["home/book","fiction_id" => $model->id])?>' ">
                                            <div class="compicbox"><span class="comkeyvalue"><?= $key+1 ?></span><img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER)?>"></div>
                                            <div class="comrighttbox">
                                                <h1><?= $model->title ?></h1>
                                                <h2>作者：<?= $model->member->authorInfo->penname ?></h2>
                                                <h3>分类：<?= $model->category->name ?></h3>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--  -->
        </div>

        <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

        <?php $this->endContent(); ?>

    </div>
</div>

<?php $this->beginBlock('window.js'); ?>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 6,
        centeredSlides: false,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })

    var swiper = new Swiper('.banner-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>


</style>

<?php $this->endBlock(); ?>


