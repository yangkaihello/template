<?php

/**
 * @var $this \yii\web\View
 * @var $fiction \common\models\FictionIndex
 * @var $lexicons \common\models\LexiconIndex[]
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->params['platform.name'] . '-首页';

$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => implode(";",array_column($lexicons,"title")),
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => $fiction->description,
]);

/* 预加载CSS */
//'template/css/reset.css',
//'template/css/app.css',
\frontend\modules\template\assets\AppAsset::addCss($this,'template/css/fiction-index.css');

/*预加载JS*/
//\frontend\modules\template\assets\AppAsset::addScript($this,'template/js/home.js');

?>

<body>
    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main " style="margin-top: 0">

        <div class="top-bg-box " id="j-topBgBox"
             style="background-image:url('http://qidian.qpic.cn/qidian_common/349573/f042a4801b5cc0ab054eca362821f954/0')">
            <!--<span class="back-to-op" data-eid="qd_G106">热门游戏</span>-->
        </div>
        <div class="container">
            <div class="book-detail-wrap center990">
                <div class="book-information clearfix" data-l1="2">
                    <div class="book-img">
                        <a class="J-getJumpUrl" id="bookImg">
                            <img src="<?= Handle::getUploadSrc($fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER)?>" />
                        </a>
                    </div>
                    <div class="book-info ">
                        <h1>
                            <em><?= $fiction->title ?></em>
                            <span>
                                <a class="writer" href="//me.qidian.com/authorIndex.aspx?id=10181569"
                                                      target="_blank" data-eid="qd_G08"><?= $fiction->member->authorInfo->penname ?></a> 著
                            </span>
                        </h1>
                        <p class="tag">
                            <span class="blue"><?= FictionIndex::STATUS_LIST[$fiction->status] ?></span>
                            <span class="blue"><?= FictionIndex::SIGN_LIST[$fiction->isSign] ?></span>
                            <span class="blue"><?= FictionIndex::VIP_CHAR_LIST[$fiction->isVip] ?></span>
                            <?php foreach($lexicons as $lexicon): ?>
                            <a class="red"><?= $lexicon->title ?></a>
                            <?php endforeach; ?>
                        </p>
                        <p class="intro"></p>
                        <p>
                            <em ><?= Handle::charSizeFat($fiction->charSize) ?></em><cite  style="margin-right: 18px">字</cite>
                            <em ><?= Handle::charSizeFat($fiction->statisticalRead->pv ?? 0) ?></em><cite  style="margin-right: 18px">点击</cite>
                            <em ><?= Handle::charSizeFat($fiction->statisticalRead->collect ?? 0) ?></em><cite  style="margin-right: 18px">收藏</cite>
                        </p>
                        <p>
                            <a class="red-btn J-getJumpUrl"
                              >开始试读</a>
                            <!--<a class="blue-btn add-book" id="addBookBtn" href="javascript:"
                               >加入书架</a>-->
                            <!-- <a class="blue-btn"
                                id="topRewardBtn" href="javascript:" data-showtype="2" data-eid="qd_G07">评论互动 </a> -->
                            <!--<a class="blue-btn" id="topRewardBtn" href="javascript:"
                               >目录 </a>-->
                        </p>
                    </div>

                    <div class="take-wrap">
                    </div>
                </div>
                <div class="book-content-wrap clearfix">
                    <div class="right-wrap lf">
                        <div class="author-state mb10">
                            <div class="author-info">
                                <div class="info-wrap nobt" data-l1="9">
                                    <div class="author-photo" id="authorId" data-authorid="10181569">
                                        <a href="javascript:;" >
                                            <img src="<?= Handle::getUploadSrc($fiction->member->icon,Handle::UPLOAD_SRC_MEMBER_ICON) ?>" /> </a>
                                        <span class="lv">Lv.1</span>
                                    </div>
                                    <p>
                                        <a href="javascript:;" ><?= $fiction->member->authorInfo->penname ?></a>
                                    </p>
                                </div>
                                <div class="info-wrap" data-l1="9">
                                    <ul class="work-state clearfix">
                                        <li> <span class="book"></span>
                                            <p>作品总数</p> <em><?= $fiction->findMemberCount() ?></em>
                                        </li>
                                        <li> <span class="word"></span>
                                            <p>累计字数</p> <em><?= Handle::charSizeFat($fiction->member->findFictionCharSizeSum()) ?></em>
                                        </li>
                                        <li> <span class="coffee"></span>
                                            <p>驻站天数</p> <em><?= $fiction->member->findCreateDays() ?></em>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left-wrap ri" style="    width: 916px;
                    background: #fff;padding: 10px">
                        <div class="book-info-detail">
                            <cite class="icon-pin"></cite>
                            <div class="book-intro">
                                <p>
                                    <?= $fiction->description ?>
                                </p>
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
    var mySwiper = new Swiper('.swiper-container', {
        loop: true, // 循环模式选项
    })
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    .book-info .writer,
    .book-info > h1 > span
    {
        color:#959595;
    }
</style>

<?php $this->endBlock(); ?>

