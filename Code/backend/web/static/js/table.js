layui.define('layer', function (exports) {

    // 操作对象
    var layer = layui.layer,
        $ = layui.jquery;

    var action_num = 0;

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

        submitForm: function (url, type, data, index, dataType) {
            $.ajax({
                url: url,
                type: type ? type : 'post',
                data: data ? data : {},
                dataType: dataType ? dataType : 'json',
                success: function (result) {
                    if (result.code == 0) {
                        layer.msg(result.err, {icon: 1, shade: 0.4, time: 2000});
                        layer.close(index);
                        location.reload();
                        // setTimeout(location.reload(), 5000);
                    } else {
                        layer.msg(result.err, {icon: 2, shade: 0.4, time: 2000});
                    }
                }, error: function (error) {
                    layer.alert(error.responseText, {icon: 2, title: '提示'});
                }
            });
        },


        //删除数据
        delData: function (obj, href) {
            var _this = this;
            layer.confirm('确定要删除该条数据？', {icon: 3}, function (index) {
                _this.submitForm(href, 'get', {id: obj.data.id}, index, 'json');
            });
        },

        //编辑数据
        editData:function (obj, href, options) {
            var _this = this;
            $.get(href, {id: obj.data.id}, function (res) {
                options.content = res;
                options.yes = function (index, layero) {
                    var url = layero.find('form').attr("action");
                    var form_data = layero.find('form').serializeArray();
                    _this.submitForm(url, 'post', form_data, index, 'json');
                };
                options.btn2 = function (index) {
                    layer.close(index);
                };
                layer.open(options);
            }, 'html');
        },
        update:function (href) {
            var data = $("#data").find('form').serializeArray();
            this.submitForm(href, 'post', data, '', 'json');
        },
        addRow:function () {
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
                '<td><a class="layui-btn layui-btn-mini layui-btn-danger" onclick="delRow(action_num)" href-info="">删除</a></td> ' +
                '</tr>';
            $("#action_list").append(html);
        },
        delRow:function (action_num) {
            $("#menu_action_" + action_num).remove();
        },
        //表格行内动作
        doAction: function (obj, href, options) {
            switch (obj.event) {
                case 'add':
                case 'auth':
                case 'edit':
                    this.editData(obj, href, options);
                    break;
                case 'del':
                    this.delData(obj, href);
                    break;
                case 'add-rows':
                    this.addRow();
                    break;
                case 'update':
                    this.update(href);
                    break;
            }
        },

    };

    // 输出
    exports('tableAction', mod);
});





