<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/28
 * Time: 上午10:51
 */

namespace frontend\modules\template\controllers;

use common\models\FictionShortContent;
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
use yii\web\HttpException;

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

    const BOOKS_SEARCH_ORDER = [
        'charSize'          => '字数',
        'statistical.pv'    => '点击量',
    ];

    const RANKS_MODEL = [
        "collect" => [
            'title'     => '收藏榜',
        ],
        "pv" => [
            'title'     => '点击榜',
        ],
        "give" => [
            'title'     => '点赞榜',
        ],
        "end" => [
            'title'     => '完本榜',
        ],
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

        $index = $this->template->Index();
        return $this->render($index["template"],$index["data"]);
    }

    /**
     * 书籍搜索
     * @return string
     */
    public function actionBooks()
    {

        $index = $this->template->Books();
        return $this->render($index["template"],$index["data"]);
    }


    /**
     * 排行榜
     * @return string
     */
    public function actionRanks()
    {
        $index = $this->template->Ranks();
        $index["data"] = static::RANKS_MODEL+$index["data"];
        $ranks = [];

        foreach (static::RANKS_MODEL as $key=>$value){
            $ranks[$key] = $value+$index["data"]["models"][$key];
        }
        unset($index["data"]["models"]);

        return $this->render($index["template"],$index["data"]+[
            "ranks" => $ranks,
            ]);
    }

    /**
     * 章节列表
     * @return string
     */
    public function actionChapters()
    {

        $request = Yii::$app->request;

        $fiction = FictionIndex::findCheckOne($request->get('fiction_id'))->with([
            'category',
        ])->one();

        //短篇小说直接跳转章节阅读
        if($fiction->length == $fiction::LENGTH_SHORT){
            return $this->redirect("/chapter/short/{$fiction->id}");
        }

        $index = $this->template->Chapters();
        return $this->render($index["template"],$index["data"]);
    }

    /**
     * 排行榜详细
     * @return string
     */
    public function actionRank()
    {

        $index = $this->template->Rank();
        return $this->render($index["template"],$index["data"]+[
                "ranks" => static::RANKS_MODEL,
            ]);
    }

    /**
     * 书籍详情
     * @return string
     */
    public function actionBook()
    {
        $request = Yii::$app->request;

        $fiction = FictionIndex::findCheckOne($request->get('fiction_id'))->with([
            'category','statisticalRead',
            'chapter' => function ($query){
                return $query->where(['check' => FictionChapter::CHECK_ISSUE]);
            },
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ])->one();

        //短篇小说直接跳转章节阅读
        if($fiction->length == $fiction::LENGTH_SHORT){
            return $this->redirect("/chapter/short/{$fiction->id}");
        }

        if( !$fiction )
        {
            throw new HttpException(404,"not url");
        }

        $lexicons = FictionLexicon::getFictionLexicons($fiction->id);
        $fictions = $fiction->findMember(3);

        $index = $this->template->Book();
        return $this->render($index["template"],$index["data"]+[
                "fiction" => $fiction,
                "lexicons" => $lexicons,
                "fictions" => $fictions,
            ]);
    }

    /**
     * 阅读章节
     * @return string
     */
    public function actionChapter()
    {
        $request = Yii::$app->request;
        $chapter = FictionChapter::findOne([
            "fiction_id" => $request->get("fiction_id"),
            "sort" => $request->get("sort"),
        ]);

        $fiction = FictionIndex::findCheckOne($request->get('fiction_id'))->with([
            'category',
            'chapters' => function ($query){
                return $query->where(['check'=>FictionChapter::CHECK_ISSUE])->orderBy("sort DESC")->select(["id","sort","title","isVip","fiction_id"]);
            },
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ])->andWhere(['length'=>FictionIndex::LENGTH_LONG])->one();

        if( !$fiction || !$chapter )
        {
            throw new HttpException(404,"not url");
        }
        $chapterDown = FictionChapter::findChapterDown($chapter->fiction_id,$chapter->sort);
        $chapterUp = FictionChapter::findChapterUp($chapter->fiction_id,$chapter->sort);

        return $this->render("chapter",[
            "chapter" => $chapter,
            "fiction" => $fiction,
            "chapterDown" => $chapterDown,
            "chapterUp" => $chapterUp,
        ]);
    }


    /**
     * 阅读短篇小说
     * @return string
     */
    public function actionChapterShort()
    {
        $request = Yii::$app->request;
        $chapter = FictionShortContent::findOne([
            "fiction_id" => $request->get("fiction_id"),
        ]);

        $fiction = FictionIndex::findCheckOne($request->get('fiction_id'))->with([
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ])->one();

        if( !$fiction || !$chapter )
        {
            throw new HttpException(404,"not url");
        }

        return $this->render("chapter-short",[
            "chapter" => $chapter,
            "fiction" => $fiction,
        ]);
    }


}