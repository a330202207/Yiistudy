<?php
use yii\helpers\Url;
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['auth/save'])?>" method="post">
    <input type="hidden" name="id" value="<?=$auth['id']?>">
    <input name="_csrf-backend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">角色名</label>
        <div class="layui-input-block">
            <input type="text" name="role_name" lay-verify="title" autocomplete="off" value="<?=$auth['role_name']?>" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
</form>