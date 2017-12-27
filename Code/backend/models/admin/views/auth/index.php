<?php
use yii\helpers\Url;
?>
<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn btn-add btn-default" event-type="add" href-info="<?=Url::toRoute(['auth/edit'])?>" w="30%" h="30%" lay-event="edit">添加角色</a>
    </span>
</div>
<table class="layui-table" lay-data="{url:'/admin/auth/auth', page:false, id:'test', method:'get'}" lay-filter="customer">
    <thead>
        <tr>
            <th lay-data="{field:'id', width:100}">ID</th>
            <th lay-data="{field:'role_name', width:1000}">角色名称</th>
            <th lay-data="{field:'right', width:210, align:'center', toolbar:'#barOption'}">操作</th>
        </tr>
    </thead>
</table>

<!-- 表格操作按钮集 -->
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-mini" href-info="<?=Url::toRoute(['auth/edit-auth'])?>" w="60%" h="60%" lay-event="auth">授权</a>
    <a class="layui-btn layui-btn-mini layui-btn-normal" href-info="<?=Url::toRoute(['auth/edit'])?>" w="30%" h="30%" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" href-info="<?=Url::toRoute(['auth/delete'])?>" lay-event="del">删除</a>
</script>