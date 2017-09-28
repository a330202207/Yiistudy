<?php

namespace backend\models\admin\controllers;


class UserController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
