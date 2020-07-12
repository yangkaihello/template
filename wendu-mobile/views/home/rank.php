<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\FictionIndex[]
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = '排行';

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
\mobile\assets\AppAsset::addCss($this,'template/css/rank.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',

?>

<header class="header-title">
    <span onclick="window.history.back()" class="header-return"><img src="/template/images/re.png"></span>
    <em <?php if($channel == FictionIndex::CHANNEL_GIRL): ?>class="active"<?php endif; ?>><a href="<?= Url::to(["home/rank","channel"=>FictionIndex::CHANNEL_GIRL,"type" => $type]) ?>">女频排行</a></em>
    <em <?php if($channel == FictionIndex::CHANNEL_BOY): ?>class="active"<?php endif; ?>><a href="<?= Url::to(["home/rank","channel"=>FictionIndex::CHANNEL_BOY,"type" => $type]) ?>">男频排行</a></em>
</header>
<div class="header-height"></div>
<div class="item-wrappy">
    <div class="bookClass_conten clearfix">
        <div class="left_box">
            <ul>
                <?php foreach ($ranks as $rank): ?>
                <li <?php if($rank["type"] == $type): ?>class="active"<?php endif; ?>><a href="<?= Url::to(["home/rank","channel" => $channel,"type" => $rank["type"]]) ?>"><?= $rank["title"] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="right_box">
            <br /><br />
            <!--<h2 class="temp_title">基于用户近7天新增追更用户计算 <span>4月6日更新</span></h2>-->
            <?php foreach ($models as $key=>$model): ?>
            <a href="<?= Url::to(["fiction/index","id"=>$model->id]) ?>">
                <div class="item">
                    <div class="pic">
                        <img src="<?= Handle::getUploadSrc($model->cover,Handle::UPLOAD_SRC_FICTION_COVER) ?>">
                    </div>
                    <div class="text">
                        <h2 class="t1"><?= $model->title ?>  <b class="tb"><?= $key+1 ?></b></h2>
                        <h3 class="t2"><?= $model->category->name ?>    <!--<span class="tl">625442新粉丝</span>--></h3>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php $this->beginBlock('window.js'); ?>

<script>

</script>

<?php $this->endBlock(); ?>

<?php $this->beginBlock('window.css'); ?>

<style>
    a{
        color: #000;
    }
</style>

<?php $this->endBlock(); ?>


