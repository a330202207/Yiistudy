<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Menu;


/**
 * Login
 */
class MenuModel extends Menu
{

    public function getMenuOne($id)
    {
        return static::findOne(['menu_id' => $id]);
    }


    //获取顶级菜单列表
    static public function getAllTopMenu()
    {
        $menu = self::find()->where(['parent_id' => 0])->asArray()->all();
/*        $res = [
            'code' => 1,
            'msg' => '',
            'data' => $menu,
        ];*/
        return $menu;
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
        return $this->find()->where(['parent_id' => $id])->orderBy('sort ASC')->asArray()->all();
    }

    public function addAction($data)
    {
        $parentId = $data['parent_id'];
        $rows = [];
        foreach ($data['data'] as $value) {
            $rows[] = [
                'parent_id' => (int)$parentId,
                'menu_name' => htmlspecialchars($value['menu_name'], ENT_QUOTES, 'UTF-8'),
                'action' => htmlspecialchars($value['action'], ENT_QUOTES, 'UTF-8'),
                'sort' => (int)$value['sort'],
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
