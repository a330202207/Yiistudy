<?php
use yii\helpers\Url;
?>
<div class="layui-side my-side" style="left: 0px;">
    <div class="layui-side-scroll">
        <!-- 左侧主菜单添加选项卡监听 -->
        <ul class="layui-nav layui-nav-tree" lay-filter="side-main">
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;">
                    <i class="layui-icon"></i>系统管理
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="demo/btn.html"><i class="layui-icon"></i>管理员管理</a></dd>
                    <dd><a href="javascript:;" href-url="demo/form.html"><i class="layui-icon"></i>角色管理</a></dd>
                    <dd><a href="<?= Url::toRoute('menu/index')?>"><i class="layui-icon"></i>菜单管理</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
