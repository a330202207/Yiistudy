<?php

namespace backend\components;


use yii\base\Widget;
use Yii;

class HeaderWidget extends Widget
{


    public function run()
    {

        return $this->render('@app/views/layouts/_headers');
    }

}