<?php
//加载子站config目录下js-lang-keys.php文件
$jsLangKeysDir = __DIR__ . '/../../../'.APP_NAME.'-'. DOMAIN_SUFFIX .'/config/js-lang-keys.php';    //子站js使用的多语言key

$jsLangKeys = is_file($jsLangKeysDir) ? require($jsLangKeysDir) : [];


//加载子站config目录下meta.php文件
$metaDir = __DIR__ . '/../../../'.APP_NAME.'-'. DOMAIN_SUFFIX .'/config/meta.php';  //子站公共meta信息的code

$meta = is_file($metaDir) ? require($metaDir) : [];

$params = \common\helpers\ArrayHelper::merge(
    require(__DIR__ . '/const.php'),            //公共常量(静态)
    require(__DIR__ . '/static-version.php'),   //静态版本号
    require(__DIR__ . '/host-api.php'),         //接口域名和接口地址
    require(__DIR__ . '/error-code.php'),       //接口错误代码对应的多语言
    require(__DIR__ . '/params.php'),           //基础配置
    require(__DIR__ . '/../../'.APP_NAME.'-'. DOMAIN_SUFFIX .'/config/params.php'),     //子站基础配置
    require(__DIR__ . '/js-lang-keys.php'),     //子站js使用的多语言key
    $jsLangKeys,                                //子站js使用的多语言key
    require(__DIR__ . '/meta.php'),             //公共meta信息的code
    $meta                                       //子站公共meta信息的code
);

$asset = require_once(__DIR__ . '/asset.php');          //加载页面资源
$urlRules = require_once(__DIR__ . '/url-rules.php');   //加载页面路由地址
$redis = require_once(__DIR__ . '/redis.php');          //加载redis配置

return [
    'id' => APP_NAME . '-'. DOMAIN_SUFFIX,
    'bootstrap' => ['log','mysession'],           //日志
    'basePath' => '@app',                         //当前应用根目录的绝对物理路径
    'controllerNamespace' => 'app\controllers',
    'controllerRule' => [//按顺序查找controller
        'app\controllers',
        'common\\controllers'
    ],
//    'defaultRoute' => 'default',
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',
    'viewPath' =>  '@common/views',
    'runtimePath' => SYS_RUNTIME_PATH,
    'components' => [
        'view' => [//视图重写寻找路径组件(兼容老站版本)
            'class' => 'common\components\BaseView',
            'theme' =>[
                'pathMap' => [
                    '@common/views' =>'@app/views',
                ],
                'baseUrl' => '@app/views',
            ],
        ],
        'cache' => [//默认使用文件缓存
            'class' => 'yii\caching\FileCache',
            'serializer' => ['igbinary_serialize', 'igbinary_unserialize'],//序列化|反序列化 函数 必须开启php_igbinary扩展
            'cachePath' => '@runtime/cache/', //文件缓存目录
        ],
        'mysession' => [    //改名:在bootstrap启动时，默认名session将启动yii自带的session类
            'class' => 'common\components\Session'
        ],
        'redis' => $redis[YII_ENV],
        'i18n' => [//翻译组件
            'translations' => [
                'app*' => [//app类型的翻译
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => APP_NAME.'.php',
                    ],
                ],
                'common*' => [//common类型的翻译
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'common.php',
                    ],
                ],
            ],
        ],
        'request' => [
            'class' => 'common\components\Request',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => 'yii\web\JsonParser',
            ],
        ],
        'model' => [
            'class' => 'common\components\GetModel'
        ],
        'http'  => [
            'class'=>'common\components\AppCurl',
            'hosts' => [
//                'base'      => '192.168.221.76',
//                'img'       => '192.168.221.76',
//                'member'    => '192.168.221.76',
//                'product'   => '192.168.221.76',
//                'advert'    => '192.168.221.76',
//                'cart'      => '192.168.221.53',
//                'order'     => '192.168.221.76',
//                'loyalty'   => '192.168.221.76',
//                'comment'   => '192.168.221.76',
//                'report'    => '192.168.221.76',
//                'abc'       => '192.168.221.76',
//                'shipping' => '192.168.221.76',
//                'all'       => '192.168.221.76',
            ]
        ],
        'urlManager' => [
            'class' => 'common\components\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'ruleConfig' => [
                'class'=> 'common\components\UrlRule' //路由规则类
            ],
            'rules' => $urlRules,
        ],
        'log' => [              //日志系统
            'targets' => [      //使用文件存储日志
                'file' => [
                    'class' => 'common\components\AppFileTarget',   //文件方式存储日志操作对应操作对象
                    /*
                     定义存储日志信息的级别
                     trace:用于开发调试时记录日志，需要把YII_DEBUG设置为true
                     error:用于记录不可恢复的错误信息
                     warning:用于记录一些警告信息
                     info:用于记录一些系统行为如管理员操作提示
                     */
                    'levels' => ['error', 'warning'],
                    // 'categories' => ['yii\*'],
                ],
                'email' => [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error'],
                    'categories' => ['curl_prod','curl_uat'], //curl 错误只针对uat和prod发邮件
                    'message' => [
                        'from' => ['3178586547@qq.com'],
                        'to' => ['2885542036@qq.com','2853718638@qq.com'],
                        'subject' => $_SERVER['HTTP_HOST'] . ':curl error',
                    ],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' =>false,//false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.qq.com',
                'username' => '3178586547@qq.com',
                'password' => 'xtpvgxiecpfndccb',
                'port' => '465',
                'encryption' => 'ssl',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from' => ['3178586547@qq.com' => 'admin']
            ],
        ],
        'errorHandler' => [
            'class' => 'common\components\ErrorHandler',
            'errorAction' => 'default/error',
        ],
        'assetManager' => $asset,
    ],

    'params' => $params,
];