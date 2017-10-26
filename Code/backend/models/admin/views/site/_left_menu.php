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
                    <dd><a href="<?= Url::toRoute('admin/index')?>" target="iframe"><i class="layui-icon"></i>管理员管理</a></dd>
                    <dd><a href="<?= Url::toRoute('auth/index')?>" target="iframe"><i class="layui-icon"></i>权限管理</a></dd>
                    <dd><a href="<?= Url::toRoute('menu/index')?>" target="iframe"><i class="layui-icon"></i>菜单管理</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <i class="layui-icon"></i>日志中心
                    <span class="layui-nav-more"></span>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" href-url="demo/login.html"><i class="layui-icon"></i>登录页</a></dd>
                    <dd><a href="javascript:;" href-url="demo/login2.html"><i class="layui-icon"></i>登录页2</a></dd>
                    <dd><a href="javascript:;" href-url="demo/register.html"><i class="layui-icon"></i>注册页</a></dd>
                    <dd><a href="javascript:;" href-url="demo/map.html"><i class="layui-icon"></i>图表</a></dd>
                    <dd><a href="javascript:;" href-url="demo/add-edit.html"><i class="layui-icon"></i>添加-修改</a></dd>
                    <dd><a href="javascript:;" href-url="demo/data-table.html"><i class="layui-icon"></i>data-table 表格</a>
                    </dd>
                    <dd><a href="javascript:;" href-url="demo/tree-table.html"><i class="layui-icon"></i>tree-table 树表格</a>
                    </dd>
                    <dd><a href="javascript:;" href-url="demo/404.html"><i class="layui-icon"></i>404页</a></dd>
                    <dd><a href="javascript:;" href-url="demo/tips.html"><i class="layui-icon"></i>提示页</a></dd>
                    <dl></dl>
                </dl>
            </li>
        </ul>
    </div>
</div>
