<?php

/**
 * @var $this \yii\web\View
 * @var $place \common\models\SystemPlace[]
 * @var $fictionLong \common\models\FictionIndex[]
 * @var $book \common\models\FictionIndex
 */

use common\popular\Handle;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->params['platform.name'] . '-首页';

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
\frontend\modules\template\assets\AppAsset::addCss($this,'template/css/home.css');

/*预加载JS*/
//\frontend\modules\template\assets\AppAsset::addScript($this,'template/js/home.js');

?>

<body>
    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main ">
        <div class="container">
            <div class="penl1 penl clearfix">
                <div class="lf">
                    <div class="panl">
                        <p class="panl-title"><?= $place['home_goods']->title ?></p>
                        <div class="books">

                            <?php foreach($place['home_goods']->findBooks(['category']) as $book): ?>
                            <div class="item">
                                <span class="t">[<?= $book->category->name ?>]</span>
                                <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>"><?= $book->title ?></a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="ri">
                    <div class="home-swiper">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="https://qidian.qpic.cn/qidian_common/349573/7f689b6db8ad99e6093bae7db9a7d130/0"
                                         alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://qidian.qpic.cn/qidian_common/349573/7f689b6db8ad99e6093bae7db9a7d130/0"
                                         alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="https://qidian.qpic.cn/qidian_common/349573/7f689b6db8ad99e6093bae7db9a7d130/0"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="penl1 penl2 penl clearfix" style="margin-top: 20px;">
                <div class="lf">
                    <div class="panl">
                        <p class="panl-title">最新动态</p>
                        <div class="books">
                            <!--<div class="item nowrap">
                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>
                            <div class="item nowrap ">

                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>
                            <div class="item nowrap ">

                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>
                            <div class="item nowrap">

                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>
                            <div class="item nowrap">

                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>
                            <div class="item nowrap">

                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>
                            <div class="item nowrap">

                                <a href="#">• 九州5月“励文计划”获奖书单！</a>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="ri">
                    <div class="book-list clearfix">
                        <p class="panl-title" style="font-size: 18px;line-height: 49px;"><?= $place['home_new']->title ?></p>

                        <?php foreach($place['home_new']->findBooks() as $book): ?>
                        <div class="book lf">
                            <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" >
                                <div class="img">
                                    <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                                </div>
                                <div class="book-name">
                                    <?= $book->title ?>
                                </div>
                                <div class="desc">
                                    <?= $book->description ?>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="penl penl3">
                <div class="book-list clearfix">
                    <p class="panl-title" style="font-size: 18px;line-height: 49px;"><?= $place['home_god']->title ?></p>

                    <?php foreach($place['home_god']->findBooks() as $book): ?>
                    <div class="book lf">

                        <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>" >
                            <div class="img">
                                <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                            </div>
                            <div class="book-name">
                                <?= $book->title ?>
                            </div>
                            <div class="desc">
                                <?= $book->description ?>
                            </div>
                        </a>

                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="penl penl4">
                <div class="items clearfix">
                    <div class="item lf">
                        <div class="title">
                            <?= $place['home_active']->title ?>
                        </div>
                        <?php foreach($place['home_active']->findBooks(['member']) as $key=>$book): ?>

                            <?php if($key < 1): ?>
                                <div class="list d">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="avatar">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                                        </span>
                                        <span>
                                            <p class="name"><?= $book->title ?></p>
                                            <p class="s"><?= $book->member->authorInfo->penname ?></p>
                                        </span>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="list">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="name"><?= $book->title ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="item lf">
                        <div class="title">
                            <?= $place['home_update']->title ?>
                        </div>
                        <?php foreach($place['home_update']->findBooks(['member']) as $key=>$book): ?>

                            <?php if($key < 1): ?>
                                <div class="list d">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="avatar">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                                        </span>
                                        <span>
                                            <p class="name"><?= $book->title ?></p>
                                            <p class="s"><?= $book->member->authorInfo->penname ?></p>
                                        </span>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="list">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="name"><?= $book->title ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="item lf">
                        <div class="title">
                            <?= $place['home_click']->title ?>
                        </div>
                        <?php foreach($place['home_click']->findBooks(['member']) as $key=>$book): ?>

                            <?php if($key < 1): ?>
                                <div class="list d">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="avatar">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                                        </span>
                                        <span>
                                            <p class="name"><?= $book->title ?></p>
                                            <p class="s"><?= $book->member->authorInfo->penname ?></p>
                                        </span>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="list">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="name"><?= $book->title ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div class="item lf">
                        <div class="title">
                            <?= $place['home_up']->title ?>
                        </div>
                        <?php foreach($place['home_up']->findBooks(['member']) as $key=>$book): ?>

                            <?php if($key < 1): ?>
                                <div class="list d">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="avatar">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
                                        </span>
                                        <span>
                                            <p class="name"><?= $book->title ?></p>
                                            <p class="s"><?= $book->member->authorInfo->penname ?></p>
                                        </span>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="list">
                                    <a href="<?= Url::to(['fiction/index' ,'id' => $book->id ],true) ?>">
                                        <span class="num"><?= $key+1 ?></span>
                                        <span class="name"><?= $book->title ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
            <div data-v-392f7764="" style="margin-bottom: 10px; overflow: hidden;margin-top: 20px;">
                <div data-v-392f7764="" class="listUpdate" style="width:896px;">
                    <div class="mod-title">
                        <div class="title-bd">
                            <h2>最近更新</h2>
                            <a href="<?= Url::to(['/books'],true) ?>" target="_blank" class="more">更多&gt;&gt;</a>
                            <!--<ul class="tab">
                                <li class="on">全部 </li>
                                <li class="">免费 </li>
                                <li class="">VIP </li>
                            </ul>-->
                        </div>
                    </div>
                    <div class="listUpdate">
                        <div class="content-all">
                            <div class="title clearfix">
                                <span class="classis">分类</span>
                                <span class="name">书名</span>
                                <span class="newest">最新章节</span>
                                <span class="author">作者</span>
                                <span class="time">更新时间</span>
                            </div>
                            <?php foreach ($fictionAll as $key=>$value): ?>
                            <div class="item clearfix">
                                <a class="classis"><?= $value->category->name ?></a>
                                <a href="<?= Url::to(['fiction/index' ,'id' => $value->id ],true) ?>" target="_blank" class="name"><?= $value->title ?></a>
                                <a href="#chapter" class="newest"><?= $value->chapter->title ?? "-" ?></a>
                                <a class="author"><?= $value->member->authorInfo->penname ?></a>
                                <a href="javascript:;" class="time"><?= $value->chapter->created_at ?? "-" ?></a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div data-v-392f7764="" class="contactWe">
                    <div class="listTitle">
                        <div class="mod-title">
                            <div class="title-bd">
                                <h2 class="">联系编辑</h2>
                            </div>
                        </div>
                    </div>
                    <div class="bd">
                        <p style="margin-top: 9px;"><span class="con-left">泉火QQ：</span> <span
                                    class="con-right">2826140774</span></p>
                        <p style="margin-top: 0px; line-height: 30px;"><span class="con-left">投稿邮箱： </span> <span
                                    class="con-right">2826140774@qq.com </span>
                        </p>

                    </div>

                </div>
                <div data-v-392f7764="" class="contactWe" style="margin-top: 20px">
                    <div class="listTitle">
                        <div class="mod-title">
                            <div class="title-bd">
                                <h2 class="">版权合作</h2>
                            </div>
                        </div>
                    </div>
                    <div class="bd">
                        <p style="margin-top: 9px;"><span class="con-left">泉火QQ：</span> <span
                                    class="con-right">2826140774</span></p>
                        <p style="margin-top: 0px; line-height: 30px;"><span class="con-left">微信联系扫描下方二维码： </span><br> <span
                                    class="con-right"><img width="120" height="120" src="/template/imgs/index/QR_code.png" alt=""> </span>
                        </p>

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
    var mySwiper = new Swiper('.swiper-container', {
        loop: true, // 循环模式选项
    })
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    .main .penl3 .book .book-name
    {
        color:#000;
    }
</style>

<?php $this->endBlock(); ?>

