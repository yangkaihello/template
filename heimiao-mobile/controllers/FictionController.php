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
                'category',
                'member' => function ($query){
                    return $query->with(['authorInfo']);
                },
            ])->andWhere([
                'id' => $request->get('id'),
            ])->one();

            $fictionCache = Cache::factory('fictionCache');
            $fictionCache->setFictionPv($fiction->id);

            $config = [
                // 前面的appid什么的也得保留哦
                'app_id'             => Yii::$app->params['wechat']['app_id'],
                'secret'             => Yii::$app->params['wechat']['secret'],
            ];

            $app = Factory::officialAccount($config);

            $lexicons = FictionLexicon::getFictionLexicons($fiction->id);
            $author = FictionIndex::findCheckIssue()->andWhere([
                'member_id' => $fiction->member_id,
            ])->andWhere(['<>','id',$fiction->id])->limit(6)->orderBy("id DESC")->all();

            return $this->render("index",[
                'fiction'   => $fiction,
                'lexicons'  => $lexicons,
                'author'    => $author,
                'app'       => $app,
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


