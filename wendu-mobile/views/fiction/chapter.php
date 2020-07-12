<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $fiction \common\models\FictionIndex
 * @var $models \common\models\FictionChapter[]
 * @var $pagination \yii\data\Pagination
 */

use common\popular\Handle;
use yii\helpers\Url;

$this->title = $fiction->title . '-章节列表';

$this->context->backHref = Url::to(['fiction/index','id' => $fiction->id]);

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

/*预加载JS*/
//'js/jquery-1.10.1.min.js',

?>


<header class="header-title">
    <span onclick="window.history.back()" class="header-return"><img src="/template/images/re.png"></span>目录
</header>
<div class="header-height"></div>
<div class="mulu_wrappy">
    <div class="mulu_header">
        <?php for($i=1;$i<=$pagination->getPageCount();$i++): ?>
        <div class="item <?php if($i == $pagination->getPage()+1): ?>active<?php endif; ?>">
            <a href="<?= $pagination->createUrl($i-1,$pagination->defaultPageSize) ?>">
                <?= (($i-1)*$pagination->defaultPageSize)+1 ?>-<?= $i*$pagination->defaultPageSize ?>
            </a>
        </div>
        <?php endfor; ?>
    </div>
    <div class="mulu_content">
        <?php foreach ($models as $model): ?>
            <a href="<?= Url::to(["chapter/index","fiction_id" => $model->fiction_id,"sort" => $model->sort]) ?>">
                <div class="item">
                    <span class="ti">第<?= $model->sort ?>章</span><?= $model->title ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>


<?php $this->beginBlock('window.js'); ?>

<script>

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    a{
        color: inherit;
    }

</style>

<?php $this->endBlock(); ?>


