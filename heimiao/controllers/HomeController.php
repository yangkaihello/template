<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/28
 * Time: 上午10:51
 */

namespace frontend\modules\template\controllers;

use frontend\modules\template\forms\RankListForm;
use frontend\modules\template\support\Search;
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

    const BOOKS_SEARCH_LIST = [
        '0-300000'          => '30万以下',
        '300000-500000'     => '30-50万',
        '500000-1000000'    => '50-100万',
        '1000000'           => '100万以上',
    ];

    public function actionIndex()
    {
        $fiction = FictionIndex::findCheckAndLong()->with([
            'category',
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ])->orderby("id DESC")->limit(20);


        $place = SystemPlace::find()->where([
            'source_type' => [
                'home_goods','home_new','home_god',
                'home_active','home_update','home_click','home_up'
            ],
            'source_facility' => SystemPlace::SOURCE_FACILITY_PC_FICTION,
        ])->indexBy("source_type")->all();

        $vip    = "";//(clone $fiction)->andWhere(['isVip' => FictionIndex::VIP_YES])->all();
        $free   = "";//(clone $fiction)->andWhere(['isVip' => FictionIndex::VIP_NO])->all();
        $all    = $fiction->all();

        return $this->render('index',[
            'fictionAll' => $all,
            'fictionVip' => $vip,
            'fictionFree' => $free,
            'place' => $place,
        ]);
    }

    public function actionBooks()
    {

        $models = FictionIndex::findCheckAndLong()->with([
            'category','statisticalRead',
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
        ]);

        $models = Search::frontendFictionSearch($models,Yii::$app->request);

        $pagination = new Pagination([
            'defaultPageSize' => 30,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->limit($pagination->limit)->offset($pagination->offset)->all();

        $place = SystemPlace::find()->where([
            'source_type' => [
                'books_free','books_new',
            ],
            'source_facility' => SystemPlace::SOURCE_FACILITY_PC_FICTION,
        ])->indexBy("source_type")->all();

        $category = FictionCategory::find()->all();

        return $this->render("books",[
            'place'         => $place,
            'category'      => $category,
            'models'        => $models,
            'pagination'    => $pagination,
        ]);
    }

    /**
     * 排行榜
     * @return string
     */
    public function actionRank()
    {

        /*$models = new RankListForm();
        $models->getRankEnd();

        [$collect,$pagination]  = $models->getRankCollect();
        [$give,$pagination]     = $models->getRankGive();
        [$pv,$pagination]       = $models->getRankPv();
        [$end,$pagination]      = $models->getRankEnd();

        $models = [
            [
                'title'     => '订阅榜',
                'models'    => $give,
            ],
            [
                'title' => '点击榜',
                'models'    => $pv,
            ],
            [
                'title' => '收藏榜',
                'models'    => $collect,
            ],
            [
                'title' => '完本榜',
                'models'    => $end,
            ],
        ];*/

        $models = SystemPlace::find()->where([
            'source_type' => [
                'rank_active','rank_click','rank_give',
                'rank_letter','rank_new','rank_update',
            ],
            'source_facility' => SystemPlace::SOURCE_FACILITY_PC_FICTION,
        ])->indexBy("source_type")->all();

        return $this->render("rank",[
            'models'   => $models,
        ]);
    }

    /**
     * 排行榜详细
     * @return string
     */
    public function actionRankList()
    {
//        $category = Yii::$app->request->get('category');
//        $function = 'getRank' . ucfirst($category);
//        $models = new RankListForm();
//        if( method_exists($models,$function) )
//        {
//            /**
//             * @var $models FictionIndex
//             * @var $pagination Pagination
//             */
//            [$models,$pagination] = $models->$function();
//        }else{
//            throw new yii\web\HttpException(404,'不存在此排行榜');
//        }

        $category = Yii::$app->request->get('category');

        $model = SystemPlace::find()->where([
            'source_type' => 'rank_' . $category,
            'source_facility' => SystemPlace::SOURCE_FACILITY_PC_FICTION,
        ])->one();

        return $this->render("rank-list",[
            'model'     => $model,
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