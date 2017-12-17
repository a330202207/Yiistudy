<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
//$this->title = '菜单管理';
//\backend\assets\AppAsset::register($this);
//$this->registerJsFile('@web/static/admin/dialog.js', ['depends' => ['backend\assets\AppAsset']]);
?>
<div class="layui-tab-item layui-show">
    <div class="my-btn-box">
         <span class="fl">
            <a class="layui-btn btn-add btn-default" lay-event="edit" href-info="<?=Url::toRoute(['menu/edit'])?>">添加模块/主菜单</a>
        </span>
    </div>
    <table class="layui-table" id="data">
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
            <form>
                <?php foreach($menu as $vo):?>
                    <tr>
                        <td><?=$vo['menu_name']?></td>
                        <td><input type="number" name="sort[<?=$vo['menu_id']?>]" class="layui-input" value="<?=$vo['sort']?>" /></td>
                        <td>
                            <a class="layui-btn layui-btn-mini" lay-event="edit" href-info="<?=Url::toRoute(['menu/edit', 'parent_id' => $vo['menu_id']])?>">添加子菜单</a>
                            <a class="layui-btn layui-btn-mini layui-btn-normal" lay-event="edit" href-info="<?=Url::toRoute(['menu/edit', 'menu_id' => $vo['menu_id']])?>">编辑</a>
                            <a class="layui-btn layui-btn-mini layui-btn-danger" lay-event="delete" href-info="<?=Url::toRoute(['menu/delete', 'menu_id' => $vo['menu_id']])?>">删除</a>
                        </td>
                    </tr>
                    <?php if(!empty($vo['_child'])):?>
                        <?php foreach($vo['_child'] as $v):?>
                            <tr>
                                <td><?=$v['menu_name']?></td>
                                <td><input type="number" name="sort[<?=$v['menu_id']?>]" class="layui-input" value="<?=$v['sort'] ?>" /></td>
                                <td>
                                    <a class="layui-btn layui-btn-mini layui-btn-warm" lay-event="edit" h="60%" href-info="<?=Url::toRoute(['menu/add-action', 'parent_id' => $v['menu_id']])?>">添加子节点</a>
                                    <a class="layui-btn layui-btn-mini layui-btn-normal" lay-event="edit" href-info="<?=Url::toRoute(['menu/edit','menu_id'=>$v['menu_id'], 'parent_id' => $vo['menu_id']])?>">编辑</a>
                                    <a class="layui-btn layui-btn-mini layui-btn-danger" lay-event="delete" href-info="<?=Url::toRoute(['menu/delete','menu_id'=>$v['menu_id']])?>">删除</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                <?php endforeach;?>
                </tbody>
                <tr>
                    <td colspan="3" style="text-align: center"><a class="layui-btn layui-btn-mini" href-info="<?=Url::toRoute(['menu/update'])?>" lay-event="update">更新</a></td>
                </tr>
            </form>
    </table>
</div>
