<?php
namespace backend\controllers;

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
