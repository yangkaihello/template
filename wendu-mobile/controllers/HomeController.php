<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/28
 * Time: 上午10:51
 */

namespace mobile\controllers;

use common\models\FictionCategory;
use common\models\FictionChapter;
use common\models\FictionIndex;
use common\models\SystemPlace;
use mobile\support\Search;
use yii;
use yii\data\Pagination;

class HomeController extends BaseController
{

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $homeOrder = [
            0 => "zero",
            1 => "one",
            2 => "two",
            3 => "three",
            4 => "four",
        ];
        $sourceType = [
            'home_boy_nav','home_boy_recommend','home_boy_new','home_boy_list','home_boy_category',
        ]; //默认精选

        switch ($request->get("type")){
            case "girl":
                $sourceType = [
                    'home_boy_nav','home_boy_recommend','home_boy_new','home_boy_list','home_boy_category',
                ];
                break;
            case "boy":
                $sourceType = [
                    'home_boy_nav','home_boy_recommend','home_boy_new','home_boy_list','home_boy_category',
                ];
                break;
        }
        $models = SystemPlace::find()->where([
            'source_type' => $sourceType,
            'source_facility' => SystemPlace::SOURCE_FACILITY_WAP_FICTION,
        ])->indexBy("source_type")->all();

        $sourceTypeNumber = array_flip($sourceType);
        foreach ($models as $source){
            $number = $sourceTypeNumber[$source->source_type];
            $homeOrder[$number] = $source;
        }

        return $this->render("index",[
            'homeOrder' => $homeOrder,
        ]);
    }

    public function actionCategory(){
        $request = Yii::$app->request;

        $category = $request->get("category",0);
        $categorys = FictionCategory::find()->all();

        if(!$category && isset($categorys[0])){
            $category = $categorys[0]->id;
        }

        $models = FictionIndex::findCheckAndLong()->with([
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
        ])->andWhere([
            "category_id" => $category
        ])->orderBy("created_at DESC")->limit(20)->all();

        return $this->render("category",[
            "categorys" => $categorys,
            "category" => $category,
            "models" => $models,
        ]);
    }

    public function actionRecommend()
    {

        $category = Yii::$app->request->get('category');

        $place = SystemPlace::find()->where([
            'source_type' => 'recommend',
            'source_facility' => SystemPlace::SOURCE_FACILITY_WAP_FICTION,
        ])->one();

        $models = $place ? $place->findBooks(["statisticalRead"]) : [];

        return $this->render("recommend",[
            'models' => $models,
        ]);
    }

    public function actionRank()
    {
        $ranks = [
            "end" => [
                "title" => "完本榜",
                "type" => "end",
            ],
            "new" => [
                "title" => "新书榜",
                "type" => "new",
            ],
            "grade" => [
                "title" => "评分榜",
                "type" => "grade",
            ],
            "collect" => [
                "title" => "收藏榜",
                "type" => "collect",
            ],
        ];
        $request = Yii::$app->request;
        $channel = $request->get("channel",FictionIndex::CHANNEL_GIRL);
        $type = $request->get("type","end");

        $category = Yii::$app->request->get('category','week');
        $models = FictionIndex::findCheckIssue()->with([
            "category"
        ]);

        switch ($type){
            case "end"; $models = $models->joinWith([
                'statisticalRead statistical',
            ])->andWhere([
                "channel" => $channel,
                "status" => FictionIndex::STATUS_END,
            ])->orderBy("statistical.pv DESC")->limit(30)->all();
                break;
            case "new"; $models = $models->joinWith([
                'statisticalRead statistical',
            ])->andWhere([
                "channel" => $channel,
            ])->andWhere([
                ">","created_at",date("Y-m-d H:i:s",time()-90*24*3600)
            ])->orderBy("statistical.pv DESC")->limit(30)->all();
                break;
            case "grade"; $models = $models->joinWith([
                'statisticalRead statistical',
            ])->andWhere([
                "channel" => $channel,
            ])->orderBy("statistical.grade DESC")->limit(30)->all();
                break;
            case "collect"; $models = $models->joinWith([
                'statisticalRead statistical',
            ])->andWhere([
                "channel" => $channel,
            ])->orderBy("statistical.collect DESC")->limit(30)->all();
                break;
        }

        return $this->render("rank",[
            'models'    => $models,
            'ranks'     => $ranks,
            'channel'   => $channel,
            'type'      => $type,
        ]);
    }

    public function actionEnd()
    {
        $models = FictionIndex::findCheckAndLong()->with([
            'statisticalRead',
        ])->andWhere(['status' => FictionIndex::STATUS_END]);

        $pagination = new Pagination([
            'defaultPageSize' => 100,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->limit($pagination->limit)->offset($pagination->offset)->orderBy("id DESC")->all();

        return $this->render("end",[
            'models'    => $models,
        ]);
    }


}