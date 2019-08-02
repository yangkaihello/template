<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/29
 * Time: 下午5:37
 */

namespace frontend\modules\template\controllers;

use common\models\FictionLexicon;
use common\models\FictionChapter;
use common\models\FictionIndex;
use Yii;
use yii\web\HttpException;

class FictionController extends BaseController
{

    public function actionIndex()
    {
        $request = Yii::$app->request;

        $fiction = FictionIndex::findCheckOne($request->get('id'))->with([
            'category',
            'chapters' => function ($query){
                return $query->where(['check'=>FictionChapter::CHECK_ISSUE])->orderBy("sort ASC")->limit(1);
            },
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ])->andWhere(['length'=>FictionIndex::LENGTH_LONG])->one();

        if( !$fiction )
        {
            throw new HttpException(404,"not url");
        }

        $related = FictionIndex::findCheckIssue()->andWhere([
            'member_id'=>$fiction->member_id
        ])->andWhere([
            '<>',
            'id',
            $request->get('id')
        ])->andWhere([
            'length'=>FictionIndex::LENGTH_LONG
        ])->with([
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
        ])->orderBy('id DESC')->limit(2)->all();

        $lexicons = FictionLexicon::getFictionLexicons($fiction->id);

        return $this->render('index',[
            'fiction' => $fiction,
            'related' => $related,
            'lexicons' => $lexicons,
        ]);
    }

    public function actionChapters()
    {
        $request = Yii::$app->request;

        if( !$request->get('id') )
        {
            throw new HttpException(404,"not url");
        }

        $fiction = FictionIndex::findCheckOne($request->get('id'))->with([
            'member' => function ($query){
                $query->with(['authorInfo']);
            },
            'chapters' => function ($query){
                return $query->where(['check'=>FictionChapter::CHECK_ISSUE])->orderBy("sort DESC")->limit(1);
            },
        ])->one();

        $chapters = FictionChapter::findCheckAndFiction($fiction->id)->select(['id','title'])->orderBy("sort ASC")->all();

        return $this->render('chapters',[
            'fiction' => $fiction,
            'chapters' => $chapters,
        ]);
    }

}