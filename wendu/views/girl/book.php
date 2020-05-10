<?php

/**
 * @var $this \yii\web\View
 * @var $fiction FictionIndex
 * @var $fictions FictionIndex[]
 * @var $lexicons \common\models\LexiconIndex[]
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'] . '-书籍详情-' . $fiction->title;

$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => implode(";",array_column($lexicons,"title")),
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => $fiction->description,
]);

/*$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => '原创小说;精品小说;长篇小说连载;优质小说阅读;都市情感小说;婚恋小说',
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => '',
]);*/

/* 预加载CSS */
//'template/css/style.css',
//'template/css/swiper.min.css',

/*预加载JS*/
//'template/js/jquery-1.11.3.min.js',
//'template/js/swiper.min.js',
//'template/js/action.js',

?>

<?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

<?php $this->endContent(); ?>

<div class="main_box">
    <div class="center_box" style="min-height: 800px;">

        <div class="sort_wrappy">
        <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

        <?php $this->endContent(); ?>
        </div>

        <!--  -->
        <div class="sbannerbox">
            <a href=""><img src="/template/img/banner2.jpg"></a>
        </div>
        <!--  -->
        <div class="book_box clear">
            <div class="d_navbox">
                <a href="/">首页</a> > <a href="<?= Url::to(["home/books","category_id" => $fiction->category_id]) ?>"><?= $fiction->category->name ?></a> > <a href="#this"><?= $fiction->title ?></a>
            </div>
            <div class="bookDetailsBox">
                <div class="bookleftbox">
                    <img class="bookPic" src="<?= Handle::getUploadSrc($fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" title="<?= $book->title ?>">
                    <div class="bconten">
                        <h1 class="booktitle"><?= $fiction->title ?> <span class="bookauthor"><?= $fiction->member->authorInfo->penname ?> 著</span></h1>
                        <div class="bookcontents">
                            <?= $fiction->description ?>
                        </div>

                        <div class="bookwnumber">
                            <?= Handle::charSizeFat($fiction->charSize,"<span>%.2f</span>万字")?>  <em> | </em>
                            <?= Handle::charSizeFat($fiction->statisticalRead->pv,"<span>%.2f</span>万总点击")?>    <em> | </em>
                            <?= Handle::charSizeFat($fiction->statisticalRead->collect,"<span>%.2f</span>万收藏")?>
                        </div>

                        <div class="bookBut">
                            <a href="/template/grey_detail.html">开始试读</a>
                            <a href="<?= Url::to(["home/chapters","fiction_id" => $fiction->id]) ?>">目录</a><br />
                            <a id="collect" href="#this">收藏</a>
                            <a id="give" href="#this">赞</a>
                            <!--<a href="">打赏</a>-->
                        </div>
                    </div>
                </div>

                <div class="bookrightbox">
                    <img src="<?= Handle::getUploadSrc($fiction->member->icon,Handle::UPLOAD_SRC_MEMBER_ICON) ?>">
                    <h4><?= $fiction->member->authorInfo->penname ?></h4>
                    <h5><?= $fiction->member->authorInfo->remark ?></h5>
                </div>

            </div>
        </div>

        <div class="bookcengji clear">
            <div class="cbookleft">
                <h2 class="title">最新章节</h2>
                <h3 class="zjs">
                    <?php if( isset($fiction->chapter->sort) ):?>
                        <a href="<?= Url::to(["home/chapter","fiction_id" => $fiction->id,"sort" => $fiction->chapter->sort]) ?>">
                            <?= $fiction->chapter->title ?>
                        </a>
                    <?php endif; ?>
                    <span class="btime"><?= \common\extend\DateTime::formatDate($fiction->chapter->created_at,"Y-m-d H:i") ?>
                        </span>
                </h3>
                <div class="cjs">
                    <div class="cbookjianjie">
                        <?= Handle::chapterContentPart($fiction->chapter->content,350)?>
                    </div>
                    <div class="cbutonbox">
                        <?php if( isset($fiction->chapter->sort) ):?>
                            <a class="cbut" href="<?= Url::to(["home/chapter","fiction_id" => $fiction->id,"sort" => $fiction->chapter->sort]) ?>">
                                阅读此章节
                            </a>
                        <?php else: ?>
                            <a class="cbut" href="#this">
                                阅读此章节
                            </a>
                        <?php endif; ?>
                        <a class="cbut ml" href="<?= Url::to(["home/chapters","fiction_id" => $fiction->id]) ?>">目录</a>
                    </div>
                </div>
            </div>
            <div class="cbookright">
                <h2 class="titles">其他作品</h2>
                <div id="certify">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach($fictions as $value): ?>
                            <div class="swiper-slide">
                                <a href="<?= Url::to(["home/book","fiction_id" => $value->id]) ?>">
                                    <img src="<?= Handle::getUploadSrc($value->cover,Handle::UPLOAD_SRC_FICTION_COVER)?>">
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php if(isset($fictions[0])): ?>
                <div class="cbookshi">
                    <h5><?= $fictions[0]->title ?></h5>
                    <p><?= Handle::chapterContentPart($fictions[0]->description,30) ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <!--  -->
    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>

</div>

<?php $this->beginBlock('window.js'); ?>

<script>
    certifySwiper = new Swiper('#certify .swiper-container', {
        watchSlidesProgress: true,
        slidesPerView: 'auto',
        centeredSlides: true,
        loop: true,
        loopedSlides: 5,
        autoplay: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            //clickable :true,
        },
        on: {
            progress: function(progress) {
                for (i = 0; i < this.slides.length; i++) {
                    var slide = this.slides.eq(i);
                    var slideProgress = this.slides[i].progress;
                    modify = 1;
                    if (Math.abs(slideProgress) > 1) {
                        modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
                    }
                    translate = slideProgress * modify * 150 + 'px';
                    scale = 1 - Math.abs(slideProgress) / 5;
                    zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
                    slide.transform('translateX(' + translate + ') scale(' + scale + ')');
                    slide.css('zIndex', zIndex);
                    slide.css('opacity', 1);
                    if (Math.abs(slideProgress) > 3) {
                        slide.css('opacity', 0);
                    }
                }
            },
            setTransition: function(transition) {
                for (var i = 0; i < this.slides.length; i++) {
                    var slide = this.slides.eq(i)
                    slide.transition(transition);
                }

            }
        }

    })

    $("#collect").click(function (){
        Collect(0);
    });

    $("#give").click(function (){
        Give(0);
    });

    Collect(1);
    Give(1);
    function Collect(isVerify)
    {
        var isCollect = function (is){
            if (is == true){
                $("#collect").html("已收藏");
                $("#collect").addClass("attention");
            }else{
                $("#collect").html("收藏");
                $("#collect").removeClass("attention");
            }
        }
        $.post("<?= Url::to(["fiction/collect"]) ?>",{
            fiction_id:"<?= $fiction->id ?>",
            isVerify:isVerify,
            "<?= Yii::$app->request->csrfParam ?>": "<?= Yii::$app->request->csrfToken ?>"
        },function (data){
            console.log(data);
            isCollect(data)
        }).fail(function (data,status,xhr){
            console.log(data.responseJSON);
        });

    }

    function Give(isVerify)
    {
        var isGive = function (is){
            if (is == true){
                $("#give").html("已赞");
                $("#give").addClass("attention");
            }else{
                $("#give").html("赞");
                $("#give").removeClass("attention");
            }
        }
        $.post("<?= Url::to(["fiction/give"]) ?>",{
            fiction_id:"<?= $fiction->id ?>",
            isVerify:isVerify,
            "<?= Yii::$app->request->csrfParam ?>": "<?= Yii::$app->request->csrfToken ?>"
        },function (data){
            console.log(data);
            isGive(data)
        }).fail(function (data,status,xhr){
            console.log(data.responseJSON);
        });

    }
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

    .bookBut a.attention{
        background: #A04456;
        color: #fff;
    }

    .bookBut a.attention:hover{
        background: #F6D1D8;
        color: #fff;
    }

</style>

<?php $this->endBlock(); ?>




