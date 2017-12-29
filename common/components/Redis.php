<?php

namespace common\components;

use Yii;
use yii\base\Object;

/**
 * Class Redis
 * @package common\components
 * @desc 重写redis类，所有方法都调用RedisCluster的方法
 *          调用Yii::$app->redis
 * @author zouah
 */
class Redis extends Object
{
    protected $redis;
    public $hosts;

    public function init()
    {
        parent::init();
        if ($this->redis === null)
        {
            $this->redis = new \RedisCluster(null,$this->hosts);
        }
    }

    /**
     * @desc 重写__call()，调用$this->redis的方法
     * @auto zouah
     * @date 2017-04-17
     */
    public function __call($name,$args)
    {
        return call_user_func_array([$this->redis,$name],$args);
    }
}