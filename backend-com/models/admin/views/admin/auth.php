<?php
use yii\helpers\Url;
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['admin/auth-admin-role'])?>" method="post">
    <input type="hidden" name="id" value="<?=$admin_id?>">
    <input name="_csrf-backend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>"/>
    <div class="layui-form-item">
        <label class="layui-form-label">单选框</label>
    </div>
    <div class="layui-form-item">
        <?php foreach($roles as $val):?>
            <div class="layui-input-block">
                <input type="radio" name="role_id" value="<?=$val['id']?>" title="<?=$val['role_name']?>" <?php if($val['id'] == $role_id){ echo "checked"; }?> >
            </div>
        <?php endforeach;?>
    </div>
</form>