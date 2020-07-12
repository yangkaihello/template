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

$this->title = '完本';

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
//\mobile\assets\AppAsset::addScript($this,'template/js/index.js');


?>


<header class="header-title">
    <span onclick="window.history.back()" class="header-return"><img src="/template/images/re.png"></span>完本
</header>
<div class="header-height"></div>
<div class="one-wrappy">
    <div class="one-box clearfix">
        <?php foreach($models as $model): ?>
        <a href="<?= Url::to(["fiction/index","id"=>$model->id]) ?>">
            <div class="items">
                <div class="pic">
                    <img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                </div>
                <div class="text">
                    <h2><?= $model->title ?></h2>
                    <h3><?= Handle::charSizeFat($model->statisticalRead->pv,"%d万人气") ?></h3>
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
a{
    color: #000;
}
</style>

<?php $this->endBlock(); ?>


