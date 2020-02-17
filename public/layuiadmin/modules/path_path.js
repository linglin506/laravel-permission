/**

 @Name：layuiAdmin 组织管理
 @Author：star1029
 @Site：http://www.layui.com/admin/
 @License：LPPL

 */


layui.define(['table', 'form'], function (exports) {
    var $ = layui.$
        , table = layui.table
        , form = layui.form;

    //对象管理
    table.render({
        elem: '#LAY-table'
        , url: "/path/org/data?model=org"
        , page: true
        , toolbar: "#table-toolbar-header"
        , loading: true
        , cols: [[
            {type: 'checkbox', fixed: 'left'}
            , {field: 'id', width: 50, title: 'ID',  align: 'center'}
            , {field: 'name', title: '组织名称', align: 'center'}
            , {field: 'type', title: '组织类型', align: 'center'}
            , {field: 'industry', title: '行业', align: 'center'}
            , {field: 'province', title: '省', align: 'center'}
            , {field: 'city', title: '市', align: 'center'}
            , {field: 'district', title: '县', align: 'center'}
            , {field: 'address', title: '地址', align: 'center',hide:true}
            , {field: 'contact', title: '联系人', align: 'center'}
            , {field: 'phone', title: '电话', align: 'center'}
            , {field: 'mobile', title: '手机', align: 'center'}
            , {field: 'fax', title: '传真', align: 'center',hide:true}
            , {field: 'email', title: '邮箱', align: 'center'}
            , {field: 'ip', title: '授权IP', align: 'center'}
            , {
                title: '操作',
                width: 150,
                align: 'center',
                fixed: 'right',
                toolbar: '#table-toolbar-inner',
                align: 'center'
            }
        ]]
        , text: {
            none: '暂无相关数据'
        }
    });

    //头工具栏事件--权限管理
    table.on('toolbar(LAY-table)', function (obj) {
        //alert(1);
        var checkStatus = table.checkStatus(obj.config.id);
        switch (obj.event) {
            case 'add':
                layer.open({
                    type: 2
                    , title: '新增'
                    , content: "/path/org/create"
                    , area: ['800px', '600px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submit = layero.find('iframe').contents().find("#LAY-submit");

                        //监听提交
                        iframeWindow.layui.form.on('submit(LAY-submit)', function (data) {
                            var field = data.field; //获取提交的字段

                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({//异步请求返回给后台
                                url: '/path/org/store',
                                type: 'POST',
                                data: field,
                                success: function (data) {
                                    layer.msg(data.msg);
                                },
                                error: function (data) {
                                    layer.msg('服务器内部错误!');
                                }
                            });
                            table.reload('LAY-table');
                            layer.close(index); //关闭弹层
                        });
                        submit.trigger('click');
                    }
                });
                break;

        }
        ;
    });

    //监听表格内部工具条－－对象管理
    table.on('tool(LAY-table)', function (obj) {
        var data = obj.data;
        var row = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除此对象？', function (index) {
                $.ajax({
                    url: '/path/org/destroy?id=' + row.id,
                    type: 'GET',
                    success: function (data) {
                        layer.msg(data.msg);
                    },
                    error: function (data) {
                        layer.msg('服务器内部错误!');
                    }
                });
                table.reload('LAY-table'); //数据刷新
                layer.close(index);
            });
        } else if (obj.event === 'edit') {
            var tr = $(obj.tr);
            layer.open({
                type: 2
                , title: '编辑'
                , content: "/path/org/" + row.id + "/edit"
                , area: ['800px', '600px']
                , btn: ['确定', '取消']
                , yes: function (index, layero) {
                    var iframeWindow = window['layui-layer-iframe' + index]
                        , submit = layero.find('iframe').contents().find("#LAY-submit");

                    //监听提交
                    iframeWindow.layui.form.on('submit(LAY-submit)', function (data) {
                        var field = data.field; //获取提交的字段
                        //提交 Ajax 成功后，静态更新表格中的数据
                        $.ajax({
                            url: '/path/org/' + row.id + '/update',
                            type: 'POST',
                            data: field,
                            success: function (data) {
                                layer.msg(data.msg);
                            },
                            error: function (data) {
                                layer.msg('服务器内部错误!');
                            }
                        });
                        table.reload('LAY-table'); //数据刷新
                        layer.close(index); //关闭弹层
                    });

                    submit.trigger('click');
                }
                , success: function (layero, index) {

                }
            })
        }
    });

    exports('path_path', {})
});