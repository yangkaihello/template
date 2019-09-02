<?php
/**
 * Created by PhpStorm.
 * User: yangkai
 * Date: 2019/8/31
 * Time: 上午11:28
 */

namespace mobile\controllers
{

    use mobile\controllers\member\BaseController;

    class MemberController extends BaseController
    {

        public function actionIndex()
        {

            return $this->render("index",[

            ]);
        }

        public function actionBook()
        {


            return $this->render("book",[

            ]);
        }


    }


}


