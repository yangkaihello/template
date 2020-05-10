<?php

use yii\helpers\Url;
use frontend\controllers\HomeController;

/**
 * @var $this \yii\web\View
 */

?>


<div class="header_top">
    <div class="center_box">
        <a href="/">首页</a>
        <div class="headerR_box">
            <?php if(!$this->context->user): ?>
                <div class="login">
                    <a href="#this">登录</a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#this">注册</a>
                </div>
            <?php else: ?>
                <div class="ri2">
                    <a href="<?= Url::to(["/member/index/reader"]) ?>">最近阅读</a>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="ri2">
                    <a href="<?= Url::to(["/member/index/index"]) ?>">
                        个人中心
                    </a>
                </div>

                <div class="ri1">
                    <?php if($this->context->user->isWriter == \common\models\MemberIndex::WRITER_YES):?>
                    <a href="<?= Yii::$app->params["author.domain"] ?>">作家专区 </a>
                    <?php endif; ?>
                    <span class="gangrow"></span>
                    <a href="<?= Url::to(["pay/index"]) ?>">充值 </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>