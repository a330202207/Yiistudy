<div class="layui-header my-header">
    <a href="index.html">
        <!--<img class="my-header-logo" src="" alt="logo">-->
        <div class="my-header-logo">后台模板 HTML</div>
    </a>
    <div class="my-header-btn">
        <button class="layui-btn layui-btn-small btn-nav"><i class="layui-icon">&#xe65f;</i></button>
    </div>

    <!-- 顶部左侧添加选项卡监听 -->
    <ul class="layui-nav" lay-filter="side-top-left">
<!--        <li class="layui-nav-item"><a href="javascript:;" class="pay" href-url="">前台首页</a></li>-->
    </ul>

    <!-- 顶部右侧添加选项卡监听 -->
    <ul class="layui-nav my-header-user-nav" lay-filter="side-top-right">
        <li class="layui-nav-item">
            <a class="name" href="javascript:;"><img src="/static/image/code.png" alt="logo"> Admin </a>
            <dl class="layui-nav-child">
                <dd><a href="javascript:;" href-url="demo/login.html"><i class="layui-icon">&#xe621;</i>个人信息</a></dd>
                <dd><a href="javascript:;" href-url="demo/map.html"><i class="layui-icon">&#xe621;</i>登出</a></dd>
                <dd><a href="/"><i class="layui-icon">&#x1006;</i>退出</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item">
            <a class="name" href="javascript:;"><i class="layui-icon">&#xe629;</i>主题</a>
            <dl class="layui-nav-child">
                <dd data-skin="0"><a href="javascript:;">默认</a></dd>
                <dd data-skin="1"><a href="javascript:;">纯白</a></dd>
                <dd data-skin="2"><a href="javascript:;">蓝白</a></dd>
            </dl>
        </li>
    </ul>
</div>
<script type="text/javascript">
    layui.use(['navAction'], function () {

        // 操作对象
        var navAction = layui.navAction;

        // 顶部菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        navAction.headerMenu('/admin/menu/getTopMenu', 'side-top-left', false);
        // 主体菜单生成 [请求地址,过滤ID,是否展开,携带参数]
        // navAction.leftMenu('./json/', 'side-main', false);

    });
</script>