<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/9/2
 * Time: 下午12:32
 */

namespace mobile\controllers\member
{


    use common\models\collect\MemberCollect;
    use Yii;

    class CollectController extends BaseController
    {

        public function actionAttention()
        {

            $request = Yii::$app->request;

            $collect = new MemberCollect();

            $collect->member_id = $this->user->id;
            $collect->createTableNum();

            if($collect::isCollect($this->user->id,$request->get('fiction_id')))
            {
                $collect::findOne([
                    'member_id' => $collect->member_id,
                    'fiction_id' => $request->get('fiction_id'),
                ])->delete();
                $status = 'no';
            }else{
                $collect->fiction_id = $request->get('fiction_id');
                $collect->save();

                $status = 'yes';
            }

            return $this->asJson(['status' => $status]);
        }

    }


}

