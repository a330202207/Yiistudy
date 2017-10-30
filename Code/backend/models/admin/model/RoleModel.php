<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Role;


/**
 * Login
 */
class RoleModel extends Role
{

    public function getAllRole()
    {
        $data = $this->find()->asArray()->all();
        $res = [
            'code' => 0,
            'msg' => '',
            'data' => $data ? $data : []
        ];
        return $data;
    }

    public function authUserRole()
    {

    }

}
