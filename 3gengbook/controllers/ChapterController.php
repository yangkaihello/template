<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/11/29
 * Time: 下午8:51
 */

namespace frontend\modules\template\controllers;


use common\models\FictionChapter;
use common\models\FictionIndex;
use Yii;
use yii\web\HttpException;

class ChapterController extends BaseController
{

    public function actionIndex()
    {
        $request = Yii::$app->request;

        if( !$request->get('id') )
        {
            throw new HttpException(404,"not url");
        }

        $chapter = FictionChapter::findCheckAndChapter($request->get('id'))->one();

        $fiction = FictionIndex::find()->where(['id'=>$chapter->fiction_id])->with([
            'category',
        ])->one();

        $up     = FictionChapter::findChapterUp($fiction->id,$chapter->sort);
        $down   = FictionChapter::findChapterDown($fiction->id,$chapter->sort);

        return $this->render('index',[
            'chapter' => $chapter,
            'fiction' => $fiction,
            'up'    => $up,
            'down'    => $down,
        ]);
    }


    public function actionShort()
    {
        $request = Yii::$app->request;

        if( !$request->get('id') )
        {
            throw new HttpException(404,"not url");
        }

        $fiction = FictionIndex::find()->with(['shortContent'])->where([
            '=',
            'id',
            $request->get('id'),
        ])->limit(1)->one();

        return $this->render('short',[
            'fiction' => $fiction,
        ]);
    }



}