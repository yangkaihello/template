<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->params['platform.name'] . '-' . $fiction->title . '-阅读';

/* 预加载CSS */
//'css/bootstrap.min.css',
//'css/sprites.css',
//'css/app.css',
frontend\assets\AppAsset::addCss($this,'css/reader.css');

/*预加载JS*/
//'js/bootstrap.min.js',
//'js/app.js',


?>

<body id="reader" class="skin-1">

<div id="within_header">
    <div class="wrap clearfix">
        <div class="logo-img pull-left">
            <a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_HOME]) ?>">
                <img src="/img/logo1.png" alt="">
            </a>>
        </div>
        <ul class="menu pull-left clearfix">
            <li class="active"><a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_HOME]) ?>">书屋</a></li>
            <li><a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_LONG]) ?>">长篇</a></li>
            <li><a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_SHORT]) ?>">短篇</a></li>
            <!--<li><a href="#">充值</a></li>-->
            <li><a href="#this">作者福利</a></li>
        </ul>
        <div class="pull-left search-box">
            <input type="text" class="search-input" placeholder="书名/作者">
            <button class="search-btn"><svg t="1535339923867" class="icon" viewBox="0 0 1024 1024" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg" p-id="2042" xmlns:xlink="http://www.w3.org/1999/xlink" width="19"
                                            height="19">
                    <defs>
                        <style type="text/css"></style>
                    </defs>
                    <path d="M928 886.4l-160-160c128-150.4 120-377.6-20.8-520-150.4-150.4-393.6-150.4-542.4 0-72 72-112 169.6-112 272s40 198.4 112 272c72 72 169.6 112 272 112 91.2 0 179.2-32 248-91.2l160 160c12.8 12.8 32 12.8 44.8 0 11.2-12.8 11.2-32-1.6-44.8zM249.6 705.6c-60.8-60.8-94.4-140.8-94.4-225.6s33.6-166.4 94.4-225.6c62.4-62.4 144-92.8 225.6-92.8s163.2 30.4 225.6 92.8c124.8 124.8 124.8 328 0 452.8C640 768 560 801.6 475.2 801.6c-84.8-3.2-164.8-35.2-225.6-96z"
                          fill="#FFFFFF" p-id="2043"></path>
                </svg></button>
        </div>
        <!--<div class="pull-right">
            <a href="javascript:void(0)" data-toggle="modal" data-target="#LoginModal">登录</a>
        </div>-->
    </div>
</div>
<div class="reader-box">
    <div class="wrap clearfix">
        <div class="main pull-left">
            <div class="T">
                <span>当前位置：</span>
                <a href="<?= Url::to([\frontend\controllers\HomeController::ACTION_HOME]) ?>"><?= Yii::$app->params['platform.name'] ?></a>
                <span>></span>
                <a href="<?= Url::to(['fiction/index','id' => $fiction->id]) ?>"><?= $fiction->title ?></a>
            </div>
            <div class="center ">
                <p class="title">
                    <?= $fiction->title ?>
                </p>
                <p class="desc">
                    <span>更新时间：<?= $fiction->created_at ?></span><span>字数：<?= $fiction->charSize ?></span>
                </p>
                <div class="content">
                    <?= \common\popular\Handle::formatContent($fiction->shortContent->content) ?>
                </div>
            </div>


        </div>
        <div class="right_bar_list">
            <dl>

                <dd>
                    <a href="javascript:scroll(0,0)">
                        <svg t="1534319389742" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             p-id="25160" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20">
                            <defs>
                                <style type="text/css"></style>
                            </defs>
                            <path d="M534.6 403.5l294.2 294.2c12.5 12.5 32.8 12.5 45.3 0l0 0c12.5-12.5 12.5-32.8 0-45.3L557.3 335.6c-25-25-65.5-25-90.5 0L150 652.4c-12.5 12.5-12.5 32.8 0 45.3l0 0c12.5 12.5 32.8 12.5 45.3 0l294.1-294.2C501.9 391 522.1 391 534.6 403.5z"
                                  p-id="25161" fill="#C2C2C2"></path>
                        </svg>
                        <span>TOP</span>
                    </a>
                </dd>

            </dl>


        </div>

    </div>
</div>

<?php $this->beginContent('@frontend/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>

<div class="modal fade" id="JubaoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
            </div>
            <div class="modal-body">
                <form action="">
                    <p>
                        为配合相关政府部门对互联网环境的清查整顿，<?= Yii::$app->params['platform.name'] ?>小说网积极开展自查、他查工作。维护互联网环境的和谐稳定是<?= Yii::$app->params['platform.name'] ?>小说网应尽的责任和义务，我们将尽一切努力杜绝色情、反动等违规信息在<?= Yii::$app->params['platform.name'] ?>小说网出现，对于违法违规的内容、现象，我们都将予以严肃处理。为更有效的打击色情、反动信息诚意邀请所有网友对<?= Yii::$app->params['platform.name'] ?>小说网上的内容进行监督，对涉嫌色情、反动描写的内容进行举报，为建设和谐清新的互联网环境出一份力！
                    </p>
                    <p>
                        <span>请选择举报理由：</span>
                        <select name="" id="" style="width: 250px;height: 44px;">
                            <option value="1">作品内含有反动信息</option>
                            <option value="2">作品内含有暴力血腥</option>
                            <option value="3">作品内含有色情信息</option>
                            <option value="4">作品涉及抄袭他人</option>
                        </select>
                    </p>
                    <button type="submit">提交</button>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dasanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <!-- <h4 class="modal-title" id="myModalLabel">Modal title</h4> -->
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#dasan" aria-controls="dasan" role="tab" data-toggle="tab">打赏</a>
                    </li>
                    <li role="presentation">
                        <a href="#yuepiao" aria-controls="yuepiao" role="tab" data-toggle="tab">月票</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dasan">
                        <form action="">
                                    <span>
                                        <input type="radio" id="r1" name="radio">
                                        <label for="r1">100午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r2" name="radio">
                                        <label for="r2">200午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r3" name="radio">
                                        <label for="r3">300午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r4" name="radio">
                                        <label for="r4">500午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r5" name="radio">
                                        <label for="r5">1000午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r6" name="radio">
                                        <label for="r6">2000午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r7" name="radio">
                                        <label for="r7">5000午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r8" name="radio">
                                        <label for="r8">10000午币</label>
                                    </span>
                            <span>
                                        <input type="radio" id="r9" name="radio">
                                        <label for="r9">20000午币</label>
                                    </span>
                            <p style="margin:10px 0">账户余额：0 午币 <a href="#" style="color:#bf0409">去充值 >></a> </p>
<!--                            <textarea name="" id=""  maxlength="180">这本书太棒了~~~</textarea>-->
                            <button  type="submit" style="margin-left: 147px;">确认打赏</button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="yuepiao">月票</div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


<?php $this->beginBlock('window.onload'); ?>

$(document).ready(function () {
var leftBar = $('.bar-list'),
nowLeftTop = leftBarTop = 124;
$(window).scroll(function () {
var winScrollTop = $(window).scrollTop();
if (winScrollTop >= leftBarTop) {
nowLeftTop = 0;
leftBar.css('top', nowLeftTop);
} else {
console.log('a')
nowLeftTop = leftBarTop - winScrollTop;
leftBar.css('top', nowLeftTop);
}
}).trigger('scroll')
$('.up-link').click(function () {
$('html ,body').animate({ scrollTop: 0 }, 300);
return false;
})
$('dd .close').click(function () {
$(this).parents('dd').removeClass('open');
return false;
})
$('dd .mulu-link,dd .shezhi-link').click(function () {
$(this).parents('dd').siblings('dd').removeClass('open')
$(this).parents('dd').toggleClass('open');
return false;
})
$('.font-size').val(parseInt($('.center .content').css('font-size')))
$('.f-size,.s-size').click(function () {
var $this = $(this),
fs = $('.font-size').val();
if ($this.hasClass('f-size')) {

if (fs > 48) {
return false;
}
fs++;
$('.font-size').val(fs);
$('.center .content').css('font-size', fs);
return false;
} else {
if (fs <= 12) {
return false;
}
fs--;
$('.font-size').val(fs);
$('.center .content').css('font-size', fs);
return false;
}
})

$('.font-f').change(function () {
var id = $('.font-f:checked').data('id'),
$el = $('.center .content');
switch (id) {
case 1:
$el.css('font-family', 'MicrosoftYaHei')
break;
case 2:
$el.css('font-family', '宋体')
break;
case 3:
$el.css('font-family', '楷体')
break;
case 4:
$el.css('font-family', '黑体')
break;
}
})
$('.font-c').change(function () {
var id = $('.font-c:checked').data('id');
$('body').attr('class', function (i, cls) { return cls.replace(/skin-\d+ /g, ''); });
$('body').removeClass();
$('body').addClass('skin-' + id);
})
})

<?php $this->endBlock(); ?>
<?php $this->registerJs($this->blocks['window.onload'],\yii\web\View::POS_END); ?>
