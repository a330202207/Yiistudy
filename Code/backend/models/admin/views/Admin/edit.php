<?php
use yii\helpers\Url;
var_dump($admin);die;
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['admin/save'])?>" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">用户名称</label>
        <div class="layui-input-inline">
            <input type="text" name="username" lay-verify="required" value="<?=$admin['username']?>" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-inline">
            <input type="text" name="password" lay-verify="required" value="" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">电话</label>
        <div class="layui-input-inline">
            <input type="text" name="mobile" lay-verify="required" value="<?=$admin['mobile']?>" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="text" name="email" lay-verify="required" value="<?=$admin['mobile']?>" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" pane="">
        <label class="layui-form-label">用户状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" lay-skin="primary" value="10" <?php if ($admin['mobile'] == 10){?>checked="checked" <?php}?>title="正常">
            <input type="radio" name="status" lay-skin="primary" value="0" <?php if ($admin['mobile'] == 0){?>checked="checked" <?php}?>title="禁用">
        </div>
    </div>
</form>