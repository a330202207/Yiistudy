<?php
/**
 * @desc 重写Application,更改加载controller方式
 *          加载顺序按app/controllers
 *                      common/controllers/(xsite|ppsite)
 *                      common/controllers/base
 *          查找controller,直到找到为止，找不到报异常
 *          -----------------
 *          加载顺序的配置 在公共配置main.php的controllerRule
 * @author zouah
 * @date 2017-04-28
 */

namespace common\components;
use Yii;
use yii\base\InvalidConfigException;


/**
 * Class Application
 *
 * @package common\components
 * @property \common\components\AppCurl $http curl请求
 * @property \common\components\GetModel $model Model
 * @property \common\components\Redis $redis redis
 * @property \common\controllers\BaseController $controller redis
 * @property \common\components\Session $mysession
 */
class Application extends \yii\web\Application
{

    public $controllerRule;

    /**
     * @param string $id
     * @return null
     * @throws InvalidConfigException
     */
    public function createControllerByID($id)
    {
        $pos = strrpos($id, '/');
        if ($pos === false) {
            $prefix = '';
            $className = $id;
        } else {
            $prefix = substr($id, 0, $pos + 1);
            $className = substr($id, $pos + 1);
        }

        if (!preg_match('%^[a-z][a-z0-9\\-_]*$%', $className)) {
            return null;
        }
        if ($prefix !== '' && !preg_match('%^[a-z0-9_/]+$%i', $prefix)) {
            return null;
        }
        $className = str_replace(' ', '', ucwords(str_replace('-', ' ', $className))) . 'Controller';

        //规则重写
        $className = $this->findController(Yii::$app->controllerRule,$className,$prefix,0);
        if(empty($className))
        {
            return null;
        }
        //end 规则重写

        if (is_subclass_of($className, 'yii\base\Controller')) {
            $controller = Yii::createObject($className, [$id, $this]);
            return get_class($controller) === $className ? $controller : null;
        } elseif (YII_DEBUG) {
            throw new InvalidConfigException("Controller class must extend from \\yii\\base\\Controller.");
        } else {
            return null;
        }
    }

    /**
     * @desc 按层级依次查找controller,直到找到controller
     * @param $routeArr array 需查找的 controller 的层级
     * @param $className string
     * @param $prefix string
     * @param $level int
     * @return string $className
     */
    public function findController($routeArr,$className,$prefix,$level)
    {
        if($level >= count($routeArr))
        {
            return false;
        }
        $newClassName = ltrim($routeArr[$level] . '\\' . str_replace('/', '\\', $prefix)  . $className, '\\');
        if (strpos($newClassName, '-') !== false || !class_exists($newClassName))
        {
            return $this->findController($routeArr,$className,$prefix,++$level);
        }
        else
        {
            return $newClassName;
        }
    }
}