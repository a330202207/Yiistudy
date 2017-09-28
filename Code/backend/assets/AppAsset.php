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
        'static/layui/css/layui.css',
        'static/css/style.css',
    ];
    public $js = [
        'static/layui/layui.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    /**
     * ------------------------------------------
     * 定义按需加载JS方法，注意加载顺序在最后
     * @param $view \yii\web\View
     * @param $jsfile string
     * ------------------------------------------
     */
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }

    /**
     * ------------------------------------------
     * 定义按需加载css方法，注意加载顺序在最后
     * @param $view \yii\web\View
     * @param $cssfile string
     * ------------------------------------------
     */
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'backend\assets\AppAsset']);
    }
}
