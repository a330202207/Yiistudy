layui.define(['form', 'table','layer', 'element'], function (exports) {
    // 操作对象
    var layer = layui.layer
        , element = layui.element
        , $ = layui.jquery
        , table = layui.table
        , form = layui.form;

    // 封装方法
    var mod = {
        // 添加 HTMl
        AjaxFrom: function (url, data, index) {
            // 请求数据
            $.post(url, data, function (res) {
                if (res.code == 0) {
                    layer.msg(res.err, {icon: 1});
                    layer.close(index);
                    location.reload();
                } else {
                    layer.msg(res.err, {icon: 2});
                }
            },'json');
        }
    };

    // 输出
    exports('ajax_form', mod);
});


