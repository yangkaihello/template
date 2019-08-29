<?php

/**
 * @var $this \yii\web\View
 * @var $model \common\models\SystemPlace
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
\frontend\modules\template\assets\AppAsset::addCss($this,'template/css/rank-list.css');

/*预加载JS*/
//\frontend\modules\template\assets\AppAsset::addScript($this,'template/js/home.js');

?>

<body>
    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main">

        <div class="container" style="background: #fff">
            <div class="rank">

                <?php $this->beginContent('@frontend.template/views/layouts/left-bar.php'); ?>

                <?php $this->endContent(); ?>

                <div class="right-main">
                    <div class="top_right pattern-update-list">
                        <h1 class="page-title page-title-split top_list_title clearfix">
                            <i class="icon icon-rank"><img src="/template/imgs/else/leaderboard.png" style="margin-right: 10px"></i>畅销榜
                            <!--<div class="time">
                                <span class="active flag_day">日</span>
                                <span class="flag_day">周</span>
                                <span class="flag_day">月</span>
                            </div>-->
                        </h1>
                        <div class="nav_box">
                            <!--日-->
                            <div class="bd">
                                <table width="90%" class="fixed-table">
                                    <thead>
                                    <tr>
                                        <th width="80">排名</th>
                                        <th width="80">分类</th>
                                        <th width="450">书名/最新章节</th>
                                        <th width="180">作者</th>
                                        <th width="75">更新时间</th>
                                    </tr>
                                    <tr class="height_line"></tr>
                                    </thead>
                                    <tbody id="sort_article">

                                    <?php foreach($model->findBooks(['category','chapter','member'],50) as $key=>$book): ?>
                                    <tr>
                                        <td>
                                            <div class="num red_num"><?= sprintf("%02d", $key+1) ?></div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="tag">[<?= $book->category->name ?>]</a>
                                        </td>
                                        <td>
                                            <div class="rangy">
                                                <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" class="name"><?= $book->title ?></a>
                                                <a href="#this" class="chapter" ><?= $book->chapter->title ?? "" ?></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="range"><?= $book->member->authorInfo->penname ?></div>
                                        </td>
                                        <td><span class="time"><?= \common\extend\DateTime::formatDate($book->chapter->created_at ?? "","m-d H:i") ?></span></td>
                                        <td></td>
                                    </tr>
                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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

<style>
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination > li {
        display: inline;
    }

    .pagination > li > a,
    .pagination > li > span {
        text-decoration: none;
        display: inline-block;
        padding: 0 10px;
        height: 30px;
        margin: 0 2px;
        font-size: 14px;
        line-height: 30px;
        text-align: center;
        vertical-align: middle;
        border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        color: #999;
        background: #f7f7f7;
    }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
    }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
    }

    .pagination > .active > a,
    .pagination > li > a:hover
    {
        background: #f95637;
        color: #fff;
    }
</style>

<?php $this->endBlock(); ?>

