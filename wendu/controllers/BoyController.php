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
use common\models\SystemPlace;
use frontend\modules\template\forms\RankListForm;
use frontend\modules\template\support\Search;
use Yii;
use yii\base\Widget;
use yii\data\Pagination;

class BoyController extends Widget implements \frontend\modules\template\interfaces\controllers\HomeInterface
{

    /**
     * 首页数据集合
     */
    public function Index() : array
    {

        $fictionCategory = [
            [
                "title" => "分类一",
                "category_id" => 1,
                "models" => [],
            ],
            [
                "title" => "分类二",
                "category_id" => 2,
                "models" => [],
            ],
            [
                "title" => "分类三",
                "category_id" => 3,
                "models" => [],
            ],
        ];
        //分类书籍获取
        foreach ($fictionCategory as $key=>$category){
            $fictionCategory[$key]["models"] = FictionIndex::findCheckIssue()->andWhere([
                "category_id" => $category["category_id"],
                "channel" => FictionIndex::CHANNEL_BOY,
            ])->orderBy("id DESC")->limit(15)->all();
        }

        //新书上架
        $fictionNew = FictionIndex::findCheckIssue()->with([
            "category",
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
        ])->andWhere([
            "length" => FictionIndex::LENGTH_LONG,
            "channel" => FictionIndex::CHANNEL_BOY,
        ])->orderBy("id DESC")->limit(10)->all();

        //本周强推,本月强推,大神风云榜单,导航书籍,主编力荐,销售总榜
        $fictionPlace = SystemPlace::find()->where([
            'source_type' => [
                'home_boy_week','home_boy_month','home_boy_god',
                'home_boy_navigate','home_boy_recommend','home_boy_sell',
            ],
            'source_facility' => SystemPlace::SOURCE_FACILITY_PC_FICTION,
        ])->indexBy("source_type")->all();


        return [
            "template" => "/boy/index",
            "data" => [
                "fictionCategory" => $fictionCategory,
                "fictionNew" => $fictionNew,
                "fictionPlace" => $fictionPlace,
            ],
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
            "channel" => FictionIndex::CHANNEL_BOY,
        ]);

        $models = Search::frontendFictionSearch($models,Yii::$app->request);

        $pagination = new Pagination([
            'defaultPageSize' => 1,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->limit($pagination->limit)->offset($pagination->offset)->all();

        return [
            "template" => "/boy/books",
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
            "channel" => FictionIndex::CHANNEL_BOY,
        ]);
        [$give,$pagination]     = $models->getRankGive(5,[
            "channel" => FictionIndex::CHANNEL_BOY,
        ]);
        [$pv,$pagination]       = $models->getRankPv(5,[
            "channel" => FictionIndex::CHANNEL_BOY,
        ]);
        [$end,$pagination]      = $models->getRankEnd(5,[
            "channel" => FictionIndex::CHANNEL_BOY,
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
            "template" => "/boy/ranks",
            "data" => [
                "models" => $models,
            ],
        ];
    }

    public function Chapters(): array
    {

        return [
            "template" => "/boy/chapters",
            "data" => [],
        ];
    }

    public function Rank(): array
    {

        $request = Yii::$app->request;
        $functionRank = "getRank".ucfirst($request->get("type","collect"));

        $models = new RankListForm();
        [$models,$pagination] = $models->$functionRank(10,[
            "channel" => FictionIndex::CHANNEL_BOY,
        ]);

        return [
            "template" => "/boy/rank",
            "data" => ["models" => $models],
        ];
    }

    public function Book(): array
    {
        return [
            "template" => "/boy/book",
            "data" => [],
        ];
    }

    public function Chapter(): array
    {
        return [
            "template" => "/boy/chapter",
            "data" => [],
        ];
    }
}