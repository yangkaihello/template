<?php

/**
 * @var $this \yii\web\View
 * @var $category \common\models\FictionCategory
 * @var $models \common\models\FictionIndex[]
 * @var $pagination \yii\data\Pagination
 */

use common\models\FictionIndex;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = Yii::$app->params['platform.name'] . '-书库';

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

        <div class="sort_wrappy">
            <?php $this->beginContent('@frontend.template/views/layouts/header-bar.php'); ?>

            <?php $this->endContent(); ?>
        </div>

        <div class="sbannerbox">
            <a href=""><img src="/template/img/banner.jpg"></a>
        </div>

        <!--  -->
        <div class="sort_keywordbox">
            <div data-name="category_id" class="sort_kitem">
                <span class="labels">分类：</span>
                <em
                    <?php if(Yii::$app->request->get('category_id','all') == 'all'): ?>
                        class="it active"
                    <?php else: ?>
                        class="it"
                    <?php endif; ?>
                        data-value="all"
                ><a href="#this">全部</a></em>
                <?php foreach($this->context->category as $category): ?>
                    <em
                        <?php if(Yii::$app->request->get('category_id','all') == $category->id): ?>
                            class="it active"
                        <?php else: ?>
                            class="it"
                        <?php endif; ?>
                            data-value="<?= $category->id ?>"
                    ><a href="#this"><?= $category->name ?></a></em>
                <?php endforeach; ?>
            </div>

            <div data-name="charSize" class="sort_kitem">
                <span class="labels">作品字数：</span>
                <em
                    <?php if(Yii::$app->request->get('charSize','all') == 'all'): ?>
                        class="it active"
                    <?php else: ?>
                        class="it"
                    <?php endif; ?>
                        data-value="all"
                ><a href="#this">不限</a></em>

                <?php foreach ($this->context::BOOKS_SEARCH_LIST as $key=>$value): ?>
                    <em
                        <?php if(Yii::$app->request->get('charSize','all') == $key): ?>
                            class="it active"
                        <?php else: ?>
                            class="it"
                        <?php endif; ?>
                            data-value="<?= $key ?>"
                    ><a href="#this"><?= $value ?></a></em>
                <?php endforeach; ?>
            </div>

            <div data-name="order" class="sort_kitem">
                <span class="labels">排序方式:</span>
                <em
                    <?php if(Yii::$app->request->get('order','all') == 'all'): ?>
                        class="it active"
                    <?php else: ?>
                        class="it"
                    <?php endif; ?>
                        data-value="all"
                ><a href="#this">不限</a></em>

                <?php foreach ($this->context::BOOKS_SEARCH_ORDER as $key=>$value): ?>
                    <em
                        <?php if(Yii::$app->request->get('order','all') == $key): ?>
                            class="it active"
                        <?php else: ?>
                            class="it"
                        <?php endif; ?>
                            data-value="<?= $key ?>"
                    ><a href="#this"><?= $value ?></a></em>
                <?php endforeach; ?>
            </div>

            <div data-name="isVip" class="sort_kitem">
                <span class="labels">是否免费：</span>
                <em
                    <?php if(Yii::$app->request->get('isVip','all') == 'all'): ?>
                        class="it active"
                    <?php else: ?>
                        class="it"
                    <?php endif; ?>
                        data-value="all"
                ><a href="#this">不限</a></em>
                <?php foreach (FictionIndex::VIP_LIST as $key=>$value): ?>
                    <em
                        <?php if(Yii::$app->request->get('isVip','all') == (string)$key): ?>
                            class="it active"
                        <?php else: ?>
                            class="it"
                        <?php endif; ?>
                            data-value="<?= $key ?>"
                    ><a href="#this"><?= $value ?></a> </em>
                <?php endforeach; ?>
            </div>

            <div data-name="status" class="sort_kitem">
                <span class="labels">是否完结：</span>
                <em
                    <?php if(Yii::$app->request->get('status','all') == 'all'): ?>
                        class="it active"
                    <?php else: ?>
                        class="it"
                    <?php endif; ?>
                        data-value="all"
                ><a href="#this">不限</a></em>
                <?php foreach (FictionIndex::STATUS_LIST as $key=>$value): ?>
                    <em
                        <?php if(Yii::$app->request->get('status','all') == $key): ?>
                            class="it active"
                        <?php else: ?>
                            class="it"
                        <?php endif; ?>
                            data-value="<?= $key ?>"
                    ><a href="#this"><?= $value ?></a></em>
                <?php endforeach; ?>
            </div>
        </div>
        <!--  -->
        <div class="sort_tablebox">
            <table>
                <tr><th>序号</th><th>书名</th> <th>作者</th><th>字数</th><th>总点击</th><th>更新时间</th></tr>

                <?php foreach ($models as $key=>$value): ?>
                    <tr>
                        <td><?= $value->id ?></td>
                        <td>
                            <?php if($value->isVip == $value::VIP_YES): ?>
                                <i class="icon_vip"></i>
                            <?php endif; ?>
                            <a class="sorlink" href="<?= Url::to(["home/book","fiction_id" => $value->id])?>"><?= $value->title ?></a>
                            <?= $value->chapter->title ?? "" ?>
                        </td>
                        <td><?= $value->member->authorInfo->penname ?></td>
                        <td><?= $value->charSize ?></td>
                        <td><?= $value->statisticalRead->pv ?? 0 ?></td>
                        <td><?= $value->chapter->created_at ?></td>
                    </tr>
                <?php endforeach; ?>

                <tfoot style="text-align:center" >
                    <td colspan="6">
                        <?= LinkPager::widget([
                            'pagination' => $pagination,
                            'nextPageLabel' => '>>',
                            'prevPageLabel' => '<<',
                            'lastPageLabel' => '末页',
                            'maxButtonCount' => 5,
                            //'options' => ['class' => 'pager'],
                        ]); ?>
                    </td>
                </tfoot>
            </table>
        </div>

    </div>

    <?php $this->beginContent('@frontend.template/views/layouts/footer.php'); ?>

    <?php $this->endContent(); ?>

</div>



<?php $this->beginBlock('window.js'); ?>

<script>
    $(".sort_keywordbox .sort_kitem em.it").click(function (e){

        $(this).parents(".sort_kitem").find("em").attr('class',"it");
        $(this).attr('class','it active');

        var href = [];
        $(".sort_keywordbox .sort_kitem").each(function (key,value){
            var name = $(value).data("name");
            var selected = $(value).find("em.active").data('value');

            href.push(name+"="+selected);
        });

        window.location = window.location.pathname + "?" + href.join("&");
    });
</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>

</style>

<?php $this->endBlock(); ?>


