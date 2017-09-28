<?php

namespace backend\components;

use Yii;
use yii\base\Widget;

class FooterWidget extends Widget
{
    public function run()
    {
        return $this->render('@app/views/layouts/_footers');
    }

}