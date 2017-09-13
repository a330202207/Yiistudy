<?php

//环境配置
$iniFile = php_ini_loaded_file();
$iniVarsArr = parse_ini_file($iniFile, true);
$iniEnv = 'prod';
if(isset($iniVarsArr['PHP']['env']))
{
    $iniEnv = $iniVarsArr['PHP']['env'];
}

defined('YII_ENV') or define('YII_ENV', $iniEnv);

define('COMMON_PATH', dirname(__DIR__));

defined('YII_DEBUG') or define('YII_DEBUG', true);
//defined('YII_ENV') or define('YII_ENV', 'dev');

