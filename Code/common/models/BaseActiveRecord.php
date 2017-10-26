<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * 对框架的AR的扩展，所有前台/后台数据模型都继承自该类
 */
class BaseActiveRecord extends ActiveRecord
{
    const STATUS_DISABLED = 0;      //禁用
    const STATUS_ACTIVE   = 10;     //正常
    const STATUS_DELETE   = 1;      //已删除
    const STATUS_NOT_DELETE = 0;    //未删除

    /**
     * 返回失败错误
     */
    public function resLoginCode()
    {
        $errors = $this->getFirstErrors();
        return ['code' => 1, 'err' => $errors[current(array_keys($errors))]];
    }
}