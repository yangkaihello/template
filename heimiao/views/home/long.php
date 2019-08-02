<?php

/* @var $this yii\web\View */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['platform.name'] . '-长篇';

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
                <input type="hidden" name="category_id" value="<?= Yii::$app->request->get('category_id','all')?>" />
                <input type="hidden" name="isVip" value="<?= Yii::$app->request->get('isVip','all')?>" />
                <input type="hidden" name="status" value="<?= Yii::$app->request->get('status','all')?>" />
                <input type="hidden" name="charSize" value="<?= Yii::$app->request->get('charSize','all')?>" />
            </form>

            <div class="screen-box" style="height: auto;">
                <ul>
                    <li>
                        <span class="title">分类</span>
                        <a  <?php if (Yii::$app->request->get('category_id', 'all') == 'all' ): echo 'class="active"'; endif; ?>
                            data-name="category_id" data-value="all" href="#this" >全部</a>
                        <?php foreach($category as $value): ?>
                            <a <?php if (Yii::$app->request->get('category_id', 'all') == $value->id ): echo 'class="active"'; endif; ?>
                               data-name="category_id" data-value="<?= $value->id ?>" href="#this"><?= $value->name ?></a>
                        <?php endforeach; ?>
                    </li>
                    <!--<li>
                        <span class="title">属性</span>
                        <a <?php /*if (Yii::$app->request->get('isVip', 'all') == 'all' ): echo 'class="active"'; endif; */?>
                                data-name="isVip" data-value="all" href="#this">全部</a>
                        <?php /*foreach(Yii::$app->params['fiction.isVip'] as $key=>$value): */?>
                            <a <?php /*if (Yii::$app->request->get('isVip', 'all') == (string)$key ): echo 'class="active"'; endif; */?>
                                    data-name="isVip" data-value="<?/*= $key */?>" href="#this"><?/*= $value */?></a>
                        <?php /*endforeach; */?>
                    </li>-->
                    <li>
                        <span class="title">进度</span>
                        <a <?php if (Yii::$app->request->get('status', 'all') == 'all' ): echo 'class="active"'; endif; ?>
                                data-name="status" data-value="all" href="#this">全部</a>
                        <?php foreach(Yii::$app->params['fiction.status'] as $key=>$value): ?>
                            <a <?php if (Yii::$app->request->get('status', 'all') == $key ): echo 'class="active"'; endif; ?>
                                    data-name="status" data-value="<?= $key ?>" href="#this"><?= $value ?></a>
                        <?php endforeach; ?>
                    </li>
                    <li>
                        <span class="title">字数</span>
                        <a  <?php if (Yii::$app->request->get('charSize', 'all') == 'all' ): echo 'class="active"'; endif; ?>
                                data-name="charSize" data-value="all" href="#this">全部</a>
                        <a  <?php if (Yii::$app->request->get('charSize', 'all') == '0-200000' ): echo 'class="active"'; endif; ?>
                                data-name="charSize" data-value="0-200000" href="#this">20万以下</a>
                        <a  <?php if (Yii::$app->request->get('charSize', 'all') == '200000-300000' ): echo 'class="active"'; endif; ?>
                                data-name="charSize" data-value="200000-300000" href="#this">20-30万</a>
                        <a  <?php if (Yii::$app->request->get('charSize', 'all') == '500000-1000000' ): echo 'class="active"'; endif; ?>
                                data-name="charSize" data-value="500000-1000000" href="#this">50-100万</a>
                        <a  <?php if (Yii::$app->request->get('charSize', 'all') == '1000000-2000000' ): echo 'class="active"'; endif; ?>
                                data-name="charSize" data-value="1000000-2000000" href="#this">100-200万</a>
                        <a  <?php if (Yii::$app->request->get('charSize', 'all') == '2000000' ): echo 'class="active"'; endif; ?>
                                data-name="charSize" data-value="2000000" href="#this">200万以上</a>
                    </li>
                    <!--<li>
                        <span class="title">排序</span>
                        <a data-name="order" data-value="charSize" href="#this" class="red active">更新时间 <i></i></a>
                        <a data-name="order" data-value="charSize" href="#this" class="red">人气点击 <i></i></a>
                    </li>-->
                </ul>
            </div>
            <div class="result-box clearfix">
                <?php foreach($fictions as $fiction): ?>
                <div class="item-row clearfix">
                    <?php foreach($fiction as $value): ?>
                        <div class="item clearfix">
                        <div class="img-box pull-left">
                            <a href="<?= Url::to(['fiction/index','id' => $value->id])?>">
                                <img width="100%" height="100%" src="<?= $value->cover ?>" alt="封面">
                            </a>
                        </div>
                        <div class="desc pull-left">
                            <a href="<?= Url::to(['fiction/index','id' => $value->id])?>">
                                <p class="t">
                                    <?= $value->title ?>
                                </p>
                            </a>
                            <p class="n">
                                <a href="#this"><?= $value->member->authorInfo->penname ?></a>
                                <a href="#this"><?= $value->category->name ?></a>
                                <span><?= Yii::$app->params['fiction.status'][$value->status] ?></span>
                            </p>
                            <p class="d"><?= $value->description ?></p>
                            <p class="z">
                                <span><?= \common\popular\Handle::charSizeFat($value->charSize) ?></span>
                                <?php if( isset($value->chapter) ): ?>
                                <a href="<?= Url::to(['chapter/index','id'=>$value->chapter->id]) ?>">更新至：<?= $value->chapter->title ?></a>
                                <?php endif; ?>
                            </p>
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
