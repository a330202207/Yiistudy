<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Admin;
use common\models\BackendBaseModel;
use common\models\BaseActiveRecord;

/**
 * RoleMaps
 */
class RoleMapsModel extends BaseActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role_maps}}';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'menu_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => 'Role Id',
            'menu_id' => 'Menu Id',
        ];
    }

    public function getMenuIdsByRoleId($role_id)
    {
        $roleId = (int) $role_id;
        $datas = $this->find()->where(['role_id' => $roleId])->all();
        $res = [];
        foreach($datas as $val){
            $res[$val['menu_id']] = $val['menu_id'];
        }
        return $res;
    }

    public function saveMenuIdsByRoleId($data)
    {
        $roleId = $data['role_id'];
        $menusIds = $data['menus'];
        $rows = [];
        foreach ($menusIds as $val) {
            $rows[] = [
                'role_id' => $roleId,
                'menu_id' => $val
            ];
        }
        return Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['role_id', 'menu_id'], $rows)->execute();
    }



}
