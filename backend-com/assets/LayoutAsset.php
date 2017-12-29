<?php
namespace backend\assets;

use yii\web\AssetBundle;

class LayoutAsset extends AssetBundle
{
    public $sourcePath = '@backend/web/static';
    /* 全局CSS文件 */
    public $css = [
        'css/style.css',
    ];
    /* 全局JS文件 */
    public $js = [
        'js/common.js',
    ];
    public $depends = [
        'backend\assets\CommonAsset',
    ];
}
