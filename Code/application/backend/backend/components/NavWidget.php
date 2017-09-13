<?php
/**
 * 菜单挂件
 */

namespace backend\components;

use Yii;
use yii\base\Widget;


class NavWidget extends Widget
{


    //查询菜单数据
    public function run()
    {

/*        $server = Yii::createObject('menuservice');
        $list = $server->queryMenus(['parent_id' => 0]);
        $menuList = $server->menuGroup($list);
        //查询登录者信息
        $uid = Yii::$app->user->getId();
        $service = Yii::createObject('userservice');
        $user = $service->getUserById($uid);
        return $this->render('@app/views/layouts/_menus', ['menus' => $menuList, 'user' => $user]);*/
        return $this->render('@app/views/layouts/_menus');
    }

}