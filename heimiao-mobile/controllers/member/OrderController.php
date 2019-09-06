<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/9/2
 * Time: 下午12:32
 */

namespace mobile\controllers\member
{


    use common\extend\DateTime;
    use common\models\orders\DateOrder;
    use Yii;

    class OrderController extends BaseController
    {

        public function actionIndex()
        {


            return $this->render("index",[

            ]);
        }

        public function actionOrderList()
        {
            $request = Yii::$app->request;
            $date = $request->get('date',date("Ym"));
            $date = DateTime::formatDate($date,"Ym");

            $models = new DateOrder();
            $models->resetTable($date);
            $models = $models::find()->where([
                'member_id' => $this->user->id,
            ])->orderBy("id DESC")->all();

            return $this->renderPartial("ajax-order-list",[
                'models' => $models
            ]);
        }

    }


}

