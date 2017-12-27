layui.use(['layer', 'tableAction'], function () {
    var $ = layui.jquery,
        tableAction = layui.tableAction;

/*    $('.j-change-icon').on('click', function () {
        var changeId = $(this).parent().prev().attr('id');

        var index = layer.open({
            type: 2,
            title: '选择icon',
            area: ['600px', '80%'],
            shift: 0,
            shade: 0.6,
            maxmin: true, //开启最大化最小化按钮
            // content:"{:U('icon')}"+"&id="+changeId
        });
    });*/

    $(document).on("click", "a[menu-type]", function () {
        var that = this;
        var href = $(that).attr('href-info');
        var obj = {'event':$(this).attr('menu-type'), data:{id:''}};
        tableAction.doAction(obj, href);
    });
    
    function delRow(action_num) {
        $("#menu_action_" + action_num).remove();
    }
});
