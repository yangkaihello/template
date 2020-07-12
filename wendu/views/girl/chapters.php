<?php

/**
 * @var $this \yii\web\View
 * @var $fiction FictionIndex
 * @var $freeChapter \common\models\FictionChapter[]
 * @var $payChapter \common\models\FictionChapter[]
 */

use common\models\FictionIndex;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['platform.name'] . $fiction->title . '-章节列表';

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
    <div class="center_box">

        <div class="sort_wrappy">
            <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

            <?php $this->endContent(); ?>
        </div>

        <div class="sbannerbox">
            <a target="_blank" href="<?= $ad["header"]["one"]["url"] ?>"><img src="<?= $ad["header"]["one"]["image"] ?>"></a>
        </div>

        <!--  -->
        <div class="catalog_wrappy">
            <div class="catalog_box">
                <h2 class="titles"><b><?= $fiction->title ?>·共<?= count($freeChapter) ?>章</b> <span class="icon_mf">免费</span> <!--本卷共28453字--></h2>
                <div class="catalog_book clearfix">
                    <?php foreach($freeChapter as $chapter): ?>
                    <p class="items"><a href="<?= Url::to(["home/chapter","fiction_id" => $chapter->fiction_id,"sort" => $chapter->sort])?>"><?= $chapter->title ?></a></p>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="catalog_box">
                <h2 class="titles"><b><?= $fiction->title ?>·共<?= count($payChapter) ?>章</b> <span class="icon_Vip">VIP</span> <!--本卷共28453字--></h2>
                <div class="catalog_book clearfix">
                    <?php foreach($payChapter as $chapter): ?>
                        <p class="items"><a href="<?= Url::to(["home/chapter","fiction_id" => $chapter->fiction_id,"sort" => $chapter->sort])?>"><?= $chapter->title ?></a></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>

</div>



<?php $this->beginBlock('window.js'); ?>

<script>
    $(".sort_keywordbox .sort_kitem em.it").click(function (e){

        $(this).parents(".sort_kitem").find("em").attr('class',"it");
        $(this).attr('class','it active');

        var href = [];
        $(".sort_keywordbox .sort_kitem").each(function (key,value){
            var name = $(value).data("name");
            var selected = $(value).find("em.active").data('value');

            href.push(name+"="+selected);
        });

        window.location = window.location.pathname + "?" + href.join("&");
    });
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>


