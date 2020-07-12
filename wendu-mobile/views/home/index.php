<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\SystemPlace[]
 * @var $model \common\models\FictionIndex
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = Yii::$app->params['platform.name'];

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
\mobile\assets\AppAsset::addCss($this,'template/css/swiper.min.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'template/js/swiper.min.js?v=0.1');


?>

<div class="index-wrappy">
    <div class="select">
        <div class="clearfix choose">
            <a href="<?= Url::to(["/"]) ?>" class="select_1 <?= Handle::isOpen("/") ? "active" : "" ?>">精选</a>
            <a href="<?= Url::to(["home/index","type" => "girl"]) ?>" class="select_1 <?= Handle::isOpen("/home/girl") ? "active" : "" ?>">女频</a>
            <a href="<?= Url::to(["home/index","type" => "boy"]) ?>" class="select_1 <?= Handle::isOpen("/home/boy") ? "active" : "" ?>">男频</a>
        </div>
        <div class="clearfix search">
            <input class="input" type="请输入书名搜索">
            <img class="sear" src="./images/sear.png" alt="">
        </div>
    </div>

    <div class="banner-box">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" >
                    <a  class="banner" href="">
                        <img  src="./images/banner.jpg">
                    </a>
                </div>
                <div class="swiper-slide" >
                    <a class="banner" href="">
                        <img  src="./images/banner.jpg">
                    </a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="classification">
        <div class="clearfix ranking">
            <a href="<?= Url::to(["home/category"]) ?>">
                <img src="/template/images/1.png" alt="" style="width: 30%;">
                <p class="After_completing_this">分类</p>
            </a>
        </div>
        <div class="clearfix ranking">
            <a href="<?= Url::to(["home/rank"]) ?>">
                <img src="/template/images/2.png" alt="" style="width: 30%;">
                <p class="After_completing_this">排行</p>
            </a>
        </div>
        <div class="clearfix ranking">
            <a href="<?= Url::to(["home/end"]) ?>">
                <img src="/template/images/3.png" alt="" style="width: 30%;">
                <p class="After_completing_this">完本</p>
            </a>
        </div>
        <div class="clearfix ranking">
            <a href="<?= Url::to(["member/sign"]) ?>">
                <img src="/template/images/4.png" alt="" style="width: 30%;">
                <p class="After_completing_this">签到</p>
            </a>
        </div>
    </div>
    <div class="segmentation"></div>

    <!-- 主编力荐 此处图片隐藏忘记怎么写了 -->
    <div class="recommended">
        <div style="height:42px;">
            <p class="Book_recommendation">主编力荐</p>
            <a class="More_and_more" href="<?= Url::to(["home/recommend"]) ?>">更多</a>
            <div class="right1">
                <img class="right1_img" src="/template/images/right1.png" alt="">
            </div>
        </div>
        <div class="book-box">
            <div class="swiper-container-book">
                <div class="swiper-wrapper">
                    <div class="swiper-slide clearfix hidden_2">
                        <a href="" style="display: block;">
                            <img src="./images/test.jpg" alt="" style="width: 100%;">
                            <p class="test_1">书名</p>
                        </a>
                    </div>
                    <div class="swiper-slide clearfix hidden_2">
                        <a href="" style="display: block;">
                            <img src="./images/test.jpg" alt="" style="width: 100%;">
                            <p class="test_1">书名</p>
                        </a>
                    </div>
                    <div class="swiper-slide clearfix hidden_2">
                        <a href="" style="display: block;">
                            <img src="./images/test.jpg" alt="" style="width: 100%;">
                            <p class="test_1">书名</p>
                        </a>
                    </div>
                    <div class="swiper-slide clearfix hidden_2">
                        <a href="" style="display: block;">
                            <img src="./images/test.jpg" alt="" style="width: 100%;">
                            <p class="test_1">书名</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="segmentation"></div>
    <div class="recommended">
        <div style="height:42px;">
            <p class="Book_recommendation">新书速递</p>
            <a class="More_and_more" href="">更多</a>
            <div class="right1">
                <img class="right1_img" src="./images/right1.png" alt="">
            </div>
        </div>
        <div class="clearfix">
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
        </div>
        <div class="clearfix" style="margin-top:10px;">
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class="clearfix Title_1">
                <a class="Title_2" href="">
                    <img class="test_img" src="./images/test.jpg" alt="">
                    <p class="test_score">9.4分</p>
                    <p class="test_1">书名</p>
                </a>
            </div>
        </div>
    </div>
    <div class="segmentation"></div>
    <div class="recommended">
        <div style="height:42px;">
            <p class="Book_recommendation">榜单精选</p>
            <a class="More_and_more" href="">更多</a>
            <div class="right1">
                <img class="right1_img" src="./images/right1.png" alt="">
            </div>
        </div>
        <div class="clearfix">
            <div class="clearfix letters">
                <a class="test_2" href="">
                    <img class="test_img_2" src="./images/test.jpg" alt="">
                </a>
                <a class="Title_letters" href="">
                    <p>书名</p>
                    <p class="Content_abstract">书简书简书简书简书简书简书简书简书简书简书简书简书简书简书简简书简书简简书简书简</p>
                    <p class="Now_the_word">
                        <span class="word-titles" style="float: left;">青春都市/现言</span>
                        <span class="loading">加载</span>
                        <span class="Number_words">125万字</span>
                    </p>
                </a>
            </div>
        </div>

        <div class="clearfix">
            <div class="clearfix letters">
                <a class="test_2" href="">
                    <img class="test_img_2" src="./images/test.jpg" alt="">
                </a>
                <a class="Title_letters" href="">
                    <p>书名</p>
                    <p class="Content_abstract">书简书简书简书简书简书简书简书简书简书简书简书简书简书简书简简书简书简简书简书简</p>
                    <p class="Now_the_word">
                        <span class="word-titles" style="float: left;">青春都市/现言</span>
                        <span class="loading">加载</span>
                        <span class="Number_words">125万字</span>
                    </p>
                </a>
            </div>
        </div>

        <div class="clearfix">
            <div class="clearfix letters">
                <a class="test_2" href="">
                    <img class="test_img_2" src="./images/test.jpg" alt="">
                </a>
                <a class="Title_letters" href="">
                    <p>书名</p>
                    <p class="Content_abstract">书简书简书简书简书简书简书简书简书简书简书简书简书简书简书简简书简书简简书简书简</p>
                    <p class="Now_the_word">
                        <span class="word-titles" style="float: left;">青春都市/现言</span>
                        <span class="loading">加载</span>
                        <span class="Number_words">125万字</span>
                    </p>
                </a>
            </div>
        </div>
    </div>
    <div class="segmentation"></div>
    <div class="recommended">
        <div style="height:42px;">
            <p class="Book_recommendation">榜单精选</p>
            <a class="More_and_more" href="">更多</a>
            <div class="right1">
                <img class="right1_img" src="./images/right1.png" alt="">
            </div>
        </div>
        <div class="clearfix">
            <div class="clearfix" style="width: 100%;background: white;">
                <a class="test_2" href="">
                    <img class="test_img_2"src="./images/test.jpg" alt="">
                </a>
                <a class="letters_2" href="">
                    <div class="clearfix Title_letters_2">
                        <p>书名</p>
                        <p class="score">9.4分</p>
                        <p class="Content_abstract_2">书简书简书简书简书简书简书简书简书简书简书简书简书简书简书简简书简书简简书简书简</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="type3_box clearfix">
            <div class=" clearfix hidden_2">
                <a href="" style="display: block;">
                    <img src="./images/test.jpg" alt="" style="width: 100%;">
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class=" clearfix hidden_2">
                <a href="" style="display: block;">
                    <img src="./images/test.jpg" alt="" style="width: 100%;">
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class=" clearfix hidden_2">
                <a href="" style="display: block;">
                    <img src="./images/test.jpg" alt="" style="width: 100%;">
                    <p class="test_1">书名</p>
                </a>
            </div>
            <div class=" clearfix hidden_2">
                <a href="" style="display: block;">
                    <img src="./images/test.jpg" alt="" style="width: 100%;">
                    <p class="test_1">书名</p>
                </a>
            </div>
        </div>




    </div>

    <?php $this->beginContent('@mobile/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>
</div>


<?php $this->beginBlock('window.js'); ?>

<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
        },
    });
    var book = new Swiper('.swiper-container-book', {
        slidesPerView: 3,
        spaceBetween: 30,
        freeMode: true,
        pagination: {
            el: '.swiper-pagination-book',
            clickable: true,
        },
    });
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>

