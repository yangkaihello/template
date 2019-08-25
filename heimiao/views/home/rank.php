<?php

/**
 * @var $this \yii\web\View
 * @var $models \common\models\SystemPlace[]
 * @var $book FictionIndex
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['platform.name'] . '-排行榜';

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
//'template/css/app.css',
\frontend\modules\template\assets\AppAsset::addCss($this,'template/css/rank.css');

/*预加载JS*/
//\frontend\modules\template\assets\AppAsset::addScript($this,'template/js/home.js');

?>

<body>
    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main">
        <div  class="container"  style="background: #fff">
            <div   class="rank">

                <?php $this->beginContent('@frontend.template/views/layouts/left-bar.php'); ?>

                <?php $this->endContent(); ?>

                <div  class="right-main">
                    <div  style="min-height: 300px;" class="">
                        <div class="el-loading-mask" style="display: none;">
                            <div class="el-loading-spinner">
                                <svg viewbox="25 25 50 50" class="circular">
                                    <circle cx="50" cy="50" r="20" fill="none" class="path"></circle>
                                </svg>
                                <!---->
                            </div>
                        </div>
                        <?php foreach($models as $model): ?>
                        <div  class="allRank">
                            <div class="listTab3">
                                <div class="listTitle">
                                    <div class="mod-title">
                                        <div class="title-bd">
                                            <h2 class=""><?= $model->title ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <!--<ul class="tab-ul">
                                    <li class="">日 </li>
                                    <li class="on">周 </li>
                                    <li class="">总 </li>
                                </ul>-->
                                <ul class="con-ul clearfixer">
                                    <div class="listRank" style="width: 100%; height: 100%;">
                                        <ul  class="rank-1">
                                            <?php foreach($model->findBooks(['member'],10) as $key=>$book): ?>

                                                <?php if($key < 1): ?>
                                                <li  class="top">
                                                    <span  class="num front"><?= $key+1 ?></span>
                                                    <dl class="book-block">
                                                        <dt >
                                                            <a  href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" class=""><img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER)?>" lazy="loaded" /></a>
                                                        </dt>
                                                        <dd >
                                                            <a  href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" class="book-name"><?= $book->title ?></a>
                                                            <span  class="book-author">作者：<a  href="#this" ><?= $book->member->authorInfo->penname ?></a></span>
                                                        </dd>
                                                    </dl>
                                                </li>
                                                <?php elseif($key < 3): ?>
                                                    <li  class="">
                                                        <span  class="num front"><?= $key+1 ?></span> <a  href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" class="book-list-f "><?= $book->title ?></a>
                                                    </li>
                                                <?php else: ?>
                                                    <li  class="">
                                                        <span  class="num"><?= $key+1 ?></span> <a  href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" class="book-list-f "><?= $book->title ?></a>
                                                    </li>
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        </ul>
                                        <a  href="/rank/<?= $model->SourceTypeSplit()[1] ?>" class="more">查看更多&gt;&gt; </a>
                                    </div>
                                </ul>
                                <!---->
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                    <!---->
                </div>

            </div>
        </div>

        <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

        <?php $this->endContent(); ?>

    </div>
</body>

<?php $this->beginBlock('window.js'); ?>

<script>

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>



<?php $this->endBlock(); ?>

