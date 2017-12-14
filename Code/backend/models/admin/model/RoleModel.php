<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Role;


/**
 * Login
 */
class RoleModel extends Role
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['role_name', 'required', 'message' => '请选择{attribute}！'],
        ];
    }

    public function findRoleOne($id)
    {
        return static::findOne(['id' => $id]);
    }

    public function getAllRole()
    {
        return $this->find()->asArray()->all();
    }

    public function authUserRole()
    {

    }

    public function addRole($data)
    {
        $this->setAttributes($data);
        return $this->insert();
    }

    public function updateRole($data)
    {
        $obj = self::findOne($data['id']);
        $obj->setAttributes($data);
        return $obj->save();
    }

    public function deleteOne($id)
    {
        return $this->deleteAll(['id' => $id]);
    }

}
