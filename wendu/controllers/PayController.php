<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2020/5/8
 * Time: 08:48
 */

namespace frontend\modules\template\controllers;


use common\models\PaymentType;
use common\models\SystemSetting;
use Yii;

class PayController extends BaseController
{


    public function actionIndex()
    {

        $models = PaymentType::findByStatusActive()->orderBy("price ASC")->all();
        $setting = SystemSetting::findOne([
            "source_type" => SystemSetting::SOURCE_TYPE_PAYMENT_PRICE,
        ]);

        return $this->render("index",[
            "models" => $models,
            "setting" => $setting,
        ]);

    }

    public function actionSubmit()
    {
        $request = Yii::$app->request;
        $data = [
            "member_id" => $this->user->id,
            "type_id" => "",
            "order_title" => "",
            "order_price" => "",
        ];

        $type = PaymentType::findByStatusActive()->andWhere([
            "id" => $request->post("type_id",0),
        ])->one();
        $setting = SystemSetting::findOne([
            "source_type" => SystemSetting::SOURCE_TYPE_PAYMENT_PRICE,
        ]);

        switch ($request->post("pay")) {
            case "alipay":

                if ($type){
                    $data["type_id"] = $type->id;
                    $data["order_title"] = $type->title;
                    $data["order_price"] = $type->price;
                }else{
                    $price = $request->post("price",0);
                    $data["type_id"] = 0;
                    $data["order_title"] = sprintf("充值%s人民币，价值%s书币",$price,$price*$setting->value);
                    $data["order_price"] = (int)$price;
                }

                break;
            case "wechat":
                break;
            default:
                return Yii::$app->response->setStatusCode(404);
                break;
        }

        $data = Yii::$app->getSecurity()->encryptByPassword(json_encode($data), Yii::$app->params["_web_identifier"]);

        return $this->render("submit",[
            "config" => [
               "data" => urlencode($data),
            ],
            "url" => Yii::$app->params["thirdly.domain"] . "/alipay/pay/pc",
            "method" => "post",
        ]);
    }


}