<?php
use yii\helpers\Url;
use common\helpers\FuncHelper;
\backend\assets\AppAsset::register($this);
$this->registerJsFile('@web/static/admin/admin.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn layui-btn-danger radius btn-delect" id="btn-delete-all">批量删除</a>
        <?= FuncHelper::BA(Url::toRoute(['admin/edit','id'=>'{{d.id}}']),'添加管理员', 'load','btn-add btn-default', '100%','100%')?>
        <a class="layui-btn btn-add btn-default" id="btn-refresh"><i class="layui-icon">&#x1002;</i></a>
    </span>
</div>

<!-- 表格 -->
<div id="dateTable"></div>
<!-- 表格操作按钮集 -->
<script type="text/html" id="barOption">
    <?= FuncHelper::BA(['admin/auth','id' => '{{d.id}}'],'授权', 'load','layui-btn-mini', '100%','100%')?>
    <?= FuncHelper::BA(Url::toRoute(['admin/updata']),'更新', 'load','layui-btn-mini layui-btn-normal', '100%','100%')?>
    <?= FuncHelper::BA(Url::toRoute(['admin/delete']),'删除', 'load','layui-btn-mini layui-btn-danger', '100%','100%')?>
</script>