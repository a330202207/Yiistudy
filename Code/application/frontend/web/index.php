<?php

//环境配置
require(__DIR__ . '/../../common/env/public.php');

require(__DIR__ . '/../../../vendor/autoload.php');
require(__DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/mysql.php'),
    require(__DIR__ . '/../config/main.php')
);

(new yii\web\Application($config))->run();
