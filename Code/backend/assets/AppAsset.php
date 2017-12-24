<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/web/static';
    public $css = [
        'layui/css/layui.css',
    ];
    public $js = [
//        'js/menu.js',
    ];
    public $depends = [
        'backend\assets\CommonAsset',
    ];

    public $jsOptions = ['position' => View::POS_END];
    public $cssOptions = ['position' => View::POS_HEAD];
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
