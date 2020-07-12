<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2020/7/8
 * Time: 11:35
 */

namespace mobile\forms;


use mobile\support\SessionMemory;

class RegisterForm extends \common\extend\Model
{


    public $username;
    public $password;
    public $password_again;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'email', 'message' => '{attribute}邮箱格式不正确'],
            ['username', 'unique', 'targetClass' => '\common\models\MemberIndex', 'message' => '{attribute}已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => "{attribute}最少2位", 'tooLong' => "{attribute}最大255位"],

            ['password_again', 'trim'],

            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'compare', 'compareAttribute' => 'password_again', 'message' => '两次密码输入不一致'],
            ['password', 'string', 'min' => 6, 'tooShort' => "{attribute}最少6位数"],

            ['verifyCode', 'trim'],
            ['verifyCode', 'required'],
            ['verifyCode', 'captchaCode'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username'  => '用户名',
            'password'  => '密码',
            'password_again'  => '再次输入密码',
            'verifyCode'   => '验证码',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function captchaCode($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $session = new SessionMemory();
            if (!$session->timeoutRegisterCode()){
                $this->addError($attribute, '验证码已经过期');
            }else{
                if (!$session->isRegisterCode($this->verifyCode)){
                    $this->addError($attribute, '验证码不一致');
                }
            }

        }
    }

}