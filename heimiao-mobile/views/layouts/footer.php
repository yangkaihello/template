<?php

use common\popular\Handle;
use yii\helpers\Url;

?>

<footer>
    <div class="bottom">我是有底线的，去书库看看</div>
    <div class="foot">
        <a <?php if(Handle::isOpen("/member/book")): ?>class="active-foot"<?php endif; ?> href="<?= Url::to(['member/index']) ?>" >
            <img src="/img/book.png" alt="" class='icon footer-icon'>
            <img src='/img/book-on.png' class='footer-icon icon-on'>
            <div>书架</div>
        </a>
        <a <?php if(Handle::isOpen("/")): ?>class="active-foot"<?php endif; ?>  href='<?= Url::to(['home/index'],true) ?>' >
            <img src="/img/index.png" alt="" class='icon footer-icon'>
            <img src='/img/index-on.png' class='icon-on footer-icon'>
            <div>首页</div>
        </a>
        <a <?php if(Handle::isOpen("/member/index")): ?>class="active-foot"<?php endif; ?> href="<?= Url::to(['member/index']) ?>" >
            <img src="/img/useri.png" alt="" class='icon footer-icon'>
            <img src='/img/useri-on.png' class='icon-on footer-icon'>
            <div>我的</div>
        </a>
    </div>
</footer>

