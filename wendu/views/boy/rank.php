<?php

/**
 * @var $this \yii\web\View
 * @var $models FictionIndex[]
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
                <a href="#this"><img src="/template/img/banner3.jpg"></a>
            </div>
            <!--  -->
            <div class="ph_box clear">
                <div class="phleft_box">
                    <div style="cursor: pointer;" class="comtitle" onclick=" window.location.href= '<?= Url::to(["home/ranks"]) ?>' " >全部排行榜</div>
                    <?php foreach($ranks as $key=>$rank): ?>
                        <div class="phi"><a href="<?= Url::to(["home/rank","type" => $key]) ?>"><?= $rank["title"] ?></a></div>
                    <?php endforeach; ?>
                </div>
                <div class="phright_box">
                    <div class="ph_list">
                        <table>

                            <tr><th>序号</th><th>分类</th> <th>书名/最终章节</th><th>字数</th><th>作者</th><th>更新时间</th></tr>

                            <?php foreach($models as $key=>$model ):?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td>【<?= $model->category->name ?>】</td>
                                <td>
                                    <a href="<?= Url::to(["home/book","fiction_id" => $model->id]) ?>">
                                        <b><?= $model->title ?></b> <?= $model->chapter->title ?? "" ?>
                                    </a>
                                </td>
                                <td><?= $model->charSize ?></td>
                                <td><?= $model->member->authorInfo->penname ?></td>
                                <td><?= \common\extend\DateTime::formatDate($model->created_at ?? null,"m-d H:i") ?></td>
                            </tr>
                            <?php endforeach; ?>

                        </table>
                    </div>
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


