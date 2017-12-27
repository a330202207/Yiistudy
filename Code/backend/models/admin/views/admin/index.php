<?php
use yii\helpers\Url;
use common\helpers\FuncHelper;
?>
<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn btn-add btn-default" event-type="add" href-info="<?=Url::toRoute(['admin/edit'])?>" w="60%" h="60%" lay-event="edit">添加管理员</a>
        <a class="layui-btn btn-add btn-default" id="btn-refresh"><i class="layui-icon">&#x1002;</i></a>
    </span>
</div>

<table class="layui-table" lay-data="{height:315, url:'/admin/admin/ajaxgetindexlist', page:false, limit:'10', id:'test', method:'get'}" lay-filter="customer">
    <thead>
        <tr>
            <th lay-data="{field:'id', width:80}">ID</th>
            <th lay-data="{field:'username', width:180}">用户名</th>
            <th lay-data="{field:'mobile', width:150}">手机</th>
            <th lay-data="{field:'role_name', width:150}">角色</th>
            <th lay-data="{field:'mobile', width:120}">手机</th>
            <th lay-data="{field:'last_login_time', width:150}">最后登录时间</th>
            <th lay-data="{field:'last_login_ip', width:120}">最后登录IP</th>
            <th lay-data="{field:'create_time', width:150}">创建时间</th>
            <th lay-data="{field:'status', width:70, templet:'#statusTpl'}">状态</th>
            <th lay-data="{field:'right', width:160, align:'center', toolbar:'#barOption'}">操作</th>
        </tr>
    </thead>
</table>

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
    <a class="layui-btn layui-btn-mini" href-info="<?=Url::toRoute(['admin/edit-auth'])?>" lay-event="auth">授权</a>
    <a class="layui-btn layui-btn-mini layui-btn-normal" href-info="<?=Url::toRoute(['admin/edit'])?>" w="60%" h="60%" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" href-info="<?=Url::toRoute(['admin/delete'])?>" lay-event="del">删除</a>
</script>
