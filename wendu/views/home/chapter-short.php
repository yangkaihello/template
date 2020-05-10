<?php

/**
 * @var $this \yii\web\View
 * @var $chapter \common\models\FictionChapter
 * @var $fiction FictionIndex
 */

use common\models\FictionIndex;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'] . '-书籍章节-' . $fiction->title;

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
            <a href="/">首页</a> > <a href="#this"><?= $fiction->title ?></a>
        </div>

        <div class="contents_wrappy">

            <div class="headerTitleBox">
                <h3><?= $fiction->title ?></h3>
                <h5>作者： <?= $fiction->member->authorInfo->penname ?> 字数：<?= $fiction->charSize ?></h5>
                <h4>发布时间：<?= $fiction->created_at ?></h4>
            </div>

            <div class="cTextCon">
                <?= $chapter->content ?>
            </div>
        </div>

        <div class="leftFixed_box">

            <div class="centenitemsbox">
                <a class="ab cSet_btn" id="setBtn" href="javascript:"><i class="icon_set"></i></a>
                <a  id="collect" class="ab chsj_btn" href="#this"><i class="icon_hsj"></i></a>
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


