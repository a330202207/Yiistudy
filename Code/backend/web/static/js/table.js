layui.define(['layer', 'element', 'table'], function (exports) {

    var table = layui.table,
        $ = layui.jquery;

    // 封装方法
    var mod = {
        // 删除公共方法   deleteAll(ids,请求的url,操作成功跳转url,操作失败跳转url)
        deleteAll: function (ids, url, sUrl, eUrl) {
            // ids不能为空
            if (ids == null || ids == '') {
                layer.msg('请选择要删除的数据', {time: 2000});
                return false;
            } else {
                layer.confirm('确认删除选中数据?', {
                    title: '删除',
                    btn: ['确认', '取消'] // 按钮
                }, function (index, layero) {
                    // 确认
                    $.post(url, {ids: ids}, function (res) {
                        // 大于0表示删除成功
                        if (res.status > 0) {
                            // 提示信息并跳转
                            layer.msg(res.msg, {time: 1500}, function () {
                                location.href = sUrl;
                            })
                        } else {
                            // 提示信息并跳转
                            layer.msg(res.msg, {time: 1500}, function () {
                                location.href = eUrl;
                            })
                        }
                    });
                }, function (index) {
                    // 关闭
                    layer.close(index);
                });
            }
        },
        // 转换时间戳为日期时间(时间戳,是否只显示年月日时分,8)
        unixToDate: function (unixTime, isFull, timeZone) {
            if (unixTime == '' || unixTime == null) {
                return '';
            }
            if (typeof (timeZone) == 'number') {
                unixTime = parseInt(unixTime) + parseInt(timeZone) * 60 * 60;
            }
            var time = new Date(unixTime * 1000);
            var ymdhis = "";
            var year, month, date, hours, minutes, seconds;
            if (time.getUTCFullYear() < 10) {
                year = '0' + time.getUTCFullYear();
            } else {
                year = time.getUTCFullYear();
            }
            if ((time.getUTCMonth() + 1) < 10) {
                month = '0' + (time.getUTCMonth() + 1);
            } else {
                month = (time.getUTCMonth() + 1);
            }
            if (time.getUTCDate() < 10) {
                date = '0' + time.getUTCDate();
            } else {
                date = time.getUTCDate();
            }
            ymdhis += year + "-";
            ymdhis += month + "-";
            ymdhis += date;
            if (isFull === true) {
                if (time.getUTCHours() < 10) {
                    hours = '0' + time.getUTCHours();
                } else {
                    hours = time.getUTCHours();
                }
                if (time.getUTCMinutes() < 10) {
                    minutes = '0' + time.getUTCMinutes();
                } else {
                    minutes = time.getUTCMinutes();
                }
                if (time.getUTCSeconds() < 10) {
                    seconds = '0' + time.getUTCSeconds();
                } else {
                    seconds = time.getUTCSeconds();
                }
                ymdhis += " " + hours + ":";
                ymdhis += minutes;
                // ymdhis += seconds;
            }
            return ymdhis;
        },
        // 批量删除 返回需要的 ids
        getIds: function (o, str) {
            var obj = o.find('tbody tr td:first-child input[type="checkbox"]:checked');
            var list = '';
            obj.each(function (index, elem) {
                list += $(elem).attr(str) + ',';
            });
            // 去除最后一位逗号
            list = list.substr(0, (list.length - 1));
            return list;
        },
        // 获取高度
        getFullHeight: function () {
            return $(window).height() - ( $('.my-btn-box').outerHeight(true) ? $('.my-btn-box').outerHeight(true) + 35 : 40 );
        },

        delDate: function () {
            layer.confirm('确定要删除该条数据？', {icon: 3}, function (index) {
                ajaxForm.AjaxFrom(href, 'get', {id: data.id}, index, 'json');
            });
        },

        //删除数据
        delDate: function (href, data) {
            layer.confirm('确定要删除该条数据？', {icon: 3}, function (index) {
                // ajaxForm.AjaxFrom(href, 'get', {id: data.id}, index, 'json');
            });
        },

        //
        authUser:function () {

        },
        doAction: function (event, href, data) {
            switch (event) {
                case 'auth':
                    this.authUser(href, data);
                    break;
                case 'edit':
                    break;
                case 'delete':
                    this.delDate(href, data);
                    break;
            }
        },

        //获取表格事件
        getTableEvent: function () {
            var _this = this;
            table.on('tool(customer)', function (obj) {
                var that = this;
                var data = obj.data; //获得当前行数据
                var layEvent = obj.event; //获得 lay-event 对应的值
                var id = data.id;

                var href = $(that).attr('href-info');
                var title = $(that).text();
                var w = $(that).attr('w');
                var h = $(that).attr('h');
                _this.doAction(layEvent, href, data);




/*                if (layEvent === 'detail') { //查看
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
                            ajaxForm.AjaxFrom(url, 'post', form_data, index, 'json');
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
                            ajaxForm.AjaxFrom(url, 'post', form_data, index, 'json');
                        };
                        options.btn2 = function (index, layero) {
                            parent.layer.close(index);
                        };
                        parent.layer.open(options);
                    }, 'html');
                }*/
            });
        },
    };

    // 输出
    exports('tableAction', mod);
});

