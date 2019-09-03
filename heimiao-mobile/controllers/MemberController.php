<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/31
 * Time: 上午11:28
 */

namespace mobile\controllers
{

    use common\models\collect\MemberCollect;
    use common\models\FictionChapter;
    use common\models\FictionIndex;
    use common\models\reader\MemberRead;
    use common\popular\ArrayHandle;
    use mobile\controllers\member\BaseController;
    use Yii;

    class MemberController extends BaseController
    {

        public function actionIndex()
        {

            return $this->render("index",[

            ]);
        }

        public function actionBook()
        {
            $models = new MemberCollect();
            $models->member_id = $this->user->id;
            $models->createTableNum();

            $models = $models::find()->with([
                'fiction' => function ($query)
                {
                    return $query->with([
                        'chapter' => function ($query){
                            return $query->andWhere([
                                'check' => FictionChapter::CHECK_ISSUE,
                            ])->select(['id','fiction_id','sort']);
                        }
                    ]);
                }
            ])->where(['member_id' => $models->member_id]);

            $models = $models->all();

            $fiction_ids = array_column($models,'fiction_id');
            $reader = new MemberRead();
            $reader->member_id = $this->user->id;
            $reader->createTableNum();

            $reader = $reader::find()->where([
                'fiction_id' => $fiction_ids,
            ])->select(['fiction_id,sum(fiction_id) as count'])->groupBy("fiction_id")->asArray()->all();
            $reader = ArrayHandle::getArrayReplaceKey($reader,'fiction_id');

            return $this->render("book",[
                'models' => $models,
                'reader' => $reader,
            ]);
        }


    }


}


