<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/29
 * Time: 下午5:37
 */

namespace frontend\modules\template\controllers;

use common\models\collect\MemberCollect;
use common\models\MemberGive;
use Yii;

class FictionController extends BaseController
{

    /**
     * 用户赠送礼物
     * @return bool|false|int
     */
    public function actionCollect()
    {
        $request = Yii::$app->request;

        //判断是验证还是对数据进行操作
        if ((bool)$request->post("isVerify",false)){
            return MemberCollect::isCollect($this->user->id,$request->post("fiction_id"));
        }else{
            //如果是存在对则取消收藏，不存在就添加收藏
            if ( MemberCollect::isCollect($this->user->id,$request->post("fiction_id")) ){
                return MemberCollect::cancel( $this->user->id,$request->post("fiction_id") ) ? false : true;
            }else{
                return MemberCollect::add( $this->user->id,$request->post("fiction_id") );
            }

        }

    }


    /**
     * 用户点赞
     * @return bool|false|int|void
     */
    public function actionGive()
    {

        $request = Yii::$app->request;

        //判断是验证还是对数据进行操作
        if ((bool)$request->post("isVerify",false)){
            return MemberGive::isGive($this->user->id,$request->post("fiction_id"));
        }else{

            //如果是存在对则取消收藏，不存在就添加收藏
            if ( MemberGive::isGive($this->user->id,$request->post("fiction_id")) ){
                return MemberGive::cancel( $this->user->id,$request->post("fiction_id") )  ? false : true;
            }else{
                return MemberGive::add( $this->user->id,$request->post("fiction_id") );
            }

        }

    }

}