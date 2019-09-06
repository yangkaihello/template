<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $category \common\models\FictionCategory[]
 * @var $models FictionIndex[]
 * @var $channel string
 */

use common\models\FictionIndex;
use common\models\MemberIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = '充值记录';
$this->context->backHref = Url::to(['member/index'],true);

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
\mobile\assets\AppAsset::addCss($this,'static/css/consumeRecord.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'static/js/mobile.js?v1.7');


?>


<body>

<header>
    <div class="head">
        <a href="<?= Url::to(['member/index']) ?>">
            <img src="/static/img/arrow-l.png" alt="">
        </a>
        充值记录(<span><?= date("Y/m") ?></span>)
    </div>
</header>

<ul data-href="<?= Url::to(['member/order/order-list'],true) ?>" class="recordUl">

</ul>

</body>

<?php $this->beginBlock('window.js'); ?>

<script>

    setList($(".recordUl"),{date:$(".head span").html() + "/01"});

    /*function yangkaiMoveY(y,e){

        if(y == 'up')
        {
            var month = 1;
        }else{
            var month = -1;
        }

        var date = new Date($(".head span").html() + "/01");
        date.setMonth(date.getMonth() + month);
        var newMonth = date.getMonth()+1;
        $(".head span").html(date.getFullYear(date)+"/"+newMonth);
        setList($(".recordUl"),{date:$(".head span").html() + "/01"});
    }*/

    function yangkaiMoveX(x,e)
    {
        if(x == 'right')
        {
            var month = 1;
        }else{
            var month = -1;
        }

        var date = new Date($(".head span").html() + "/01");
        date.setMonth(date.getMonth() + month);
        var newMonth = date.getMonth()+1;
        $(".head span").html(date.getFullYear(date)+"/"+newMonth);
        setList($(".recordUl"),{date:$(".head span").html() + "/01"});
    }

    function setList(dom,json)
    {
        $.get(dom.data('href'),json,function (res){
            dom.html(res);
        }).onloadend = function (xhr){
            if(this.status < 200 || this.status >= 300)
            {
                dom.html(null);
            }
        }
    }


</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

    a{
        color: inherit;
    }
    .line a:after{
        content: unset;
    }
    footer .bottom{
        display: none;
    }
</style>

<?php $this->endBlock(); ?>


