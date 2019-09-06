<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/29
 * Time: 下午10:22
 *
 * @var $this \yii\web\View
 * @var $models \common\models\orders\DateOrder[]
 */

use common\models\FictionIndex;
use common\models\MemberIndex;
use common\popular\Handle;
use yii\helpers\Url;


?>

<?php foreach ($models as $model): ?>
    <li>
        <div class="itemdetail">
            <div class="itemdetail1"><?= $model->order_title ?></div>
            <div class="itemdetail2"><?= $model::PAY_TYPE_LIST[$model->pay_type] ?></div>
            <div class="itemdetail3"><?= $model->trade_no ?></div>
        </div>
        <div class="itemright">充值<span class='coin-num'><?= $model->order_price ?></span>元</div>
    </li>
<?php endforeach; ?>