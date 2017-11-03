<?php
use yii\helpers\Url;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/auth.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['auth/save'])?>" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">角色名</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
</form>