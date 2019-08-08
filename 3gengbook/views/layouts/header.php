<?php

use yii\helpers\Url;
use frontend\controllers\HomeController;

?>


<div class="index-header">
    <div class="header-pb"></div>
    <div class="header-wy"></div>
    <div class="d1 dl"></div>
    <div class="d2 dl"></div>
    <!-- menu -->
    <div class="menu-box clearfix">
        <div class="pull-left menu">
            <ul class="pull-left">
                <li
                    <?php if($this->context->accessPath == HomeController::ACTION_HOME): ?>
                        class="active"
                    <?php endif; ?>
                >
                    <a href="<?= Url::to([HomeController::ACTION_HOME]) ?>">书屋</a>
                </li>
                <li
                    <?php if($this->context->accessPath == HomeController::ACTION_LONG): ?>
                        class="active"
                    <?php endif; ?>
                >
                    <a href="<?= Url::to([HomeController::ACTION_LONG]) ?>">长篇</a>
                </li>
                <li
                    <?php if($this->context->accessPath == HomeController::ACTION_SHORT): ?>
                        class="active"
                    <?php endif; ?>
                >
                    <a href="<?= Url::to([HomeController::ACTION_SHORT]) ?>">短篇</a>
                </li>
                <li>
                    <a href="#this">作者福利</a>
                </li>

            </ul>
            <div class="pull-left search-box">
                <input type="text" class="search-input" placeholder="书名/作者">
                <button class="search-btn"><svg t="1535339923867" class="icon"  viewBox="0 0 1024 1024"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2042" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                width="19" height="19">
                        <defs>
                            <style type="text/css"></style>
                        </defs>
                        <path d="M928 886.4l-160-160c128-150.4 120-377.6-20.8-520-150.4-150.4-393.6-150.4-542.4 0-72 72-112 169.6-112 272s40 198.4 112 272c72 72 169.6 112 272 112 91.2 0 179.2-32 248-91.2l160 160c12.8 12.8 32 12.8 44.8 0 11.2-12.8 11.2-32-1.6-44.8zM249.6 705.6c-60.8-60.8-94.4-140.8-94.4-225.6s33.6-166.4 94.4-225.6c62.4-62.4 144-92.8 225.6-92.8s163.2 30.4 225.6 92.8c124.8 124.8 124.8 328 0 452.8C640 768 560 801.6 475.2 801.6c-84.8-3.2-164.8-35.2-225.6-96z"
                              fill="#FFFFFF" p-id="2043"></path>
                    </svg></button>
            </div>
            <ul class="pull-right menu-right">
                <li class="menu-login1 login_flag">
                    <?php if($this->context->user): ?>
                        <a href="<?= Url::to(['/member/index/index']) ?>" ><?= $this->context->user->username ?></a>&nbsp;&nbsp;
                        <a href="<?= Url::to(['site/logout']) ?>" >退出</a>
                    <?php else: ?>
                        <a href="#this" data-toggle="modal" data-target="#LoginModal">登录</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
    <!-- menu -->
    <!--公告栏-->
    <?= $this->blocks['header.message'] ?>
    <!--公告栏-->
    <!--轮播图-->
    <?= $this->blocks['index.carousel'] ?>
    <!--轮播图-->
</div>