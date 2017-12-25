/*layui.use(['table', 'layer', 'ajaxFormAction', 'tableAction'], function () {
    // 操作对象
    var table = layui.table,
        tableAction = layui.tableAction,
        layer = layui.layer,
        ajaxForm = layui.ajaxFormAction,
        $ = layui.jquery;
    var action_num = 0;

    tableAction.getTableEvent();


    /!*$(document).on("click", "a[lay-event]", function () {
        var that = this;
        var type = $(that).attr('lay-event');
        var href = $(that).attr('href-info');
        var title = $(that).text();
        var w = $(that).attr('w');
        var h = $(that).attr('h');

        if (type === 'delete') { //编辑
            layer.confirm('确定要删除该条数据？', {icon: 3}, function (index) {
                ajaxForm.AjaxFrom(href, 'get', '', index, 'json');
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
            ajaxForm.AjaxFrom(href, 'post', data, '', 'json');
        }
    });*!/
});*/

layui.define(['layer'], function (exports) {
    // 操作对象
    var layer = layui.layer
        ,$ = layui.jquery;

    // 封装方法
    var mod = {
        // 添加 HTMl
        AjaxFrom: function (url, type, data, index, dataType) {

        },
        dialogBox:function (href, options) {
            $.get(href, {id: id}, function (data) {
                options.content = data;
                options.yes = function (index, layero) {
                    var url = layero.find('form').attr("action");
                    var form_data = layero.find('form').serializeArray();
                    ajaxForm.AjaxFrom(url, 'post', form_data, index, 'json');
                };
                options.btn2 = function (index) {
                    parent.layer.close(index);
                };
                parent.layer.open(options);
            }, 'html');
        }
    };

    // 输出
    exports('dialog', mod);
});