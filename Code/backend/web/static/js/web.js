/**
 * Created by Kevin on 2017/12/25.
 */
layui.use(['layer', 'element', 'table', 'tableAction'], function () {
    var table = layui.table,
        tableAction = layui.tableAction,
        $ = layui.jquery;
    // console.log(layui.formAction);
    //表格操作
    table.on('tool(customer)', function (obj) {
        var that = this;
        var href = $(that).attr('href-info');
        var options = {
            'type':1,
            'area':[$(that).attr('w'), $(that).attr('h')],
            'title':$(that).text(),
            'shadeClose':true,
            'maxmin':true,
            'offset':['100px'],
            'btn':['保存', '取消']
        };
        tableAction.doAction(obj, href, options)
    });

});