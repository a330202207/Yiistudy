<?php
use yii\helpers\Url;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/menu.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<form class="layui-form layui-form-pane" action="<?=Url::toRoute(['menu/save-action'])?>" method="post">
    <table class="layui-table">
        <colgroup>
            <col width="250">
            <col width="250">
            <col width="100">
            <col width="100">
            <col width="50">
        </colgroup>
        <thead>
        <tr>
            <th>节点名称</th>
            <th>控制器</th>
            <th>排序</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody id="action_list">
        <input type="hidden" name="parent_id" value="<?=$parent_id?>">
        <input name="_csrf-backend" type="hidden" value="<?= Yii::$app->request->csrfToken ?>"/>
        <?php foreach ($data as $value): ?>
            <tr>
                <td><input type="text" name="data[<?= $value['menu_id'] ?>][menu_name]" class="layui-input" value="<?= $value['menu_name'] ?>" /></td>
                <td><input type="text" name="data[<?= $value['menu_id'] ?>][action]" class="layui-input" value="<?= $value['action'] ?>" /></td>
                <td><input type="number" name="data[<?= $value['menu_id'] ?>][sort]" class="layui-input" value="<?= $value['sort'] ?>" /></td>
                <td><input type="checkbox" name="data[<?= $value['menu_id'] ?>][is_show]" value="1" title="是"></td>
                <td><a class="layui-btn layui-btn-mini layui-btn-danger" menu-type="del" href-info="<?= Url::toRoute(['menu/delete', 'menu_id' => $value['menu_id']]) ?>">删除</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        <tr>
            <td colspan="5" style="text-align: center">
                <div class="layui-input-inline">
                    <a class="layui-btn layui-btn-mini" menu-type="add-rows">新增一行</a>
                </div>
            </td>
        </tr>
    </table>
</form>
