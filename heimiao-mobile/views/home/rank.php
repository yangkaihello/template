<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $model \common\models\SystemPlace
 * @var $value \common\models\FictionIndex
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = '榜单';

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
\mobile\assets\AppAsset::addCss($this,'template/css/rank.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',

?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<header class='nav'>
    <div class="nav-item <?php if($model->SourceTypeSplit()[1] == 'week'): ?>active<?php endif; ?>">
        <a href="<?= Url::to(['home/rank','category' => 'week'],true) ?>">周读榜</a>
    </div>
    <div class="nav-item <?php if($model->SourceTypeSplit()[1] == 'new'): ?>active<?php endif; ?>">
        <a href="<?= Url::to(['home/rank','category' => 'new'],true) ?>">新书榜</a>
    </div>
    <div class="nav-item <?php if($model->SourceTypeSplit()[1] == 'original'): ?>active<?php endif; ?>">
        <a href="<?= Url::to(['home/rank','category' => 'original'],true) ?>">原创榜</a>
    </div>
</header>

<section class="list">
    <div class="list-body">

        <?php foreach($model->findBooks(['member']) as $key=>$value): ?>
        <a class="item" href="<?= Url::to(['fiction/index','id' => $value->id ],true) ?>">
            <div class="item_left"><img src="<?= Handle::getUploadSrc($value->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="" class='cover'></div>
            <div class="item_right">
                <h3 class='bookName'>
                    <span><?= $value->title ?></span>
                    <span class='fir'><?= $key+1 ?></span>
                </h3>
                <p class='bookInfo'>
                    <?= $value->description ?>
                </p>
                <p class='auth-info'>
                    <span class='auth'><?= $value->member->authorInfo->penname ?></span>
                    <span class='status <?php if($value->status == $value::STATUS_EXIST): ?>serial<?php endif; ?>'>
                        <?= $value::STATUS_LIST[$value->status] ?>
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
    .nav div a{
        color: inherit;
    }
</style>

<?php $this->endBlock(); ?>


