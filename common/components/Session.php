<?php

namespace common\components;

use Yii;
use yii\base\Object;
use common\helpers\TTHelp;

/**
 * Class Session
 * @package common\components
 * @desc 自定义session,模拟session_id，并将session相关信息存于redis
 */
class Session extends Object
{
    protected $sessionId;

    public function init()
    {
        parent::init();
        $this->start();
    }

    /**
     * @desc 模拟session开启
     */
    public function start()
    {
        $sessionId = TTHelp::getCookie(Yii::$app->params['cookies']['userid']);
        if (!$sessionId) {
            $sessionId = self::createUniqueId();
            TTHelp::setCookie(Yii::$app->params['cookies']['userid'], $sessionId, 3600 * 24 * 365);
        }
        $this->sessionId = $sessionId;
    }

    /**
     * @desc 生成rediskey
     * @param $name string
     * @return string
     */
    private function _createRedisKey($name)
    {
        return $this->sessionId . '_' . Yii::$app->params['website'] . '_' . $name;

    }

    /**
     * @desc 存入
     * @param $name
     * @param $value
     * @param $expire
     */
    public function set($name, $value, $expire = 3600)
    {
        if (!$this->sessionId) {
            $this->start();
        }
        Yii::$app->redis->set($this->_createRedisKey($name), $value, $expire);
    }

    /**
     * @desc 取出
     * @param $name
     * @return bool
     */
    public function get($name)
    {
        if (!$this->sessionId) {
            $this->start();
        }
        $value = Yii::$app->redis->get($this->_createRedisKey($name));
        return $value ? $value : false;
    }

    /**
     * @desc 删除
     * @param $name string
     * @return boolean
     */
    public function delete($name)
    {
        if (!$this->sessionId) {
            return false;
        }
        $value = Yii::$app->redis->delete($this->_createRedisKey($name));
        return $value ? $value : false;
    }


    /**
     * @desc 生产唯一字符串
     * @return string
     */
    public static function createUniqueId()
    {
        return date('YmdHis') . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    }
}
