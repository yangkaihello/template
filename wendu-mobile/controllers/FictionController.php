<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/31
 * Time: 下午4:11
 */

namespace mobile\controllers
{

    use common\models\collect\MemberCollect;
    use common\models\FictionChapter;
    use common\models\FictionIndex;
    use common\models\FictionLexicon;
    use common\models\MemberGrade;
    use common\models\SystemPlace;
    use common\popular\Cache;
    use EasyWeChat\Factory;
    use Yii;
    use yii\data\Pagination;

    class FictionController extends BaseController
    {

        public function actionIndex()
        {
            $request = Yii::$app->request;
            $fiction = FictionIndex::findCheckIssue()->with([
                'category','statisticalRead',
                'member' => function ($query){
                    return $query->with(['authorInfo']);
                },
            ])->andWhere([
                'id' => $request->get('id'),
            ])->one();

            $config = [
                // 前面的appid什么的也得保留哦
                'app_id'             => Yii::$app->params['wechat']['app_id'],
                'secret'             => Yii::$app->params['wechat']['secret'],
            ];

            //$app = Factory::officialAccount($config);

            $lexicons = FictionLexicon::getFictionLexicons($fiction->id);

            $place = SystemPlace::find()->where([
                'source_type' => 'recommend_like',
                'source_facility' => SystemPlace::SOURCE_FACILITY_WAP_FICTION,
            ])->one();

            $likeFiction = $place ? $place->findBooks(["statisticalRead"]) : [];
            $hasGrade = MemberGrade::has($this->user->id,$fiction->id);

            return $this->render("index",[
                'fiction'   => $fiction,
                'lexicons'  => $lexicons,
                'likeFiction'   => $likeFiction,
                'hasGrade'   => $hasGrade,
                //'app'       => $app,
            ]);
        }

        public function actionChapter()
        {

            $request = Yii::$app->request;

            $fiction = FictionIndex::findCheckIssue()->andWhere([
                'id' => $request->get('id'),
            ])->one();

            $models = FictionChapter::findCheckIssue()->andWhere([
                'fiction_id' => $fiction->id,
            ]);

            $pagination = new Pagination([
                'defaultPageSize' => 100,
                'pageSize' => 100,
                'totalCount' => (clone $models)->count(),
            ]);

            $models = $models->orderBy("sort ASC")->limit($pagination->limit)->offset($pagination->offset)->all();

            return $this->render("chapter",[
                'fiction' => $fiction,
                'models' => $models,
                'pagination' => $pagination,
            ]);
        }

    }

}


