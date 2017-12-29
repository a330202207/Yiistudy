<?php
/**
 * @desc 接口域名和接口地址
 */
$host = [
    'base' => 'http://base.api.tomtop.com',
    'img' => 'http://img.api.tomtop.com',
    'member' => 'http://member.api.tomtop.com',
    'product' => 'http://product.api.tomtop.com',
    'advert' => 'http://advert.api.tomtop.com',
    'cart' => 'https://cart' . $yii_static_env[YII_ENV] . '.'.APP_NAME.'.com',
//    'cart' => 'https://carttest.'.APP_NAME.'.com',
    'order' => 'http://order.api.tomtop.com',
    'shipping' => 'http://logistics.api.tomtop.com',
    'loyalty' => 'http://loyalty.api.tomtop.com',
    'comment' => 'http://comment.api.tomtop.com',
    'report' => 'http://report.api.tomtop.com',
    'tt' => 'http://www.tomtop.com',
    'abc' => 'http://newbos' . $yii_static_env[YII_ENV] . '.tomtop-cdn.com',
    'lottery' => 'http://lottery.api.tomtop.com',
    'seo'      => 'http://seo.api.tomtop.com',
];
return [
    //接口地址
    'hosts' => $host,
    'actions' => [

        //baseApi
        'getCountries' => $host['base'] . '/base/country/v1',//获取国家接口
        'getCurrencies' => $host['base'] . '/base/currency/v2',//获取货币接口
        'getLangPkg' => $host['base'] . '/base/resource/v1/map',//获取语言包接口
        'getLangList' => $host['base'] . '/base/language/v2',//获取语言列表接口
        'getShape' => $host['base'] . '/base/shape/v1/map',//获取图片尺寸接口
        'getSystemTime' => $host['base'] . '/base/systemTime/v1',//获取系统时间接口
        'getFootArticle' => $host['base'] . '/base/cms/v1/map',//获取首页底部文章列表
        'getArticleDetails' => $host['base'] . '/base/cms/v1/deails',//获取首页底部文章列表
        'getQaList' => $host['base'] . '/qa/v1/list',//获取QA列表
        'addQa' => $host['base'] . '/qa/v1/add',//添加QA信息
        'addVisitLog' => $host['base'] . '/base/visitLog/v1/add',//用户浏览统计
        'addDistribution' => $host['base'] . '/supplier/v1/apply',//添加招商信息接口
        'getLocalWarehouse' => $host['base'] . '/base/storage/v2',//获取本地仓库接口
        'getParams' => $host['base'] . '/base/parameter/v1/where',//根据条件获取后台配置

        //productApi
        'getListing' => $host['product'] . '/ic/v2/products/{listingId}',//获取Listing 信息
        'getProductsByType' => $host['product'] . '/ic/v3/layout/module/contents',//根据类型获取商品列表接口
        'getCategories' => $host['product'] . '/ic/v2/categories',//获取所有分类接口
        'getCategoryMapPath' => $host['product'] . '/ic/v2/category/map/path',////获取分类跳转地址
        'getCategoryMate' => $host['product'] . '/ic/v1/categories/{cateId}',//获取分类mate接口
        'getProducts' => $host['product'] . '/ic/v3/product/search/category',//获取商品接口
        'addProCollect' =>  $host['member'] . '/collect/v1/product/collect/add',//增加产品收藏
        'getProCollectList' => $host['product'] . '/ic/v1/user/collect',//获取用户产品收藏列表
        'getCollectIdLists' => $host['product'] . '/ic/v1/collect/list',//收藏产品的listingId列表
        'getBreadCrumbs' => $host['product'] . '/ic/v2/bread/{id}',//获取面包屑接口
        'getProductDetails' => $host['product'] . '/ic/v4/product/base',//获取商品详情接口
        'getProductExplain' => $host['product'] . '/ic/v1/product/explain/{type}',//获取商品相关描述
        'getProductTopic' => $host['product'] . '/ic/v1/product/topic',//获取商品相关主题活动
        'getProductHot' => $host['product'] . '/ic/v1/product/hot',//获取热门商品接口
        'getReview' => $host['product'] . '/ic/v1/product/review/{listingId}',//获取评论详情接口
        'getReviewList' => $host['product'] . '/ic/v1/product/review/list',//获取评论列表接口
        'getDailyDeals' => $host['product'] . '/ic/v2/home/dailyDeal',//获取Daily Deals接口
        'getProductPrice' => $host['product'] . '/ic/v1/product/price/{listingId}',//获取商品价格接口
        'getFavoritesNumber' => $host['product'] . '/ic/v2/product/collect/{spu}',//获取商品收藏接口V2
        'getAlsoBought' => $host['product'] . '/ic/v3/product/alsoBought',//获取通常购买的商品推荐接口
        'addProductDropship' => $host['product'] . '/ic/v1/product/dropship/add',//添加产品收藏接口
        'addWholeSaleProduct' => $host['product'] . '/ic/v1/product/wholesale/add',//添加商品WholeSaleProduct接口
        'getViewHistory' => $host['product'] . '/ic/v2/products',//获取商品浏览记录接口
        'getAlsoViewed' => $host['product'] . '/ic/v3/product/alsoViewed',//详情页通常浏览的商品推荐接口
        'getProductsByKeyword' => $host['product'] . '/ic/v3/product/search/keyword/{keyword}',//通过关键字获取商品接口
        'getShoppingCart' => $host['product'] . '/ic/v2/product/shoppingCart',//获取购物车基本信息
        'getHashCode' => $host['product'] . '/ic/v1/hashcode/{listingId}',//获取购物车hashCode代码
        'getYouMayLike' => $host['product'] . '/ic/v3/product/youMayLike',//获取你可能喜欢的商品
        'getProductReviews' => $host['product'] . '/ic/v1/product/review/{listingId}',//获取商品评论接口
        'getRecProducts' => $host['product'] . '/ic/v1/product/hotsellers',//获取推荐商品数据接口
        'getPromotionDeals' => $host['product'] . '/ic/v1/product/deals',//获取促销deals商品接口
        'getChannelProducts' => $host['product'] . '/ic/v1/product/{channel}',//获取频道页商品列表
        'getNewChannelProducts' => $host['product'] . '/ic/v2/product/{channel}',//获取频道页商品列表v2版
        'getSuperdeals' => $host['product'] . '/ic/v1/product/super/deals',//获取superdeals商品列表
        'getSpecialdeals' => $host['product'] . '/ic/v1/product/special/new',//获取superdeals商品列表
        'getFlashdeals' => $host['product'] . '/ic/v1/product/flash/deals',//获取superdeals商品列表
        'getDealsCategory' => $host['product'] . '/ic/v1/product/show/category',//获取频道页商品列表
        'newArrivalsReleaseDate' => $host['product'] . '/ic/v1/product/new/agg',//新品频道页聚合时间属性
        'getReviewAndStart' => $host['product'] . '/ic/v1/product/review/start',//获取评论和星级
        'getChannelTopsellersHomeProducts' => $host['product'] . '/ic/v1/product/topsellers/home',//获取top-sellers商品列表
        'getChannelTopsellersProducts' => $host['product'] . '/ic/v1/product/topsellers',//获取top-sellers-list商品列表
        'getChannelNewProducts' => $host['product'] . '/ic/v2/product/new',//获取new-arrivals商品列表
        'getChannelFreeshippingProducts' => $host['product'] . '/ic/v1/product/freeshipping',//获取freeshipping商品列表
        'getChannelDealsProducts' => $host['product'] . '/ic/v1/product/deals',//获取hotdeals商品列表
        'getChannelPresaleProducts' => $host['product'] . '/ic/v1/product/presale',//获取presale商品列表
        'getChannelClearanceProducts' => $host['product'] . '/ic/v1/product/clearance',//获取clearance商品列表
        'activity' => $host['product'] . '/ic/v1/product/activity',//获取限时限量活动
        'getRedirectcPath' => $host['product'] . '/ic/v1/category/map/path',//获取分类跳转地址
        'getBundlingFree' => $host['product'] . '/ic/v1/product/bundling/free',//获取捆绑销售商品(自由搭配)
        'getBundlingFixed' => $host['product'] . '/ic/v1/product/bundling/fixed',//获取捆绑销售商品(固定搭配)
        'keyword_autocomplete' => $host['product'] . '/ic/v1/home/search/keyword_autocomplete',//搜索自动补全
        'addKeyWordScore' => $host['product'] . '/ic/v1/recomment/keyword/push',//关键字添加评分记录接口
        'relatedPurchases' => $host['product'] . '/ic/v1/abc/search/keyword/recommend',//索引关键字Related Purchases
        'getProductSeo' => $host['product'] . '/ic/v1/product/seo/{listingid}',//获取商品SEO信息
        'getCategorySeo' => $host['product'] . '/ic/v1/categories/{categoryId}',//获取分类SEO信息
        'getHomeRecProducts' => $host['product'] . '/ic/v4/layout/module/contents',//获取首页选项卡推荐商品接口
        'getHomeReviews' => $host['product'] . '/ic/v1/product/home/review',//获取首页评论接口
        'getSpecificCategoires' => $host['product'] . '/ic/v1/categories',//获取特定分类接口
//        'getLocalWarehouse' => $host['product'] . '/ic/v1/categories/storage',//获取本地仓库接口
        'getPageMeta' => $host['product'] . '/ic/v1/base/layout',//获取单页SEO信息接口
        'getMainProductBySku' => $host['product'] . '/ic/v1/product/key',//根据商品SKU确定是否主商品
        'getSeoTemplate' => $host['advert'] . '/ic/v1/seo/template',//获取SEO模板
        'getKeywordSplit' => $host['product'] . '/ic/v1/product/search/keyword/split',//模糊搜索
        'getPriceRange' => $host['product'] . '/ic/v1/price/range/poly',//价格区间
        'getProductFileMap' => '{#memberApi#}/brand/product/file/map',//产品说明书


        //memberApi
        'getUserAddrs' => $host['member'] . '/member/v1/billaddress/{uuid}',//获取用户地址列表
        'userRegister' => $host['member'] . '/user/v1/doRegister',//用户注册接口
        'userLogin' => $host['member'] . '/user/v1/doLogin',//用户登录接口
        'userLogout' => $host['member'] . '/user/v1/logout',//退出登录
        'googleSign' => $host['member'] . '/other/google',//获取谷歌用户登录信息接口
        'faceBookSign' => $host['member'] . '/other/facebook',//获取FaceBook用户登录信息接口
        'vkSign' => $host['member'] . '/other/vk',//获取Vk用户登录信息接口
        'twitterSign' => $host['member'] . '/other/twitter',//获取twitter用户登录信息接口
        'twitterUrl' => $host['member'] . '/other/v1/signIn/twitter',//获取twitter用户登录Url
        'forgetPassword' => $host['member'] . '/findpwd/v1/send',//忘记密码(发送邮件)接口
        'changePassword' => $host['member'] . '/findpwd/v1/alert',//忘记密码(修改密码)接口
        'mailSubscribe' => $host['member'] . '/member/v1/subscribe',//邮件订阅接口
        'mailActivate' => $host['member'] . '/member/v1/activate',//用户通过邮件URL链接激活接口
        'accountAttache' => $host['member'] . '/member/v1/center/base/attache',//根据必要参数获取会员附属信息（如：爱好时长，经验水平）
        'userBasicInfo' => $host['member'] . '/member/v1/memberbase',//获取会员基础信息
        'UserSignInfo' => $host['member'] . '/user/v1/curruser',//获取用户登录信息接口
        'profileInfo' => $host['member'] . '/member/v2/center/profile',
        'getUserStatus' => $host['member'] . '/member/v1/center/count',//用户统计信息
        'getUserEmail' => $host['member'] . '/member/v1/email/{UUID}',//获取用户邮箱
        'sendContactMsg' => $host['member'] . '/brand/sendMassage',//发送contact信息
        'MessageList' => $host['member'] . '/message/v1/list',//获取用户站内信列表
        'MessageDetail' => $host['member'] . '/message/v1/dtl/{id}',//获取用户站内信详情
        'setMessageRead' => $host['member'] . '/message/v1/batch/read',//标记已读站内信
        'deleteMessage' => $host['member'] . '/message/v1/batch/delete',//删除已读站内信
        'getAddressLists' => $host['member'] . '/member/v1/address/list',//获取地址列表
        'addAddress' => $host['member'] . '/member/v1/address/add',//新增地址
        'editAddress' => $host['member'] . '/member/v1/address/update',//修改地址
        'deleteAddress' => $host['member'] . '/member/v1/address/delete',//删除地址
        'setDefaultAddress' => $host['member'] . '/member/v1/address/setting',//设为默认地址
        'getAddressDetail' => $host['member'] . '/member/v1/address/dtl',//获取地址信息
        'thirdLoginUrl' => $host['member'] . '/other/v1/signIn',//获取地址信息
        'getReviewInfo' => $host['member'] . '/review/v2/review',//获取评论信息
        'getReviewDetail' => $host['member'] . '/review/v1/review',
        'editReview' => $host['member'] . '/member/v1/review/update',//修改评论
        'addReview' => $host['member'] . '/member/v1/review/add',//发表评论
        'deleteReview' => $host['member'] . '/member/v1/review/delete/{rid}',//删除评论
        'reviewStatus' => $host['member'] . '/member/v2/reviews/statistics',// 获取评论统计
        'getOneReview' => $host['member'] . '/review/v1/review',// 获取评论统计
        'deleteProCollect' => $host['member'] . '/collect/v1/collects/delete',//删除收藏的产品
        'pushUserPhoto' => $host['member'] . '/image/v1/upload_cdn',//头像推到cdn
        'editProfile' => $host['member'] . '/member/v2/center/profile/update',//修改个人信息
        'editPassword' => $host['member'] . '/findpwd/v2/pwd/update',//修改密码
        'synchronizeToServer' => $host['member'] . '/member/v1/memberphoto/update',//图片同步到服务器
        'memberphoto' => $host['member'] . '/member/v1/memberphoto',//获取个人头像信息
        'getPpHotDeals' => $host['member'] . '/brand/getHotDeals',//获取品牌站hotdeals接口
        'getDriverProducts' => $host['member'] . '/brand/findDriveProduct',//获取有驱动的商品
        'getContactSubjects' => $host['member'] . '/brand/feedBackSubject',//品牌站获取contact主题
        'getEvaluationProducts' => $host['member'] . '/brand/getProductEvaluation',//获取评价商品列表
        'getMemberGroupInfo' => $host['member'] . '/activity/v2/group/info/',//获取用户分组信息
        'sendActivateEmail' => $host['member'] . '/member/v1/activate/email', //用户中心发送激活邮件
        'addWholesaleInquiry' => $host['member'] . '/ws/v1/add/',//添加Wholesale Inquiry接口

        //cartApi
        'getOrderLists' => $host['cart'] . '/order/orderlist',//获取订单列表
        'getOrderDetail' => $host['cart'] . '/order/orderdetail',//订单详情
        'getMyOrderStatus' => $host['cart'] . '/order/status',//订单统计信息
        'delOrder' => $host['cart'] . '/order/delorders',//删除订单
        'getPreOrderMum' => $host['order'] .'/order/quantity/{listingId}',//获取预售订单数
        'getShoppingCartActivity' => $host['cart'] . '/cart-api/price',//获取购物车基本信息  @deprecate
        'getShoppingCartActivityV2' => $host['cart'] . '/cart-api/v2/price',//获取购物车基本信息(包含捆绑活动商品) @deprecate
        'getShoppingNewCartActivity' => $host['cart'] . '/api/cart/find',//获取新购物车基本信息(包含捆绑活动商品)
        'addNewCart' => $host['cart'] . '/api/cart/pushs',//增加购物车
        'delNewCart' => $host['cart'] . '/api/cart/remove',//删除购物车

        //loyaltyApi
        'getMyCouponLists' => $host['loyalty'] . '/loyalty/v1/coupon/{type}/{uuid}',//获取coupon列表
        'getMyPointsLists' => $host['loyalty'] . '/loyalty/v1/point/{type}/{uuid}',//获取points列表
        'getPointsCount' => $host['loyalty'] . '/loyalty/v1/point',//获取point统计
        'getPointsInfo' => $host['loyalty'] . '/loyalty/v1/userPointInfo',//获取用户points统计信息

        //advertApi
        'getAdvert' => $host['advert'] . '/ic/v1/base/banners_content',//获取广告接口
        'getCategoryBg' => $host['advert'] . '/ic/v1/category/background',//获取分类背景

        //ttApi
        'getTTHome' => $host['tt'],

        //shippingApi
        'getShipping' => $host['shipping'] . '/shipping',
        'getShippingCountry' => $host['shipping'] . '/shipping/listingId/country',//获取配送国家

        //style gallery
        'getWinnerStyleGallery' => $host['comment'] . '/bp/v1/winner/img',//获取上个月获奖晒图
        'getCategoryStyleGallery' => $host['comment'] . '/bp/v1/photo/category/list',//获取晒图分类
        'getListStyleGallery' => $host['comment'] . '/bp/v1/photo/printimg/list',//获取晒图列表
        'getDetailsStyleGallery' => $host['comment'] . '/bp/v1/photo/product/dtl', //获取晒图详情
        'getDetailsProductsStyleGallery' => $host['product'] . '/ic/v3/products',//获取晒图详情页的产品列表
        'getMyListStyleGallery' => $host['comment'] . '/bp/v1/my/photo',//获取我的列表
        'delStyleGallery' => $host['comment'] . '/bp/v1/my/photo/delete',//删除晒图
        'uploadStyleGallery' => $host['comment'] . '/bp/v1/my/photo/upload',//上传图片
        'addLikeStyleGallery' => $host['comment'] . '/bp/v1/photo/like/add',//点赞
        'getListByListingIdsStyleGallery' => $host['comment'] . '/bp/v1/photo/product',//商品详情页获取晒图列表
        'checkSkuStyleGallery' => $host['product'] . '/ic/v1/blue/print/product',//校验sku


        //comment评论v2版 2016/11/19
        'getCommentList' => $host['comment'] . '/comment/v1/list',//获取商品评论列表
        'getCommentPhotosList' => $host['comment'] . '/comment/v1/photos',//获取商品图片评论列表
        'getCommentVideosList' => $host['comment'] . '/comment/v1/videos',//获取商品视频评论列表
        'commentSelectIsUseful' => $host['comment'] . '/comment/v1/selectIsUseful',//点击选择评论是否有用
        'commentPermitAdd' => $host['comment'] . '/comment/v1/permitAdd',//判断当前登录用户是否可以对某商品添加评论
        'commentPermitAppend' => $host['comment'] . '/comment/v1/permitAppend',//判断当前登录用户是否可以对某商品追加评论
        'commentAdd' => $host['comment'] . '/comment/v1/comment/add',//添加评论
        'commentAppend' => $host['comment'] . '/comment/v1/comment/append',//追加评论
        'commentAppendDetails' => $host['comment'] . '/comment/v1/append/details',//追加评论页面获取已添加的评论详情
        'commentLabels' => $host['comment'] . '/comment/v1/product/labels',//商品底级类目所有的评论标签
        'getMyComments' => $host['comment'] . '/comment/v1/append/details',//追加评论页面获取已添加的评论详情
        'seoLetterNavigation' => $host['abc'] . '/seo/letter/navigation',//ABC索引词字母表
        'seoAbcInfoFront' => $host['abc'] . '/seo/abc/info/front',//ABC索引词
        'seoProductRecommend' => $host['abc'] . '/seo/product/recommend',//ABC索引词-产品推荐
        'getHotKeyword'      => $host['seo'] . '/seo/v1/hot/words', //获取搜索关键词
        'getPrizeList' => $host['lottery'] . '/lottery/v1/award/list',//抽奖奖品列表
        'getLotteryTimes' => $host['lottery'] . '/lottery/v1/lottery/time',//剩余抽奖次数
        'setLottery' => $host['lottery'] . '/lottery/v1/lottery',//setLottery
        'shareCoupon' => $host['loyalty'] . '/loyalty/share/v1/coupon/sentGift',//分享送优惠券
    ]
];