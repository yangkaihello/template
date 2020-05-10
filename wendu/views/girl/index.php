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
    <div class="center_box">
        <div class="ga_box">
            <a href=""> <img src="/template/img/log.png"></a>
            <div class="bannerBox">
                <a href=""><img src="/template/img/banner.jpg"></a>
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
            <div class="left"><a href=""><img src="/template/img/banner.jpg"></a></div>
            <div class="right"><a href=""><img src="/template/img/banner.jpg"></a></div>
        </div>

        <div class="intro_box">
            <div class="center_box">
                <div class="leftbox">
                    <h2 class="tabq" id="tabut"><span class="active">本周强推</span><span>本月强推</span></h2>
                    <div>
                        <!-- 本周强推 -->
                        <ul class="each_conten">
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                            <li class="ell"><em>【玄幻】</em><a href="/template/book.html">穿越到上古当码农</a></li>
                        </ul>
                        <!-- 本月强推 -->
                        <ul class="each_conten">
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                            <li class="ell"><em>【都市】</em><a href="">都市之六界裁决者</a></li>
                        </ul>
                    </div>

                    <div class="inmore"><a href="">查看更多>></a></div>
                </div>

                <div class="incenterbox">
                    <div class="inbanner_boxs banner-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/template/img/banner2.jpg">
                                <div class="text_box">
                                    <h1>现言•青春 陆爷家的小可爱超甜   安向暖著   2020-03-17</h1>
                                    <p>陆爷家的小可爱超甜</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <img src="/template/img/banner2.jpg">
                                <div class="text_box">
                                    <h1>小可爱超甜   安向暖著   2020-03-17</h1>
                                    <p>神医弃女</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <h2 class="inbangdant">大神风云榜单</h2>
                    <div class="inbangdan">
                        <div class="initems ell"><i>1</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>2</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>3</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>4</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>5</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>6</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>7</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>8</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>9</i><a href="">神医弃女1</a></div>
                        <div class="initems ell"><i>10</i><a href="">天下电竞大神暗…</a></div>
                        <div class="initems ell"><i>11</i><a href="">锦绣农女种田忙</a></div>
                        <div class="initems ell"><i>12</i><a href="">这个大佬画风不对</a></div>
                    </div>
                </div>

                <div class="inrightbox">
                    <div class="com_booklist">
                        <div class="comtitle">新书上架</div>
                        <div class="ec">
                            <!-- 循环 第一个默认给上active-->
                            <div class="combookitem active" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">1</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录2</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/b1.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录3</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">3</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录4</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">4</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录3</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">5</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登4录</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">6</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录4</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">7</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录5</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">1</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登4录</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">1</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录4</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>

                            <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                <div class="compicbox"><span class="comkeyvalue">1</span><img src="/template/img/book.jpg"></div>
                                <div class="comrighttbox">
                                    <h1>我的小可爱登录4</h1>
                                    <h2>作者：李大钊</h2>
                                    <h3>分类：现言•青春</h3>
                                </div>
                            </div>
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
                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/book.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>

                        <div class="booklistscroolitem swiper-slide">
                            <a href="">
                                <img src="/template/img/b1.jpg">
                                <h1>开局变成非人类</h1>
                                <h2>蝼蚁也曾向往天空</h2>
                            </a>
                        </div>
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
                            <div class="comtitle">主编力荐</div>
                            <div class="ec">
                                <!-- 循环  第一个默认给上active-->
                                <div class="combookitem active" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">1</span><img src="/template/img/book.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录2</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/book.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/book.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/book.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/book.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="zjuzhong">
                        <div class="ztitles">现言•萌宝 > </div>
                        <div class="leftbox">
                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>
                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>

                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>
                        </div>

                        <div class="rightbox">
                            <ul>
                                <li> <a href="">觉醒后我成了宫斗冠军</a> </li>
                                <li> <a href="">穿越之农家悍妻有点田</a> </li>
                                <li> <a href="">草莓如你</a> </li>
                                <li> <a href="">我家娘子是个兔子精</a> </li>
                                <li> <a href="">我家妻主超高冷</a> </li>
                                <li> <a href="">穿越之农家悍妻有点田</a> </li>
                                <li> <a href="">农家娘子福满桃园</a> </li>
                                <li> <a href="">王爷们都求我别衰了</a> </li>
                                <li> <a href="">神级学生 拷贝</a> </li>
                                <li> <a href="">明月夜星澜</a> </li>
                                <li> <a href="">觉醒后我成了宫斗冠军</a> </li>
                                <li> <a href="">暴君让我恃宠生娇</a> </li>
                            </ul>
                        </div>
                    </div>



                    <div class="inrightbox">
                        <div class="com_booklist">
                            <div class="comtitle">销售总榜</div>
                            <div class="ec">
                                <!-- 循环 第一个默认给上active-->
                                <div class="combookitem active" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">1</span><img src="/template/img/b1.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录2</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/b1.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/b1.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/b1.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>

                                <div class="combookitem" onclick=" window.location.href= '/a.html' ">
                                    <div class="compicbox"><span class="comkeyvalue">2</span><img src="/template/img/b1.jpg"></div>
                                    <div class="comrighttbox">
                                        <h1>我的小可爱登录3</h1>
                                        <h2>作者：李大钊</h2>
                                        <h3>分类：现言•青春</h3>
                                    </div>
                                </div>
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
                        <a href=""><img class="comsbannerimg" src="/template/img/adf.jpg"></a>
                    </div>

                    <div class="zjuzhong">
                        <div class="ztitles">现言•萌宝 > </div>
                        <div class="leftbox">
                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>
                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>

                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>
                        </div>

                        <div class="rightbox">
                            <ul>
                                <li> <a href="">觉醒后我成了宫斗冠军</a> </li>
                                <li> <a href="">穿越之农家悍妻有点田</a> </li>
                                <li> <a href="">草莓如你</a> </li>
                                <li> <a href="">我家娘子是个兔子精</a> </li>
                                <li> <a href="">我家妻主超高冷</a> </li>
                                <li> <a href="">穿越之农家悍妻有点田</a> </li>
                                <li> <a href="">农家娘子福满桃园</a> </li>
                                <li> <a href="">王爷们都求我别衰了</a> </li>
                                <li> <a href="">神级学生 拷贝</a> </li>
                                <li> <a href="">明月夜星澜</a> </li>
                                <li> <a href="">觉醒后我成了宫斗冠军</a> </li>
                                <li> <a href="">暴君让我恃宠生娇</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="inrightbox">
                        <a href=""><img class="comsbannerimg" src="/template/img/adff.jpg"></a>
                    </div>

                </div>
            </div>
        </div>

        <div class="maintuijianbox clear">
            <div class="center_box">
                <div class="zhulile">
                    <div class="zleftbox">
                        <a href=""><img class="comsbannerimg" src="/template/img/adfff.jpg"></a>
                    </div>

                    <div class="zjuzhong">
                        <div class="ztitles">现言•萌宝 > </div>
                        <div class="leftbox">
                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>
                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>

                            <div class="uitems">
                                <img src="/template/img/b2.jpg">
                                <div class="ujies">
                                    <h2>月华庭</h2>
                                    <p class="i1">互相不待见的两人掉下万丈深渊的悬崖后两人在互相利用中，暗生情愫……</p>
                                    <p class="i2"> <a href=""> [点击阅读] </a></p>
                                </div>
                            </div>
                        </div>

                        <div class="rightbox">
                            <ul>
                                <li> <a href="">觉醒后我成了宫斗冠军</a> </li>
                                <li> <a href="">穿越之农家悍妻有点田</a> </li>
                                <li> <a href="">草莓如你</a> </li>
                                <li> <a href="">我家娘子是个兔子精</a> </li>
                                <li> <a href="">我家妻主超高冷</a> </li>
                                <li> <a href="">穿越之农家悍妻有点田</a> </li>
                                <li> <a href="">农家娘子福满桃园</a> </li>
                                <li> <a href="">王爷们都求我别衰了</a> </li>
                                <li> <a href="">神级学生 拷贝</a> </li>
                                <li> <a href="">明月夜星澜</a> </li>
                                <li> <a href="">觉醒后我成了宫斗冠军</a> </li>
                                <li> <a href="">暴君让我恃宠生娇</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="inrightbox">
                        <a href=""><img class="comsbannerimg" src="/template/img/adfffff.jpg"></a>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

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


