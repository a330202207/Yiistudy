// layui.use(['table','layer', 'ajax_form', 'data_validate'],function () {
layui.use(['table', 'form', 'layer', 'ajax_form','vip_table'], function () {
    /*var $ = layui.jquery
        , layer = layui.layer
        , table = layui.table
        , ajax_form = layui.ajax_form
        , data_validate = layui.data_validate;*/

    // 操作对象
    var form = layui.form,
        table = layui.table,
        layer = layui.layer,
        vipTable = layui.vip_table,
        ajax_form = layui.ajax_form,
        $ = layui.jquery;

    // 表格渲染
    var tableIns = table.render({
        id: 'customer',
        elem: '#customer',                    //指定原始表格元素选择器（推荐id选择器）
        height: vipTable.getFullHeight(),    //容器高度
        cols: [[                            //标题栏
            {checkbox: true, sort: true, fixed: true, space: true}
            , {field: 'id', title: 'ID', width: 50}
            , {field: 'username', title: '用户名', width: 150}
            , {field: 'mobile', title: '手机', width: 150}
            , {field: 'role_name', title: '角色', width: 150}
            , {field: 'last_login_time', title: '最后登录时间', width: 150}
            , {field: 'last_login_ip', title: '最后登录IP', width: 117}
            , {field: 'create_time', title: '创建时间', width: 150}
            , {field: 'status', title: '状态', width: 80, templet: "#statusTpl"}
            , {fixed: 'right', title: '操作', width: 160, align: 'center', toolbar: '#barOption'} //这里的toolbar值是模板元素的选择器
        ]],
        url: '/admin/admin/ajaxgetindexlist',
        method: 'get',
        page: false,
        limits: [5, 10, 15, 20, 25],
        limit: 5, //默认采用30
        loading: false,
        /*        , response: {
         statusName: 'ret' //数据状态的字段名称，默认：code
         ,statusCode: 1 //成功的状态码，默认：0
         ,msgName: 'errMsg' //状态信息的字段名称，默认：msg
         ,countName: 'totalPage' //数据总数的字段名称，默认：count
         ,dataName: 'data' //数据列表的字段名称，默认：data
         }*/
        done: function (res, curr, count) {
            //如果是异步请求数据方式，res即为你接口返回的信息。
            //如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
            // console.log(res);

            //得到当前页码
            // console.log(curr);

            //得到数据总量
            // console.log(count);
        }
    });

    table.on('tool(customer)', function(obj){
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
        } else if(layEvent === 'delete'){ //删除
            /* layer.confirm('真的删除行么', function(index){
             obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
             layer.close(index);
             });*/
            // layer.confirm('确定要删除该用户【' + data.username + '】？', { icon: 3 }, function (index) {
            layer.confirm('确定要删除该条数据？', { icon: 3 }, function (index) {
                ajax_form.AjaxFrom(href,'get',{ id: id},index,'json');
            });
        } else if(layEvent === 'auth'){ //授权
            $.get(href, { id: id},function (data) {
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
                    ajax_form.AjaxFrom(url,'post',form_data,index,'json');
                };
                options.btn2 = function (index, layero) {
                    parent.layer.close(index);
                };
                parent.layer.open(options);
            }, 'html');

        } else if(layEvent === 'edit'){ //编辑
            $.get(href, { id: id},function (data) {
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
                    ajax_form.AjaxFrom(url,'post',form_data,index,'json');
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
            layer.confirm('确定要删除该条数据？', { icon: 3 }, function (index) {
                ajax_form.AjaxFrom(href,'get','',index,'json');
            });
        } else if(type === 'edit') {


            // ajax_form.AjaxFrom(url,'get',{}, '');

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
                    ajax_form.AjaxFrom(url,'post',form_data,index,'');
                };
                options.btn2 = function (index, layero) {
                    parent.layer.close();
                };
                parent.layer.open(options);
            }, 'html');
        }


    });
});