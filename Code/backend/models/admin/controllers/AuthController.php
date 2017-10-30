<?php
namespace backend\models\admin\controllers;

use backend\controllers\BaseController;
use backend\model\menu;
use backend\models\admin\model\RoleModel;
use common\helpers\FuncHelper;

/**
 * Site controller
 */
class AuthController extends BaseController
{


    /**
     * 菜单首页
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new RoleModel();
        $data = $model->getAllRole();
//        var_dump($data);die;

//        $model = new Menu();
//        $data = $model->getMenuList1();
//        print_r($data);die;
        return $this->render('index', [
            'role' => $data
        ]);
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionSave()
    {
        return $this->render('save');
    }

    public function actionIcon()
    {
        return $this->render('icon');
    }

    public function actionAuth()
    {
        $model = new Menu();
        $data = $model->getMenuList1();
//        print_r($data);die;
        return $this->render('auth', [
            'menu' => $data
        ]);
    }

    public function actionAjaxsave()
    {
        $model = new RoleModel();
        $model->authUserRole();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('role_id');

            if ($model->load($data, '') && $model->validate()) {
                if ($model->authUserRole($data)) {
                    return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
                } else {
                    return $this->resAjax($model->resLoginCode());
                }
            } else {
                return $this->resAjax($model->resLoginCode());
            }
        }
    }

}
