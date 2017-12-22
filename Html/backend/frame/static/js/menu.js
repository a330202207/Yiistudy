layui.use(['navAction'], function () {
    // 操作对象
    var navAction = layui.navAction;
    // 顶部菜单生成 [请求地址,过滤ID,是否展开,携带参数]
    navAction.headerMenu('./json/header_menu.json', 'side-top-left', false);
    // 主体菜单生成 [请求地址,过滤ID,是否展开,携带参数]
    navAction.leftMenu('./json/left_menu.json', 'side-main', false);

});