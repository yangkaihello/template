<?php
namespace frontend\modules\template\forms;

use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
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
            ['username', 'unique', 'targetClass' => '\common\models\MemberIndex', 'message' => '{attribute}已存在'],
            ['username', 'string', 'min' => 2, 'max' => 255, 'tooShort' => "{attribute}最少2位", 'tooLong' => "{attribute}最大255位"],

            ['password_again', 'trim'],

            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'compare', 'compareAttribute' => 'password_again', 'message' => '两次密码输入不一致'],
            ['password', 'string', 'min' => 6, 'tooShort' => "{attribute}最少6位数"],

            ['verifyCode', 'trim'],
            ['verifyCode', 'required'],
            ['verifyCode', 'captcha' , 'message' => '{attribute}不一致'],
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

}
