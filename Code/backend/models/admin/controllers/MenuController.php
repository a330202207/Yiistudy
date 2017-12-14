<?php
namespace backend\models\admin\controllers;

use Yii;
use backend\controllers\BaseController;
use backend\model\menu;
use backend\models\admin\model\MenuModel;
use common\helpers\FuncHelper;

/**
 * Site controller
 */
class MenuController extends BaseController
{


    private $_model;

    public function init()
    {
        parent::init();
        $this->_model = new MenuModel();
    }
    /**
     * 菜单首页
     *
     * @return string
     */
    public function actionIndex()
    {
        $menu = $this->_model->getMenuList();
        return $this->render('index', [
            'menu' => $menu
        ]);
    }

    public function actionEdit()
    {
        if (Yii::$app->request->isAjax) {
            $menuId = Yii::$app->request->get('menu_id');
            $parentId = Yii::$app->request->get('parent_id', 0);
            $data = $this->_model->findMenuOne($menuId);
            return $this->render('edit', [
                'menu' => $data,
                'parent_id' => $parentId
            ]);
        }
    }

    public function actionSave()
    {
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $menuId = Yii::$app->request->post('menu_id');

            if ($this->_model->load($data, '') && $this->_model->validate()) {
                if (empty($menuId)) {
                    $res = $this->_model->addMenu($data);
                } else {
                    $res = $this->_model->updateMenu($data);
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

    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $menuId = Yii::$app->request->get('menu_id');
            if ($this->_model->deleteOne($menuId)) {
                return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
            } else {
                return $this->resAjax($this->_model->resLoginCode());
            }
        }
    }

    public function actionAddAction()
    {
        return $this->render('action');
    }

    public function actionIcon()
    {
        return $this->render('icon');
    }

}
