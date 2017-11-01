<?php
use yii\helpers\Url;
use common\helpers\FuncHelper;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/admin.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn layui-btn-danger radius btn-delect" id="btn-delete-all">批量删除</a>
        <a href-info="admin/admin/edit" dialog-type="load" class="layui-btn btn-add btn-default" w="60%" h="60%" lay-event="edit">添加管理员</a>
        <?php // FuncHelper::BA('admin/edit','添加管理员', 'load','btn-add btn-default', '60%','60%')?>
        <a class="layui-btn btn-add btn-default" id="btn-refresh"><i class="layui-icon">&#x1002;</i></a>
    </span>
</div>

<!-- 表格 -->
<div>
    <table id="customer" lay-filter="customer"></table>
</div>
<!-- 表格操作按钮集 -->
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-mini" href-info="<?=Url::toRoute(['admin/edit'])?>" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="delete">删除</a>
    <?php // FuncHelper::BA(['admin/auth','id' => ''],'授权', 'load','layui-btn-mini', '100%','100%')?>
    <?php //FuncHelper::BA(Url::toRoute(['admin/updata']),'更新', 'load','layui-btn-mini layui-btn-normal', '100%','100%')?>
    <?php //FuncHelper::BA(Url::toRoute(['admin/delete']),'删除', 'load','layui-btn-mini layui-btn-danger', '100%','100%')?>
</script>
