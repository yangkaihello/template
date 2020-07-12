<?php
namespace mobile\forms;

use common\extend\Model;
use Yii;

use common\models\MemberIndex;
use yii\web\HttpException;

/**
 * Login form
 */
class SpeedyForm extends Model
{
    public $token;
    public $id;
    public $rememberMe = true;

    private $_user;

    public function rules()
    {
        return [
            [['token','id'],'required','message' => '未授权的访问'],
            ['token','validateToken']
        ];
    }

    public function validateToken($attribute,$params)
    {
        if (!$this->hasErrors()) {
            $channel = $this->getUser();
            if (!$channel || $channel->auth_key != $this->token ) {
                $this->addError($attribute,'未授权的访问');
            }
        }
    }

    /**
     * @return bool
     * @throws \yii\base\Exception
     */
    public function agentLogin()
    {
        if (!$this->validate()) {
            throw new HttpException("404",$this->getOneFirstError());
        }
        $user = $this->getUser();

        $user->auth_key = \Yii::$app->getSecurity()->generateRandomString(32);
        $user->save();

        \Yii::$app->user->login($user,24*3600);

        return \Yii::$app->user;

    }

    /**
     * Finds user by [[username]]
     *
     * @return MemberIndex|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = MemberIndex::findIdentity($this->id);
        }

        return $this->_user;
    }
}
