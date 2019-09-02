<?php

use yii\helpers\Url;

/**
 * @var $this \yii\web\View
 */

?>

<header>
    <div class="head">
        <a href="<?php if(isset($this->context->backHref)): ?><?= $this->context->backHref ?><?php else: ?>javascript:history.go(-1);<?php endif; ?>">
            <img src="/static/img/arrow-l.png" alt="">
        </a>
        <?= $this->title ?>
    </div>
</header>
