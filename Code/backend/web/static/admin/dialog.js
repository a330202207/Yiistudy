layui.use(['layer', 'ajax_form', 'data_validate'],function () {
    var $ = layui.jquery
        , layer = layui.layer
        , ajax_form = layui.ajax_form
        , data_validate = layui.data_validate;
    var WindowBox = '';
    $(document).on("click", "a[dialog-type='load']", function () {
        var that = this;
        var href = $(this).attr('href-info');
        var title = $(this).text();
        var w = $(this).attr('w');
        var h = $(this).attr('h');
        $.get(href, function (data) {
            var options = {};
            options.type = 1;
            options.area = ['40%', '60%'];
            // options.area = [w, h];
            options.title = title;
            options.content = data;
            options.shadeClose = true;
            options.maxmin = true;
            options.offset = ['100px'];
            options.btn = ['保存', '取消'];
            options.yes = function (index, layero) {
                var url = $('#layui-layer' + index).find('form').attr("action");
                var form_data = $('#layui-layer' + index).find('form').serializeArray();
                // data_validate.validate(form_data);
                // layer.close(index);
                ajax_form.AjaxFrom(url,form_data,index);
            };
            options.btn2 = function (index, layero) {
                layer.close();
            };
            WindowBox = layer.open(options);
        }, 'html');
    });
});