<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/9/2
 * Time: 下午10:00
 */

namespace mobile\support;


use Yii;

class SessionMemory
{
    const LOGIN_BACK = '__login-back';

    public function setLoginBack($value)
    {
        return Yii::$app->session->set(self::LOGIN_BACK,$value);
    }

    public function getLoginBack($defaultValue = null)
    {
        return Yii::$app->session->get(self::LOGIN_BACK,$defaultValue);
    }

    public function hasLoginBack()
    {
        if(Yii::$app->session->get(self::LOGIN_BACK))
        {
            return true;
        }else{
            return false;
        }
    }

}