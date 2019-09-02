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
\mobile\assets\AppAsset::addCss($this,'static/css/catalogue.css');
\mobile\assets\AppAsset::addCss($this,'static/css/foot.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
\mobile\assets\AppAsset::addScript($this,'static/js/rank.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<header class='nav'>
    <div class="navList">
        <?php for($i=1;$i<=$pagination->getPageCount();$i++): ?>
        <div class="nav-item <?php if($i == $pagination->getPage()+1): ?>active<?php endif; ?>">
            <a href="<?= $pagination->createUrl($i-1) ?>"><?= (($i-1)*$pagination->defaultPageSize)+1 ?>-<?= $i*$pagination->defaultPageSize ?></a>
        </div>
        <?php endfor; ?>
    </div>
</header>
<section class="list">

    <?php foreach ($models as $model): ?>
    <a class="item" href="<?= Url::to(['chapter/index','fiction_id' => $model->fiction_id, 'sort' => $model->sort]) ?>">
        <!--<span class='chapter'>第一章</span>--><span class='title'><?= $model->title ?></span>
    </a>
    <?php endforeach; ?>

</section>

<?php $this->beginContent('@mobile/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>

</body>

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


