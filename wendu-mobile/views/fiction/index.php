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
 * @var $likeFiction \common\models\FictionIndex[]
 * @var $app \EasyWeChat\OfficialAccount\Application
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = $fiction->title;

$this->context->backHref = Url::to(['home/index']);

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
//\mobile\assets\AppAsset::addCss($this,'template/css/detail.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'template/js/jquery-1.11.3.min.js');
\mobile\assets\AppAsset::addScript($this,'template/js/starScore.js');


?>


<header class="header-title">
    <span onclick="window.history.back()" class="header-return"><img src="/template/images/re.png"></span>详情
</header>
<div class="header-height"></div>
<div class="two-wrappy">
    <div class="top_header">
        <div class="bookPic">
            <img src="<?= Handle::getUploadSrc($fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
        </div>
        <div class="bookContent">
            <div class="p1"><?= $fiction->title ?> <b class="label"><?= \common\models\MemberGrade::GradeReadSum($fiction->statisticalRead->grade ?? 0) ?></b></div>
            <div class="p2">作者：<?= $fiction->member->authorInfo->penname ?></div>
            <div class="p3"><?= FictionIndex::STATUS_LIST[$fiction->status] ?>：<?= Handle::charSizeFat($fiction->charSize,"%.2f万字") ?></div>
            <div class="p4">
                <?php foreach ($lexicons as $lexicon): ?>
                <label><?= $lexicon->title ?></label>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="tb_box">
        <h2>内容简介</h2>
        <div class="con">
            <?= $fiction->description ?>
            <!--<a href="">更多</a>-->
        </div>
    </div>
    <div class="tb_box_1">
        目录
        <a href="<?= Url::to(["fiction/chapter","id" => $fiction->id]) ?>">
            <span class="tr"> 共<?= \common\models\FictionChapter::sortCheckCount($fiction->id) ?>章> </span>
        </a>
    </div>
    <!--<div class="tb_box_2">
        打赏记录
        <img class="pic" src="./images/book.jpg">
        <img class="pic" src="./images/book.jpg">
        <img class="pic" src="./images/book.jpg">
        <img class="pic" src="./images/book.jpg">
    </div>-->
    <div class="tb_box_3">
        <h2 class="title">猜你喜欢</h2>
        <div class="tb_row clearfix">
            <?php foreach ($likeFiction as $fiction): ?>
            <div class="item">
                <img src="<?= Handle::getUploadSrc($fiction->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                <h2><?= $fiction->title ?></h2>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="tb_box_4">
        我是有底线的，去书库看看
    </div>

    <div class="tow_footer">
        <div class="left">
            <?php if($hasGrade): ?>
                <div class="item active">
                    <img src="/template/images/i_0.png">
                    <p>已评分</p>
                </div>
            <?php else: ?>
                <div class="item grade" onclick="click_grade()">
                    <img src="/template/images/i_0.png">
                    <p>评分</p>
                </div>
            <?php endif; ?>
            <div class="item">
                <img src="/template/images/i_1.png">
                <p>分享</p>
            </div>

            <?php if(isset($this->context->user)): ?>
                <?php if( \common\models\collect\MemberCollect::isCollect($this->context->user->id,$fiction->id) ): ?>
                    <div data-href="<?= Url::to(['member/collect/attention','fiction_id' => $fiction->id]) ?>"
                         class="item collect active">
                        <img src="/template/images/i_3.png">
                        <p>已加书架</p>
                    </div>
                <?php else: ?>
                    <div data-href="<?= Url::to(['member/collect/attention','fiction_id' => $fiction->id]) ?>"
                         class="item collect">
                        <img src="/template/images/i_3.png">
                        <p>加入书架</p>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div data-href="<?= Url::to(['member/collect/attention','fiction_id' => $fiction->id]) ?>"
                     class="item collect">
                    <img src="/template/images/i_3.png">
                    <p>加入书架</p>
                </div>
            <?php endif; ?>
        </div>
        <a class="right" href="<?= Url::to(["chapter/index","fiction_id" => $fiction->id,"sort" => 1]) ?>">开始阅读</a>
    </div>
    <div class="bottom_height"></div>
</div>


<!-- 评分弹窗 -->
<div class="shade_box" style="display: none;"></div>
<div class="xingxingbox" style="display: none;" >
    <h1>评分</h1>
    <div id="startone" class="block clearfix">
        <div class="star_score"></div>
    </div>
    <div class="new_btn_box">
        <a class="btn" href="javascript:" onclick="hideBox()">取消</a>
        <a class="btn" href="javascript:" id="grade_btn">确定</a>
    </div>

</div>

<?php $this->beginBlock('window.js'); ?>
<script>

// 评分
scoreFun($("#startone"))

$("#grade_btn").click(function(){
    <?php if(!isset($this->context->user)): ?>
    location.href = "/site/login-select";
    return true;
    <?php endif; ?>

    $.post("<?= Url::to(["member/grade/add"]) ?>",{"fiction_id":<?= $fiction->id ?>,"grade":gradeNum},function (res){
        hideBox()
        $(".tow_footer .grade").addClass("active")
        $(".tow_footer .grade").find("p").html("已评分");
    }).onloadend = function (xhr){
        if(this.status < 200 || this.status >= 300)
        {
            console.log(this);
        }
    }
})

function hideBox(){
    $(".shade_box").hide();
    $(".xingxingbox").hide();

}
function click_grade(){
    $(".shade_box").show();
    $(".xingxingbox").show();
}


$(".tow_footer .collect").on("click",function (){

    <?php if(!isset($this->context->user)): ?>
    location.href = "/site/login-select";
    return true;
    <?php endif; ?>

    var $this = $(this);
    $.post($this.data('href'),{},function (res){
        if(res.status == 'yes')
        {
            $this.addClass("active");
            $this.find("p").html("已加书架");
        }else{
            $this.removeClass("active");
            $this.find("p").html("加入书架");
        }
    }).onloadend = function (xhr){
        if(this.status < 200 || this.status >= 300)
        {
            console.log(this);
        }
    }
});

$(function (){

})

</script>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    a{
        color: #000;
    }
</style>

<?php $this->endBlock(); ?>


