layui.use(['form', 'layer'], function () {
    // 操作对象
    var form = layui.form
        , layer = layui.layer
        , $ = layui.jquery;

    // 验证
    form.verify({
        username: function (value) {
            if (value == "") {
                return "请输入用户名";
            }
        },
        password: function (value) {
            if (value == "") {
                return "请输入密码";
            }
        },
        code: function (value) {
            if (value == "") {
                return "请输入验证码";
            }
        }
    });

    // 提交监听
    form.on('submit(sub)', function (data) {
        layer.alert(JSON.stringify(data.field), {
            title: '最终的提交信息'
        });
        return false;
    });

    // you code ...
});
