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
    const PAY_BACK = '__pay-back';

    public function setLoginBack($value)
    {
        Yii::$app->session->setFlash(self::LOGIN_BACK,$value);
    }

    public function getLoginBack($defaultValue = null)
    {
        return Yii::$app->session->getFlash(self::LOGIN_BACK,$defaultValue);
    }

    public function hasLoginBack()
    {
        return Yii::$app->session->hasFlash(self::LOGIN_BACK);
    }


    public function setPayBack($value)
    {
        Yii::$app->session->setFlash(self::PAY_BACK,$value);
    }

    public function getPayBack($defaultValue = null)
    {
        return Yii::$app->session->getFlash(self::PAY_BACK,$defaultValue);
    }

    public function hasPayBack()
    {
        return Yii::$app->session->hasFlash(self::PAY_BACK);
    }


}