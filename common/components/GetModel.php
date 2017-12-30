<?php

namespace common\components;

/**
 * Class getModel
 * @package common\components
 * @property \common\components\BaseModel $base
 * @property \common\models\AccountModel $account
 * @property \common\models\AdvertModel $advert
 * @property \common\models\CartModel $cart
 * @property \common\models\CateModel $cate
 * @property \common\models\ChannelModel $channel
 * @property \common\models\CmsModel $cms
 * @property \common\models\CommonModel $common
 * @property \common\models\InitModel $init
 * @property \common\models\MemberModel $member
 * @property \common\models\ProductModel $product
 * @property \common\models\ProductListModel $productList
 * @property \common\models\QaModel $qa
 * @property \common\models\ReviewModel $review
 * @property \common\models\SearchModel $search
 * @property \common\models\SeoModel $seo
 * @property \common\models\ThirdloginModel $thirdlogin
 * @property \common\models\UserOrderModel $userOrder
 * @property \common\models\StyleGalleryModel $styleGallery
 * @property \common\models\ActivityModel $activity
 * @property \common\models\CurrencyModel $currency
 * @property \common\models\ShippingModel $shipping
 * @property \common\models\WebHistoryModel $webHistory
 * @property \common\models\LotteryModel $lottery
 * @property \common\models\SystemModel $system
 */
class GetModel
{
    /**
     * @param $name
     * @return \common\components\BaseModel
     * @throws \yii\base\InvalidConfigException
     */
    public function __get($name)
    {
        $name = ucfirst($name);
        if (class_exists('common\models\\' . $name . 'Model')) {
            return \Yii::createObject('common\models\\' . $name . 'Model');
        }
        return false;
    }
}