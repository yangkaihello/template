<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\FictionIndex
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = '免费';

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
\mobile\assets\AppAsset::addCss($this,'css/free.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'js/index.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<section class="list">
    <div class="list-body">
        <?php foreach($models as $key=>$value): ?>
        <a class="item" href="<?= Url::to(['fiction/index','id' => $value->id ],true) ?>">
            <div class="item_left"><img src="<?= Handle::getUploadSrc($value->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="" class='cover'></div>
            <div class="item_right">
                <h3 class='bookName'><?= $value->title ?></h3>
                <p class='bookInfo'>
                    <?= $value->description ?>
                </p>
                <p class='auth-info'>
                    <span class='auth'><?= $value->member->authorInfo->penname ?></span>
                    <span class="desc">
                      <span class="classify"><?= $value->category->name ?></span>
                      <span class='status <?php if($value->status == $value::STATUS_EXIST): ?>serial<?php endif; ?>'>
                          <?= $value::STATUS_LIST[$value->status] ?>
                      </span>
                    </span>
                </p>
            </div>
        </a>
        <?php endforeach; ?>
    </div>

</section>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>


