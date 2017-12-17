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

    public function getAllAction($id)
    {
        return static::findAll(['parent_id' => $id]);
    }

    public function addAction($data)
    {
        $parentId = $data['parent_id'];
        $rows = [];
        foreach ($data['data'] as $value) {
            $rows[] = [
                'parent_id' => $parentId,
                'menu_name' => $value['menu_name'],
                'action' => $value['action'],
                'sort' => $value['sort'],
            ];
        }
        return Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['parent_id', 'menu_name', 'action', 'sort'], $rows)->execute();
    }

    public function updateSort($data)
    {
        foreach ($data as $key => $val) {
            $rows = array(
                'menu_id' => (int) $key,
                'sort' => (int) $val
            );
        }
        return Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['parent_id',  'sort'], $rows)->execute();
    }

}
