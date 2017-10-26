layui.use('layer', function () {
    var $ = layui.jquery, layer = layui.layer;
    $('.j-change-icon').on('click', function () {
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
    });
});
