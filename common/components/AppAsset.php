<?php
namespace common\components;
use Yii;
use yii\web\AssetBundle;

/**
 * Class AppAsset
 * @package common\components
 * @desc 所有静态资源都统一在这里注册
 *
 */
class AppAsset extends AssetBundle
{
    public $baseUrl = STATIC_PATH;

    /**
     * 将asset bundle 注册到 view 上.
     * @param \yii\web\View $view 将要注册的view对象
     *        string $name 注册对象的名称 该名称可以是类名或者 配置文件中的名称
     *         'assetManager' => [
     *              'bundles' => [
     *                  'chicuu' => [//可以是这个名字
     *                      'class' => 'yii\web\AssetBundle',
     *                      'basePath' => '@webroot/assets',
     *                      'baseUrl' => '@web/assets',
     *                      'js' => ['js/jquery-1.9.1.min.js'],
     *                      ],
     *                  ],
     *              ], 
     * @return static the registered asset bundle instance
     */
    public static function register($view, $name = '')
    {
        return $view->registerAssetBundle($name ? $name : get_called_class());
    }



}
