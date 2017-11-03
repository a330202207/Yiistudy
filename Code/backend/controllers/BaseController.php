<?php
namespace backend\controllers;

use backend\model\Menu;
use Yii;
use yii\web\Controller;
use yii\helpers\Json;
use common\helpers\FuncHelper;

class BaseController extends Controller
{
    /**
     * @var LayoutModel
     */
    private  $_model;

    /**
     * @var array layout 层数据
     */
    public $layoutData = array();

    public function init()
    {
        $this->_model = new Menu();
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * 规范 ajax 输出
     */
    public function resAjax($data)
    {
        if (!isset($data['code'])) {
            $res = [];
            $res['code'] = isset($data['code']) ? $data['code'] : 1;
            $res['errCode'] = isset($data['errCode']) ? $data['errCode'] : '0000';
            $res['data'] = isset($data['data']) && is_string($data['data']) ? $data['data'] : '';
            $res['err'] = isset($data['err']) ? $data['msg'] : 'unknown error';
        } else {
            $res = $data;
        }
        return Json::encode($res);
    }


/*    public function beforeAction($action)
    {
        $loginStatus = $this->checkLoginStatus();
        if (!$loginStatus && !in_array($action->uniqueId, $this->allowAllAction)) {
            if (Yii::$app->request->isAjax) {
                $this->renderJSON([], "未登录,请返回用户中心", -302);
            } else {
                $this->redirect(UrlService::buildUrl("/user/login"));//返回到登录页面
            }
            return false;
        }
    }

    public function checkLoginStatus()
    {
        $request = Yii::$app->request;
        $cookies = $request->cookies;
        $auth_cookie = $cookies->get($this->auth_cookie_name);

        if (!$auth_cookie) {
            return false;
        }

        list($auth_token, $uid) = explode("#", $auth_cookie);

        if (!$auth_token || !$uid) {
            return false;
        }

        if ($uid && preg_match("/^\d+$/", $uid)) {
            $userinfo = User::findOne(['id' => $uid]);
            if (!$userinfo) {
                return false;
            }
            //校验码
            if ($auth_token != $this->createAuthToken($userinfo['id'], $userinfo['name'], $userinfo['email'], $_SERVER['HTTP_USER_AGENT'])) {
                return false;
            }
            $this->current_user = $userinfo;
            $view = Yii::$app->view;
            $view->params['current_user'] = $userinfo;
            return true;
        }
        return false;
    }*/

}