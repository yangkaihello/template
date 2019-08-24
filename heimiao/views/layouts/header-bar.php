<?php

use yii\helpers\Url;

/**
 * @var $this \yii\web\View
 */

?>


<div class="bar">
    <div class="container clearfix">
        <div class="logo lf">
            <img src="/template/imgs/bar/logo.png" alt="">
        </div>
        <div class="bar-links lf">
            <a href="<?= Url::to(['/'],true) ?>">首页</a>
            <a href="<?= Url::to(['/books'],true) ?>">书库</a>
            <a href="<?= Url::to(['/rank'],true) ?>">排行</a>
            <!--<a href="#">作家专区</a>
            <a href="#">福利</a>
            <a href="#">充值</a>-->
        </div>
        <div class="search ri">
            <div class="search-box">
                <form action="<?= Url::to(['/books'],true) ?>">
                    <input name="keyword" type="text" placeholder='请输入书名'>
                    <a href="#">
                        <img src="/template/imgs/bar/search.png" alt="">
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>