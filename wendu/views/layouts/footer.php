<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
 * @var $this \yii\web\View
 * @var $link \common\models\SystemLink
 */

?>

<div class="footer">
    <div class="center_box">
        <ul class="youqinglink">
            <li><a href="/">合作网站：温度中文网</a>|</li>
            <?php foreach($this->context->links as $link): ?>
            <li><a href="<?= $link->link ?>"><?= $link->title ?></a>|</li>
            <?php endforeach;?>
        </ul>
        <p>Copyright © 2020-2021 wenduread.com All Rights Reserved. 湖南艾亚文化传播有限公司 版权所有 </p>
        <p><!--新出网证京字162号 丨 文网文[2015]1982-355号 丨--> 湘ICP备18015577号 经营性网站备案信息 丨 <a href="http://www.beian.miit.gov.cn/" target="_blank">湘ICP备18015577号-2</a> </p>
        <!--<p>经营性网站备案信息 丨 网络违法犯罪举报 丨 中国互联网举报中心 丨 网络举报APP下载</p>-->

    </div>
</div>

