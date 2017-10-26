<?php
namespace backend\models\admin\controllers;

use Yii;
use yii\helpers\Url;
use backend\controllers\BaseController;
use backend\models\admin\model\LoginModel;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
/*            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],*/
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'maxLength' => 4,
                'minLength' => 4
            ],
        ];
    }

    /**
     * 首页
     */
    public function actionIndex()
    {
//        var_dump(Yii::$app);exit;
//        $user_id = Yii::$app->user->identity->getId();
//        $user_info = Yii::$app->authManager->getRolesByUser($user_id);
//        $menu = new Menu();
//        $menu = $menu->getLeftMenuList();
//        var_dump($menu);
        $user_info = [];
        $menu = [];
        return $this->render('index', [
            'menu' => $menu,
            'user_info' => key($user_info)
        ]);
    }

    /**
     * 登录(Ajax)
     */
    public function actionLogin()
    {
        $model = new LoginModel();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post(), 'info') && $model->login()) {
                $model->loginLog();
                return $this->redirect(Url::toRoute('/admin/site/index'));
//                $this->resAjax(['ret' => 1, 'errMsg' => '登录成功！']);
            } else {
                return $this->resAjax($model->resLoginCode());
            }
        } else {
            return $this->render('login');
        }
    }

    /**
     * 登录
     */
    public function actionLoginBackup()
    {
        $model = new LoginModel();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $model->loginLog();
            return $this->redirect(Url::toRoute('/admin/site/index'));
        } else {
            return $this->render('login_backup', [
                'model' => $model,
            ]);
        }
    }

    public function actionWelcome()
    {
        return $this->render('welcome');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
