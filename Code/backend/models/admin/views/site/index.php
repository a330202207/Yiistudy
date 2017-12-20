<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = '菜单管理';
?>
<?= $this->render('_header'); ?>
<?= $this->render('_left_menu'); ?>
<div class="layui-body my-body">
    <div class="layui-tab layui-tab-card my-tab">
        <ul class="layui-tab-title">
            <li class="layui-this" lay-id="1"><span><i class="layui-icon">&#xe638;</i>欢迎页</span></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe id="iframe" name="iframe" lay-filter="demo" src="<?=Url::toRoute(['site/welcome'])?>" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
<?= $this->render('_footer'); ?>