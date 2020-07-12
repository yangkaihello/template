<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $contact array
 */

use common\models\FictionIndex;
use common\popular\Handle;
use yii\helpers\Url;

$this->title = '联系我们';

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
\mobile\assets\AppAsset::addCss($this,'template/css/link.css');

/*预加载JS*/
//'js/jquery-1.10.1.min.js',
//\mobile\assets\AppAsset::addScript($this,'template/js/rank.js');


?>


<body>

<?php $this->beginContent('@mobile/views/layouts/header.php'); ?>

<?php $this->endContent(); ?>

<section class="link">
    <div class="top">
        <div class="service"><img src="/template/img/service.png" alt="" class='service-img'></div>
        <p class='link-desc'>在使用中遇到问题，请联系我们</p>
    </div>
    <div class="link-item">
        <div class="link-item-left">QQ联系</div>
        <div class="link-item-right"><?= $contact['mobile-qq'] ?></div>
    </div>
    <div class="link-item">
        <div class="link-item-left">投稿邮箱</div>
        <div class="link-item-right"><?= $contact['mobile-email'] ?></div>
    </div>
    <!--<div class="link-item">
        <div class="link-item-left">版权合作</div>
        <div class="link-item-right"><img src="img/block.png" alt="" class='block'><img src="img/arrow-r.png" alt="" class='arrow-r'></div>
    </div>-->
</section>

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
    .line a:after{
        content: unset;
    }
</style>

<?php $this->endBlock(); ?>


