<?php

namespace mobile\controllers;

use common\popular\Handle;
use Yii;
use yii\web\HttpException;
use yii\web\Response;
use common\models\MemberIndex;

class BaseController extends \yii\web\Controller
{
    public $user;   //登陆用户信息
    public $accessPath;   //当前url
    public $backHref;       //回滚URL

    /**
     * @throws HttpException
     */
    public function init() {
        parent::init();
        $response = Yii::$app->response;
        $response->on(Response::EVENT_BEFORE_SEND , [ $this , 'beforeSend' ]);

        if( Yii::$app->user->isGuest )
        {
            $this->user = null;
        }else{
            $this->user = MemberIndex::find()->with(['property'])->where([
                'id' => Yii::$app->user->id,
                'status' => MemberIndex::STATUS_ACTIVE,
            ])->one();
        }

        $this->accessPath = '/' . Yii::$app->request->pathInfo;


    }

    /**
     * @param $event
     */
    public function beforeSend($event) {
        /**
         * @var Response $response
         */
        $response = $event->sender;
        $request = Yii::$app->request;

    }

}