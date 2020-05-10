<?php

use yii\helpers\Url;

/**
 * @var $this \yii\web\View
 * @var $category \common\models\FictionCategory
 */
?>


<div class="tnavbox">
    <?php foreach($this->context->category as $category): ?>
    <a href="<?= Url::to(["/books","category_id"=>$category->id]) ?>"><?= $category->name ?></a> |
    <?php endforeach; ?>
    <div class="tnavseekbox">
        <form id="formBox" action="<?= Url::to(["/books"]) ?>" method="get">
            <input type="text" name="keyword" placeholder="请输入书名关键字">
            <img onclick="document.getElementById('formBox').submit()" class="seekBut" src="/template/img/seek.png" alt="">
        </form>
    </div>
</div>