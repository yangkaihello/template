<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/28
 * Time: 上午10:51
 */

namespace frontend\modules\template\controllers;

use backend\support\Search;
use common\models\FictionLexicon;
use common\models\LexiconIndex;
use common\popular\Handle;
use common\models\FictionCategory;
use common\models\SystemPlace;
use yii\data\Pagination;
use common\models\FictionIndex;
use common\models\FictionChapter;
use yii;

class HomeController extends BaseController
{
    const ACTION_HOME = '/index';
    const ACTION_LONG = '/long';
    const ACTION_SHORT = '/short';

    public function actionIndex()
    {
        $fictionLong = FictionIndex::findCheckAndLong()->with([
            'category',
        ]);

        $fictionShort = FictionIndex::findCheckAndShort()->with([
            'category',
        ]);

        /*$place = SystemPlace::find()->orWhere([
            'source_type' => SystemPlace::SOURCE_TYPE_HOME_SHORT
        ])->orWhere([
            'source_type' => SystemPlace::SOURCE_TYPE_HOME_LONG
        ])->indexBy("source_type")->all();

        foreach ($place as $key=>$value)
        {
            $ids = explode(",",json_decode($value->source_json,true)[0]);
            $placeBook = FictionIndex::find()->where([
                'in',
                'id',
                $ids,
            ])->indexBy('id')->all();

            $fictionPlace[$key] = $placeBook ? Handle::array_before_sort($placeBook,$ids) : null;
        }*/

        return $this->render('index',[
            'fictionLong' => $fictionLong->orderby("id DESC")->limit(8)->all(),
            'fictionShort' => $fictionShort->orderby("id DESC")->limit(10)->all(),
            'fictionPlace' => $fictionPlace ?? null,
        ]);
    }

    public function actionLong()
    {
        $request = Yii::$app->request;
        $fiction = FictionIndex::findCheckAndLong()->with([
            'category',
            'chapter' => function ($query){
                return $query->where(['check'=>FictionChapter::CHECK_ISSUE]);
            },
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ]);

        $fiction = Search::frontendFictionSearch($fiction,$request);

        $count = clone $fiction;

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $count->count(),
        ]);

        $fiction = $fiction->offset($pagination->offset)->limit($pagination->limit)->all();

        $fictions = array_chunk($fiction,2);

        return $this->render('long',[
            'category' => FictionCategory::find()->all(),
            'fictions' => $fictions,
            'pagination'   => $pagination,
        ]);
    }

    public function actionShort()
    {

        $request = Yii::$app->request;
        $fiction = FictionIndex::findCheckAndShort()->with([
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ]);

        if($request->get('lexicon_id','all') != 'all')
        {
            $fiction_ids = FictionLexicon::getLexiconFictions($request->get('lexicon_id'));
            $fiction->andWhere(['in','id',$fiction_ids]);
        }   //搜索相关标签书籍

        $count = clone $fiction;

        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $count->count(),
        ]);

        $fiction = $fiction->offset($pagination->offset)->limit($pagination->limit)->all();

        $fictions = array_chunk($fiction,4);

        return $this->render('short',[
            'lexicon'   => LexiconIndex::find()->all(),
            'fictions'  => $fictions,
            'pagination'   => $pagination,
        ]);
    }

}