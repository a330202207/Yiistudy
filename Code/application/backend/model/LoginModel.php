<?php
namespace backend\model;

use Yii;
use backend\models\Admin;

/**
 * Login form
 */
class LoginModel extends BaseModel
{
    public $username;           //用户名
    public $password;           //密码
    public $rememberMe = true;  //记住我

    private $_user;             //用户名


    /**
     * 规则
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => '用户名不能为空！'],
            ['password', 'required', 'message' => '密码不能为空！'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * 密码验证
     *
     * @param string $password 密码
     * @param array $params 规则键值对
     */
    public function validatePassword($password, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($password, '用户名或密码错误！');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
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
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }
        return $this->_user;
    }

}
