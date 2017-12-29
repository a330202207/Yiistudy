<?php
/**
 * 公共常量
 *
 * @param APP_NAME //应用名称                /common/env/public.php
 * @param DOMAIN //域名                    /common/env/public.php
 * @param DOMAIN_SUFFIX //域名后缀                /common/bootstrap.php  /@app/web/index.php
 * @param COMMON_PATH //common路径                      /common/env/public.php
 * @param YII_ENV //YII的环境 dev|test|uat|prod      /common/env/public.php
 *
 * @param WWW_ENV //php环境dev|test|uat|www      /common/config/common/const.hp
 * @param STATIC_ENV //静态环境dev|test|uat|      /common/config/common/const.hp
 * @param STATIC_MIN //js压缩环境 .min               /common/config/common/const.hp
 * @param CURRENCY_ENV //汇率环境 -dev|-test|-uat|     /common/config/common/const.hp
 * @param STATIC_PATH //静态资源路径                  /common/config/common/const.hp
 * @param SITE_TYPE //站点类型    ppsite|xsite      /@app/bootstrap.php
 *
 * @param SYS_PATH //静态资源路径        /common/config/common/bootstrap.hp
 * @param SYS_RUNTIME_PATH //runtime目录         /common/config/common/bootstrap.hp
 *
 * @param STATIC_VERSIONS //静态资源版本号       /@app/const.php
 *
 *
 *
 *
 */
defined('SITE_TYPE') or define('SITE_TYPE', 'Yiistudy');
$yii_env = ['dev' => 'dev', 'test' => 'test', 'uat' => 'uat', 'prod' => 'www'];
$yii_static_env = ['dev' => 'dev', 'test' => 'test', 'uat' => 'uat', 'prod' => ''];
$yii_static_min = ['dev' => '.min', 'test' => '.min', 'uat' => '.min', 'prod' => '.min'];
$yii_currency_env = ['dev' => '-dev', 'test' => '-test', 'uat' => '-uat', 'prod' => ''];

define('WWW_ENV', $yii_env[YII_ENV]);//php环境
define('STATIC_ENV', $yii_static_env[YII_ENV]);//静态环境
define('STATIC_MIN', $yii_static_min[YII_ENV]);//js压缩环境
define('CURRENCY_ENV', $yii_currency_env[YII_ENV]);//汇率环境
defined('STATIC_PATH') or define('STATIC_PATH', '//static' . STATIC_ENV . '.' . APP_NAME . '.' . DOMAIN_SUFFIX);//静态资源路径

return [];