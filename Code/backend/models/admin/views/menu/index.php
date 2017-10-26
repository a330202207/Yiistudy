<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = '菜单管理';
\backend\assets\AppAsset::register($this);
//$this->registerJsFile('@web/static/admin/dialog.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<div class="layui-tab-item layui-show">
    <div class="my-btn-box">
         <span class="fr">
    <!--                        <a class="layui-btn btn-add btn-default" id="btn-add" href="--><?//=Url::toRoute(['menu/add'])?><!--">添加模块/主菜单</a>-->
            <a class="layui-btn btn-add btn-default" dialog-type="load" href-info="<?=Url::toRoute(['menu/save'])?>">添加模块/主菜单</a>
        </span>
    </div>
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th>标题</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($menu as $vo):?>
            <tr>
                <td><?=$vo['menu_name']?></td>
                <td>
                    <div class="layui-input-inline">
                        <input type="text" name="sort" class="layui-input" value="<?=$vo['sort']?>">
                    </div>
                </td>
                <td>
                    <a class="layui-btn layui-btn-mini" href="<?=Url::toRoute(['menu/add', 'menu_id' => $vo['menu_id']])?>">添加子菜单</a>
                    <a class="layui-btn layui-btn-mini layui-btn-normal" href="<?=Url::toRoute(['menu/edit', 'menu_id' => $vo['menu_id']])?>">编辑</a>
                    <a class="layui-btn layui-btn-mini layui-btn-danger" href="<?=Url::toRoute(['menu/delete', 'menu_id' => $vo['menu_id']])?>">删除</a>
                </td>
            </tr>
            <?php if(!empty($vo['_child'])):?>
                <?php foreach($vo['_child'] as $v):?>
                    <tr>
                        <td><?=$v['menu_name']?></td>
                        <td>
                            <div class="layui-input-inline">
                                <input type="text" name="sort" class="layui-input" value="<?=$v['sort'] ?>">
                            </div>
                        </td>
                        <td>
                            <a class="layui-btn layui-btn-mini" href="<?=Url::toRoute(['menu/add', 'menu_id' => $v['menu_id']])?>">添加子菜单</a>
                            <a class="layui-btn layui-btn-mini layui-btn-normal" href="<?=Url::toRoute(['menu/edit','id'=>$v['menu_id']])?>">编辑</a>
                            <a class="layui-btn layui-btn-mini layui-btn-danger" href="<?=Url::toRoute(['menu/delete','id'=>$v['menu_id']])?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
