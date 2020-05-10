<?php

namespace frontend\modules\template\controllers;

use common\models\FictionCategory;
use common\models\SystemLink;
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
     * @var $template \frontend\modules\template\interfaces\controllers\HomeInterface
     */
    public $template;  //不同频道的数据模版

    /**
     * @var $category FictionCategory[]
     */
    public $category = [];   //书籍分类合集

    /**
     * @var $links SystemLink[]
     */
    public $links = []; //友情连接

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

        /**
         * cookie key switch-channel 有两种模式boy,girl ，男女频道区分
         */
        $channel = [
            "boy"=>"boy",
            "girl"=>"girl",
        ];

        $channel = $channel[$_COOKIE["switch-channel"] ?? "boy"];
        //获取男女频道下面的分类
        $this->category = Yii::$app->cache->getOrSet("frontend.category",function () {
            $categorys = FictionCategory::find()->all();
            $categoryChannel = [
                "boy" => [],
                "girl" => [],
            ];
            foreach ($categorys as $category){
                if ($category->channel == $category::CHANNEL_GIRL) {
                    array_push($categoryChannel["girl"],$category);
                }else{
                    array_push($categoryChannel["boy"],$category);
                }
            }

            return $categoryChannel;
        },24*3600)[$channel]; //数据分类缓存一天

        $this->links = Yii::$app->cache->getOrSet("frontend.links",function () {
            return SystemLink::findAll([
                "source_type" => SystemLink::SOURCE_TYPE_CHAR
            ]);
        },24*3600); //友情连接缓存一天

        //男女频道模版区分
        $controllerName = "\\frontend\modules\\template\controllers\\" . ucfirst($channel) . "Controller";
        $this->template = new $controllerName();

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

        if ($request->isAjax) {
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