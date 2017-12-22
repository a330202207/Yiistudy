<?php
namespace backend\assets;

use yii\web\AssetBundle;

class LayoutAsset extends AssetBundle
{
    /* 全局CSS文件 */
    public $css = [
        'static/layui/css/layui.css',
        'static/css/style.css',
    ];
    /* 全局JS文件 */
    public $js = [
        'static/layui/layui.js',
        'static/js/common.js',
        'static/js/menu.js',
    ];
}
