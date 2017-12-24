<?php
use backend\models\admin\model\MenuModel;
$menu = MenuModel::getAllTopMenu();
?>
<!-- 顶部左侧添加选项卡监听 -->
<ul class="layui-nav" lay-filter="side-top-left">
    <?php foreach ($menu as $val) :?>
        <li class="layui-nav-item" menu-id="<?=$val['menu_id']?>"><a href="javascript:;" class="pay" href-url="<?= $val['action']?>"><?= $val['menu_name']?></a></li>
    <?php endforeach;?>
</ul>