<?php
use yii\helpers\Url;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/auth.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['auth/ajaxsave'])?>" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">单选框</label>
        <div class="layui-input-block">
        </div>
    </div>
    <div class="layui-form-item">
        <?php foreach($data as $val):?>
            <div class="layui-input-block">
                <input type="radio" name="role_id" value="<?=$val['id']?>" title="<?=$val['role_name']?>" checked="">
            </div>
        <?php endforeach;?>
    </div>
</form>