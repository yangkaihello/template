<?php

/**
 * @var $this \yii\web\View
 * @var $fictionPlace \common\models\SystemPlace[]
 * @var $fictionNew \common\models\FictionIndex[]
 * @var $fictionCategory \common\models\FictionIndex[][]
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
//'template/css/style.css',
//'template/css/swiper.min.css',

/*预加载JS*/
//'template/js/jquery-1.11.3.min.js',
//'template/js/swiper.min.js',
//'template/js/action.js',

?>

<div class="greyStyle">
    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>

    <div class="main_box">
        <div class="center_box">
            <div class="ga_box">
                <a href="/"> <img src="/template/img/log.png"></a>
                <div class="bannerBox">
                    <a target="_blank" href="<?= $ad["header"]["one"]["url"] ?>"><img src="<?= $ad["header"]["one"]["image"] ?>"></a>
                    <div class="bflexbutton">
                        <a data-switch-channel="girl" href="#this">女频</a>
                        <a data-switch-channel="boy" href="#this">男频</a>
                    </div>
                </div>
            </div>

            <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

            <?php $this->endContent(); ?>

            <div class="hnav">
                <a href="/">首页</a>|
                <a href="<?= Url::to(["home/books"]) ?>">搜书</a>|
                <a href="<?= Url::to(["home/ranks"]) ?>">排行榜</a>|
                <a href="<?= Url::to(["pay/index"]) ?>">充值</a>|
                <!--<div class="marquerbox">
                    <marquee onMouseOut="this.start()" onMouseOver="this.stop()">
                        <a href=""><i class="msgIcon"></i> 通知：同舟共济，文学力量</a>
                        <a href=""><i class="msgIcon"></i> 通知：柔情似水，佳期如梦。忍顾鹊桥归路！</a>
                    </marquee>
                </div>-->
            </div>

            <div class="update_boxs">
                <div class="left"><a target="_blank" href="<?= $ad["header"]["two"]["url"] ?>"><img src="<?= $ad["header"]["two"]["image"] ?>"></a></div>
                <div class="right"><a target="_blank" href="<?= $ad["header"]["three"]["url"] ?>"><img src="<?= $ad["header"]["three"]["image"] ?>"></a></div>
            </div>

            <div class="intro_box">
                <div class="center_box">
                    <div class="leftbox">
                        <h2 class="tabq" id="tabut"><span class="active"><?= $fictionPlace["home_boy_week"]->title ?></span><span><?= $fictionPlace["home_boy_month"]->title ?></span></h2>
                        <div>
                            <!-- 本周强推 -->
                            <ul class="each_conten">
                                <?php foreach($fictionPlace["home_boy_week"]->findBooks(["category"],13) as $book): ?>
                                <li class="ell"><em>【<?= $book->category->name ?>】</em><a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"><?= $book->title ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <!-- 本月强推 -->
                            <ul class="each_conten">
                                <?php foreach($fictionPlace["home_boy_month"]->findBooks(["category"],13) as $book): ?>
                                    <li class="ell"><em>【<?= $book->category->name ?>】</em><a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"><?= $book->title ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                    <div class="incenterbox">
                        <div class="inbanner_boxs banner-container">
                            <div class="swiper-wrapper">
                                <?php foreach($ad["carousel"] as $carousel): ?>
                                    <div class="swiper-slide">
                                        <img src="<?= $carousel["image"] ?>">
                                        <a href="<?= $carousel["url"] ?>" target="_blank">
                                        <div class="text_box">
                                            <h1><?= $carousel["title"] ?></h1>
                                            <p><?= $carousel["introduce"] ?></p>
                                        </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <h2 class="inbangdant"><?= $fictionPlace["home_boy_god"]->title ?></h2>
                        <div class="inbangdan">
                            <?php foreach($fictionPlace["home_boy_god"]->findBooks([],12) as $key=>$book): ?>
                            <div class="initems ell"><i><?= $key+1 ?></i><a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"><?= $book->title ?></a></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="inrightbox">
                        <div class="com_booklist">
                            <div class="comtitle">新书上架</div>
                            <div class="ec">
                                <!-- 循环 第一个默认给上active-->
                                <?php foreach ($fictionNew as $key=>$book): ?>
                                <div class="combookitem <?php if($key == 0): ?>active<?php endif; ?>" onclick=" window.location.href= '<?= Url::to(["home/book","fiction_id" => $book->id]) ?>' ">
                                    <div class="compicbox"><span class="comkeyvalue"><?= $key+1 ?></span><img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>"></div>
                                    <div class="comrighttbox">
                                        <h1><?= $book->title ?></h1>
                                        <h2>作者：<?= $book->member->authorInfo->penname ?></h2>
                                        <h3>分类：<?= $book->category->name ?></h3>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--  -->
            <div class="booklistscrool">
                <div class="center_box">
                    <div class="swiper-container">
                        <div  class="swiper-wrapper">

                            <?php foreach($fictionPlace["home_boy_navigate"]->findBooks(["category"],10) as $book ): ?>
                            <div class="booklistscroolitem swiper-slide">
                                <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>">
                                    <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                                    <h1><?= $book->title ?></h1>
                                    <h2><?= $book->category->name ?></h2>
                                </a>
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>

            <!-- 推荐-->
            <div class="maintuijianbox clear">
                <div class="center_box">
                    <div class="zhulile">
                        <div class="zleftbox">
                            <div class="com_booklist">
                                <div class="comtitle"><?= $fictionPlace["home_boy_recommend"]->title ?></div>
                                <div class="ec">
                                    <!-- 循环  第一个默认给上active-->

                                    <?php foreach($fictionPlace["home_boy_recommend"]->findBooks(["category","member"],11) as $key=>$book ): ?>
                                        <div class="combookitem <?php if($key == 0): ?>active<?php endif; ?>" onclick=" window.location.href= '<?= Url::to(["home/book","fiction_id" => $book->id]) ?>' ">
                                            <div class="compicbox"><span class="comkeyvalue"><?= $key+1 ?></span><img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>"></div>
                                            <div class="comrighttbox">
                                                <h1><?= $book->title ?></h1>
                                                <h2>作者：<?= $book->member->authorInfo->penname ?></h2>
                                                <h3>分类：<?= $book->category->name ?></h3>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>


                        <div class="zjuzhong">
                            <div class="ztitles"><?= $fictionCategory[0]["title"] ?> > </div>
                            <div class="leftbox">
                                <?php foreach($fictionCategory[0]["models"] as $key=>$book): ?>
                                    <?php if($key < 3): ?>
                                        <div class="uitems">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                                            <div class="ujies">
                                                <h2><?= $book->title ?></h2>
                                                <p class="i1"><?= Handle::chapterContentPart($book->description,30) ?>……</p>
                                                <p class="i2"> <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"> [点击阅读] </a></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="rightbox">
                                <ul>
                                    <?php foreach($fictionCategory[0]["models"] as $key=>$book): ?>
                                        <?php if($key >= 3): ?>
                                            <li> <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"><?= $book->title ?></a> </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>



                        <div class="inrightbox">
                            <div class="com_booklist">
                                <div class="comtitle"><?= $fictionPlace["home_boy_sell"]->title ?></div>
                                <div class="ec">
                                    <!-- 循环 第一个默认给上active-->

                                    <?php foreach($fictionPlace["home_boy_sell"]->findBooks(["category","member"],11) as $key=>$book ): ?>
                                        <div class="combookitem <?php if($key == 0): ?>active<?php endif; ?>" onclick=" window.location.href= '<?= Url::to(["home/book","fiction_id" => $book->id]) ?>' ">
                                            <div class="compicbox"><span class="comkeyvalue"><?= $key+1 ?></span><img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>"></div>
                                            <div class="comrighttbox">
                                                <h1><?= $book->title ?></h1>
                                                <h2>作者：<?= $book->member->authorInfo->penname ?></h2>
                                                <h3>分类：<?= $book->category->name ?></h3>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--  -->
            <div class="maintuijianbox clear">
                <div class="center_box">
                    <div class="zhulile">
                        <div class="zleftbox">
                            <a target="_blank" href="<?= $ad["about"]["one"]["url"] ?>"><img class="comsbannerimg" src="<?= $ad["about"]["one"]["image"] ?>"></a>
                        </div>

                        <div class="zjuzhong">
                            <div class="ztitles"><?= $fictionCategory[1]["title"] ?> > </div>
                            <div class="leftbox">
                                <?php foreach($fictionCategory[1]["models"] as $key=>$book): ?>
                                    <?php if($key < 3): ?>
                                        <div class="uitems">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                                            <div class="ujies">
                                                <h2><?= $book->title ?></h2>
                                                <p class="i1"><?= Handle::chapterContentPart($book->description,30) ?>……</p>
                                                <p class="i2"> <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"> [点击阅读] </a></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="rightbox">
                                <ul>
                                    <?php foreach($fictionCategory[1]["models"] as $key=>$book): ?>
                                        <?php if($key >= 3): ?>
                                            <li> <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"><?= $book->title ?></a> </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="inrightbox">
                            <a target="_blank" href="<?= $ad["about"]["two"]["url"] ?>"><img class="comsbannerimg" src="<?= $ad["about"]["two"]["image"] ?>"></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="maintuijianbox clear">
                <div class="center_box">
                    <div class="zhulile">
                        <div class="zleftbox">
                            <a target="_blank" href="<?= $ad["about"]["three"]["url"] ?>"><img class="comsbannerimg" src="<?= $ad["about"]["three"]["image"] ?>"></a>
                        </div>

                        <div class="zjuzhong">
                            <div class="ztitles"><?= $fictionCategory[2]["title"] ?> > </div>
                            <div class="leftbox">
                                <?php foreach($fictionCategory[2]["models"] as $key=>$book): ?>
                                    <?php if($key < 3): ?>
                                        <div class="uitems">
                                            <img src="<?= Handle::getUploadSrc($book->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                                            <div class="ujies">
                                                <h2><?= $book->title ?></h2>
                                                <p class="i1"><?= Handle::chapterContentPart($book->description,30) ?>……</p>
                                                <p class="i2"> <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"> [点击阅读] </a></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>

                            <div class="rightbox">
                                <ul>
                                    <?php foreach($fictionCategory[2]["models"] as $key=>$book): ?>
                                        <?php if($key >= 3): ?>
                                            <li> <a href="<?= Url::to(["home/book","fiction_id" => $book->id]) ?>"><?= $book->title ?></a> </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="inrightbox">
                            <a target="_blank" href="<?= $ad["about"]["four"]["url"] ?>"><img class="comsbannerimg" src="<?= $ad["about"]["four"]["image"] ?>"></a>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

        <?php $this->endContent(); ?>

    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/top.php'); ?>

    <?php $this->endContent(); ?>
</div>
<?php $this->beginBlock('window.js'); ?>

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 6,
        centeredSlides: false,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })

    var swiper = new Swiper('.banner-container', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    })

    $(".bflexbutton a").click(function (){
       if($(this).data("switch-channel") == "girl"){
           document.cookie = "switch-channel=girl";
       }else{
           document.cookie = "switch-channel=boy";
       }
        window.location.reload()
    });


</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>


