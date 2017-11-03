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
        AjaxFrom: function (url, type, data, index, dataType) {
            $.ajax({
                url: url,
                type: type ? type : 'post',
                data: data ? data : {},
                dataType: dataType ? dataType : 'json',
                success: function (result)
                {
                    if (result.code == 0) {
                        parent.layer.msg(result.err, { icon: 1, shade: 0.4,time: 1000 });
                        parent.layer.close(index);
                        location.reload();
                    } else {
                        parent.layer.msg(result.err, { icon: 2, shade: 0.4, time: 1000 });
                    }
                },
                error: function (error)
                {
                    parent.layer.alert(error.responseText, { icon: 2, title: '提示' });
                }
            });
        }
    };

    // 输出
    exports('ajax_form', mod);
});


