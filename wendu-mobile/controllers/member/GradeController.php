<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2020/7/6
 * Time: 19:56
 */

namespace mobile\controllers\member;


use common\models\MemberGrade;
use Yii;

class GradeController extends BaseController
{

    public function actionAdd()
    {

        $request = Yii::$app->request;

        if ($request->post("grade",0) > 5) {
            return false;
        }
        //如果存在评分就忽略
        if ( MemberGrade::has($this->user->id,$request->post("fiction_id")) ){
            return true;
        }

        return MemberGrade::add( $this->user->id,$request->post("fiction_id"),MemberGrade::GradeAddSum($request->post("grade",0)));


    }

}