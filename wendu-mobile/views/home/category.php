<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\FictionIndex[]
 * @var $categorys \common\models\FictionCategory[]
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = "分类";

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


?>

<header class="header-title">
    <span onclick="window.history.back()" class="header-return"><img src="/template/images/re.png"></span>分类
</header>
<div class="header-height"></div>
<div class="class-wrappy">
    <div class="class_header">
        <?php foreach($categorys as $k => $c): ?>
        <div class="items <?php if($c->id == $category): ?>active<?php endif; ?>">
            <a href="<?= Url::to(["home/category","category" => $c->id]) ?>">
                <?= $c->name ?>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="class_centen">
        <?php foreach ($models as $model): ?>
        <a href="<?= Url::to(["fiction/index","id"=>$model->id]) ?>">
            <div class="items">
                <img class="pic" src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                <div class="con_box">
                    <h2><?= $model->title ?></h2>
                    <p><?= Handle::chapterContentPart($model->description,45) ?>...</p>
                    <div class="auth">
                        <?= $model->member->authorInfo->penname ?> <span class="wj"><?= FictionIndex::STATUS_LIST[$model->status] ?></span>
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>


<?php $this->beginBlock('window.js'); ?>

<script type="text/javascript">

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
a{
    color: #000;
}
</style>

<?php $this->endBlock(); ?>

