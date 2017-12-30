<?php
/**
 * @desc Curl基础交互类 ,有5种请求方法，增查options,header数据，超时时间是3秒，如果超时，会有错误日志，并且在uat和prod环境中，错误日志会发送邮件到指定邮箱，具体查看共公配置components->log
 * @author zouah
 */
namespace common\components;

use Yii;
use yii\base\Exception;
use yii\base\Object;
use common\helpers\TTHelp;
use yii\helpers\VarDumper;

class Curl extends Object
{
    protected $_method = 'GET';
    protected $_api = null;
    protected $_url = null;
    protected $_options = array();
    protected $_data = null;
    protected $_ip = null;
    protected $_port = 80;
    public $hosts = [];//设置hosts IP


    /** @var $_header array 自定义请求头信息 */
    protected $_header = [];
    /** @var $_response object 结果 */
    protected $_response = null;
    /** @var $_responseCode int 结果代码 */
    protected $_responseCode = null;

    /**
     * @var array default curl options
     * Default curl options
     */
    protected $_defaultOptions = [];

    /**
     * Total reset of options, responses, etc.
     *
     * @return $this
     */
    public function reset()
    {
        $this->_method = 'GET';
        $this->_api = null;
        $this->_url = null;
        $this->_options = array();
        $this->_data = null;
        $this->_ip = null;
        $this->_port = 80;
        $this->_header = [];
        $this->_response = null;
        $this->_responseCode = null;
        $this->_defaultOptions = array(
            CURLOPT_USERAGENT => 'TOMTOP-Curl-Agent',
            CURLOPT_TIMEOUT => 3,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
        );
        return $this;
    }


    /**
     * 添加默认参数
     *
     * @param array $params
     *
     * @return array $params
     */
    protected function _setDefParams($params)
    {
        array_key_exists('lang', $params) && !is_numeric($params['lang']) && $params['lang'] = TTHelp::getConfigByKey($params['lang'], 'langIds');
        return array_merge(TTHelp::getDefParams(), $params);
    }

    /**
     * @desc 获取请求参数
     * @return array
     */
    public function getParams()
    {
        if (in_array(strtoupper($this->_method), ['GET', 'DELETE'])) {
            $tmp = explode('&', $this->_data);
            foreach ($tmp as $k => $v) {
                list($key, $value) = explode('=', $v);
                $params[$key] = $value;
            }
        } else {
            $params = $this->_data;
        }
        return $params;
    }


    /**
     * 设置 curl ip映射
     * @param string $ip
     * @return static
     */
    public function setIp($ip)
    {
        //设置值
        $this->_ip = $ip;
        $this->_ip = strstr(':', $ip) ? $this->_ip : $this->_ip . ':80';
        $this->setOption(CURLOPT_PROXY, $this->_ip);

        //返回本身
        return $this;
    }

    /**
     * @desc 在dev,test 环境中 设置默认IP
     *       IP设置优先级如下
     *           1.取外部调用setIP($ip,$port)设置的IP($this->_ip为空)
     *           2.根据配置文件设置默认IP
     * @return boolean | static
     *
     **/
    protected function _setDefIp()
    {
        if (in_array(YII_ENV, ['dev', 'test']) && empty($this->_ip) && !empty(current($this->hosts))) {
            $apiUrlArr = parse_url($this->_url);
            $apiUrl = $apiUrlArr['scheme'] . '://' . $apiUrlArr['host'];
            $apiHostKey = array_search($apiUrl, Yii::$app->params['hosts']);
            if (empty($apiHostKey)) {
                return false;
            }
            if (array_key_exists($apiHostKey, $this->hosts)) {
                return $this->setIp($this->hosts[$apiHostKey]);
            }
            if (array_key_exists('all', $this->hosts)) {
                return $this->setIp($this->hosts['all']);
            }
            return false;
        }
    }

    /**
     * @desc 拼接Url
     * @param $params [api,params,urlParams]
     * @return string
     */
    public function resolveApi($params)
    {
        if (!is_array($params)) {
            $tmp = $params;
            $params = [];
            $params['api'] = $tmp;
        }
        $url = Yii::$app->params['actions'][$params['api']];
        $this->_api = $params['api'];

        //替换
        if (isset($params['params']) && is_array($params['params'])) {
            foreach ($params['params'] as $key => $val) {
                $url = str_replace('{' . $key . '}', $val, $url);
            }
        }
        //拼接到url
        if (isset($params['urlParams']) && is_array($params['urlParams'])) {
            $params['urlParams'] = http_build_query($params['urlParams']);
            $url .= '?' . $params['urlParams'];
        }

        return $url;
    }

    /**
     * @desc set header头
     * @param $arr array
     *          [
     *              key1=>value1,
     *              key2=>value2
     *          ]
     * @return static
     */
    public function setHeader($arr)
    {
        if (isset($arr) && is_array($arr)) {
            foreach ($arr as $key => $val) {
                $this->_header[] = $key . ":" . $val;
            }
        }
        return $this;
    }

    /**
     * @desc get Header
     * @return array 返回数组
     */
    public function getHeader()
    {
        $arr = [];
        if (empty($this->_header)) {
            return false;
        }
        foreach ($this->_header as $v) {
            list($key, $value) = explode(':', $v);
            $arr[$key] = $value;
        }
        return $arr;
    }


    /**
     * Start performing GET-HTTP-Request
     *
     * @param string | array $api
     * @param array $data
     *
     * @return static
     */
    public function get($api, $data = [])
    {
        $this->reset();
        $url = $this->resolveApi($api);
        $data = $this->_setDefParams($data);

        if (is_array($data) && !empty($data)) {
            $data = http_build_query($data);
            $url .= '?' . $data;
        }
        $this->_method = 'GET';
        $this->_url = $url;
        $this->_data = $data;
        return $this;
    }


    /**
     * Start performing POST-HTTP-Request
     *
     * @param string $api
     * @param array $data
     *
     * @return static
     */
    public function post($api, $data = array())
    {
        $this->reset();
        $url = $this->resolveApi($api);
        $this->_method = 'POST';
        $this->_url = $url;
        $data = $this->_setDefParams($data);
        $this->_data = $data;
        $this->setOption(CURLOPT_POST, true);
        $this->setOption(CURLOPT_POSTFIELDS, $this->_data);
        return $this;
    }

    /**
     * Start performing POST-HTTP-Request
     *
     * @param string $api
     * @param array $data
     *
     * @return static
     */
    public function json($api, $data = array(), $isDefault = true)
    {
        $this->reset();
        $url = $this->resolveApi($api);
        $data = is_array($data) && $isDefault ? $this->_setDefParams($data) : $data;
        $data = is_array($data) ? json_encode($data) : $data;
        $this->setHeader([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen($data)
        ]);
        $this->_method = 'POST';
        $this->_url = $url;
        $this->_data = $data;
        $this->setOption(CURLOPT_POST, true);
        $this->setOption(CURLOPT_POSTFIELDS, $this->_data);
        return $this;
    }


    /**
     * Start performing PUT-HTTP-Request
     *
     * @param string $api
     * @param array $data
     *
     * @return static
     */
    public function put($api, $data = array())
    {
        $this->reset();
        $url = $this->resolveApi($api);
        $data = is_array($data) ? $this->_setDefParams($data) : $data;
        $data = is_array($data) ? json_encode($data) : $data;
        $this->setHeader([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen($data)
        ]);
        $this->_method = 'PUT';
        $this->_url = $url;
        $this->_data = $data;
        $this->setOption(CURLOPT_POST, true);
        $this->setOption(CURLOPT_POSTFIELDS, $this->_data);
        return $this;
    }

    /**
     * Start performing DELETE-HTTP-Request
     *
     * @author zouah
     * @date 2017-03-30
     * @param string $api
     * @param array $data
     *
     * @return static
     */
    public function delete($api, $data = array())
    {
        $this->reset();
        $url = $this->resolveApi($api);
        $data = $this->_setDefParams($data);
        if (is_array($data) && !empty($data)) {
            $data = http_build_query($data);
            $url .= '?' . $data;
        }
        $this->_method = 'DELETE';
        $this->_url = $url;
        $this->_data = $data;
        return $this;
    }


    /**
     * Set curl option
     *
     * @param string $key
     * @param mixed $value
     *
     * @return static
     */
    public function setOption($key, $value)
    {
        //set value
        if (array_key_exists($key, $this->_defaultOptions) && $key !== CURLOPT_WRITEFUNCTION) {
            $this->_defaultOptions[$key] = $value;
        } else {
            $this->_options[$key] = $value;
        }

        //return self
        return $this;
    }


    /**
     * Unset a single curl option
     *
     * @param string $key
     *
     * @return static
     */
    public function unsetOption($key)
    {
        //reset a single option if its set already
        if (isset($this->_options[$key])) {
            unset($this->_options[$key]);
        }

        return $this;
    }


    /**
     * Return merged curl options and keep keys!
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->_options + $this->_defaultOptions;
    }

    /**
     * Performs HTTP request
     * @throws Exception if request failed
     *
     * @return mixed
     */
    protected function _httpRequest()
    {

        //set request type and writer function
        $this->setOption(CURLOPT_CUSTOMREQUEST, strtoupper($this->_method));

        //设置默认ip
        $this->_setDefIp();

        if (!empty($this->_header)) {
            $this->setOption(CURLOPT_HTTPHEADER, $this->_header);
        }

        //check if method is head and set no body
        if ($this->_method === 'HEAD') {
            $this->setOption(CURLOPT_NOBODY, true);
            $this->unsetOption(CURLOPT_WRITEFUNCTION);
        }

        $curl = curl_init($this->_url);
        curl_setopt_array($curl, $this->getOptions());
        $body = curl_exec($curl);

        //retrieve response code
        $this->_responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $this->_response = $body;
//        Yii::error('curl request failed ','curl');
        //check if curl was successful
        if (!in_array($this->_responseCode, [200, 201]) || $body === false) {
            $errorInfo = [
                'curl_error' => curl_error($curl),
                'curl_errno' => curl_errno($curl),
                'currUrl' => $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
                'userIp' => TTHelp::getClientIp(),
                'methed' => $this->_method,
                'api' => $this->_api,
                'curl_ip' => $this->_ip,
                'url' => $this->_url,
                'params' => $this->_data,
                'options' => $this->_options,
                'defaultOptions' => $this->_defaultOptions,
                'code' => $this->_responseCode,
                'response' => $this->_response
            ];
            //同一接口api在5分钟之内只报错一次
            $redisKey = Yii::$app->params['redisKey']['curlError'] . $this->_api;
            $redisTime = Yii::$app->params['time']['curlErrorCache'];
            if (empty(Yii::$app->redis->get($redisKey))) {
                //测试和开发环境就不需要发邮件了,对error的categories做一个标识
                Yii::error("curl request failed :" . VarDumper::dumpAsString($errorInfo), 'curl_' . YII_ENV);
                Yii::$app->redis->set($redisKey, $this->_api, $redisTime);
            }
        }

        //stop curl
        curl_close($curl);
    }

    /**
     * @desc 获取结果
     * @return object
     */
    public function data()
    {
        $this->_httpRequest();
        return $this->_response;
    }
}