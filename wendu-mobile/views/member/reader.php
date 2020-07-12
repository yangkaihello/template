<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\reader\MemberRead[]
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = '阅读足迹';

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
\mobile\assets\AppAsset::addCss($this,'template/css/readingRecord.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'template/js/rank.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<div class="recordUl">

    <?php foreach ($models as $key=>$model): ?>
    <a href="<?= Url::to(['chapter/index','fiction_id' => $model->chapter->fiction_id ,'sort' => $model->chapter->sort]) ?>">
        <div class="itemleft">
            <img src="<?= Handle::getUploadSrc($model->fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
        </div>
        <div class="itemdetail">
            <div class="itemdetail1"><?= $model->fiction->title ?></div>
            <div class="itemdetail2"><?= $model->chapter->title ?></div>
            <div class="itemdetail3"><?= $model->updated_at ?></div>
        </div>
        <!--<div class="itemright delete">删除</div>-->
    </a>
    <?php endforeach; ?>
</div>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>



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


