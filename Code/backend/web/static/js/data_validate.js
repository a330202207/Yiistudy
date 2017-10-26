layui.define(['form', 'layer'], function (exports) {
    // 操作对象
    var form = layui.form,
        layer = layui.layer,
        $ = layui.jquery;

    // 封装方法
    var mod = {
        // 添加 HTMl
        validate: function (form_data) {

            if(form_data){
                $.each(form_data,function(k,v){
                    console.log(v);
                    /*if($(v).val() == ''){
                        _this.showError($(el),errorStr);
                    }
                    if($(v).attr('type') == 'checkbox'){
                        _this.checkBox($(el));
                    }*/
                });
            }
        },
        checkAll:function (data) {
            
        }
    };

    // 输出
    exports('data_validate', mod);
});


