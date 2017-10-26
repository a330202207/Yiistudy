<?php
namespace backend\models\admin\model;

use Yii;
use backend\model\Log;

/**
 * Login form
 */
class LogModel extends Log
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * 添加登录日志
     */
    public function AddLoginLog($data)
    {
        Yii::$app->db->createCommand()->insert('test_log', $data)->execute();
    }

}
