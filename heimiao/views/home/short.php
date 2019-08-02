<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['platform.name'] . '-短篇';

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

    <div class="books">

        <form>
            <input type="hidden" name="lexicon_id" value="<?= Yii::$app->request->get('lexicon_id','all')?>" />
        </form>

        <div class="screen-box" style="height: auto;">
            <ul>
                <li>
                    <span class="title">主题</span>
                    <a <?php if (Yii::$app->request->get('lexicon_id', 'all') == 'all' ): echo 'class="active"'; endif; ?>
                            data-name="lexicon_id" data-value="all" href="#this">全部</a>
                    <?php foreach ($lexicon as $value): ?>
                    <a <?php if (Yii::$app->request->get('lexicon_id', 'all') == $value->id ): echo 'class="active"'; endif; ?>
                            data-name="lexicon_id" data-value="<?= $value->id ?>" href="#this"><?= $value->title ?></a>
                    <?php endforeach; ?>
                </li>
            </ul>
        </div>
        <div class="result-box clearfix">
            <?php foreach($fictions as $fiction): ?>
                <div class="item-row duan clearfix">
                    <?php foreach($fiction as $value): ?>
                        <div class="item clearfix">
                            <div class="img-box ">
                                <a href="<?= Url::to(['chapter/short','id' => $value->id])?>">
                                    <img width="100%" height="100%" src="<?= $value->cover ?>" alt="封面">
                                </a>
                            </div>
                            <div class="desc">
                                <p class="d"><?= $value->title ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div id="paging">
                <div class="page-set">
                    <span class="total">共<?= $pagination->getPageCount() ?>页</span>
                    <?= LinkPager::widget([
                        'pagination' => $pagination,
                        'nextPageLabel' => '下一页',
                        'prevPageLabel' => '上一页',
                        'lastPageLabel' => '尾页',
                        'maxButtonCount' => 5,
                        'options' => ['class' => 'new-pagination'],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->beginContent('@frontend/views/layouts/floating.php'); ?>

    <?php $this->endContent(); ?>

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
