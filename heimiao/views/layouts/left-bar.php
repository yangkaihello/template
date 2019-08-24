<?php

use common\popular\Handle;
use yii\helpers\Url;

/**
 * @var $this \yii\web\View
 */

?>


<div class="leftbar">
    <div >
        <a href="<?= Url::to(['/rank'],true) ?>" <?php if(Handle::isOpen('/rank')): ?>class="on"<?php endif; ?> >全部榜单</a>
        <a href="<?= Url::to(['/rank/active'],true) ?>" <?php if(Handle::isOpen('/rank/active')): ?>class="on"<?php endif; ?>>畅销榜</a>
        <a href="<?= Url::to(['/rank/click'],true) ?>" <?php if(Handle::isOpen('/rank/click')): ?>class="on"<?php endif; ?>>点击榜</a>
        <a href="<?= Url::to(['/rank/give'],true) ?>" <?php if(Handle::isOpen('/rank/give')): ?>class="on"<?php endif; ?>>打赏榜</a>
        <a href="<?= Url::to(['/rank/letter'],true) ?>" <?php if(Handle::isOpen('/rank/letter')): ?>class="on"<?php endif; ?>>推荐榜</a>
        <a href="<?= Url::to(['/rank/new'],true) ?>" <?php if(Handle::isOpen('/rank/new')): ?>class="on"<?php endif; ?>>新书榜</a>
        <a href="<?= Url::to(['/rank/update'],true) ?>" <?php if(Handle::isOpen('/rank/update')): ?>class="on"<?php endif; ?>>更新榜</a>
    </div>
</div>