<?php
/**
 * 1.在common/controllers/basecontroller.php的beforeAction里注册了init和lang两个js
 * 2.在各个视图或视图片断中可能注册各自的css和js
 * 3.版本号common/static-version.php里
 */
$asset = [//资源文件管理
    'bundles' => [
        'base' => [
            'class' => 'common\components\AppAsset',
            'baseUrl' => STATIC_PATH,
            'css' => [
                APP_NAME . '/css/public.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/jquery-1.9.1.js?V=1',

                APP_NAME . '/js/public.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'index' => [
            'css' => [
                APP_NAME . '/css/index.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/index.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'search' => [
            'css' => [
                APP_NAME . '/css/category.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/category.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'cate' => [
            'css' => [
                APP_NAME . '/css/category.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/category.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'detail' => [
            'css' => [
                'a' => APP_NAME . '/css/product.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/productFilter.min.js?V=' . STATIC_VERSIONS,//压缩js
                APP_NAME . '/js/productReview.min.js?V=' . STATIC_VERSIONS,//压缩js
            ]
        ],
        'flashdeals' => [
            'css' => [
                APP_NAME . '/css/presale.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                // APP_NAME . '/js/javascript/deals_countdown.js?V='.STATIC_VERSIONS,
                APP_NAME . '/js/flashdeals.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'presale' => [
            'css' => [
                APP_NAME . '/css/presale.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/presale.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'clearance' => [
            'css' => [
                APP_NAME . '/css/category.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/category.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'newarrivals' => [
            'css' => [
                APP_NAME . '/css/public.css?V=' . STATIC_VERSIONS,
                APP_NAME . '/css/presale.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/category.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'topsellers' => [
            'css' => [
                APP_NAME . '/css/presale.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/category.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'cms' => [
            'css' => [
                APP_NAME . '/css/cms.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/javascript/cms.js?V=' . STATIC_VERSIONS,
            ],
        ],
        'stylegallery' => [
            'css' => [
                APP_NAME . '/css/sharePic.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/sharePic.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'stylegalleryMyList' => [
            'css' => [
                APP_NAME . '/css/sharePic.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/sharePic.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'stylegalleryUpload' => [
            'css' => [
                APP_NAME . '/css/sharePic.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/sharePic.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'stylegalleryDetails' => [
            'css' => [
                APP_NAME . '/css/sharePic.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/category.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'reviews' => [
            'css' => [
                APP_NAME . '/css/writerReview.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/reviews.min.js?V=' . STATIC_VERSIONS,//压缩js
            ],
        ],
        'login_error' => [
            'css' => [
                APP_NAME . '/acount/css/headFoot.css?V=' . STATIC_VERSIONS,
                APP_NAME . '/acount/css/login.css?V=' . STATIC_VERSIONS,
            ],
            'depends' => []
        ],
        'error' => [
            'css' => [
                APP_NAME . '/css/404.css?V=' . STATIC_VERSIONS,
            ],
            'js' => [
                APP_NAME . '/js/javascript/404.js?V=' . STATIC_VERSIONS,
            ],
        ]
    ],
];

//为每个bundles加上class 和depends
foreach ($asset['bundles'] as $k => $v) {
    if ($k != 'base') {
        if (!isset($v['class'])) {
            $asset['bundles'][$k]['class'] = 'common\components\AppAsset';
        }

        if (!isset($v['depends'])) {
            $asset['bundles'][$k]['depends'] = ['base'];
        }
    }
}


//加载站点的资源,并将css与js、depends、class 直接替换掉
$app_asset_path = APP_PATH . DS . 'config' . DS . 'asset.php';
if (is_file($app_asset_path)) {
    $app_asset = include $app_asset_path;
    $arr = \yii\helpers\ArrayHelper::merge($asset, $app_asset);
    foreach ($arr['bundles'] as $key => $val) {
        foreach ($val as $k => $v) {
            if (!empty($app_asset['bundles'][$key][$k])) {
                $asset['bundles'][$key][$k] = $app_asset['bundles'][$key][$k];
            }
        }
        if (empty($asset['bundles'][$key])) {
            $asset['bundles'][$key] = $app_asset['bundles'][$key];
        }
    }
}
return $asset;