<?php
namespace backend\models\admin\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\model\LoginForm;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'maxLength' => 4,
                'minLength' => 4
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

/*        if(!Yii::$app->request->isAjax) {
        }*/

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $model->loginLog();
            return $this->goBack();
        } else {
            return $this->render('login_backup', [
//            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

}
