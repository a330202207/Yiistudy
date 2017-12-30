<?php
namespace common\components;

/**
 * Class UrlRule
 * @package common\components
 * @deprecated 重写类，暂时不用
 */
class UrlRule extends \yii\web\UrlRule
{
    /** @var  $urlMode string Url跳转模式 301，302 */
    public $urlMode;

//    /** @var $replace array 替换规则：301,302模式下 pattern 根据替换规则 $replace 替换生成 route*/
//    public $replace = [];

    /**
     * @desc 重载解析请求
     * Parses the given request and returns the corresponding route and parameters.
     * @param UrlManager $manager the URL manager
     * @param Request $request the request component
     * @return array|boolean the parsing result. The route and the parameters are returned as an array.
     * If false, it means this rule cannot be used to parse this path info.
     */
    public function parseRequest($manager, $request)
    {
        $route = parent::parseRequest($manager, $request);
        //301,302跳转
        if ($route && in_array($this->urlMode, [301, 302])) {
            if (strpos($route[0], 'http') !== 0) {
                $route[0] = '/' . $route[0];
            }
            \Yii::$app->getResponse()->redirect($route[0], $this->urlMode)->send();
            exit;
        }
        return $route;
    }

    /**
     * @desc 重载生成Url
     * Creates a URL according to the given route and parameters.
     * @param UrlManager $manager the URL manager
     * @param string $route the route. It should not have slashes at the beginning or the end.
     * @param array $params the parameters
     * @return string|boolean the created URL, or false if this rule cannot be used for creating this URL.
     */
    public function createUrl($manager, $route, $params)
    {
        //301,302模式，不生成Url
        if (in_array($this->urlMode, [301, 302])) {
            return false;
        }
        return parent::createUrl($manager, $route, $params);
    }
}