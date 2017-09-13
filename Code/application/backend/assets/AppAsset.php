<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/css/site.css',
        'static/css/H-ui.min.css',
        'static/css/H-ui.admin.css',
        'static/css/Hui-iconfont/1.0.8/iconfont.css',
        'static/css/skin.css',
    ];
    public $js = [
        'static/js/jquery.min.js',
        'static/js/layer/layer.js',
        'static/js/H-ui.min.js',
        'static/js/H-ui.admin.js',
    ];
}
