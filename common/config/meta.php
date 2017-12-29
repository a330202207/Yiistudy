<?php
/**
 * @desc pp站公共meta信息的code 和 fromPage 配置,其中categoryId在控制器中设置
 *      fromPage 只在类目相关页有
 *              category ：类目页
 *              product ：详情页
 *              review : 评论页
 *
 * =================== 后台的code ==========================
        类型	备注
  	    stylegallerydetail	晒图详情页
        stylegallery	晒图首页
        deals	deals页面(没有)
        specialdeals	特价招新页
        abcindex	abc索引页（页面暂未有）
        brand	品牌页（页面暂未有）
        superdeals	superdeals页(没有)
        promotion	promotion页(没有)
        clearance	清仓页
        flashdeals	flashdeals页
        presale	预售页
        hot	热卖页
        freeshipping	免邮页(没有)
        newarrivals	新品页
        warehouse	仓库页(没有)
        search	搜索页
        home	首页
        category	类目
 *
 */
return [
    'meta' => [
        //控制器
        'default' => [
            //action defaultCode为该控制器下默认取的code
//            'defaultCode' => '',
            'index' => 'home',
        ],
        'cate' => [
            //如果有fromPage ，将值配置成数据
            'index' => [
                'code' => 'category',
                'fromPage' => 'category'
            ]
        ],
        'detail' => [
            'index' => [
                'code' => 'category',
                'fromPage' => 'product'
            ]
        ],
        'search' => [
            'index' => 'search'
        ],
        'channel' => [
            'presale'  => 'presale',
            'clearance' => 'clearance',
            'specialdeals' => 'specialdeals',
            'newarrivals' => 'newarrivals',
            'topsellers' => 'hot',
            'topsellers-list' => 'hot',
            'flashdeals' => 'flashdeals',
        ],
        'stylegallery' => [
            'index' => 'stylegallery',
            'details' => 'stylegallerydetail'
        ],
        'cms' => [
            'sitemap' => 'sitemap',
        ],
    ]
];
