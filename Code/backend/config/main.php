<?php

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'backend\models\admin\Admin',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'backend\model\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['admin/site/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],*/
        /* 数据库RBAC权限控制 */
        /*'authManager' => [
            'class' => 'common\components\rbac\DbManager',
        ],*/
        /**
         * 该属性允许你用一个数组定义多个 别名 代替 Yii::setAlias()
         */
//        'aliases' => [],
        /**
         * 通过配置文件附加行为，全局
         */
        /*'as rbac' => [
            'class' => 'backend\behaviors\RbacBehavior',
            'allowActions' => [
                'site/login', 'site/logout', 'public*', 'debug/*', 'gii/*', // 不需要权限检测
            ]
        ],*/
    ],
];
