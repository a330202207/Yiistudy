<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * 后台登录页面资源
 */
class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/fonts.css',
        'static/css/bootstrap.min.css',
        'static/css/uniform.default.min.css',
        'static/css/components.min.css',
        'static/css/login-5.css',
    ];
    public $js = [
        'static/js/jquery.min.js',
        'static/js/bootstrap.min.js',
        'static/js/jquery.uniform.min.js',
        'static/js/jquery.validate.min.js',
        'static/js/jquery.backstretch.min.js',
        'static/js/app.min.js',
        'static/js/login-5.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
