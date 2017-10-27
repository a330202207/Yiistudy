<?php
use yii\helpers\Url;
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['admin/ajaxauth'])?>" method="post">
    <div class="layui-form-item" pane="">
        <label class="layui-form-label">单选框</label>
        <div class="layui-input-block">
        </div>
    </div>
    <div class="layui-form-item" pane="">
        <?php foreach($data as $val):?>
            <div class="layui-input-block">
                <input type="radio" name="role_name" value="<?=$val['id']?>" title="<?=$val['role_name']?>" checked="">
            </div>
        <?php endforeach;?>
    </div>
</form>