<?php
use yii\helpers\Url;
\backend\assets\AppAsset::register($this);
//$this->registerJsFile('@web/static/admin/auth.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['auth/save-auth'])?>" method="post">
    <input type="hidden" value="<?=$role_id?>" name="role_id">
    <?php foreach ($menu as $var):?>
        <div class="layui-form-item">
            <?php if($var['parent_id'] == 0 && $var['is_show'] == 1):?>
                <label class="layui-form-label"><?=$var['menu_name']?></label>
            <?php endif;?>
            <?php if(isset($var['_child']) && !empty($var['_child'])):?>
                <div class="layui-input-block">
                    <?php foreach ($var['_child'] as $value):?>
                        <input type="checkbox" name="menus[]" lay-skin="primary" value="<?=$value['menu_id']?>" title="<?= $value['menu_name']?>" <?php if(in_array($value['menu_id'], $role_menus)){ echo 'checked';}?>>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    <?php endforeach;?>
</form>
