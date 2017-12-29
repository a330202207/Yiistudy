<?php
$urlRules = [
    /*+++首页多语言+++*/
    '/' => 'default/index',
    '/index.html' => 'default/index',

    //验证码
    'default/code' => 'captcha/code',

    '/index.cfm' => '', //I站,HOME站

    //js配置文件
    [
        'pattern' => '<controller:js>/<action>',
        'route' => '<controller>/<action>',
        'suffix' => '.js',
    ],

    /*+++用户中心多语言(`account/xxx`只是生成路由的标示 无实际控制器相对应)+++*/
    '/member/home' => 'account/index',//个人中心链接
    '/checkout/history' => 'order/index',//我的订单链接
    '/loyalty/myCoupon/list' => 'wallet/coupon',//我的优惠券链接
    '/loyalty/points/myPoints' => 'wallet/point',//我的积分链接
    '/member/registerupdate' => 'profile/index',//账户设置链接
    '/member/login' => 'member/login',//登录链接
    '/member/index' => 'member/index',//注册链接
    '/forget-password.html' => 'member/forgetpass',//找回密码链接
    '/loyalty/subscribe' => 'loyalty/subscribe',//订阅地址
    '/change-password.html' => 'member/changepass',//修改密码链接
    '/interaction/wishlist' => 'wish/index',//收藏地址
    '/checkout/order/tracking' => 'site/ordertrack',//订单跟踪链接
    /*+++用户中心多语言+++*/

    /*+++ABC索引+++*/
    [
        'pattern' => '/product-directory/<letter:(.*)>/<p:[0-9]+>',
        'route' => 'cms/abc',
        'suffix' => '.html',
        'defaults' => ['letter' => '', 'p' => '']
    ],
//    '/product-directory.html' => 'cms/abc',
//    '/product-directory/<letter:[0-9]>.html' => 'cms/abc',
//    '/product-directory/<letter:[0-9]>/<p:[0-9]+>.html' => 'cms/abc',
//    '/product-directory/<letter:(.*)>/<p:[0-9]+>.html' => 'cms/abc',
//    '/product-directory/<letter:(.*)>.html' => 'cms/abc',

    //第三方登录
    '/sign-facebook' => 'login/facebook',
    '/sign-google' => 'login/google',
    '/sign-vk' => 'login/vk',
    '/sign-twitter' => 'login/twitter',


    /*+++文章页多语言+++*/
    '/site-map.html' => 'cms/sitemap',
    '/appdownload.html' => 'cms/appdownload',

    //I站
    '/galerie_photos.html' => '',
    '/showroom.html' => '',
    '/promise.html' => '',
    '/devis_gratuit.html' => '',
    '/contact' => '',
    '/sav.html' => '',
    '/help/<url:[a-zA-Z-&\s]+>.html' => '',

    /*+++订单查询重写+++*/
    '/track-order.html' => 'track/index',

    /*+++注册成功邮件返回 +++*/
    '/user-activate.html' => 'member/useractivate',
    '/my.html' => 'account/index',

    /*+++搜索页重写+++*/
    [
        'pattern' => '/search/<keyword:([^/]*)>/<p:[\d]+>',
        'route' => 'search/index',
        'suffix' => '.html',
        'defaults' => ['p' => '']
    ],
    [
        'pattern' => '/search/<keyword:([^/]*)>',
        'route' => 'search/index',
        'suffix' => '.html',
    ],

    /*+++On-site search+++*/
    [
        'pattern' => '<isbuy:buy>/<keyword:([^/]*)>/<p:[\d]+>',
        'route' => 'search/index',
        'suffix' => '.html',
        'defaults' => ['p' => '']
    ],
    [
        'pattern' => '<isbuy:buy>/<keyword:([^/]*)>',
        'route' => 'search/index',
        'suffix' => '.html',
    ],

    /*+++频道页多语言+++*/
    ['pattern' => '/deals/<p:[0-9]+>', 'route' => 'channel/deals', 'suffix' => '.html'],
    ['pattern' => '/top-sellers/<p:[0-9]+>', 'route' => 'channel/topsellers', 'suffix' => '.html'],
    ['pattern' => '/top-sellers-list/<p:[0-9]+>', 'route' => 'channel/topsellers-list', 'suffix' => '.html'],
    ['pattern' => '/new-arrivals/<p:[0-9]+>', 'route' => 'channel/newarrivals', 'suffix' => '.html'],
    ['pattern' => '/clearance/<p:[0-9]+>', 'route' => 'channel/clearance', 'suffix' => '.html'],
    ['pattern' => '/presale/<p:[0-9]+>', 'route' => 'channel/presale', 'suffix' => '.html'],
    ['pattern' => '/free-shipping/<p:[0-9]+>', 'route' => 'channel/freeshipping', 'suffix' => '.html'],
    ['pattern' => '/superdeals/<p:[0-9]+>', 'route' => 'channel/superdeals', 'suffix' => '.html'],
    ['pattern' => '/specialdeals/<p:[0-9]+>', 'route' => 'channel/specialdeals', 'suffix' => '.html'],
    ['pattern' => '/flashdeals/<p:[0-9]+>', 'route' => 'channel/flashdeals', 'suffix' => '.html'],

    ['pattern' => '/deals/', 'route' => 'channel/deals', 'suffix' => '/'],
    ['pattern' => '/top-sellers/', 'route' => 'channel/topsellers', 'suffix' => '/'],
    ['pattern' => '/top-sellers-list/', 'route' => 'channel/topsellers-list', 'suffix' => '/'],
    ['pattern' => '/new-arrivals/', 'route' => 'channel/newarrivals', 'suffix' => '/'],
    ['pattern' => '/clearance/', 'route' => 'channel/clearance', 'suffix' => '/'],
    ['pattern' => '/presale/', 'route' => 'channel/presale', 'suffix' => '/'],
    ['pattern' => '/free-shipping/', 'route' => 'channel/freeshipping', 'suffix' => '/'],
    ['pattern' => '/superdeals/', 'route' => 'channel/superdeals', 'suffix' => '/'],
    ['pattern' => '/specialdeals/', 'route' => 'channel/specialdeals', 'suffix' => '/'],
    ['pattern' => '/flashdeals/', 'route' => 'channel/flashdeals', 'suffix' => '/'],

    //晒图页面
    ['pattern' => '/stylegallery/details/<bid:[0-9]+>', 'route' => 'stylegallery/details', 'suffix' => '.html'],

    /*+++faq，商品增加、再次增加评论多语言+++*/
    '/qa/product/<listingId:[a-zA-Z0-9-]+>' => 'detail/faq',
    '<cpath:[a-zA-Z0-9-_]+>/<action:(add|append)>review.html' => 'reviews/<action>',

    /*+++仓库页多语言+++*/
    ['pattern' => '/storage/<depotname:[a-z0-9]{2,3}>/', 'route' => 'cate/storage', 'suffix' => '/'],
    ['pattern' => '/storage/<depotname:[a-z0-9]{2,3}>/<p:[0-9]+>', 'route' => 'cate/storage', 'suffix' => '.html'],

    /*+++分类页多语言+++*/

    ['pattern' => '<cname:[a-zA-Z0-9]{2,}>-<cid:[0-9]+>/<p:[0-9]+>', 'route' => 'cate/index', 'suffix' => '.html'],
    ['pattern' => '<cname:([a-zA-Z0-9]{2,}-)+[a-zA-Z0-9]{2,}>-<cid:[0-9]+>/<p:[0-9]+>', 'route' => 'cate/index', 'suffix' => '.html'],
    ['pattern' => '<cname:[a-zA-Z0-9]{2,}>-<cid:[0-9]+>/', 'route' => 'cate/index', 'suffix' => '/'],
    ['pattern' => '<cname:([a-zA-Z0-9]{2,}-)+[a-zA-Z0-9]{2,}>-<cid:[0-9]+>/', 'route' => 'cate/index', 'suffix' => '/'],


    /*+++商品多语言+++*/
    '<cpath:p-[0-9a-zA-Z-_]+>.html' => 'detail/index',
    '<cpath:[a-z0-9]+-{1,}[0-9]+/p-[0-9a-zA-Z-_]+>.html' => 'detail/index',
    '<cpath:([a-z0-9]+-{1,})+[a-z0-9]+-{1,}[0-9]+/p-[0-9a-zA-Z-_]+>.html' => 'detail/index',
    '<cpath:[a-z0-9]+-{1,}[0-9]+/p_[0-9a-zA-Z-_]+>.html' => 'detail/index',
    '<cpath:([a-z0-9]+-{1,})+[a-z0-9]+-{1,}[0-9]+/p_[0-9a-zA-Z-_]+>.html' => 'detail/index',
    '<cpath:([a-z0-9]+-{1,})+[a-z0-9]+/([a-z0-9]+-{1,})+[0-9]+/p-[0-9a-zA-Z-_]+>.html' => 'detail/index',

    '<cpath:[a-z0-9A-Z-]+/[a-z0-9A-Z-]+/[a-z0-9A-Z-]+/p_[0-9a-zA-Z_]+>.html' => 'detail/oldindex',
    '<cpath:[a-z0-9A-Z-]+/[a-z0-9A-Z-]+/p_[0-9a-zA-Z_]+>.html' => 'detail/oldindex',
    '<cpath:[a-z0-9A-Z-]+/p_[0-9a-zA-Z_]+>.html' => 'detail/oldindex',
    /*+++商品多语言+++*/

    /*+++cms+++*/
    '/<url:[a-zA-Z-&\s]+>.html' => 'cms/details',

];

//合并站点路由配置
$app_urlRules_path = APP_PATH . DS . 'config' . DS . 'url-rules.php';
if (is_file($app_urlRules_path)) {
    $app_urlRules = include $app_urlRules_path;
    $urlRules = \yii\helpers\ArrayHelper::merge($urlRules, $app_urlRules);
}
return array_filter($urlRules);