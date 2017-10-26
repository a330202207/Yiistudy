<?php
namespace backend\models\admin\controllers;

use backend\controllers\BaseController;
use backend\model\menu;
use common\helpers\FuncHelper;

/**
 * Site controller
 */
class MenuController extends BaseController
{


    /**
     * 菜单首页
     *
     * @return string
     */
    public function actionIndex()
    {
        $menu = new Menu();
        $menu = $menu->getMenuList();
//        FuncHelper::dd($menu);
        return $this->render('index', [
            'menu' => $menu
        ]);
    }

    public function actionSave()
    {

        return $this->render('save');
    }

    public function actionIcon()
    {
        return $this->render('icon');
    }

}
