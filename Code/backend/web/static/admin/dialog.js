// layui.use(['table','layer', 'ajax_form', 'data_validate'],function () {
layui.use(['table', 'form', 'layer', 'vip_table'], function () {
    /*var $ = layui.jquery
        , layer = layui.layer
        , table = layui.table
        , ajax_form = layui.ajax_form
        , data_validate = layui.data_validate;*/
    var WindowBox = '';

    // 操作对象
    var form = layui.form
        , table = layui.table
        , layer = layui.layer
        , vipTable = layui.vip_table
        , $ = layui.jquery;

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
            , {field: 'status', title: '状态', width: 80}
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



        console.log(href);
/*        console.log(layEvent);
        console.log(tr);*/
        // return false;
        if (layEvent === 'detail') { //查看
            //do somehing
        } else if(layEvent === 'delete'){ //删除
            /* layer.confirm('真的删除行么', function(index){
             obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
             layer.close(index);
             });*/
            /*layer.confirm('确定要删除该产品【' + goods_code + '】？', { icon: 3 }, function (index) {
                $.ajax({
                    url: '@Url.Action("delete","BaseGoods")',
                    type: "post",
                    data: { goods_code: goods_code },
                    dataType: "text",
                    success: function (result)
                    {
                        if (result.length != 0)
                        {
                            if (result == "ok")
                            {
                                parent.layer.msg('删除成功', { icon: 1, shade: 0.4, time: 1000 })
                                obj.del(); //删除对应行（tr）的DOM结构
                                $("#search").click();//重载TABLE
                                parent.layer.close(index);
                            }
                            else if (result == "exist")
                            {
                                parent.layer.alert("该产品在库存中存在，不能删除", { icon: 5 });
                            }
                            else if (result == "error")
                            {
                                parent.layer.msg("删除失败", { icon: 5, shade: [0.4], time: 1000 });
                            }
                        }
                    },
                    error: function (error)
                    {
                        parent.layer.alert(error.responseText, { icon: 2, title: '提示' });
                    }
                })
            });*/
        } else if(layEvent === 'edit'){ //编辑

/*            parent.layer.open({
                type: 1,
                title: title,
                shade: 0.4,  //阴影度
                fix: false,
                shadeClose: true,
                maxmin: true,
                area: [w, h],    //窗体大小（宽,高）
                offset: ['100px'],
                btn : ['保存', '取消'],
                content: '@Url.Action("CustomerEdit","Customer")?customer_code=' + customer_code,
                success: function (layero, index)
                {
                   /!* var body = layer.getChildFrame('body', index); //得到子页面层的BODY
                    body.find('#hidValue').val(index); //将本层的窗口索引传给子页面层的hidValue中*!/
                },
                end: function ()
                {
                    /!*var handle_status = $("#handle_status").val();
                    console.log(handle_status);
                    if (handle_status == 'ok')
                    {
                        parent.layer.msg('修改成功', { icon: 1, shade: 0.4, time: 1000 });
                        $("#search").click();
                        $("#handle_status").val('');
                    }
                    else if (handle_status == "error")
                    {
                        parent.layer.msg('修改失败', { icon: 5, shade: 0.4, time: 1000 });
                    }*!/
                }
            });*/

            //同步更新缓存对应的值
            /* obj.update({
             username: '123'
             ,title: 'xxx'
             });*/

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
                    // var url = $('#layui-layer' + index).find('form').attr("action");
                    // var form_data = $('#layui-layer' + index).find('form').serializeArray();
                    // data_validate.validate(form_data);
                    // layer.close(index);
                    // ajax_form.AjaxFrom(url,form_data,index);
                };
                options.btn2 = function (index, layero) {
                    layer.close();
                };
                options.success = function (index, layero) {
                    
                };
                options.end = function () {
                    
                };
                WindowBox = layer.open(options);
            }, 'html');
        }
    });


    /*$(document).on("click", "a[dialog-type='load']", function () {
        var that = this;
        var href = $(that).attr('href-info');
        var title = $(that).text();
        var w = $(that).attr('w');
        var h = $(that).attr('h');
        // console.log(href);return false;
        $.get(href, function (data) {
            var options = {};
            options.type = 1;
            options.area = [w, h];
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
    });*/
});