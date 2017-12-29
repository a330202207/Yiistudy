<?php
return [
    'website' => 10,
    'client' => 10,
    'cookDomain' => 'chicuu.com',
    'googleTag' => 'GTM-M85BXP',
    'defaultCoun' => 'CN',
    'stylegalleryCookieUniqueKey' => 'stylegallery',
    'staticRoute' =>'//static.chicuu.com/chicuu',
    'imgHost' => 'https://img.tttcdn.com',
    'imagesHasClip' => true, //图片是否有裁剪 true 会在域名中加入clip
    'imageSize' => [
        'origin' => 'origin', // 源图：origin--1000x1000
        'goods' => 'goods',  // 产品图：goods--720x1000
        'large' => 'large', // 大图：large --首页推荐位图--592x814 （560x770） 598
        'medium' => 'medium', // 中等图：medium --推荐位图--292x402 （228x314）296
        'grid'   => 'grid',  // 列表：grid　--列表图---435x598
        'thumb'  => 'thumb', // 缩略图：thumb---96x132
    ],
    'imgVersion' => 20171212,
    'cartImgWidth' => 72,//购物车图片宽度
    'cartImgHeight' => 72,//购物车图片高度
    'homeDailyDealsImgHeight' => 228,//首页daily deals 图片高度
    'homeDailyDealsImgWidth' => 228,//首页daily deals 图片宽度
    'styleGalleryMediumImgSize' => 437,//晒图图片中等尺寸
    'styleGallerySmallImgSize' => 230,//晒图图片小尺寸
    'homeBestSellersBigImgHeight' => 814,//首页BestSellers大图图片高度
    'homeBestSellersBigImgWidth' => 592,//首页BestSellers大图图片宽度
    'homeBestSellersSmallImgHeight' => 402,//首页BestSellers小图图片高度
    'homeBestSellersSmallImgWidth' => 292,//首页BestSellers小图图片宽度
    'homeStyleGalleryBigImgHeight' => 736,//首页StyleGallery大图图片高度
    'homeStyleGalleryBigImgWidth' => 598,//首页StyleGallery大图图片宽度
    'homeStyleGallerySmallImgHeight' => 364,//首页BestSellers小图图片高度
    'homeStyleGallerySmallImgWidth' => 296,//首页BestSellers小图图片宽度


    //业务数据
    'androidAppLink' => 'https://at.umeng.com/WHLD0r',
    'iosAppLink' => 'https://itunes.apple.com/cn/app/chicuu-fashion-shopping/id1219147186?mt=8',
    'copyRight' => 'Copyright © 2018 chicuu INC. All Rights Reserved.',//备案号
    'onlineChat' => 'http://tb.53kf.com/code/client/10132799/1',//53kf 客服链接
    'addThisSrc' => 'https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-532965a902fc0807',//分享this链接
    'styleGalleryList' => 'homeStyleGalleryList',

    //功能开关
    'on-off' => [
        'bannerHomeSlide' => true,      //首页滑动广告条
        'bannerHomeMiddle' => true,     //首页中间广告条
        'bannerHomeBottom' => true,     //首页底部广告条
        'cateBanner' => true,           //分类轮播
    ],
    'sortList' => [
        'newest'		=> 'cate.Newest',
        'featured'		=> 'cate.Featured',
        'popular'		=> 'cate.Popular',
        'reviews'		=> 'cate.Reviews',
    ],

    //sns 一件分享
    'snsShare'    => [
        'facebook' => '1313873638628556',
        'twitter' => '707158563110592512',
    ],
];

