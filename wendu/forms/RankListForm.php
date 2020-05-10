<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/24
 * Time: 上午1:23
 */

namespace frontend\modules\template\forms;

use common\models\FictionChapter;
use common\models\FictionIndex;
use yii\base\Model;
use yii\data\Pagination;

class RankListForm extends Model
{

    /**
     * @param int $pageSize
     * @return array(FictionIndex,Pagination)
     */
    public function getRankGive($pageSize = 10,$where = [])
    {
        $models = FictionIndex::find()->alias('index')->with([
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'category',
        ])->where([
            'check'     => FictionIndex::CHECK_ISSUE,
        ]+$where)->joinWith([
            'statisticalRead statistical'
        ])->orderBy("statistical.give DESC");

        $pagination = new Pagination([
            'defaultPageSize' => $pageSize,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->all();

        return [$models, $pagination];
    }

    /**
     * @param int $pageSize
     * @return array(FictionIndex,Pagination)
     */
    public function getRankPv($pageSize = 10,$where = [])
    {

        $models = FictionIndex::find()->alias('index')->with([
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'category',
        ])->where([
            'check'     => FictionIndex::CHECK_ISSUE,
        ]+$where)->joinWith([
            'statisticalRead statistical'
        ])->orderBy("statistical.pv DESC");

        $pagination = new Pagination([
            'defaultPageSize' => $pageSize,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->all();

        return [$models, $pagination];

    }

    /**
     * @param int $pageSize
     * @return array(FictionIndex,Pagination)
     */
    public function getRankCollect($pageSize = 10,$where = [])
    {

        $models = FictionIndex::find()->alias('index')->with([
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'category',
        ])->where([
            'check'     => FictionIndex::CHECK_ISSUE,
        ]+$where)->joinWith([
            'statisticalRead statistical'
        ])->orderBy("statistical.collect DESC");

        $pagination = new Pagination([
            'defaultPageSize' => $pageSize,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->all();

        return [$models, $pagination];

    }

    /**
     * @param int $pageSize
     * @return array(FictionIndex,Pagination)
     */
    public function getRankEnd($pageSize = 10,$where = [])
    {

        $models = FictionIndex::find()->alias('index')->with([
            'member' => function ($query){
                return $query->with(['authorInfo']);
            },
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'category',
        ])->where([
            'status'    => FictionIndex::STATUS_END,
            'check'     => FictionIndex::CHECK_ISSUE,
        ]+$where)->joinWith([
            'statisticalRead statistical'
        ])->orderBy("statistical.pv DESC");

        $pagination = new Pagination([
            'defaultPageSize' => $pageSize,
            'totalCount' => (clone $models)->count(),
        ]);

        $models = $models->all();

        return [$models, $pagination];

    }



}