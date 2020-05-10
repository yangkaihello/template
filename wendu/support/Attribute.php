<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2018/9/6
 * Time: 下午1:42
 */

namespace frontend\modules\template\support{

    class Attribute
    {

        //字数复选框搜索格式化
        public static function charSizeSearch( $string , $field )
        {
            $array = explode("-",$string);
            if(count($array) > 1)
            {
                $return = ['between',$field , $array[0] , $array[1]];
            }else{
                $return = ['>',$field , $array[0]];
            }
            return $return;
        }

        /*
         * 字数统计搜索
         * @return object|$model 模型对象
         */
        public static function charSize($model,$data)
        {
            if( !in_array('all',$data) )
            {
                foreach($data as $value )
                {
                    $charSizeSearch[] = static::charSizeSearch($value,'charSize');
                }

                $model->andWhere([
                    'and',
                    '',
                    array_merge(['or'],$charSizeSearch),
                ]);

            }   //字数范围

            return $model;
        }

        /*
         * 授权等级
         * @return object|$model 模型对象
         */
        public static function authorization($model,$data)
        {
            if( !in_array('all',$data) )
            {
                foreach($data as $value )
                {
                    $authorizationSearch[] = 'authorization = ' . $value;
                }

                $model->andWhere([
                    'and',
                    '',
                    array_merge(['or'],$authorizationSearch),
                ]);

            }   //授权等级

            return $model;
        }
    }

}


