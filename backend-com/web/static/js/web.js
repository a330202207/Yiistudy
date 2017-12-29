/**
 * Created by Kevin on 2017/12/25.
 */
layui.use(['layer', 'element', 'table', 'tableAction'], function () {
    var table = layui.table,
        element = layui.element,
        tableAction = layui.tableAction,
        $ = layui.jquery;
    var options = {
        'type':1,
        'shadeClose':true,
        'maxmin':true,
        'offset':['100px'],
        'btn':['保存', '取消']
    };


    //表格操作
    table.on('tool(customer)', function (obj) {
        var that = this;
        var href = $(that).attr('href-info');
        getOptions(that);
        tableAction.doAction(obj, href, options)
    });

    $(document).on("click", "a[event-type]", function () {
        var that = this;
        var href = $(that).attr('href-info');
        var obj = {'event':$(this).attr('event-type'), data:{id:''}};
        getOptions(that);
        tableAction.doAction(obj, href, options)
    });

    // 刷新
    $('#btn-refresh').on('click', function () {
        location.reload();
    });

    //获取弹窗参数
    function getOptions(obj) {
        var width = $(obj).attr('w');
        var height = $(obj).attr('h');
        options.area = [width, height];
        options.title = $(obj).text();
    }

});