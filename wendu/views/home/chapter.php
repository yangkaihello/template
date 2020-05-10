<?php

/**
 * @var $this \yii\web\View
 * @var $chapter \common\models\FictionChapter
 * @var $fiction FictionIndex
 * @var $chapterUp \common\models\FictionChapter
 * @var $chapterDown \common\models\FictionChapter
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'] . '-书籍章节-' . $chapter->title;

//$this->registerMetaTag([
//    'name'      => 'keywords',
//    'content'   => implode(";",array_column($lexicons,"title")),
//]);
//$this->registerMetaTag([
//    'name'      => 'description',
//    'content'   => $fiction->description,
//]);

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

        <div class="d_navbox">
            <a href="/">首页</a> > <a href="<?= Url::to(["home/books","category_id" => $fiction->category_id]) ?>"><?= $fiction->category->name ?></a> > <a href="<?= Url::to(["home/book","fiction_id" => $fiction->id]) ?>"><?= $fiction->title ?></a>
        </div>

        <div class="contents_wrappy">

            <div class="headerTitleBox">
                <h3><?= $fiction->title ?></h3>
                <h2><?= $chapter->title ?></h2>
                <h5>作者： <?= $fiction->member->authorInfo->penname ?> 字数：<?= $chapter->char ?></h5>
                <h4>发布时间：<?= $chapter->created_at ?></h4>
            </div>

            <div class="cTextCon">
                <?php if($chapter->isVip == $chapter::VIP_YES && isset($this->context->user) && $this->context->user->hasReadFictionOrDec($chapter)): ?>

                    <?= $chapter->content ?>

                <?php else: ?>

                    <?php if($chapter->isVip == $chapter::VIP_YES): ?>
                        <?php if(isset($this->context->user)): ?>
                            <a class="zhinan" style="padding: 4px 10px;border-radius: 4px;margin: 0 auto;display: table;" href="<?= Url::to(['pay/index']) ?>" >缺少书币,请点击充值</a>
                        <?php else: ?>
                            <a id="force-login" class="zhinan" style="padding: 4px 10px;border-radius: 4px;margin: 0 auto;display: table;" href="#this" >请先登陆</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <?= $chapter->content ?>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
        </div>

        <div class="leftFixed_box">
            <div class="mulu" id="catalog">目录</div>

            <div class="muluBox">
                <img class="closeBtn" src="/template/img/closebtn.png">
                <h2 class="mh2">目录</h2>
                <h3 class="mh3">作品正文卷</h3>
                <div class="mul">
                    <ul>
                        <?php foreach($fiction->chapters as $value): ?>
                        <li>
                            <a href="<?= Url::to(["home/chapter","fiction_id" => $value->fiction_id,"sort" => $value->sort]) ?>"><?= $value->title ?></a>
                            <?php if($value->isVip == $chapter::VIP_YES): ?>
                            <i class="xlv_icon"></i>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


            <div class="centenitemsbox">
                <a class="ab cSet_btn" id="setBtn" href="javascript:"><i class="icon_set"></i></a>
                <a id="collect" class="ab chsj_btn" href="#this"><i class="icon_hsj"></i></a>
                <a class="ab QRcodeBox" href="#this"><i class="icon_yed"></i><img class="QRcode" src="/template/img/code.png"></a>
                <div class="setCon_box">
                    <h2 class="titles">设置</h2>
                    <div class="sitems"><label>主题模式</label> <span class="themeBtn rob1"></span><span class="themeBtn rob2"></span><span class="themeBtn rob3"></span> </div>
                    <div class="sitems"><label>字体大小</label> <span class="fontB reduceBtn"><img src="/template/img/font1.png"></span><span class="fontB no fontSizes">16px</span><span class="fontB addBtn"><img src="/template/img/font2.png"></span></div>
                    <div class="sitems">
                        <label>字体样式</label> <span class="fontB typefaceBtn"><img src="/template/img/font1.jpg"></span><span class="fontB no typefaceBtn"><img src="/template/img/font2.jpg"></span><span class="fontB typefaceBtn"><img src="/template/img/font3.jpg"></span>
                    </div>
                    <div class="sitems">
                        <label></label> <a class="morenbtn" href="javascript:">恢复默认</a>
                    </div>
                </div>
            </div>


            <!--<div class="zhinan">指南</div>-->
        </div>

        <!--<div class="rightFixed_box">
            <div class="dashang">打赏</div>
            <div class="toupiao">投票</div>
        </div>-->

        <div class="rightFixed_box pages">
            <?php if($chapterUp): ?>
                <div class="dashang"><a href="<?= Url::to(["home/chapter","fiction_id" => $chapterUp->fiction_id,"sort" => $chapterUp->sort]) ?>"><img src="/template/img/page.png"></a></div>
            <?php else: ?>
                <div class="dashang"><a href="#this"><img src="/template/img/page.png"></a></div>
            <?php endif; ?>

            <?php if($chapterDown): ?>
                <div class="toupiao"><a href="<?= Url::to(["home/chapter","fiction_id" => $chapterDown->fiction_id,"sort" => $chapterDown->sort]) ?>"><img src="/template/img/page.png"></a></div>
            <?php else: ?>
                <div class="toupiao"><a href="#this"><img src="/template/img/page.png"></a></div>
            <?php endif; ?>

        </div>
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

    $("#collect").click(function (){
        Collect(0);
    });

    Collect(1);
    function Collect(isVerify)
    {
        var isCollect = function (is){
            if (is == true){
                $("#collect").addClass("attention");
            }else{
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
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

    a.attention .icon_hsj{
        background-image: url(/template/img/hsjhover.png);
    }

    a.attention .icon_hsj:hover{
        background-image: url(/template/img/hsj.png);
    }

</style>

<?php $this->endBlock(); ?>


