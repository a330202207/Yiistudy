<?php
namespace common\components;

/**
 * Class Request
 * @package common\components
 * @desc 更改Request的Url
 *          1.将url的目录式多语言替换成参数式 eg: /fr/xxx/xxx  to /xxx/xxx?lang=fr
 *          2.Url开启了简化，路由默认不能识别完整url ,需兼容完整url路径
 *              去掉index.php?r=   eg: /index.php?r=default/index  to  /default/index
 * @author zouah
 */

class Request extends \yii\web\Request
{
    /**
     * @desc 重写获取Requesturi;
     * @return bool|mixed|string
     * @throws \yii\base\InvalidConfigException
     */
    public function resolveRequestUri()
    {
        $url = parent::resolveRequestUri();
        $url = $this->_urlSimplify($url);
        $url = $this->_urlLangSet($url);
        return $url;
    }

    /**
     * @desc 静态化多语言链接转换成参数链接
     *      eg:/fr/xxx/xxx  to /xxx/xxx?lang=fr
     */
    public function _urlLangSet($url)
    {
        if (strpos($url, '?')) {
            $join = '&';
        } else {
            $join = '?';
        }
        preg_match('/^\/[a-z]{2}\//', $url, $arr);
        if ($arr[0]) {
            $lang = substr($arr[0], 1, -1);
            if (!in_array($lang, ['js'])) {
                $url = preg_replace('/^\/[a-z]{2}\//', '', $url);
                $url .= $join . 'lang=' . $lang;
                $_GET['lang'] = $lang;
            }
        }
        return $url;
    }

    /**
     * @desc url简化 去掉index.php?r=
     */
    public function _urlSimplify($url)
    {
        $newUrl = str_replace('index.php?r=', '', $url);
        if ($newUrl != $url) {
            return str_replace('&', '?', $newUrl);
        } else {
            return $url;
        }

    }
}