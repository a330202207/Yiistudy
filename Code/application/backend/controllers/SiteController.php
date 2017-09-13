<?php
namespace backend\controllers;

use Yii;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\controllers\BaseController;

/**
 * Site controller
 */
class SiteController extends BaseController
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
