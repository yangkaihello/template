<?php

/**
 * @var $this \yii\web\View
 * @var $place \common\models\SystemPlace[]
 * @var $models \common\models\FictionIndex[]
 * @var $category \common\models\FictionCategory[]
 * @var $pagination \yii\data\Pagination
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['platform.name'] . '-书库-首页';

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
\frontend\modules\template\assets\AppAsset::addCss($this,'template/css/books.css');

/*预加载JS*/
//\frontend\modules\template\assets\AppAsset::addScript($this,'template/js/home.js');

?>

<body>
    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main bookall">
        <div class="container" style="background: #fff">
            <div class="container-bd">
                <div class="c-left" style="min-height:600px">
                    <div class="mod mod-clean mod-filter-book">
                        <div class="bd" style="">
                            <div class="inner">
                                <dl data-name="category_id" class="filter main-filter">
                                    <dt class="option-title">
                                        分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类：
                                    </dt>
                                    <dd id="SortDD">
                                        <a <?php if(Yii::$app->request->get('category_id','all') == 'all'): ?>class="current"<?php endif; ?>
                                           data-value="all" href="#this">不限</a>

                                        <?php foreach ($category as $value): ?>
                                        <a <?php if(Yii::$app->request->get('category_id') == (string)$value->id): ?>class="current"<?php endif; ?>
                                           data-value="<?= $value->id ?>" href="#this"><?= $value->name ?></a>
                                        <?php endforeach; ?>
                                    </dd>
                                </dl>
                                <!--<dl data-collect-id="801" class="filter main-filter">
                                    <dt class="option-title">
                                        类&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：
                                    </dt>
                                    <dd id="SortDD">
                                        <a class="current" href="/sort-shuku_list/s0/o0/lt0/st0/w0/u0/v0/c0/p1">不限</a>
                                        <a href="/sort-shuku_list/s0/o0/lt1/st0/w0/u0/v0/c0/p1">长篇</a>
                                    </dd>
                                </dl>-->
                                <dl data-name="channel" class="filter main-filter">
                                    <dt class="option-title">
                                        频&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;道：
                                    </dt>
                                    <dd id="SortDD">
                                        <a <?php if(Yii::$app->request->get('channel','all') == 'all'): ?>class="current"<?php endif; ?>
                                           data-value="all" href="#this">不限</a>
                                        <?php foreach (FictionIndex::CHANNEL_LIST as $key=>$value): ?>
                                            <a <?php if(Yii::$app->request->get('channel') == (string)$key): ?>class="current"<?php endif; ?>
                                               data-value="<?= $key ?>" href="#this"><?= $value ?></a>
                                        <?php endforeach; ?>
                                    </dd>
                                </dl>
                                <dl data-name="charSize" class="filter main-filter">
                                    <dt class="option-title">
                                        作品字数：
                                    </dt>
                                    <dd id="SortDD">
                                        <a <?php if(Yii::$app->request->get('charSize','all') == 'all'): ?>class="current"<?php endif; ?>
                                           data-value="all" href="#this">不限</a>
                                        <?php foreach ($this->context::BOOKS_SEARCH_LIST as $key=>$value): ?>
                                            <a <?php if(Yii::$app->request->get('charSize') == (string)$key): ?>class="current"<?php endif; ?>
                                               data-value="<?= $key ?>" href="#this"><?= $value ?></a>
                                        <?php endforeach; ?>
                                    </dd>
                                </dl>
                                <dl data-name="status" class="filter main-filter">
                                    <dt class="option-title">
                                        写作进度：
                                    </dt>
                                    <dd id="SortDD">
                                        <a <?php if(Yii::$app->request->get('status','all') == 'all'): ?>class="current"<?php endif; ?>
                                           data-value="all" href="#this">不限</a>
                                        <?php foreach (FictionIndex::STATUS_LIST as $key=>$value): ?>
                                            <a <?php if(Yii::$app->request->get('status') == (string)$key): ?>class="current"<?php endif; ?>
                                               data-value="<?= $key ?>" href="#this"><?= $value ?></a>
                                        <?php endforeach; ?>
                                    </dd>
                                </dl>
                                <dl data-name="isVip" class="filter main-filter">
                                    <dt class="option-title">
                                        是否免费：
                                    </dt>
                                    <dd id="SortDD">
                                        <a <?php if(Yii::$app->request->get('isVip','all') == 'all'): ?>class="current"<?php endif; ?>
                                           data-value="all" href="#this">不限</a>
                                        <?php foreach (FictionIndex::VIP_LIST as $key=>$value): ?>
                                            <a <?php if(Yii::$app->request->get('isVip') == (string)$key): ?>class="current"<?php endif; ?>
                                               data-value="<?= $key ?>" href="#this"><?= $value ?></a>
                                        <?php endforeach; ?>
                                    </dd>
                                </dl>

                                <dl data-name="order" class="filter main-filter">
                                    <dt class="option-title">
                                        排&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;序：
                                    </dt>
                                    <dd id="SortDD">
                                        <a <?php if(Yii::$app->request->get('order','all') == 'all'): ?>class="current"<?php endif; ?>
                                           data-value="all" href="#this">不限</a>
                                        <a <?php if(Yii::$app->request->get('order','all') == 'charSize'): ?>class="current"<?php endif; ?>
                                           data-value="charSize" href="#this">字数</a>
                                        <!--<a href="/sort-shuku_list/s0/o3/lt0/st0/w0/u0/v0/c0/p1">点击</a>
                                        <a href="/sort-shuku_list/s0/o5/lt0/st0/w0/u0/v0/c0/p1">推荐</a>-->
                                    </dd>
                                </dl>

                            </div>
                        </div>
                    </div>
                    <div class="mod mod-clean result pattern-update-list">
                        <div class="bd">
                            <table width="100%" class="fixed-table" data-series="265A2145E34D2DA59232546EA67648F8TLFhAyUoUcoSjTtH0UxQ8w==">
                                <thead>
                                <tr>
                                    <th width="60">序号</th>
                                    <th width="295">书名/最新章节</th>
                                    <th width="80">作者</th>
                                    <th width="75">字数</th>
                                    <th width="75">总点击</th>
                                    <th width="75">更新时间</th>
                                </tr>
                                </thead>
                                <tbody id="resultDiv">

                                <?php foreach ($models as $key=>$value): ?>
                                <tr>
                                    <td class="index"><?= $value->id ?></td>
                                    <td class="name">
                                        <div class="range">
                                            <a href="<?= Url::to(['fiction/index' ,'id' => $value->id ],true) ?>" class="title" title="<?= $value->title ?>" ><?= $value->title ?></a>
                                            <a href="#chapter" title="<?= $value->chapter->title ?? "" ?>" class="chapter"><?= $value->chapter->title ?? "" ?></a>
                                            <?php if($value->isVip == $value::VIP_YES): ?>
                                            <span class="vip">VIP</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="author">
                                        <div class="range">
                                            <a href="javascript:;"><?= $value->member->authorInfo->penname ?></a>
                                        </div>
                                    </td>
                                    <td class="words"><?= $value->charSize ?></td>
                                    <td class="words"><?= $value->statisticalRead->pv ?? 0 ?></td>
                                    <td class="time"><?= \common\extend\DateTime::formatDate($value->chapter->created_at ?? "","m-d H:i") ?></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="text-align:center">
                        <?= LinkPager::widget([
                            'pagination' => $pagination,
                            'nextPageLabel' => '>>',
                            'prevPageLabel' => '<<',
                            'lastPageLabel' => '末页',
                            'maxButtonCount' => 5,
                            //'options' => ['class' => 'pager'],
                        ]); ?>
                    </div>
                </div>
                <div class="ri">
                    <div class="c-right pattern-rank">
                        <!--右侧榜单-->
                        <div class="rank_box ">
                            <div class="rank_top clearfix">
                                <div class="bor"></div>
                                <span class="header_title"><?= $place['books_free']->title ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="list" data-series="2001395BE2E850D0C3A906B4C442A97FKCKYNwHlLcrwZdJtc4cPGA==">

                                <?php $books = $place['books_free']->findBooks();$book = array_shift($books); ?>

                                <?php if(isset($book)): ?>
                                <dl class="pictxtbox">
                                    <span class="num rankbg_red">1</span>
                                    <dt class="rankpic">
                                        <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" title="<?= $book->title ?>"> <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" width="100%" title="<?= $book->title ?>" alt="<?= $book->title ?>" /> </a>
                                        <!--<span class="num">1</span>-->
                                    </dt>
                                    <dd>
                                        <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" title="<?= $book->title ?>"> <h3><?= $book->title ?></h3> <p><?= $book->description ?></p> </a>
                                    </dd>
                                </dl>
                                <?php endif; ?>
                                <ul class="ranklist">
                                    <?php foreach ($books as $key=>$book ): ?>
                                        <li><a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" title="<?= $book->title ?>"> <span class="num <?php if($key < 2): ?>rankbg_red<?php endif; ?>"><?= $key+2 ?></span><?= $book->title ?></a> </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="c-right pattern-rank">
                        <!--右侧榜单-->
                        <div class="rank_box">
                            <div class="rank_top clearfix">
                                <div class="bor"></div>
                                <span class="header_title"><?= $place['books_new']->title ?></span>
                                <div class="clear"></div>
                            </div>
                            <div class="list">
                                <?php $books = $place['books_new']->findBooks();$book = array_shift($books); ?>

                                <?php if(isset($book)): ?>
                                    <dl class="pictxtbox">
                                        <span class="num rankbg_red">1</span>
                                        <dt class="rankpic">
                                            <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" title="<?= $book->title ?>"> <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" width="100%" title="<?= $book->title ?>" alt="<?= $book->title ?>" /> </a>
                                            <!--<span class="num">1</span>-->
                                        </dt>
                                        <dd>
                                            <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" title="<?= $book->title ?>"> <h3><?= $book->title ?></h3> <p><?= $book->description ?></p> </a>
                                        </dd>
                                    </dl>
                                <?php endif; ?>
                                <ul class="ranklist">
                                    <?php foreach ($books as $key=>$book ): ?>
                                        <li><a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" title="<?= $book->title ?>"> <span class="num <?php if($key < 2): ?>rankbg_red<?php endif; ?>"><?= $key+2 ?></span><?= $book->title ?></a> </li>
                                    <?php endforeach; ?>
                                </ul>
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
    $(".inner dl a").click(function (e){

        $(this).parents("dd").find("a").attr('class',false);
        $(this).attr('class','current');

        var href = [];
        $(".inner dl").each(function (key,value){
            var name = $(value).data("name");
            var selected = $(value).find("dd a[class=current]").data('value');

            href.push(name+"="+selected);
        });

        window.location = window.location.pathname + "?" + href.join("&");
    });
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

