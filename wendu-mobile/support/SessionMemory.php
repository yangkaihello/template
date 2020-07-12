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
    const REGISTER_CODE = '__register_code';

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

    //注册验证码

    public function setRegisterCode($value)
    {
        $t = Yii::$app->params["register.timeout"] ?: 3600 ;
        $data = json_encode([
            'range' => $value,
            'time'  => time()+$t,
        ]);
        Yii::$app->session->set(self::REGISTER_CODE,$data);
    }

    public function getRegisterCode()
    {
        $data = Yii::$app->session->get(self::REGISTER_CODE,null);
        if($data != null) {
            $data = json_decode($data);
        }
        return $data;
    }

    public function hasRegisterCode()
    {
        return Yii::$app->session->has(self::REGISTER_CODE);
    }

    /**
     * @return bool| false:已经过期,true:正常
     */
    public function timeoutRegisterCode()
    {
        if($this->hasRegisterCode()){
            $register = $this->getRegisterCode();
            if($register->time < time()){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public function isRegisterCode($code)
    {
        if($this->timeoutRegisterCode()){
            $register = $this->getRegisterCode();
            if ($register->range == $code) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }


}