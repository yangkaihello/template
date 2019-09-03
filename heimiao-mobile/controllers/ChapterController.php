<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/31
 * Time: 下午4:11
 */

namespace mobile\controllers
{

    use common\models\FictionChapter;
    use common\models\FictionIndex;
    use common\models\reader\MemberRead;
    use common\popular\Cache;
    use Yii;
    use yii\web\HttpException;

    class ChapterController extends BaseController
    {

        public function actionIndex()
        {
            $request = Yii::$app->request;

            $fiction = FictionIndex::findCheckIssue()->andWhere([
                'id' => $request->get('fiction_id'),
            ])->one();

            $model = FictionChapter::findCheckIssue()->andWhere([
                'fiction_id' => $fiction->id,
                'sort'  => $request->get('sort'),
            ])->one();

            if(!isset($model))
            {
                throw new HttpException(404,"章节不存在");
            }

            $fictionCache = Cache::factory('fictionCache');

            if(!isset($request->referrer) || strpos(parse_url($request->referrer)['path'],'/chapter/') === false )
            {
                $fictionCache->setFictionPv($fiction->id);
            }


            if($this->user)
            {
                $fictionCache->setFictionUv($fiction->id,$this->user->id);

                $reader = new MemberRead();
                $reader->member_id = $this->user->id;
                $reader->createTableNum();

                if( !$reader::find()->where([
                    'fiction_id' => $model->fiction_id,
                    'chapter_sort' => $model->sort,
                ])->one() )
                {
                    $reader->fiction_id = $model->fiction_id;
                    $reader->chapter_sort = $model->sort;
                    $reader->save();
                }

            }

            $chapterUp = FictionChapter::findChapterUp($model->fiction_id,$model->sort);
            $chapterDown = FictionChapter::findChapterDown($model->fiction_id,$model->sort);

            return $this->render("index",[
                'fiction'   => $fiction,
                'model'     => $model,
                'chapterUp' => $chapterUp,
                'chapterDown' => $chapterDown,
            ]);
        }



    }

}

