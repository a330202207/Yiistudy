<?php
namespace backend\models\admin\controllers;

use backend\controllers\BaseController;

/**
 * Site controller
 */
class IndexController extends BaseController
{


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
