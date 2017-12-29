<?php
return [
    //基础配置
    'website' => 1,
    'client' => 1,
    'cookDomain' => APP_NAME . '.' . DOMAIN_SUFFIX,
    'siteName' => APP_NAME, //站点名称
    'siteDomain' => APP_NAME . '.' . DOMAIN_SUFFIX,
    'logoTitle' => strtoupper(APP_NAME),
    'logoUrl' => '/img/logo.png',
    'langPrefix' => APP_NAME,//语言前缀
    'mainHost' => 'https://' . WWW_ENV . '.' . APP_NAME . '.' . DOMAIN_SUFFIX, //主站host
    'cartHost' => 'https://cart' . STATIC_ENV . '.' . APP_NAME . '.' . DOMAIN_SUFFIX, //购物车host
    'userHost' => 'https://my' . STATIC_ENV . '.' . APP_NAME . '.' . DOMAIN_SUFFIX, //会员中心域名
    'forumHost' => 'https://forum' . STATIC_ENV . '.' . APP_NAME . '.' . DOMAIN_SUFFIX, //论坛host
    //'imgHost' => '//img.' . APP_NAME . '.' . DOMAIN_SUFFIX,
    'imgHost' => 'https://img.tttcdn.com',
    'googleTag' => '',
    'symbolPosition' => 'left',
    'cartCookiesName' => 'plist', //购物车产品数量
    'cart_count' => 'CART_COUNT',
    'breadCrumbsTopCategory' => false, //面包屑只有顶级类目

    //语言对应的货币,这个要从接口取，有接口时去掉
    'currency' => [   //默认值
        'en' => 'USD',
        'es' => 'EUR',
        'ru' => 'RUB',
        'de' => 'EUR',
        'fr' => 'EUR',
        'it' => 'EUR',
        'jp' => 'JPY',
        'pt' => 'EUR',
        'pl' => 'EUR',
    ],

    'warehouseIdCode'=>[
        '1' 	=> 'CN',
        '2' 	=> 'US',
        '3' 	=> 'UK',
        '4' 	=> 'IT',
        '5' 	=> 'DE',
        '6' 	=> 'FR',
        '7' 	=> 'AU',
        '9' 	=> 'FR-X51',
        '10' 	=> 'FR-X52',
        '11' 	=> 'FR-X53',
        '12' 	=> 'ES',
        '13' 	=> 'NL',
    ],

    'warehouseCodeToCountry' => [//仓库代码对应国家
        'CN'	=> 'China',
        'US'	=> 'United States',
        'UK'	=> 'United Kingdom',
        'IT'	=> 'Italy',
        'DE'	=> 'Germany',
        'FR'	=> 'France',
        'X51'	=> 'France',
        'X52'	=> 'France',
        'X53'	=> 'France',
        'AU'	=> 'Australia',
        'ES'	=> 'Spain',
        'NL'	=> 'Netherlands',
    ],

    'webDefaultLang' => ['en', 'es', 'ru', 'de', 'fr', 'it', 'jp', 'pt', 'pl', 'zh', 'ar'],//网站默认语言排序
    'langIds' => [
        'en' => 1,
        'es' => 2,
        'ru' => 3,
        'de' => 4,
        'fr' => 5,
        'it' => 6,
        'jp' => 7,
        'pt' => 8,
        'pl' => 9,
        'zh' => 10,
        'ar' => 11
    ],

    'warehouseFullName' => [  //仓库对应名称
        'CN' => 'CN Warehouse',
        'UK' => 'UK Warehouse',
        'IT' => 'IT Warehouse',
        'DE' => 'DE Warehouse',
        'US' => 'US Warehouse',
        'FR' => 'FR Warehouse',
        'FR1' => 'FR Warehouse-1',
        'FR2' => 'FR Warehouse-2',
        'FR3' => 'FR Warehouse-3',
        'AU' => 'AU Warehouse',
        'ES' => 'ES Warehouse',
        'NL' => 'NL Warehouse',
    ],

    'cookies' => [
        'ugoupid' => 'TT_UGROUPID',
        'token' => 'TOKEN',
        'login_token' => 'LOGIN_TOKEN',     //登录token
        'tt_lang' => 'TT_LANG',
        'play_lang' => 'PLAY_LANG',
        'tt_curr' => 'TT_CURR',
        'tt_coun' => 'TT_COUN',
        'tt_uuemail' => 'TT_UUEMAIL',
        'groupId' => 'TT_UGROUPID',
        'country' => 'country',
        'webHistory' => 'WEB-history',
        'userid' => 'USERID_COOKIE_NAME',        //类似sessionId
        'tt_redirect_url' => 'TT_REDIRECT_URL',
        'tt_redirect_from' => 'TT_REDIRECT_FROM',
        'tt_redirect_param' => 'TT_REDIRECT_PARAM',
    ],

    //redis缓存键
    'redisKey' => [
        'code' => 'TT_CODE',       //验证码
        'backUrl' => 'backUrl',     //登录后返回url
        'curlError' => 'curlError', //curl请求出错
        'curlTokenError' => 'curlTokenError',   //curl请求有token登录判断返回信息报错
    ],
    //cache 缓存键
    'cacheKey' => [
        'curl' => 'curl',
        'cate' => 'cate',
    ],
    //时间
    'time' => [
        'default' => 3600,
        'curlCache' => 3600,
        'curlErrorCache' => 86400,   //curl报错时间，同一api在1天之内只报错一次
        'cateCache' => 3600,
    ],
    'defaultLang' => 'en',    //默认语言
    'defaultCurrency' => 'USD',//默认货币
    'defaultSymbol' => 'US$',//默认货币符号

    //分页配置
    'page' => 1,
    'pageSize' => 10,

    //cookie
    'cookExpire' => '3600',
    'cookPath' => '/',

    //商品销售状态 1：常售  2：停售  3：下架  40：预售 -10禁售
    'productStatus' => [
        'normal' => 1,
        'halt' => 2,
        'soldout' => 3,
        'presell' => 40,
        'lock' => -10,
    ],

    //图片大小配置
    'imagesHasClip' => false, //图片是否有裁剪 true 会在域名中加入clip
    'productListImgHeight' => 220, //商品列表页图片高度
    'productListImgWidth' => 220, //商品列表页图片宽度
    'productDetailMediumImgHeight' => 500, //商品详情页放大镜中等图片高度
    'productDetailMediumImgWidth' => 500, //商品详情页放大镜中等图片宽度
    'productDetailSmallImgHeight' => 60, //商品详情页放大镜小图高度
    'productDetailSmallImgWidth' => 60, //商品详情页放大镜小图宽度
    'productDetailLargeImgHeight' => 2000, //商品详情页放大镜图高度
    'productDetailLargeImgWidth' => 2000, //商品详情页放大镜图宽度
    'productReviewImgHeight' => 377, //评论列表图片高度
    'productReviewImgWidth' => 377, //评论列表图片宽度
    'cartImgWidth' => 60,//购物车图片宽度
    'cartImgHeight' => 60,//购物车图片高度
    'homeDailyDealsImgHeight' => 377,//首页daily deals 图片高度
    'homeDailyDealsImgWidth' => 377,//首页daily deals 图片宽度

    //'awsAccessKey' => 'AKIAJA5WRIZRQ3VB4GKQ',//亚马逊上传key
    //'awsSecretKey' => 'C+JB7PnZsyUNFF9HLJYuBhjqlsiDtc/bnhdEoqY8',//亚马逊上传key
    'awsAccessKey' => 'AKIAJWQWR7JULJXJEPQA',//亚马逊上传key
    'awsSecretKey' => '2TNXY3A2zG5+rBM77d0kyhHPHgJy1vQh0psStp/N',//亚马逊上传key
    'share_code' => '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-532965a902fc0807',//第三方分享code
    'shippingToken' => '077b075f-c0b4-4ffb-bb07-5fc0b4fffb8c',//shipping接口token
    //'shippingToken' => 'test',

    // 301 重定向
    'redirect' => [],

    //程序逻辑相关配置
    //twitter
    'twitter' => '/login/twitter-url',
    'productMaxPrice' => 10000,


    //功能开关
    'on-off' => [
        'warehouse' => false,   //本地仓库信息
        'categoryBg' => true,   //导航分类背景
        'bannerTop' => true,    //顶部广告
        'bannerBottom' => false,    //底部广告
        'bannerRight' => true,   //右侧广告
        'hotKeyWord' => false,  //搜索关键词列表
        'thirdLogin' => true,   //第三方登录链接
    ],

    'priceRange' => [
        'priceRange1' => 'Under $50',
        'priceRange2' => '$50-$100',
        'priceRange3' => '$100-$200',
        'priceRange4' => '$200-$500',
        'priceRange5' => '$500+',
    ],

];
