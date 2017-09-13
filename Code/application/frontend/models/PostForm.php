<?php

namespace frontend\models;

use yii;
use yii\base\Model;
use common\models\User;

class PostForm extends Model
{
    public $id;
    public $title;
    public $content;
    public $label_img;
    public $cat_id;
    public $tags;

    public $_lastError = "";

    public function rules()
    {
        return [
            [['id', 'title','content', 'cat_id'], 'required'],
            [['id', 'cat_id'], 'integer'],
            ['title', 'string', 'min' => '4', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'summary' => '摘要',
            'content' => '内容',
            'label_img' => '标签图',
            'cat_id' => '分类',
            'tags' => '标签',
        ];
    }

}