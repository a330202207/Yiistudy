<?php
namespace backend\models\admin\controllers;

use backend\models\admin\model\RoleMapsModel;
use Yii;
use backend\controllers\BaseController;
use backend\model\menu;
use backend\models\admin\model\RoleModel;

/**
 * Site controller
 */
class AuthController extends BaseController
{
    private $_model;

    public function init()
    {
        parent::init();
        $this->_model = new RoleModel();
    }


    /**
     * 菜单首页
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
        /*return $this->render('index2', [
            'role' => $data
        ]);*/
    }

    /**
     * 管理员编辑
     *
     * @return string
     */
    public function actionEdit()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $data = $this->_model->findRoleOne($id);
            return $this->render('edit', [
                'auth' => $data
            ]);
        }
    }

    public function actionAuth()
    {
        $model = new RoleModel();
        $data = $model->getAllRole();
        $res = [
            'code' => 0,
            'msg' => '',
            'count' => 0,
            'data' => $data
        ];
        return $this->resAjax($res);
    }

    public function actionSave()
    {
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $id = Yii::$app->request->post('id');

            if ($this->_model->load($data, '') && $this->_model->validate()) {
                if (empty($id)) {
                    $res = $this->_model->addRole($data);
                } else {
                    $res = $this->_model->updateRole($data);
                }

                if ($res) {
                    return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
                } else {
                    return $this->resAjax($this->_model->resLoginCode());
                }
            } else {
                return $this->resAjax($this->_model->resLoginCode());
            }
        }
    }

    /**
     * 角色删除
     *
     * @return string
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $res = $this->_model->deleteOne($id);
            if ($res) {
                return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
            } else {
                return $this->resAjax($this->_model->resLoginCode());
            }
        }

    }

    /**
     * 角色授权
     *
     * @return string
     */
    public function actionEditAuth()
    {
        if (Yii::$app->request->isAjax) {
            $roleId = Yii::$app->request->get('id');
            $menu = new Menu();
            $data = $menu->getMenuList1();
            $roleMaps = new RoleMapsModel();
            $menus = $roleMaps->getMenuIdsByRoleId($roleId);
            return $this->render('auth', [
                'menu' => $data,
                'role_menus' => $menus,
                'role_id' => $roleId
            ]);
        }
    }

    public function actionSaveAuth()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $roleMaps = new RoleMapsModel();
            if ($roleMaps->saveMenuIdsByRoleId($data)) {
                return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
            } else {
                return $this->resAjax($roleMaps->resLoginCode());
            }
        }
    }

}
