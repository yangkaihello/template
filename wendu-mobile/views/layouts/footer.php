<?php

use common\popular\Handle;
use yii\helpers\Url;

?>

<div class="botton-height"></div>
<div class="bottom">
    <div class="clearfix a_bookcase">
        <a href="<?= Url::to(['member/book']) ?>" style="display: block;">
            <img class="books_img" src="/template/images/1-1.png" alt="">
            <p class="bottom_classification">书架</p>
        </a>
    </div>
    <div class="clearfix a_bookcase">
        <a href='<?= Url::to(['home/index'],true) ?>' style="display: block;">
            <img class="books_img" src="/template/images/1-2.png" alt="">
            <p class="bottom_classification">首页</p>
        </a>
    </div>
    <div class="clearfix a_bookcase">
        <a href="<?= Url::to(['member/index']) ?>" style="display: block;">
            <img class="books_img" src="/template/images/1-3.png" alt="">
            <p class="bottom_classification">我的</p>
        </a>
    </div>
</div>


