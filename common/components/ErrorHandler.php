<?php
namespace common\components;

use yii\web\HttpException;

/**
 * Class ErrorHandler
 * @package common\components
 * @desc 重写自定义错误,500运行/default/error，404走默认的,两种错误都对有debug有识别
 * @author zouah
 */
class ErrorHandler extends \yii\web\ErrorHandler
{
    public $errorView = '@common/views/' . SITE_TYPE . '/default/500.php';

    public function renderException($exception)
    {
        //404 和dub走这里
        if (YII_DEBUG || $exception instanceof HttpException) {
            parent::renderException($exception);
        } else {
            if (\Yii::$app->request->getIsAjax()) {
                exit(json_encode(array('code' => $exception->getCode(), 'msg' => $exception->getMessage())));
            } else {
                echo \Yii::$app->runAction('default/error500');
                exit();
            }
        }

    }
}
