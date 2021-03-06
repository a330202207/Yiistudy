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
        $menu = $this->_model->getMenuList(0, 2);
        return $this->render('index', [
            'menu' => $menu
        ]);
    }

    /**
     * 获取顶级菜单
     *
     * @return string
     */
    public function actionGetAllTopMenu()
    {
        $menu = $this->_model->getAllTopMenu();
        return $this->resAjax($menu);
    }

    public function actionGetChildMenu()
    {
        $parentId = Yii::$app->request->get('menu_id');
        $menu = $this->_model->getMenuList($parentId);
        $res = [
            'code' => 1,
            'msg' => '',
            'data' => $menu,
        ];
        return $this->resAjax($res);
    }

    public function actionEdit()
    {
        if (Yii::$app->request->isAjax) {
            $menuId = Yii::$app->request->get('menu_id');
            $parentId = Yii::$app->request->get('parent_id', 0);
            $data = $this->_model->getMenuOne($menuId);
            return $this->renderPartial('edit', [
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
        $parentId = Yii::$app->request->get('parent_id');
        $data = $this->_model->getAllAction($parentId);
        return $this->render('action', [
            'data' => $data,
            'parent_id' => $parentId
        ]);
    }

    /**
     * 菜单首页
     *
     * 1、新增数据：data无值，newData有值
     * 2、编辑数据：data有值，newData有值
     * 3、编辑数据：data有值，newData无值
     */
    public function actionSaveAction()
    {
        $parentId = Yii::$app->request->post('parent_id');
        $data = Yii::$app->request->post('data');
        $newData = Yii::$app->request->post('new');
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                $obj = $this->_model->findOne($key);
                $obj->setAttributes($value);
                $obj->save();
            }
        }
        if (!empty($newData)) {
            if (!$this->_model->addAction(['parent_id' => $parentId, 'data' => $newData])) {
                return $this->resAjax($this->_model->resLoginCode());
            }
        }
        return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
    }

    public function actionUpdate()
    {
        $sort = Yii::$app->request->post('sort');
        foreach ($sort as $key => $value) {
            $obj = $this->_model->findOne($key);
            $obj->sort = $value;
            $obj->save();
        }
        return $this->resAjax(['code' => 0, 'err' => '操作成功！']);
    }

    public function actionIcon()
    {
        return $this->render('icon');
    }

}
