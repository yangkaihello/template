<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2020/5/2
 * Time: 17:47
 */

namespace frontend\modules\template\controllers;


use common\models\FictionChapter;
use common\models\FictionIndex;
use frontend\modules\template\forms\RankListForm;
use frontend\modules\template\support\Search;
use Yii;
use yii\base\Widget;
use yii\data\Pagination;

class GirlController extends Widget implements \frontend\modules\template\interfaces\controllers\HomeInterface
{

    /**
     * 首页数据集合
     */
    public function Index() : array
    {


        return [
            "template" => '/girl/index',
            "data" => [],
        ];
    }

    public function Books(): array
    {
        $models = FictionIndex::findCheckAndLong()->with([
            'category',
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
        ])->joinWith([
            'statisticalRead statistical',
        ])->andWhere([
            "channel" => FictionIndex::CHANNEL_GIRL,
        ]);

        $models = Search::frontendFictionSearch($models,Yii::$app->request);

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->limit($pagination->limit)->offset($pagination->offset)->all();


        return [
            "template" => '/girl/books',
            "data" => [
                "models" => $models,
                "pagination" => $pagination,
            ],
        ];
    }

    public function Ranks(): array
    {

        $models = new RankListForm();

        [$collect,$pagination]  = $models->getRankCollect(5,[
            "channel" => FictionIndex::CHANNEL_GIRL,
        ]);
        [$give,$pagination]     = $models->getRankGive(5,[
            "channel" => FictionIndex::CHANNEL_GIRL,
        ]);
        [$pv,$pagination]       = $models->getRankPv(5,[
            "channel" => FictionIndex::CHANNEL_GIRL,
        ]);
        [$end,$pagination]      = $models->getRankEnd(5,[
            "channel" => FictionIndex::CHANNEL_GIRL,
        ]);

        $models = [
            "give" => [
                'models'    => $give,
            ],
            "pv" => [
                'models'    => $pv,
            ],
            "collect" => [
                'models'    => $collect,
            ],
            "end" => [
                'models'    => $end,
            ],
        ];

        return [
            "template" => '/girl/ranks',
            "data" => [
                "models" => $models,
            ],
        ];
    }

    public function Chapters(): array
    {
        return [
            "template" => '/girl/chapters',
            "data" => [],
        ];
    }

    public function Rank(): array
    {

        $request = Yii::$app->request;
        $functionRank = "getRank".ucfirst($request->get("type","collect"));

        $models = new RankListForm();
        [$models,$pagination] = $models->$functionRank(10,[
            "channel" => FictionIndex::CHANNEL_GIRL,
        ]);

        return [
            "template" => '/girl/rank',
            "data" => ["models" => $models],
        ];
    }

    public function Book(): array
    {
        return [
            "template" => '/girl/book',
            "data" => [],
        ];
    }

    public function Chapter(): array
    {
        return [
            "template" => '/girl/chapter',
            "data" => [],
        ];
    }
}