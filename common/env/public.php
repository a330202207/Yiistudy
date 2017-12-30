<?php

namespace common\env;

use common\components\Application;  //重写Application类

date_default_timezone_set("UTC");//设置时区

//设置根路径
define('WEB_PATH', __DIR__);    //全局变量WEB_PATH:'D:\work\xsite\common\env'

//获取站名
$host = $_SERVER['HTTP_HOST'];
preg_match('/[a-zA-Z]*\.([a-zA-Z]+)\.[a-zA-Z]*/', $host, $res);
define('APP_NAME', $res[1]);        //全局变量APP_NAME:'chicuu'
define('DOMAIN', '//' . $host);     //全局变量DOMAIN:'//dev.chicuu.com'


//php.ini里有个env=dev参数，获取环境
$iniFile = php_ini_loaded_file();                   //获取已加载的 php.ini 文件
$iniVarsArr = parse_ini_file($iniFile, true);       //解析php.ini 文件，true为返回一个多维数组，包括了配置文件中每一节的名称和设置
$iniEnv = 'prod';
if (in_array($iniVarsArr['PHP']['env'], ['dev', 'test', 'uat', 'prod'])) {
    $iniEnv = $iniVarsArr['PHP']['env'];
}
/**
 * dev：  开发
 * test: 测试
 * uat： 准正式
 * prod：正式
 */
/** @defined YII_ENV string dev|test|uat|prod */
defined('YII_ENV') or define('YII_ENV', $iniEnv);   //全局变量YII_ENV:'dev'

define('COMMON_PATH', dirname(__DIR__));            //全局变量COMMON_PATH:'D:\work\xsite\common'

//匹配当前环境
switch (YII_ENV) {
    case 'dev':
        define('YII_DEBUG', true);                          //开启YII_DEBUG(调试状态)
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);      //设置错误级别 显示除去E_NOTICE E_WARNING 之外的所有错误信息
        break;
    case 'test':
        define('YII_DEBUG', true);
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        break;
    case 'uat':
        error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        break;
    case 'prod':
        error_reporting(0);                                 //关闭所有PHP错误报告
        break;
    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1); // EXIT_ERROR
}

//关闭YII_DEBUG(调试状态)
defined('YII_DEBUG') or define('YII_DEBUG', false);

require(__DIR__ . '/../../vendor/autoload.php');            //使用composer的类自动加载功能
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');    //Yii的工具类文件
require(__DIR__ . '/../../common/config/bootstrap.php');    //路径别名

//加载子站config目录下bootstrap.php文件
require(__DIR__ . '/../../' . APP_NAME . '-' . DOMAIN_SUFFIX . '/config/bootstrap.php');

//加载公共main.php
$config = require(__DIR__ . '/../../common/config/main.php');
$application = new Application($config);        //分析完成
//$application = new yii\web\Application($config);
$application->run();                            //加载主要组件，运行默认控制器
