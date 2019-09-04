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

        $models = SystemPlace::find()->where([
            'source_type' => [
                'home_hot','home_edit','home_girl','home_boy',
            ],
            'source_facility' => SystemPlace::SOURCE_FACILITY_WAP_FICTION,
        ])->indexBy("source_type")->all();

        return $this->render("index",[
            'models' => $models,
        ]);
    }

    public function actionBooks()
    {
        $models = FictionIndex::findCheckAndLong()->with([
            'category',
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
        ]);

        $channel = Yii::$app->request->get('channel',1);

        $models->andWhere(['channel' => $channel]);

        $models = Search::booksFictionSearch($models,Yii::$app->request);

        $pagination = new Pagination([
            'defaultPageSize' => 100,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->limit($pagination->limit)->offset($pagination->offset)->orderBy("id DESC")->all();


        return $this->render("books",[
            'channel'   => $channel,
            'models'    => $models,
            'category'  => FictionCategory::find()->all(),
        ]);
    }

    public function actionRecommend()
    {

        $category = Yii::$app->request->get('category');

        $model = SystemPlace::find()->where([
            'source_type' => 'home_' . $category,
            'source_facility' => SystemPlace::SOURCE_FACILITY_WAP_FICTION,
        ])->one();


        return $this->render("recommend",[
            'model' => $model,
        ]);
    }

    public function actionRank()
    {

        $category = Yii::$app->request->get('category','week');

        $model = SystemPlace::find()->where([
            'source_type' => 'rank_' . $category,
            'source_facility' => SystemPlace::SOURCE_FACILITY_WAP_FICTION,
        ])->one();

        return $this->render("rank",[
            'model'     => $model,
        ]);
    }

    public function actionFree()
    {
        $models = FictionIndex::findCheckAndLong()->with([
            'category',
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
        ])->andWhere(['isVip' => FictionIndex::VIP_NO]);

        $pagination = new Pagination([
            'defaultPageSize' => 100,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->limit($pagination->limit)->offset($pagination->offset)->orderBy("id DESC")->all();

        return $this->render("free",[
            'models'    => $models,
        ]);
    }


}