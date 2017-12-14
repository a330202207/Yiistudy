<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Menu;


/**
 * Login
 */
class MenuModel extends Menu
{

    public function findMenuOne($id)
    {
        return static::findOne(['menu_id' => $id]);
    }

    public function getAllMenu()
    {
        return $this->find()->asArray()->all();
    }

    public function authUserRole()
    {

    }

    public function addMenu($data)
    {
        $this->setAttributes($data);
        return $this->insert();
    }

    public function updateMenu($data)
    {
        $obj = self::findOne($data['menu_id']);
        $obj->setAttributes($data);
        return $obj->save();
    }

    public function deleteOne($id)
    {
        return $this->deleteAll(['menu_id' => $id]);
    }

}
