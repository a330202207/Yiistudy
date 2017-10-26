<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Admin;
use common\models\BackendBaseModel;
use common\models\BaseActiveRecord;

/**
 * Login
 */
class LoginModel extends BaseActiveRecord
{
    public $username;
    public $password;
    public $verifyCode;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'validatePassword'],
            ['username', 'required', 'message' => '用户名不能为空！'],
            ['password', 'required', 'message' => '密码不能为空！'],
            ['rememberMe', 'boolean'],
            ['verifyCode', 'required', 'message' => '验证码不能为空！'],
            ['verifyCode', 'captcha', 'captchaAction' => '/admin/site/captcha' , 'message'  =>'验证码错误！']
        ];
    }

    /**
     * 验证密码
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '密码错误！');
            }
        }
    }

    /**
     * 验证登录
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * 获取用户名
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }
        return $this->_user;
    }

    /**
     * 记录登录
     */
    public function loginLog(){
        $log = new LogModel();
        $data = [
            'username' => $this->username,
            'create_time' => time(),
            'ip' => Yii::$app->request->userIP,
        ];
        $log->AddLoginLog($data);
    }

}
