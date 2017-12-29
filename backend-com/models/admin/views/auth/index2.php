<?php
use yii\helpers\Url;
?>
<div class="layui-form layui-border-box layui-table-view">
    <div class="layui-table-header">
        <table class="layui-table">
            <thead>
            <tr>
                <th>
                    <div class="layui-table-cell">
                        <span>ID</span>
                    </div>
                </th>
                <th>
                    <div class="layui-table-cell">
                        <span>角色名称</span>
                    </div>
                </th>
                <th>
                    <div class="layui-table-cell">
                        <span>操作</span>
                    </div>
                </th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="layui-table-body">
        <table class="layui-table">
            <tbody>
            <?php foreach ($role as $val):?>
                <tr>
                    <td><div class="layui-table-cell"><?=$val['id']?></div></td>
                    <td><div class="layui-table-cell"><?=$val['role_name']?></div></td>
                    <td>
                        <div class="layui-table-cell">
                            <a href-info="<?=Url::toRoute(['auth/auth'])?>" dialog-type="load" class="layui-btn layui-btn-mini" w="700px">授权</a>
                            <a href-info="<?=Url::toRoute(['auth/edit'])?>" dialog-type="load" w="500px" class="layui-btn layui-btn-mini layui-btn-normal">编辑</a>
                            <a href-info="<?=Url::toRoute(['auth/delete'])?>" class="layui-btn layui-btn-mini layui-btn-danger">删除</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>