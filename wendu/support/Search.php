<?php


namespace frontend\modules\template\support {

    use yii\db\ActiveQuery;
    use yii\web\Request;
    use backend\models\FictionIndex;

    class Search {


        /**
         * @param $model
         * @param Request $request
         * @return ActiveQuery
         */
        public static function frontendFictionSearch($model,Request $request)
        {

            if( $request->get('category_id','all') != 'all' )
            {
                $model->andWhere(['category_id' => $request->get('category_id')]);
            }

            if( (string)$request->get('isVip','all') != 'all' )
            {
                $model->andWhere(['isVip' => $request->get('isVip')]);
            }

            if( $request->get('status','all') != 'all' )
            {
                $model->andWhere(['status' => $request->get('status')]);
            }

            if( $request->get('channel','all') != 'all' )
            {
                $model->andWhere(['channel' => $request->get('channel')]);
            }

            if( $request->get('charSize','all') != 'all' )
            {
                $model = Attribute::charSize($model,[$request->get('charSize')]);
            }

            if( !empty($request->get('keyword',"")) )
            {
                $model->andWhere(['like','title',$request->get('keyword')]);
            }   //关键词搜索

            if($request->get('order','all') !== 'all')
            {
                $model->orderBy($request->get('order') . " DESC");
            }else{
                $model->orderBy("created_at DESC");
            }   //排序

            return $model;

        }



    }
}