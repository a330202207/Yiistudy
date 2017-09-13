<?php

namespace backend\controllers;

use Yii;
use yii\helpers\Url;
use backend\model\LoginModel;


class LoginController extends BaseController
{

    /**
     * 登录
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login.php';
        $model = new LoginModel();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $request = Yii::$app->request;
//            $cookies = $request->cookies;
            return $this->redirect(Url::toRoute('/site/index'));
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * 登出
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(Url::toRoute('/login/login'));
    }

}