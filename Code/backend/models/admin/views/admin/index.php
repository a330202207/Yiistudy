<?php
use yii\helpers\Url;
use common\helpers\FuncHelper;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/admin.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn layui-btn-danger radius btn-delect" id="btn-delete-all">批量删除</a>
<!--        <a href-info="admin/admin/edit" dialog-type="load" class="layui-btn btn-add btn-default" w="60%" h="60%" lay-event="edit">添加管理员</a>-->
        <a class="layui-btn btn-add btn-default" dialog-type="load" href-info="<?=Url::toRoute(['admin/edit'])?>" w="60%" h="60%" lay-event="edit">添加管理员</a>
        <?php // FuncHelper::BA('admin/edit','添加管理员', 'load','btn-add btn-default', '60%','60%')?>
        <a class="layui-btn btn-add btn-default" id="btn-refresh"><i class="layui-icon">&#x1002;</i></a>
    </span>
</div>

<!-- 表格 -->
<div>
    <table id="customer" lay-filter="customer"></table>
</div>

<script type="text/html" id="statusTpl">
    {{# var status = d.status }}
    {{# if (status == '10'){ }}
    <span class="layui-badge layui-bg-blue" style="font-size:13px">启用</span>
    {{# } else{ }}
    <span class="layui-badge" style="font-size:13px">禁用</span>
    {{# } }}
</script>

<!-- 表格操作按钮集 -->
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-mini" href-info="<?=Url::toRoute(['admin/auth'])?>" lay-event="auth">授权</a>
    <a class="layui-btn layui-btn-mini layui-btn-normal" href-info="<?=Url::toRoute(['admin/edit'])?>" w="60%" h="60%" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" href-info="<?=Url::toRoute(['admin/delete'])?>" lay-event="delete">删除</a>
</script>
