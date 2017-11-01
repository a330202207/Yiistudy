layui.use(['table', 'form', 'layer', 'vip_table'], function () {

    // 操作对象
    var form = layui.form
        , table = layui.table
        , layer = layui.layer
        , vipTable = layui.vip_table
        , $ = layui.jquery;

    // 表格渲染
    var tableIns = table.render({
        elem: '#dateTable'                    //指定原始表格元素选择器（推荐id选择器）
        , height: vipTable.getFullHeight()    //容器高度
        , cols: [[                            //标题栏
            {checkbox: true, sort: true, fixed: true, space: true}
            , {field: 'id', title: 'ID', width: 50}
            , {field: 'username', title: '用户名', width: 150}
            , {field: 'mobile', title: '手机', width: 150}
            , {field: 'role_name', title: '角色', width: 150}
            , {field: 'last_login_time', title: '最后登录时间', width: 150}
            , {field: 'last_login_ip', title: '最后登录IP', width: 117}
            , {field: 'create_time', title: '创建时间', width: 150}
            , {field: 'status', title: '状态', width: 80}
            , {fixed: 'right', title: '操作', width: 160, align: 'center', toolbar: '#barOption'} //这里的toolbar值是模板元素的选择器
        ]]
        , id: 'dataCheck'
        , url: '/admin/admin/ajaxgetindexlist'
        , method: 'get'
        , page: false
        , limits: [5, 10, 15, 20, 25]
        , limit: 5 //默认采用30
        , loading: false
/*        , response: {
            statusName: 'ret' //数据状态的字段名称，默认：code
            ,statusCode: 1 //成功的状态码，默认：0
            ,msgName: 'errMsg' //状态信息的字段名称，默认：msg
            ,countName: 'totalPage' //数据总数的字段名称，默认：count
            ,dataName: 'data' //数据列表的字段名称，默认：data
        }*/
        , done: function (res, curr, count) {
            //如果是异步请求数据方式，res即为你接口返回的信息。
            //如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
            // console.log(res);

            //得到当前页码
            // console.log(curr);

            //得到数据总量
            // console.log(count);
        }
    });

    table.on('tool(test)', function(obj){
        var data = obj.data; //获得当前行数据
        var layEvent = obj.event; //获得 lay-event 对应的值
        var tr = obj.tr; //获得当前行 tr 的DOM对象
        console.log(data);
        console.log(layEvent);
        console.log(tr);
        return false;
        if(layEvent === 'detail'){ //查看
            //do somehing
        } else if(layEvent === 'del'){ //删除
           /* layer.confirm('真的删除行么', function(index){
                obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                layer.close(index);
            });*/
        } else if(layEvent === 'edit'){ //编辑

            //同步更新缓存对应的值
           /* obj.update({
                username: '123'
                ,title: 'xxx'
            });*/
        }
    });

    // 获取选中行
    table.on('checkbox(dataCheck)', function (obj) {
        console.log(obj.checked); //当前是否选中状态
        console.log(obj.data); //选中行的相关数据
        console.log(obj.type); //如果触发的是全选，则为：all，如果触发的是单选，则为：one
    });

    // 刷新
    $('#btn-refresh').on('click', function () {
        tableIns.reload();
    });


    // you code ...

});