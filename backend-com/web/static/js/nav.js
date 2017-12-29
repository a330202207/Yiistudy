layui.define(['layer', 'element'], function (exports) {

    // 操作对象
    var layer = layui.layer,
        element = layui.element,
        $ = layui.jquery;

    // 封装方法
    var mod = {
        // 添加 HTMl
        addHtml: function (addr, obj, treeStatus, data) {
            // 请求数据
            $.get(addr, data, function (res) {
                var view = "";
                if (res.code == 1) {
                    $(res.data).each(function (k, v) {
                        // v.menu_name && treeStatus ? view += '<li class="layui-nav-item layui-nav-itemed">' : view += '<li class="layui-nav-item">';
                        view += '<li class="layui-nav-item" menu-id="' + v.menu_id + '">';
                        if (v._child) {
                            view += '<a href="javascript:;"><i class="layui-icon">' + v.icon + '</i>' + v.menu_name + '</a><dl class="layui-nav-child">';
                            $(v._child).each(function (ko, vo) {
                                view += '<dd><a href="javascript:;" menu-id="' + vo.menu_id + '" href-url="' + vo.action + '"><i class="layui-icon">' + vo.icon + '</i>' + vo.menu_name + '</a></dd>';
                            });
                            view += '</dl>';
                        } else {
                            view += '<a href="javascript:;" href-url="' + v.action + '"><i class="layui-icon">'+ v.icon + '</i>' + v.menu_name + '</a>';
                        }
                        view += '</li>';
                    });
                }

                // 添加到 HTML
                $(document).find(".layui-nav[lay-filter=" + obj + "]").html(view);
                // 更新渲染
                element.init();
            },'json');
        },

        // 顶部菜单 [请求地址,过滤ID,是否展开,携带参数]
        headerMenu: function (addr, obj, treeStatus, data) {
            // 添加HTML
            this.addHtml(addr, obj, treeStatus, data);
        },

        // 左侧主体菜单 [请求地址,过滤ID,是否展开,携带参数]
        leftMenu: function (addr, obj, treeStatus, data) {
            // 添加HTML
            this.addHtml(addr, obj, treeStatus, data);
        },


    };

    // 输出
    exports('navAction', mod);
});


