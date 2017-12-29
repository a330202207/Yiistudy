<?php
$jsLangKeysDir = __DIR__ . '/../../../'.APP_NAME.'-'. DOMAIN_SUFFIX .'/config/js-lang-keys.php';

$jsLangKeys = is_file($jsLangKeysDir) ? require($jsLangKeysDir) : [];
$metaDir = __DIR__ . '/../../../'.APP_NAME.'-'. DOMAIN_SUFFIX .'/config/meta.php';

$meta = is_file($metaDir) ? require($metaDir) : [];

$params = \common\helpers\ArrayHelper::merge(
    require(__DIR__ . '/const.php'),
    require(__DIR__ . '/static-version.php'),
    require(__DIR__ . '/host-api.php'),
    require(__DIR__ . '/error-code.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/../../'.APP_NAME.'-'. DOMAIN_SUFFIX .'/config/params.php'),
    require(__DIR__ . '/js-lang-keys.php'),
    $jsLangKeys,
    require(__DIR__ . '/meta.php'),
    $meta
);