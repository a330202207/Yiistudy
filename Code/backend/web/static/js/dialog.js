layui.use(['table', 'layer', 'ajaxForm', 'table'], function () {
    // 操作对象
    var table = layui.table,
        layer = layui.layer,
        ajaxForm = layui.ajaxForm,
        $ = layui.jquery;
    var action_num = 0;

    table.on('tool(customer)', function (obj) {
        var that = this;
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        var id = data.id;

        var href = $(that).attr('href-info');
        var title = $(that).text();
        var w = $(that).attr('w');
        var h = $(that).attr('h');
        if (layEvent === 'detail') { //查看
            //do somehing
        } else if (layEvent === 'delete') { //删除
            layer.confirm('确定要删除该条数据？', {icon: 3}, function (index) {
                ajaxForm.AjaxFrom(href, 'get', {id: id}, index, 'json');
            });
        } else if (layEvent === 'auth') { //授权
            $.get(href, {id: id}, function (data) {
                var options = {};
                options.type = 1;
                options.area = [w, h];
                options.shade = 0.4;
                options.title = title;
                options.content = data;
                options.shadeClose = true;
                options.maxmin = true;
                options.offset = ['100px'];
                options.btn = ['保存', '取消'];
                options.yes = function (index, layero) {
                    var url = layero.find('form').attr("action");
                    var form_data = layero.find('form').serializeArray();
                    ajax_form.AjaxFrom(url, 'post', form_data, index, 'json');
                };
                options.btn2 = function (index, layero) {
                    parent.layer.close(index);
                };
                parent.layer.open(options);
            }, 'html');

        } else if (layEvent === 'edit') { //编辑
            $.get(href, {id: id}, function (data) {
                var options = {};
                options.type = 1;
                options.area = [w, h];
                options.shade = 0.4;
                options.title = title;
                options.content = data;
                options.shadeClose = true;
                options.maxmin = true;
                options.offset = ['100px'];
                options.btn = ['保存', '取消'];
                options.yes = function (index, layero) {
                    var url = layero.find('form').attr("action");
                    var form_data = layero.find('form').serializeArray();
                    ajax_form.AjaxFrom(url, 'post', form_data, index, 'json');
                };
                options.btn2 = function (index, layero) {
                    parent.layer.close(index);
                };
                parent.layer.open(options);
            }, 'html');
        }
    });

    $(document).on("click", "a[lay-event]", function () {
        var that = this;
        var type = $(that).attr('lay-event');
        var href = $(that).attr('href-info');
        var title = $(that).text();
        var w = $(that).attr('w');
        var h = $(that).attr('h');

        if (type === 'delete') { //编辑
            layer.confirm('确定要删除该条数据？', {icon: 3}, function (index) {
                ajax_form.AjaxFrom(href, 'get', '', index, 'json');
            });
        } else if (type === 'edit') {
            $.get(href, function (data) {
                var options = {};
                options.type = 1;
                options.area = [w, h];
                options.shade = 0.4;
                options.title = title;
                options.content = data;
                options.shadeClose = true;
                options.maxmin = true;
                options.offset = ['100px'];
                options.btn = ['保存', '取消'];
                options.yes = function (index, layero) {
                    var url = layero.find('form').attr("action");
                    var form_data = layero.find('form').serializeArray();
                    ajax_form.AjaxFrom(url, 'post', form_data, index, '');
                };
                options.btn2 = function (index, layero) {
                    parent.layer.close();
                };
                parent.layer.open(options);
            }, 'html');
        } else if (type === 'add-rows') {
            action_num++;
            console.log(action_num);
            var html =
                '<tr id="menu_action_' + action_num + '">' +
                '<td><input type="text" name="new[' + action_num + '][menu_name]" value=""  class="layui-input"/></td>' +
                '<td><input type="text" name="new[' + action_num + '][action]" value="" class="layui-input"/></td>' +
                '<td><input type="text" name="new[' + action_num + '][sort]" value="100" class="layui-input"/></td>' +
                '<td>' +
                '<input type="checkbox" name="new[' + action_num + '][is_show]" value="1" title="是">' +
                '<div class="layui-unselect layui-form-checkbox" lay-skin=""><span>是</span><i class="layui-icon"></i></div>' +
                '</td>' +
                '<td><a class="layui-btn layui-btn-mini layui-btn-danger" onclick="$(\'#menu_action_' + action_num + '\').remove();" href-info="">删除</a></td> ' +
                '</tr>';
            $("#action_list").append(html);
        } else if (type == 'update') {
            var data = $("#data").find('form').serializeArray();
            ajax_form.AjaxFrom(href, 'post', data, '', 'json');
        }
    });
});

layui.define(['layer', 'table', 'element', 'ajaxForm'], function (exports) {
    var layer = layui.layer,
        table = layui.table,
        element = layui.element,
        ajaxForm = layui.ajaxForm,
        $ = layui.jquery;
    var actionNum = 0;

    var mod = {

    };

    // 输出
    exports('dialog', mod);
});