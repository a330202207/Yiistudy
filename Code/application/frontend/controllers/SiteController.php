<?php
namespace frontend\controllers;

use yii;
use frontend\controllers\BaseController;


/**
 * Site controller
 */
class SiteController extends BaseController
{

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}
