<?php

/* @var $this yii\web\View */
/* @var $model \common\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::$app->params['platform.name'] . '-' . $fiction->title . '-列表';

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
    <?php $this->beginContent('@frontend.template/views/layouts/header.php'); ?>

    <?php $this->endContent(); ?>

    <div class="list_content" style="border: 1px solid #E5E5E5; min-height: 600px;background: #fff;">
        <h2><?= $fiction->title ?></h2>
        <div class="read_info">
            <i>作者：<span><?= $fiction->member->authorInfo->penname ?></span></i>
            <i>更新时间：<span><?= $fiction->chapters[0]->created_at ?? $fiction->updated_at ?></span></i>
            <i>状态：<span><?= Yii::$app->params['fiction.status'][$fiction->status] ?></span>
            </i>
        </div>
        <!--<div class="list_content_s">
            <a href="javascript:void(0)" class="descList">↓ 正序</a>
            <a href="javascript:void(0)" class="acsList active">↑ 倒序</a>
            <a href="javascript:void(0)" class="collectBook login_flag">+ 收藏</a>
        </div>-->
        <div class="list_content_name">
            <div class="list_content_names chapterDesc" style="display:block">
                <ul style="display: block;">
                    <li></li>
                    <?php foreach($chapters as $chapter): ?>
                    <li><a href="<?= Url::to(['chapter/index','id' => $chapter->id]) ?>"><b><?= $chapter->title ?></b></a></li>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/floating.php'); ?>

    <?php $this->endContent(); ?>

</div>

<?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

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
