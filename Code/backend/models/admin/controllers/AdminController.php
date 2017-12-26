<?php
namespace backend\models\admin\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\models\admin\model\AdminModel;
use backend\models\admin\model\RoleModel;
use common\helpers\FuncHelper;

/**
 * Admin controller
 */
class AdminController extends BaseController
{

    private $_model;

    public function init()
    {
        parent::init();
        $this->_model = new AdminModel();
    }


    /**
     * 管理员首页
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 管理员列表
     *
     * @return string
     */
    public function actionAjaxgetindexlist()
    {
        if (Yii::$app->request->isAjax) {
            $data = $this->_model->findAdminAll(Yii::$app->request->queryParams);
            return $this->resAjax($data);
        }
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

            $data = $this->_model->findAdminOne($id);
            return $this->render('edit', [
                'admin' => $data
            ]);
        }
    }

    /**
     * 管理员删除
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
     * 管理员授权
     *
     * @return string
     */
    public function actionEditAuth()
    {
        $model = new RoleModel();
        $admin_id = Yii::$app->request->get('id');
        $admin = $this->_model->findAdminOne($admin_id);
        $data = $model->getAllRole();
        return $this->render('auth', [
            'admin_id' => $admin_id,
            'roles' => $data,
            'role_id' => $admin['role_id'],
        ]);
    }

    /**
     * 管理员授权操作
     *
     * @return string
     */
    public function actionAuthAdminRole()
    {
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $res = $this->_model->authAdminRole($data);
            if ($res) {
                return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
            } else {
                return $this->resAjax($this->_model->resLoginCode());
            }
        }
    }

    /**
     *
     * 保存管理员
     * @return string
     */
    public function actionSave()
    {
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $id = Yii::$app->request->post('id');

            if ($this->_model->load($data, '') && $this->_model->validate()) {
                if (empty($id)) {
                    $data['create_ip'] = ip2long(Yii::$app->request->getUserIP());
                    $data['last_login_time'] = 0;
                    $data['last_login_ip'] = ip2long('127.0.0.1');
                    $res = $this->_model->addAdmin($data);
                } else {
                    $res = $this->_model->updateAdmin($data);
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
     *
     * 检查数据
     * @return string
     */
    public function checkData($data)
    {
        if (!$this->_model->load($data, '') && !$this->_model->validate()) {
            return $this->resAjax($this->_model->resLoginCode());
        }
    }


}
