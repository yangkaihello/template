<?php

namespace frontend\modules\template\controllers;

use common\popular\Handle;
use Yii;
use yii\web\HttpException;
use yii\web\Response;
use common\models\MemberIndex;

class BaseController extends \yii\web\Controller
{
    public $user;   //登陆用户信息
    public $accessPath;   //登陆用户信息

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
            $this->user = MemberIndex::findIdentity(Yii::$app->user->id);
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

        if ($request->isAjax && Handle::whiteAjax(Yii::$app->params['white.ajax'])) {
            if(YII_ENV_DEV && $response->getStatusCode() >= 500 )
            {
                $exception = Yii::$app->errorHandler->exception;

                $response->data = [
                    'status'    => $response->getIsSuccessful() ,
                    'errMsg'    => $exception->getMessage() ,
                    'errFile'    => $exception->getFile() ,
                    'errLine'    => $exception->getLine() ,
                    'errCode'   => $exception->getCode(),
                ];
            }

            $response->format = Response::FORMAT_JSON;
        }

    }

}