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
    use common\models\PaymentType;
    use common\models\reader\MemberRead;
    use common\models\SystemSetting;
    use common\popular\ArrayHandle;
    use mobile\controllers\member\BaseController;
    use mobile\support\SessionMemory;
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

            $models = $models->orderBy("id DESC")->limit(50)->all();

            $fiction_ids = array_column($models,'fiction_id');
            $reader = new MemberRead();
            $reader->member_id = $this->user->id;
            $reader->createTableNum();

            $reader = $reader::find()->where([
                'member_id' => $this->user->id,
                'fiction_id' => $fiction_ids,
            ])->select(['fiction_id','count(fiction_id) as count','max(chapter_sort) chapter_sort'])->groupBy("fiction_id")->asArray()->all();
            $reader = ArrayHandle::getArrayReplaceKey($reader,'fiction_id');

            return $this->render("book",[
                'models' => $models,
                'reader' => $reader,
            ]);
        }

        public function actionReader()
        {

            $models = new MemberRead();
            $models->member_id = $this->user->id;
            $models->createTableNum();

            $models = $models::find()->with([
                'fiction','chapter'
            ])->where([
                'member_id' => $this->user->id,
            ])->select([
                'fiction_id','max(updated_at) as updated_at','max(chapter_sort) as chapter_sort',
            ])->groupBy("fiction_id");

            $models = $models->orderBy("updated_at DESC")->limit(100)->all();

            return $this->render("reader",[
                'models' => $models,
            ]);
        }

        public function actionService()
        {

            $contact = Yii::$app->params['contact'];

            return $this->render("service",[
                'contact' => $contact,
            ]);
        }

        public function actionPay()
        {
            $type = PaymentType::findByStatusActive()->andWhere([
                'type' => PaymentType::TYPE_BUY,
            ])->all();

            $setting = SystemSetting::findBySourceType(SystemSetting::SOURCE_TYPE_READ_BUY);

            $memory = new SessionMemory();
            $memory->setPayBack(Yii::$app->request->referrer);

            return $this->render("pay",[
                'type' => $type,
                'setting' => $setting,
            ]);
        }

        public function actionPayStatus()
        {
            $memory = new SessionMemory();
            $this->redirect($memory->getPayBack("/"));
        }


    }


}


