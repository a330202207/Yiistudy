<?php
namespace common\components;
use common\helpers\UrlHelp;
use Yii;
use yii\helpers\Url;

/**
 * Class UrlManager
 * @package common\components
 * @desc 重写类，对路由解析和生成url路径做一些扩展
 */

class UrlManager extends \yii\web\UrlManager
{

    public $ruleConfig = ['class' => 'common\components\UrlRule'];

    /**
     * @desc url不需要编码
     * @param array|string $params
     * @return string
     */
    public function createUrl($params)
    {
        return urldecode(parent::createUrl($params)); // TODO: Change the autogenerated stub
    }

    /**
     * @desc 重写请求解析，如果路由规则中suffix='/',则进行第二次匹配，匹配url后面无/的
     * Parses the user request.
     * @param Request $request the request component
     * @return array|boolean the route and the associated parameters. The latter is always empty
     * if [[enablePrettyUrl]] is false. False is returned if the current request cannot be successfully parsed.
     */
    public function parseRequest($request)
    {
        if ($this->enablePrettyUrl) {

//            // 检测如果当前路由需要重定向，则根据配置参数跳转
//            if (isset(Yii::$app->params['redirect'][$pathInfo])) {
//                $param = Yii::$app->params['redirect'][$pathInfo];
//                return Yii::$app->getResponse()->redirect($param['url'], $param['code'])->send();
//            }
            /* @var $rule \common\components\UrlRule */
            foreach ($this->rules as $rule) {
                if (($result = $rule->parseRequest($this, $request)) !== false) {
                    return $result;
                }
            }
            /* +++++++++++++ 重写部分, 如果上面的规则没成匹配成功，则再匹配一次，url加"/" 后对路由的suffix为"/" 的进行匹配,匹配成功则301跳转++++++++++++++++ */
            $pathInfo = $request->getPathInfo();
            $request->setPathInfo($pathInfo . '/');
            foreach ($this->rules as $rule) {
                if($rule->suffix == '/')
                {
                    if (($result = $rule->parseRequest($this, $request)) !== false) {
                        if($result[1])
                        {
                            array_unshift($result[1],$result[0]);
                            $param =  $result[1];
                        }
                        else
                        {
                            $param[0] = $result[0];
                        }
                        return Yii::$app->getResponse()->redirect($this->createUrl($param),301)->send();
                    }
                }
            }
            /* +++++++++++++ 重写部分end ++++++++++++++++ */

            if ($this->enableStrictParsing) {
                return false;
            }

            Yii::trace('No matching URL rules. Using default URL parsing logic.', __METHOD__);

            $suffix = (string) $this->suffix;
            if ($suffix !== '' && $pathInfo !== '') {
                $n = strlen($this->suffix);
                if (substr_compare($pathInfo, $this->suffix, -$n, $n) === 0) {
                    $pathInfo = substr($pathInfo, 0, -$n);
                    if ($pathInfo === '') {
                        // suffix alone is not allowed
                        return false;
                    }
                } else {
                    // suffix doesn't match
                    return false;
                }
            }

            return [$pathInfo, []];
        } else {
            Yii::trace('Pretty URL not enabled. Using default URL parsing logic.', __METHOD__);
            $route = $request->getQueryParam($this->routeParam, '');
            if (is_array($route)) {
                $route = '';
            }

            return [(string) $route, []];
        }
    }
}