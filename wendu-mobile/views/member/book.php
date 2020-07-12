<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\collect\MemberCollect[]
 * @var $reader \common\models\reader\MemberRead[]
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = '书架';

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
\mobile\assets\AppAsset::addCss($this,'template/css/bookDelete.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'template/js/rank.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<ul class="read-list">

    <?php foreach ($models as $key=>$model): ?>
        <a href="<?= Url::to(['chapter/index','fiction_id' => $model->fiction->id ,'sort' => $reader[$model->fiction->id]['chapter_sort'] ?? 1]) ?>">
            <li>
                <div class="read-cover">
                    <img src="<?= Handle::getUploadSrc($model->fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                </div>
                <div class="info">
                    <p class="read-name"><?= $model->fiction->title ?></p>
                    <p class='progress'>
                        <span class="pro-text">阅读进度：</span>
                        <span class="pro-num"><?= Handle::ratio($reader[$model->fiction->id]['count'] ?? 0 ,$model->fiction->chapter->sort ?? 0 ) ?>%</span>
                    </p>
                </div>
            </li>
        </a>
    <?php endforeach; ?>
</ul>
<a class="go-library" href="<?= Url::to(['home/books']) ?>">
    前往书库
</a>

<!--<div class="all">
    <div class="all-text">
        <input type="checkbox" class='toggle'>
        <div class="all-text">全选</div>
    </div>
    <p class="delete-box">
        删除(<span class='delete-num'>0</span>)
    </p>
</div>-->

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


