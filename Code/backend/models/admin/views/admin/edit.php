<?php
use yii\helpers\Url;

?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['admin/save'])?>" method="post">
    <input type="hidden" name="id" value="<?=$admin['id']?>">
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
            <input type="text" name="email" lay-verify="required" value="<?=$admin['email']?>" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item" pane="">
        <label class="layui-form-label">用户状态</label>
        <div class="layui-input-block">
            <input type="radio" name="status" lay-skin="primary" value="10" <?php if($admin['status'] == 10){echo 'checked';}?> title="正常">
            <input type="radio" name="status" lay-skin="primary" value="0" <?php if($admin['status'] == 0){echo 'checked';}?> title="禁用">
        </div>
    </div>
</form>