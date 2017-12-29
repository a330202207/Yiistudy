<?php
//统一目录分隔符    '/'
define('DS', DIRECTORY_SEPARATOR);

//子站目录名后缀    'com'
defined('DOMAIN_SUFFIX') or define('DOMAIN_SUFFIX', 'com');

//系统目录     'D:\work\xsite\'
define('SYS_PATH', dirname(dirname(dirname(__FILE__))) . DS);

//runtime目录  'D:\work\xsite\chicuu-com\runtime\
define('SYS_RUNTIME_PATH', SYS_PATH . APP_NAME . '-' . DOMAIN_SUFFIX . DS .'runtime' . DS);

//应用目录    'D:\work\xsite\chicuu-com'
define('APP_PATH', SYS_PATH . APP_NAME . '-' . DOMAIN_SUFFIX);

//common目录   'D:\work\xsite\common\'
Yii::setAlias('@common', SYS_PATH . 'common' . DS);

//app目录    'D:\work\xsite\chicuu-com'
Yii::setAlias('@app', SYS_PATH . APP_NAME . '-' . DOMAIN_SUFFIX);