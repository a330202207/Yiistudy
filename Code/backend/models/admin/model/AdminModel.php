<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Admin;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\rbac\Role;

/**
 * 实现User组件中的身份识别类 参见 yii\web\user
 * This is the model class for table "{{%admin}}".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property string $mobile
 * @property string $create_time
 * @property string $create_ip
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property string $update_time
 * @property integer $status
 */
class AdminModel extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'mobile'], 'required', 'message' => '请输入{attribute}！'],
            ['email', 'email', 'message' => '请输入正确邮箱！'],
            ['username', 'unique', 'message' => '用户名已存在！'],
            ['username', 'string', 'length' => [4, 24], 'tooShort'=> '用户名不能小于4个字符', 'tooLong' => '用户名不能大于24个字符'],
            ['password','string', 'min' => 6, 'tooShort'=> '密码不能小于6个字符'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function findAdminOne($id)
    {
         return static::findOne(['id' => $id]);
    }

    public function findAdminAll($params)
    {
        $data = $this->find()
            ->select('test_admin.*,test_role.role_name')
            ->leftJoin('test_role', '`test_role`.`id` = `test_admin`.`role_id`')
            ->where(['is_del' => self::STATUS_NOT_DELETE])
            ->orderBy('id DESC')
            ->offset($params['page'])
            ->limit($params['limit'])
            ->asArray()
            ->all();
        $res = [
            'code' => 0,
            'msg' => '',
            'count' => $this->find()->count(),
            'data' => $data ? $this->_formatData($data) : []
        ];
        return $res;
    }

    public function insertAdmin($data)
    {
        $this->generateAuthKey();
        $this->setPassword($data['password']);
        $this->setAttributes($data);
        return $this->insert();
    }

    public function updateAdmin($data)
    {
        $obj = self::findOne($data['id']);
        $obj->setAttributes($data);
        return $obj->save();
    }

    public function authAdminRole($data)
    {
        $obj = self::findOne($data['id']);
        $obj->setAttributes($data);
        return $obj->save();
    }

    public function _formatData($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = [
                'id' => $value['id'],
                'username' => $value['username'],
                'mobile' => $value['mobile'],
                'role_name' => $value['role_name'],
                'create_time' => date('Y-m-d H:i', $value['create_time']),
                'last_login_time' => date('Y-m-d H:i', $value['last_login_time']),
                'last_login_ip' => long2ip($value['last_login_ip']),
                'status' => $value['status'],
            ];
        }
        return $data;
    }
}
