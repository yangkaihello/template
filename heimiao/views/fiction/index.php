<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title =  Yii::$app->params['platform.name'] . '-' . $fiction->title . '-简介';

/* 预加载CSS */
//'css/bootstrap.min.css',
//'css/sprites.css',
//'css/app.css',

/*预加载JS*/
//'js/bootstrap.min.js',
//'js/app.js',


?>

<body>

<div class="index-bg wykz-bg"></div>
<div class="wrap index clearfix">
    <?php $this->beginContent('@frontend/views/layouts/header.php'); ?>

    <?php $this->endContent(); ?>

    <?php $this->beginContent('@frontend/views/layouts/floating.php'); ?>

    <?php $this->endContent(); ?>

</div>

<div class="book-details wrap">
    <div class="crumbs">
        <span>当前位置：</span>
        <a href="/"><?= Yii::$app->params['platform.name'] ?></a>
        <span>></span>
        <a href="#this"><?= $fiction->title ?></a>

    </div>
    <div class="book-d-w1 clearfix">
        <div class="pull-left book-p clearfix">
            <div class="img-box pull-left">
                <img src="<?= $fiction->cover ?>" width="100%" height="100%" alt="">
            </div>
            <div class="desc pull-left">
                <p class="t">
                    <?= $fiction->title ?> <?php if($fiction->isVip == \frontend\models\FictionIndex::VIP_YES): ?><i class="lab y">vip签约</i><?php endif; ?> <!--<i class="lab g">授权作品</i>-->
                </p>
                <p class="j">
                    <span class="t">类别：</span>
                    <a href="#this"><?= $fiction->category->name ?></a>&nbsp;&nbsp;&nbsp;
                    <span class="t">进度：</span>
                    <span><?= Yii::$app->params['fiction.status'][$fiction->status] ?></span>&nbsp;&nbsp;&nbsp;
                    <span class="t">总字数：</span>
                    <span><?= \common\popular\Handle::charSizeFat($fiction->charSize) ?></span>
                </p>
                <p class="d">
                    <?= $fiction->description ?>
                </p>
                <div class="links">
                    <a href="<?= Url::to(['fiction/chapters','id' => $fiction->id]) ?>">目录</a>
                    <!--<a href="#this">加入书架</a>-->
                    <?php if( isset($fiction->chapters[0]) ): ?>
                    <a href="<?= Url::to(['chapter/index','id' => $fiction->chapters[0]->id]) ?>" class="bg">开始阅读</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="pull-right user-p">
            <div class="user-img">
                <img width="100%" height="100%" src="<?= \common\popular\Handle::getImgSrc($fiction->member->icon) ?>" alt="">
            </div>
            <p class="n">作者：<?= $fiction->member->authorInfo->penname ?></p>
            <p class="t">
                <?= $fiction->member->authorInfo->remark ?>
            </p>
            <div class="xinx">
                <p>创作时间：<?= \common\extend\DateTime::formatDate($fiction->member->created_at,"Y-m-d")?></p>
                <p>
                    推荐指数：
                    <img src='/img/stars.png' alt="">
                    <img src='/img/stars.png' alt="">
                    <img src='/img/stars.png' alt="">
                    <img src='/img/stars.png' alt="">
                    <img src='/img/stars.png' alt="">
                </p>
            </div>
        </div>
    </div>
    <div class="book-d-w2 clearfix">
        <div class="pull-left pinl">
            <div class="reward">
                <div class="title">
                    <span>打赏</span>
                </div>
                <ul class="reward-list clearfix">
                    <li>
                        <a href="#">彼岸花</a>
                    </li>
                    <li>
                        <a href="#">孟婆汤</a>
                    </li>
                    <li>
                        <a href="#">判官笔</a>
                    </li>
                    <li>
                        <a href="#">生死薄</a>
                    </li>
                    <li>
                        <a href="#">封神榜</a>
                    </li>
                    <li>
                        <a href="#">投金票</a>
                    </li>
                </ul>
            </div>
            <!--<div class="comment-tab">
                <ul class="nav nav-tabs clearfix">
                    <li class="active"><a href="#tab1" data-toggle="tab">最新评论</a></li>
                    <li><a href="#tab2" data-toggle="tab">精华评论</a></li>
                    <li class="pull-right">
                            <span>
                                共800条评论
                            </span>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="comment-box tab-pane fade in active" id="tab1">
                    <div class="reply-box">
                        <form action="">
                            <textarea name="" id="" placeholder="我也来说两句..."></textarea>
                            <button type="submit">发表评论</button>
                        </form>
                    </div>
                    <div class="comment-list">
                        <ul>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">黑不溜秋的傻妞</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>

                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">黄渤</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>

                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">周星驰</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">吴彦祖</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">刘德华</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <p style="text-align:center;">
                        <a href="#" class="more">查看更多评论</a>
                    </p>
                </div>
                <div class="comment-box tab-pane fade " id="tab2">
                    <div class="reply-box">
                        <form action="">
                            <textarea name="" id="" placeholder="我也来说两句..."></textarea>
                            <button type="submit">发表评论</button>
                        </form>
                    </div>
                    <div class="comment-list">
                        <ul>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">黑不溜秋的傻妞</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>

                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">黄渤</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>

                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">周星驰</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">吴彦祖</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="user-img">
                                    <img src="./img/user-img.png" alt="" width="100%">
                                </div>
                                <div class="main">
                                    <p class="t">刘德华</p>
                                    <p class="d" style="display:block">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录
                                        <a href="#" class="open">【展开查看更多】</a>
                                    </p>
                                    <p class="d" style="display: none">不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击不知道如何充值的朋友们点这里，首先大家要登陆一个属于自己的账号，网站目前支持QQ、微博等一键登录，无需注册，直接登录，大家点击
                                        <a href="#" class="clos">【收起】</a>
                                    </p>
                                </div>
                                <div class="links clearfix">
                                        <span>
                                            2018-10-20
                                        </span>
                                    <a class="pull-right open-comment" href="#">回复</a>
                                </div>
                                <div class="reply" style="display:none">
                                    <form action="">
                                        <input type="text">
                                        <button type="submit">回复</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <p style="text-align:center;">
                        <a href="#" class="more">查看更多评论</a>
                    </p>
                </div>
            </div>-->

        </div>
        <div class="pull-right fujia">
            <div class="qita">
                <p class="title">
                    其他作品
                </p>
                <?php foreach($related as $value): ?>
                <div class="item clearfix">
                    <div class="img-box pull-left">
                        <a href="<?= Url::to(['fiction/index','id' => $value->id]) ?>">
                            <img width="100%" height="100%" src="<?= $value->cover ?>" alt="">
                        </a>
                    </div>
                    <div class="pull-right">
                        <a href="<?= Url::to(['fiction/index','id' => $value->id]) ?>">
                            <p class="t"><?= $value->title ?></p>
                        </a>
                        <p class="n"><?= $value->member->authorInfo->penname ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->beginContent('@frontend/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>
</body>

<script>



</script>

<?php $this->beginBlock('window.onload'); ?>

$(".screen-box a").click(function (e){
var $this = $(this);
var form  = $(".books form");
form.find("input[name="+$this.data('name')+"]").val($this.data('value'));
form.submit();
});

<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['window.onload'],\yii\web\View::POS_END); ?>
