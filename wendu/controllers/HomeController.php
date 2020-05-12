<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/28
 * Time: 上午10:51
 */

namespace frontend\modules\template\controllers;

use common\extend\DateTime;
use common\models\FictionShortContent;
use common\models\reader\MemberRead;
use common\models\sign\MemberSign;
use common\popular\Cache;
use common\models\FictionLexicon;
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

        $ad = [
            "header" => [
                "one" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
                "two" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
                "three" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
            ],
            "carousel" => [
                [
                    "image" => "/template/img/banner2.jpg",
                    "title" => "现言•青春 陆爷家的小可爱超甜   安向暖著   2020-03-17",
                    "introduce" => "这是介绍文案",
                    "url" => "#this",
                ],
                [
                    "image" => "/template/img/banner2.jpg",
                    "title" => "第二本书",
                    "introduce" => "这是介绍文案",
                    "url" => "#this",
                ],
                [
                    "image" => "/template/img/banner2.jpg",
                    "title" => "第三个广告",
                    "introduce" => "这是介绍文案",
                    "url" => "#this",
                ],
            ],
            "about" => [
                "one" => [
                    "image" => "/template/img/adf.jpg",
                    "url" => "#this",
                ],
                "two" => [
                    "image" => "/template/img/adff.jpg",
                    "url" => "#this",
                ],
                "three" => [
                    "image" => "/template/img/adfff.jpg",
                    "url" => "#this",
                ],
                "four" => [
                    "image" => "/template/img/adfffff.jpg",
                    "url" => "#this",
                ],
            ],
        ];

        $index = $this->template->Index();
        return $this->render($index["template"],$index["data"]+[
            "ad" => $ad
            ]);
    }

    /**
     * 书籍搜索
     * @return string
     */
    public function actionBooks()
    {
        $ad = [
            "header" => [
                "one" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
            ],
        ];

        $index = $this->template->Books();
        return $this->render($index["template"],$index["data"]+[
            "ad" => $ad,
            ]);
    }


    /**
     * 排行榜
     * @return string
     */
    public function actionRanks()
    {
        $ad = [
            "header" => [
                "one" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
            ],
        ];

        $index = $this->template->Ranks();
        $index["data"] = static::RANKS_MODEL+$index["data"];
        $ranks = [];

        foreach (static::RANKS_MODEL as $key=>$value){
            $ranks[$key] = $value+$index["data"]["models"][$key];
        }
        unset($index["data"]["models"]);

        return $this->render($index["template"],$index["data"]+[
                "ranks" => $ranks,
                "ad" => $ad,
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
        $ad = [
            "header" => [
                "one" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
            ],
        ];

        $index = $this->template->Rank();
        return $this->render($index["template"],$index["data"]+[
                "ranks" => static::RANKS_MODEL,
                "ad" => $ad,
            ]);
    }

    /**
     * 书籍详情
     * @return string
     */
    public function actionBook()
    {
        $ad = [
            "header" => [
                "one" => [
                    "image" => "/template/img/banner.jpg",
                    "url" => "#this",
                ],
            ],
        ];

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
                "ad" => $ad,
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
            if(!empty($request->referrer)){
                return $this->redirect($request->referrer);
            }
            throw new HttpException(404,"not url");
        }

        $fictionCache = Cache::factory('fictionCache');
        $fictionCache->setFictionPv($fiction->id); //添加用户点击量

        //用户的浏览量和阅读记录统计
        if($this->user)
        {
            //每个用户的每日uv
            $fictionCache->setFictionUv($fiction->id,$this->user->id);

            $reader = new MemberRead();
            $reader->member_id = $this->user->id;
            $reader->createTableNum();

            //不存在阅读记录的用户添加用户唯一量访问量
            if(!$reader::find()->where([
                'fiction_id' => $chapter->fiction_id,
                'member_id' => $this->user->id,
            ])->exists()) {
                $fictionCache->setFictionUser($fiction->id);
            }

            //保存用户阅读记录
            if( !$reader::find()->where([
                'fiction_id' => $chapter->fiction_id,
                'member_id' => $this->user->id,
                'chapter_sort' => $chapter->sort,
            ])->one() )
            {
                $reader->fiction_id = $chapter->fiction_id;
                $reader->member_id = $this->user->id;
                $reader->chapter_sort = $chapter->sort;
                $reader->save();
            }

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


    /**
     * 查看签到的数据
     * @return array
     */
    public function actionSignData()
    {
        /**
         * @var $signs MemberSign[]
         */
        $signs = MemberSign::getMonthData($this->user->id,new \DateTime(date("Y-m-d",time())));
        $upDayIsSign = MemberSign::isUpDay($this->user->id);
        $currentDayIsSign = MemberSign::isDay($this->user->id,date("Y-m-d"));

        if ($currentDayIsSign){
            $continuous = $this->user->userInfo->sign ?? 0;
        }else{
            $continuous = $upDayIsSign ? ($this->user->userInfo->sign ?? 0) : 0;
        }

        $days = [];
        foreach ($signs as $sign){
            $days[] = (new \Datetime($sign->date))->format("d");
        }

        return [
            "buy" => MemberSign::getBuyNumber($this->user->id),
            "days" => $days,
            "continuous" => $continuous,
        ];
    }

    /**
     * 签到
     * @return bool
     */
    public function actionSign()
    {

        $model = new MemberSign();
        $model->member_id = $this->user->id;
        $model->createTableNum();

        //验证今日是否签到过
        if (!$model::find()->where([
            'member_id' => $this->user->id,
            'date' => date("Y-m-d"),
        ])->exists()) {
            //历史签到次数
            $sign = $this->user->userInfo->sign ?? 0;
            //签到的添加逻辑
            return $model::Add($this->user->id,++$sign);
        }else{
            return false;
        }

    }
}