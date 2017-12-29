<?php
use yii\helpers\Url;
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['menu/save'])?>" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
            <input type="hidden" name="parent_id" value="<?//$menu['parent_id'] ? $menu['parent_id']: 0;?>">
            <input type="hidden" name="parent_id" value="<?=$parent_id?>">
            <input type="hidden" name="menu_id" value="<?=$menu['menu_id']?>">
            <input name="_csrf-backend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>"/>
            <input type="text" name="menu_name" lay-verify="required" value="<?=$menu['menu_name']?>" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
<!--    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">选择图标</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
                <button class="layui-btn layui-btn-normal layui-btn-small">选择icon</button>
            </div>
        </div>
    </div>-->
</form>