<?php
namespace backend\assets;

use yii\web\AssetBundle;

class CommonAsset extends AssetBundle
{
    public $sourcePath = '@backend/web/static';
    /* 全局CSS文件 */
    public $css = [
    ];
    /* 全局JS文件 */
    public $js = [
        'layui/layui.all.js',
        'js/common.js',
        'js/dialog.js',
    ];
}
