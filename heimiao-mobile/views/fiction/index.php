<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $fiction \common\models\FictionIndex
 * @var $lexicons \common\models\LexiconIndex[]
 * @var $author \common\models\FictionIndex[]
 * @var $app \EasyWeChat\OfficialAccount\Application
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = $fiction->title;

$this->registerMetaTag([
    'name'      => 'keywords',
    'content'   => implode(";",array_column($lexicons,'title')),
]);
$this->registerMetaTag([
    'name'      => 'description',
    'content'   => $fiction->description,
]);

/* 预加载CSS */
//'template/css/reset.css',
\mobile\assets\AppAsset::addCss($this,'static/css/detail.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'static/js/index.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<div class="detail">
    <div class="cover">
        <img src="<?= Handle::getUploadSrc($fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
    </div>
    <div class="info">
        <div class="auth"><?= $fiction->title ?></div>
        <div class='role'>作者：<?= $fiction->member->authorInfo->penname ?></div>
        <div class='progress'><?= $fiction::STATUS_LIST[$fiction->status] ?>：<?= Handle::charSizeFat($fiction->charSize) ?>字</div>
        <div class='classify'>
            <?php foreach ($lexicons as $lexicon): ?>
            <span class='class'><?= $lexicon->title ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="profile">
    <div class="profile_t">内容简介</div>
    <p class="profile_b">
        <?= $fiction->description ?>
        <!--<span>更多</span>-->
    </p>
</div>
<div class="directories">
    <div class="directories1">目录</div>
    <a class="directories2" href="<?= Url::to(['fiction/chapter','id' => $fiction->id]) ?>">共<?= \common\models\FictionChapter::sortCheckCount($fiction->id) ?>章></a>
</div>
<!--<div class="reward">
    <div class="reward1">打赏记录</div>
    <a class="reward2" href='reward.html'>
        <img src="/static/img/detail_07.jpg" alt="">
        <img src="/static/img/detail_07.jpg" alt="">
        <img src="/static/img/detail_07.jpg" alt="">
        <img src="/static/img/detail_07.jpg" alt="">
        <img src="/static/img/detail_07.jpg" alt="">
        <img src="/static/img/detail_07.jpg" alt="">
        <div>></div>
    </a>
</div>-->
<div class="list">
    <div class="list_t">作者相关</div>
    <div class='list_c'>
        <?php foreach($author as $key=>$value): ?>
        <a href="<?= Url::to(['fiction/index','id' => $value->id],true) ?>">
            <img src="<?= Handle::getUploadSrc($value->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>" alt="">
            <div><?= $value->title ?></div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<div class="endLine">我是有底线的，去书库看看</div>
<div class="foot">
    <div class="footcontent">
        <ul class="footUl">
            <li class='dashang'>
                <img src="/static/img/detail_17.jpg" alt="">
                <div class='footer-info'>打赏</div>
            </li>
            <li class='fenxiang'>
                <img src="/static/img/detail_19.jpg" alt="">
                <div class='footer-info'>分享</div>
            </li>
            <li>
                <img src="/static/img/detail_21.jpg" alt="">
                <?php if(isset($this->context->user)): ?>
                        <?php if( \common\models\collect\MemberCollect::isCollect($this->context->user->id,$fiction->id) ): ?>
                        <div data-href="<?= Url::to(['member/collect/attention','fiction_id' => $fiction->id]) ?>"
                             class='footer-info red collect'>
                            已加书架
                        </div>
                        <?php else: ?>
                        <div data-href="<?= Url::to(['member/collect/attention','fiction_id' => $fiction->id]) ?>"
                             class='footer-info collect'>
                            加入书架
                        </div>
                        <?php endif; ?>
                <?php else: ?>
                    <div data-href="<?= Url::to(['site/login-select']) ?>" class='footer-info no-collect'> 加入书架</div>
                <?php endif; ?>
            </li>
        </ul>
        <a class="startRead" href="<?= Url::to(['chapter/index','fiction_id' => $fiction->id, 'sort' => 1],true) ?>">
            开始阅读
        </a>
    </div>
</div>

<div style='display:none;' class="screen reward-dialog-box">
    <div class="reward-dialog">
        <h3 class='reward-title'>打赏</h3>
        <div class="prizeList">
            <div class="prize">
                <div class="prize-icon"><img src="/static/img/red-wine.png" alt=""></div>
                <p class='prize-name'>红酒</p>
                <p class='prize-gold'>50金币</p>
            </div>
            <div class="prize">
                <div class="prize-icon"><img src="/static/img/Diamonds.png" alt=""></div>
                <p class='prize-name'>钻石</p>
                <p class='prize-gold'>50金币</p>
            </div>
            <div class="prize">
                <div class="prize-icon"><img src="/static/img/sedan.png" alt=""></div>
                <p class='prize-name'>轿车</p>
                <p class='prize-gold'>50金币</p>
            </div>
            <div class="prize">
                <div class="prize-icon"><img src="/static/img/house.png" alt=""></div>
                <p class='prize-name'>别墅</p>
                <p class='prize-gold'>50金币</p>
            </div>
            <div class="prize">
                <div class="prize-icon"><img src="/static/img/yacht.png" alt=""></div>
                <p class='prize-name'>游艇</p>
                <p class='prize-gold'>50金币</p>
            </div>
            <div class="prize">
                <div class="prize-icon"><img src="/static/img/plane.png" alt=""></div>
                <p class='prize-name'>飞机</p>
                <p class='prize-gold'>50金币</p>
            </div>
        </div>
        <div class="prize-num">
            <div class="num-info">数量:</div>
            <div class="reduce"></div>
            <div class="num-box"><input type="num" class='num' value='0'></div>
            <div class="add"></div>
        </div>
        <div class="money-box">
            <div class="money-left">
                <div class="total-box"><span class='total-txt'>合计：</span><span class='total-num'>0</span><span class='total-unit'>书币</span></div>
                <div class="balance"><span class='balance-txt'>书币余额：</span><span class='balance-num'>100</span><span class='balance-unit'>书币</span><a class='recharge' href='reChargeCenter.html'>充值></a></div>
            </div>

            <div class="confirm">确认打赏</div>
        </div>
    </div>
</div>


<div style='display:none;' class="screen collect-dialog-box">
    <div class="reward-dialog">
        <h3 class='reward-title'>分享</h3>
        <div class="prizeList">
            <div class="prize wechat">
                <div class="prize-icon"><img src="/static/img/red-wine.png" alt=""></div>
                <p class='prize-name'>分享给朋友</p>
            </div>
        </div>
    </div>
</div>

</body>

<?php $this->beginBlock('window.js'); ?>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>

    wx.config(<?= $app->jssdk->buildConfig(['updateAppMessageShareData','onMenuShareAppMessage','onMenuShareTimeline'], true) ?>);

    $(".collect-dialog-box .wechat").click(function (){

        wx.ready(function () {   //需在用户可能点击分享按钮前就先调用

            wx.onMenuShareAppMessage({
                title: '标题', // 分享标题
                desc: '描述', // 分享描述
                link: "<?= Url::to(['fiction/index','id' => $fiction->id],true) ?>", // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                imgUrl: "<?= Url::to(['/favicon.ico'],true) ?>", // 分享图标
            }, function(res) {
                // console.log("test==========",res)
                //这里是回调函数
            }, function(err){
                // console.log('err:', err)
            });

//            wx.updateAppMessageShareData({
//                title: '标题', // 分享标题
//                desc: '描述', // 分享描述
//                link: "<?//= Url::to(['fiction/index','id' => $fiction->id],true) ?>//", // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
//                imgUrl: "<?//= Url::to(['/favicon.ico'],true) ?>//", // 分享图标
//                success: function (res) {
//                    console.log(res);
//                    // 设置成功
//                }
//            })
        });

    });

    $(".foot .collect").on("click",function (){
        var $this = $(this);
        $.post($this.data('href'),{},function (res){
            if(res.status == 'yes')
            {
                $this.addClass("red");
                $this.html("已加书架");
            }else{
                $this.removeClass("red");
                $this.html("加入书架");
            }
        }).fail(function (res) {
            console.log(res);
        });
    });

    $(".foot .no-collect").on("click",function (){
        alert("使用此功能需要先登陆!!");
        location.href = $(this).data("href");
    });

    $('.dashang').on('click', function() {
        alert("功能暂未开放！！");
        //$('.reward-dialog-box').show()
    })

    $('.fenxiang').on('click', function() {
        alert("功能暂未开放！！");
        //$('.collect-dialog-box').show()
    })

    $('.reward-dialog').on('click', function(eve) {
        eve.stopPropagation()
    })

    $('.screen').on('click', function() {
        $('.reward-dialog-box').hide();
        $('.collect-dialog-box').hide();
    })

    $('.confirm').on('click', function() {
        $('.reward-dialog-box').hide();
        $('.collect-dialog-box').hide();
    });

    $('.add').on('click', function() {
        var numEL = $('.num')
        var num = numEL.val()
        numEL.val(++num)
        total()
    });

    // 当前商品默认金币
    var itemMoney = 0;
    $('.reduce').on('click', function() {
        var numEL = $('.num')
        var num = numEL.val()
        if( num > 1 ) {
            numEL.val(--num)
        }
        total()
    })


    $('.prize').on('click', function() {
        var itemMoneyStr = $(this).find('.prize-gold').html()
        $(this).addClass('active').siblings().removeClass('active')
        var num = $('.num').val()
        if(num === '0') {
            $('.num').val(1)
        }
        itemMoney = itemMoneyStr.slice(0, -2)
        total()
    })

    function total() {
        var total = $('.num').val()
        var money = itemMoney * total
        $('.total-num').html(money)
        console.log(total, itemMoney)
    }

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    .collect-dialog-box .reward-dialog{
        min-height: 1.8rem;
    }
    .red{
        color: red;
    }
</style>

<?php $this->endBlock(); ?>


