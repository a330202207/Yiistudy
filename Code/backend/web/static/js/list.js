layui.define('layer', function (exports) {

    // 封装方法
    var mod = {
        //获取列表事件
        getListEvent:function () {
            var event = '';
            //一些事件监听
            element.on('tab(demo)', function(data){
                console.log(data);
            });
        },

    };

    // 输出
    exports('listAction', mod);
});


