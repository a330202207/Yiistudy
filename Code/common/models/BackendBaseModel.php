<?php

namespace common\models;

use yii\base\Model;

class BackendBaseModel extends Model
{
    /**
     * 返回失败错误
     */
    public function resLoginCode()
    {
        $errors = $this->getFirstErrors();
        return ['code' => 1, 'err' => $errors[current(array_keys($errors))]];
    }

}