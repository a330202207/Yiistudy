<?php
$versions =  [
    'chicuu' => '2017122801',
    'default' => '2017122801',
];
$v = $versions[APP_NAME] ? $versions[APP_NAME] : $versions['default'];
define('STATIC_VERSIONS',$v);
?>