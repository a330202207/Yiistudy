<div class="my-btn-box">
    <span class="fl">
        <a class="layui-btn layui-btn-danger radius btn-delect" id="btn-delete-all">批量删除</a>
        <a class="layui-btn btn-add btn-default" id="btn-add">添加</a>
        <a class="layui-btn btn-add btn-default" id="btn-refresh"><i class="layui-icon">&#x1002;</i></a>
    </span>
</div>

<div class="layui-form layui-border-box layui-table-view"">
    <div class="layui-table-header">
        <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
            <thead>
            <tr>
                <th data-type="checkbox">
                    <div class="layui-table-cell laytable-cell-checkbox">
                        <input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-filter="layTableAllChoose">
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon"></i>
                        </div>
                    </div>
                </th>
                <th><div class="layui-table-cell "><span>ID</span></div></th>
                <th><div class="layui-table-cell "><span>用户名</span></div></th>
                <th><div class="layui-table-cell"><span>权限组</span></div></th>
                <th><div class="layui-table-cell"><span>最后登录时间</span></div></th>
                <th><div class="layui-table-cell"><span>最后登录IP</span></div></th>
                <th><div class="layui-table-cell"><span>创建时间</span></div></th>
                <th><div class="layui-table-cell"><span>状态</span></div></th>
                <th><div class="" align="center"><span>操作</span></div></th>
            </tr>
            </thead>
        </table>
    </div>
    <table class="layui-table">
        <tbody>
        <tr>
            <td>
                <div class="layui-table-cell laytable-cell-checkbox">
                    <input type="checkbox" name="layTableCheckbox" lay-skin="primary">
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                        <i class="layui-icon"></i>
                    </div>
                </div>
            </td>
            <td><div class="layui-table-cell">2</div></td>
            <td><div class="layui-table-cell">root</div></td>
            <td><div class="layui-table-cell">普通管理员</div></td>
            <td><div class="layui-table-cell">2017-05-20 09:49:35</div></td>
            <td><div class="layui-table-cell">182.244.65.194</div></td>
            <td><div class="layui-table-cell">2017-02-23 16:10:53</div></td>
            <td><div class="layui-table-cell">1</div></td>
            <td>
                <div>
                    <a class="layui-btn layui-btn-mini">查看</a>
                    <a class="layui-btn layui-btn-mini layui-btn-normal">编辑</a>
                    <a class="layui-btn layui-btn-mini layui-btn-danger">删除</a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="layui-table-fixed layui-table-fixed-l">
        <table class="layui-table">
            <thead>
            <tr>
                <th data-field="0" data-type="checkbox" unresize="true">
                    <div class="layui-table-cell laytable-cell-checkbox">
                        <input type="checkbox" name="layTableCheckbox" lay-skin="primary" lay-filter="layTableAllChoose">
                        <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                            <i class="layui-icon"></i>
                        </div>
                    </div>
                </th>
            </tr>
            </thead>
        </table>
        <div class="layui-table-body" style="height: 81px;">
            <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                <tbody>
                <tr>
                    <td>
                        <div class="layui-table-cell laytable-cell-checkbox">
                            <input type="checkbox" name="layTableCheckbox" lay-skin="primary">
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                <i class="layui-icon"></i>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="layui-table-cell laytable-cell-checkbox">
                            <input type="checkbox" name="layTableCheckbox" lay-skin="primary">
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary">
                                <i class="layui-icon"></i>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="layui-table-tool">
        <div class="layui-inline layui-table-page" id="layui-table-page1">
            <div class="layui-box layui-laypage layui-laypage-default" id="layui-laypage-1">
                <a href="javascript:;" class="layui-laypage-prev layui-disabled">
                    <i class="layui-icon"></i>
                </a>
                <span class="layui-laypage-curr">
                    <em class="layui-laypage-em"></em><em>1</em>
                </span>
                <a href="javascript:;" data-page="2">2</a>
                <a href="javascript:;" data-page="3">3</a>
                <span class="layui-laypage-spr">…</span>
                <a href="javascript:;" class="layui-laypage-last" title="尾页" data-page="200">200</a>
                <a href="javascript:;" class="layui-laypage-next" data-page="2"><i class="layui-icon"></i></a>
                <span class="layui-laypage-skip">到第
                    <input type="text" min="1" value="1" class="layui-input">页
                    <button type="button" class="layui-laypage-btn">确定</button>
                </span>
                <span class="layui-laypage-count">共 1000 条</span>
                <span class="layui-laypage-limits">
                    <select lay-ignore="">
                        <option value="5" selected="">5 条/页</option>
                        <option value="10">10 条/页</option><option value="90">90 条/页</option>
                        <option value="150">150 条/页</option><option value="300">300 条/页</option>
                    </select>
                </span>
            </div>
        </div>
    </div>
</div>