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


    /**
     * 管理员首页
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAjaxgetindexlist()
    {
        $model = new AdminModel();

        if (Yii::$app->request->isAjax) {
            $data = $model->getAdminAll(Yii::$app->request->queryParams);
            return $this->resAjax($data);
        }
    }

    public function actionEdit()
    {
//        var_dump(Yii::$app->request->get());die;
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->get('id');
            $model = new AdminModel();
            $data = $model->getAdminOne($id);
//            var_dump($model->getAdminOne($id));die;
            return $this->render('edit',[
                'admin' => $data
            ]);
        }

    }

    public function actionAuth()
    {
        $model = new RoleModel();
        $data = $model->getAllRole();
        return $this->render('auth');
    }

    public function actionSave()
    {
        $model = new AdminModel();

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();

            if ($model->load($data, '') && $model->validate()) {

                $data['reg_time'] = time();
                $data['reg_ip'] = ip2long(Yii::$app->request->getUserIP());
                $data['last_login_time'] = 0;
                $data['last_login_ip'] = ip2long('127.0.0.1');
                $data['update_time'] = time();

                $model->generateAuthKey();
                $model->setPassword($data['password']);

                if ($model->save()) {
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
