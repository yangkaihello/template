<?php


namespace mobile\support {

    use yii\db\ActiveQuery;
    use yii\web\Request;
    use backend\models\FictionIndex;

    class Search {


        /**
         * @param $model
         * @param Request $request
         * @return ActiveQuery
         */
        public static function booksFictionSearch($model,Request $request)
        {

            if( $request->get('category_id','all') != 'all' )
            {
                $model->andWhere(['category_id' => $request->get('category_id')]);
            }

            if( $request->get('status','all') != 'all' )
            {
                $model->andWhere(['status' => $request->get('status')]);
            }

            return $model;

        }



    }
}