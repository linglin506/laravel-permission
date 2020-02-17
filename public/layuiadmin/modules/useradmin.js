/**

 @Name：layuiAdmin管理员管理 角色管理 权限管理
 @Author：star1029
 @Site：http://www.layui.com/admin/
 @License：LPPL

 */


layui.define(['table', 'form'], function (exports) {
    var $ = layui.$
        , table = layui.table
        , form = layui.form;

    //管理员管理
    table.render({
        elem: '#LAY-user-list-manage'
        , url: "/admin/data?model=user"
        , page: true //开启分页
        , toolbar: "#table-toolbar-toolbarHeader"
        , loading: true
        , cols: [[
            {type: 'checkbox', fixed: 'left'}
            , {field: 'id', width: 80, title: 'ID', sort: true, align: 'center'}
            , {field: 'name', title: '登录名', align: 'center'}
            , {field: 'phone', title: '电话', align: 'center'}
            , {field: 'email', title: '邮箱', align: 'center'}
            , {field: 'role_name', title: '角色', align: 'center'}
            , {field: 'created_at', title: '加入时间', sort: true, align: 'center'}
            , {field: 'check', title: '审核状态', templet: '#buttonTpl', minWidth: 80, align: 'center'}
            , {title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-useradmin-admin'}
        ]]
        , text: {
            none: '暂无相关数据'
        }
    });

    //头工具栏事件--角色管理
    table.on('toolbar(LAY-user-list-manage)', function (obj) {
        //alert(1);
        var checkStatus = table.checkStatus(obj.config.id);
        switch (obj.event) {
            case 'batchdel':
                var checkStatus = table.checkStatus('LAY-user-list-manage')
                    , checkData = checkStatus.data; //得到选中的数据

                if (checkData.length === 0) {
                    return layer.msg('请选择数据');
                }
                layer.confirm('确定删除吗？', function (index) {
                    //alert(JSON.stringify(checkData));
                    //执行 Ajax 后重载
                    $.ajax({//异步请求返回给后台
                        url:'/admin/user/destroy',
                        type:'POST',
                        data:JSON.stringify(checkData),
                        success:function(data){
                            layer.msg(data.msg);
                        },
                        error:function (data) {
                            layer.msg('服务器内部错误!');
                        }
                    });
                    table.reload('LAY-user-list-manage');
                });
                break;
            case 'add':
                layer.open({
                    type: 2
                    , title: '添加用户'
                    , content: "/admin/user/create"
                    , area: ['420px', '420px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submitID = 'LAY-user-create-submit'
                            , submit = layero.find('iframe').contents().find('#' + submitID);

                        //监听提交
                        iframeWindow.layui.form.on('submit(' + submitID + ')', function (data) {
                            var field = data.field; //获取提交的字段
                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({//异步请求返回给后台
                                url: '/admin/user/store',
                                type: 'POST',
                                data: field,
                                success: function (data) {
                                    layer.msg(data.msg);
                                },
                                error: function (data) {
                                    layer.msg('服务器内部错误!');
                                }
                            });
                            layer.close(index); //关闭弹层
                            table.reload('LAY-user-list-manage'); //数据刷新
                        });
                        submit.trigger('click');
                    }
                });
                break;
        }
    });

    //监听工具条－－管理员管理
    table.on('tool(LAY-user-list-manage)', function (obj) {
        var data = obj.data;
        var row = obj.data;
        if (obj.event === 'del') {
            //alert(data.id);
            layer.confirm('确定删除此用户？', function (index) {
                //提交 Ajax 成功后，静态更新表格中的数据
                $.ajax({//异步请求返回给后台
                    url: '/admin/user/destroy?id=' + data.id,
                    type: 'GET',
                    success: function (data) {
                        layer.msg(data.msg);
                    },
                    error: function (data) {
                        layer.msg('服务器内部错误!');
                    }
                });
                layer.close(index);
                table.reload('LAY-user-list-manage'); //数据刷新
            });
        } else if (obj.event === 'edit') {
            var tr = $(obj.tr);

            layer.open({
                type: 2
                , title: '编辑'
                , content: '/admin/user/' + row.id + '/edit'
                , area: ['480px', '420px']
                , btn: ['确定', '取消']
                , yes: function (index, layero) {
                    var iframeWindow = window['layui-layer-iframe' + index]
                        , submit = layero.find('iframe').contents().find("#LAY-user-edit-submit");
                    //监听提交
                    iframeWindow.layui.form.on('submit(LAY-user-edit-submit)', function (data) {
                        var field = data.field; //获取提交的字段
                        //提交 Ajax 成功后，静态更新表格中的数据
                        $.ajax({//异步请求返回给后台
                            url: '/admin/user/' + row.id + '/update',
                            type: 'POST',
                            data: field,
                            success: function (data) {
                                layer.msg(data.msg);
                            },
                            error: function (data) {
                                layer.msg('服务器内部错误!');
                            }
                        });
                        table.reload('LAY-user-list-manage'); //数据刷新
                        layer.close(index); //关闭弹层
                    });

                    submit.trigger('click');
                }
                , success: function (layero, index) {

                }
            })
        }
    });

    //角色管理
    table.render({
        elem: '#LAY-user-back-role'
        , url: "/admin/data?model=role"
        , page: true
        , toolbar: "#table-toolbar-toolbarHeader"
        , loading: true
        , cols: [[
            {type: 'checkbox', fixed: 'left'}
            , {field: 'id', width: 80, title: 'ID', sort: true, align: 'center'}
            , {field: 'name', title: '名称', align: 'center'}
            , {field: 'display_name', title: '显示名称', align: 'center'}
            , {field: 'created_at', title: '创建时间', align: 'center'}
            , {field: 'updated_at', title: '更新时间',  align: 'center'}
            , {
                title: '操作',
                width: 200,
                align: 'center',
                fixed: 'right',
                toolbar: '#table-useradmin-role',
                align: 'center'
            }
        ]]
        , text: {
            none: '暂无相关数据'
        }
    });

    //头工具栏事件--角色管理
    table.on('toolbar(LAY-user-back-role)', function (obj) {
        //alert(1);
        var checkStatus = table.checkStatus(obj.config.id);
        switch (obj.event) {
            case 'batchdel':
                var checkStatus = table.checkStatus('LAY-user-back-role')
                    , checkData = checkStatus.data; //得到选中的数据
                layer.msg('角色很重要,禁止批量删除!');
                break;
            case 'add':
                layer.open({
                    type: 2
                    , title: '新增'
                    , content: "/admin/role/create"
                    , area: ['600px', '380px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submit = layero.find('iframe').contents().find("#LAY-user-role-submit");

                        //监听提交
                        iframeWindow.layui.form.on('submit(LAY-user-role-submit)', function (data) {
                            var field = data.field; //获取提交的字段

                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({//异步请求返回给后台
                                url: '/admin/role/store',
                                type: 'POST',
                                data: field,
                                success: function (data) {
                                    layer.msg(data.msg);
                                },
                                error: function (data) {
                                    layer.msg('服务器内部错误!');
                                }
                            });
                            table.reload('LAY-user-back-role');
                            layer.close(index); //关闭弹层
                        });
                        submit.trigger('click');
                    }
                });
                break;
        }
        ;
    });

    //监听工具条－－角色管理
    table.on('tool(LAY-user-back-role)', function (obj) {
        var data = obj.data;
        var row = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除此权限？', function (index) {
                $.ajax({
                    url: '/admin/role/destroy?id=' + row.id,
                    type: 'GET',
                    success: function (data) {
                        layer.msg(data.msg);
                    },
                    error: function (data) {
                        layer.msg('服务器内部错误!');
                    }
                });
                table.reload('LAY-user-back-role'); //数据刷新
                layer.close(index);
            });
        } else if (obj.event === 'edit') {
            var tr = $(obj.tr);
            layer.open({
                type: 2
                , title: '编辑'
                , content: "/admin/role/" + row.id + "/edit"
                , area: ['600px', '380px']
                , btn: ['确定', '取消']
                , yes: function (index, layero) {
                    var iframeWindow = window['layui-layer-iframe' + index]
                        , submit = layero.find('iframe').contents().find("#LAY-user-role-submit");

                    //监听提交
                    iframeWindow.layui.form.on('submit(LAY-user-role-submit)', function (data) {
                        var field = data.field; //获取提交的字段
                        //提交 Ajax 成功后，静态更新表格中的数据
                        $.ajax({
                            url: '/admin/role/' + row.id + '/update',
                            type: 'POST',
                            data: field,
                            success: function (data) {
                                layer.msg(data.msg);
                            },
                            error: function (data) {
                                layer.msg('服务器内部错误!');
                            }
                        });
                        table.reload('LAY-user-back-role'); //数据刷新
                        layer.close(index); //关闭弹层
                    });

                    submit.trigger('click');
                }
                , success: function (layero, index) {

                }
            })
        } else if (obj.event === 'permission') {
            var tr = $(obj.tr);
            layer.open({
                type: 2
                , title: '角色授权'
                , content: "/admin/role/" + row.id + "/permission"
                , area: ['800px', '600px']
                , btn: ['确定', '取消']
                , yes: function (index, layero) {
                    var iframeWindow = window['layui-layer-iframe' + index]
                        , submit = layero.find('iframe').contents().find("#LAY-user-role-submit");

                    //监听提交
                    iframeWindow.layui.form.on('submit(LAY-user-role-submit)', function (data) {
                        var field = data.field; //获取提交的字段
                        //提交 Ajax 成功后，静态更新表格中的数据
                        $.ajax({
                            url: '/admin/role/' + row.id + '/assignPermission',
                            type: 'POST',
                            data: field,
                            success: function (data) {
                                layer.msg(data.msg);
                            },
                            error: function (data) {
                                layer.msg('服务器内部错误!');
                            }
                        });
                        table.reload('LAY-user-back-role'); //数据刷新
                        layer.close(index); //关闭弹层
                    });

                    submit.trigger('click');
                }
                , success: function (layero, index) {

                }
            })
        }
    });


    //权限管理
    table.render({
        elem: '#LAY-user-back-permission'
        , url: "/admin/data?model=permission"
        , page: true
        , toolbar: "#table-toolbar-toolbarHeader"
        , loading: true
        , cols: [[
            {type: 'checkbox', fixed: 'left'}
            , {field: 'id', width: 80, title: 'ID', sort: true, align: 'center'}
            , {field: 'name', title: '名称', align: 'center'}
            , {field: 'display_name', title: '显示名称', align: 'center'}
            , {field: 'route', title: '路由', align: 'center'}
            , {field: 'icon_id', title: '图标', toolbar: '#icon', align: 'center'}
            , {field: 'sort', title: '排序', align: 'center'}
            , {
                title: '操作',
                width: 200,
                align: 'center',
                fixed: 'right',
                toolbar: '#table-useradmin-admin',
                align: 'center'
            }
        ]]
        , text: {
            none: '暂无相关数据'
        }
    });

    //头工具栏事件--权限管理
    table.on('toolbar(LAY-user-back-permission)', function (obj) {
        //alert(1);
        var checkStatus = table.checkStatus(obj.config.id);
        switch (obj.event) {
            case 'batchdel':
                var checkStatus = table.checkStatus('LAY-user-back-permission')
                    , checkData = checkStatus.data; //得到选中的数据
                layer.msg('权限很重要,禁止批量删除!');
                break;
            case 'add':
                layer.open({
                    type: 2
                    , title: '新增'
                    , content: "/admin/permission/create"
                    , area: ['600px', '550px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submit = layero.find('iframe').contents().find("#LAY-user-permission-submit");

                        //监听提交
                        iframeWindow.layui.form.on('submit(LAY-user-permission-submit)', function (data) {
                            var field = data.field; //获取提交的字段

                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({//异步请求返回给后台
                                url: '/admin/permission/store',
                                type: 'POST',
                                data: field,
                                success: function (data) {
                                    layer.msg(data.msg);
                                },
                                error: function (data) {
                                    layer.msg('服务器内部错误!');
                                }
                            });
                            table.reload('LAY-user-back-permission');
                            layer.close(index); //关闭弹层
                        });

                        submit.trigger('click');
                    }
                });
                break;
            case 'returnParent':
                var pid = $("#returnParent1").attr("pid");
                if (pid != '0') {
                    ids = pid.split('_');
                    parent_id = ids.pop();
                    $("#returnParent1").attr("pid", ids.join('_'));
                } else {
                    parent_id = pid;
                }
                table.reload('LAY-user-back-permission', {
                    where: {model: "permission", parent_id: parent_id},
                    page: {curr: 1}
                });
                break;

        }
        ;
    });

    //监听工具条－－权限管理
    table.on('tool(LAY-user-back-permission)', function (obj) {
        var data = obj.data;
        var row = obj.data;
        if (obj.event === 'del') {
            layer.confirm('确定删除此权限？', function (index) {
                $.ajax({
                    url: '/admin/permission/destroy?id=' + row.id,
                    type: 'GET',
                    success: function (data) {
                        layer.msg(data.msg);
                    },
                    error: function (data) {
                        layer.msg('服务器内部错误!');
                    }
                });
                table.reload('LAY-user-back-permission'); //数据刷新
                layer.close(index);
            });
        } else if (obj.event === 'edit') {
            var tr = $(obj.tr);
            layer.open({
                type: 2
                , title: '编辑'
                , content: "/admin/permission/" + row.id + "/edit"
                , area: ['600px', '550px']
                , btn: ['确定', '取消']
                , yes: function (index, layero) {
                    var iframeWindow = window['layui-layer-iframe' + index]
                        , submit = layero.find('iframe').contents().find("#LAY-user-permission-submit");

                    //监听提交
                    iframeWindow.layui.form.on('submit(LAY-user-permission-submit)', function (data) {
                        var field = data.field; //获取提交的字段
                        //提交 Ajax 成功后，静态更新表格中的数据
                        $.ajax({
                            url: '/admin/permission/' + row.id + '/update',
                            type: 'POST',
                            data: field,
                            success: function (data) {
                                layer.msg(data.msg);
                            },
                            error: function (data) {
                                layer.msg('服务器内部错误!');
                            }
                        });
                        table.reload('LAY-user-back-permission'); //数据刷新
                        layer.close(index); //关闭弹层
                    });

                    submit.trigger('click');
                }
                , success: function (layero, index) {

                }
            })
        } else if (obj.event === 'children') {
            var data = obj.data;
            var pid = $("#returnParent1").attr("pid");
            if (data.parent_id != 0) {
                //alert( data.parent_id);
                $("#returnParent1").attr("pid", pid + '_' + data.parent_id);
                //alert($("#returnParent").attr("pid"));
            }
            table.reload('LAY-user-back-permission', {
                where: {model: "permission", parent_id: data.id},
                page: {curr: 1}
            });
        }
    });

    exports('useradmin', {})
});