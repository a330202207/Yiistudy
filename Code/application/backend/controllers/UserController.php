<?php

namespace backend\controllers;


class UserController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
