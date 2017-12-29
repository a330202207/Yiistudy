<?php

namespace common\components;

use Yii;
use yii\base\Component;


/**
 * @desc 接口测试，在common\apitest下写测试数据，每一个接口域名对应一个类，每个接口对应一个方法
 * Class AppTest
 * @package common\components
 * @author zouah
 */
class AppTest extends Component
{
    protected $_http;
    protected $_params;
    public $data;

    /**
     * @desc 获取数据
     * @param $http AppCurl
     */
    public function create($http)
    {
        $this->_http = $http;
        $this->_params = $this->_http->getParams();
    }

    /**
     * @desc 输出数据.
     * @param int $ret 返回的ret的值
     * @return string json数据
     */
    public function output($ret = 1)
    {
        if($ret ==1)
        {
            return json_encode(['ret'=>1,'data'=>$this->data]);
        }
        else
        {
            return json_encode(['ret'=>$ret]);
        }

    }

}