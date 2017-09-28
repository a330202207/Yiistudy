<?php
namespace backend\models\admin;

use yii\base\Module;
/**
 * admin module definition class
 */
class Admin extends Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\models\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}