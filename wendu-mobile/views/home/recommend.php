<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\FictionIndex[]
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = "主编推荐";

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
//\mobile\assets\AppAsset::addCss($this,'template/css/hot.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'template/js/index.js');


?>


<header class="header-title" style="background: #EBEBEB">
    <span onclick="window.history.back()" class="header-return"><i class="backIcon"></i></span>主编推荐
</header>
<div class="header-height"></div>


<div class="tuijian-wrappy">
    <div class="mobu_back"></div>

    <div class="tj_conten">
        <?php foreach($models as $model): ?>
            <a href="<?= Url::to(["fiction/index","id"=>$model->id]) ?>">
                <div class="items">
                    <div class="p1">
                        <img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                    </div>
                    <div class="p2">
                        <h2><?= $model->title ?> <b><?= \common\models\MemberGrade::GradeReadSum($model->statisticalRead->grade) ?></b></h2>
                        <p><?= Handle::chapterFormattingSection($model->description,40) ?>…</p>
                    </div>
                </div>
            </a>

        <?php endforeach; ?>

    </div>
</div>

<?php $this->beginBlock('window.js'); ?>

<script>

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>


