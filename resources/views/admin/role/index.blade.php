<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>角色管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
</head>
<body>

  <div class="layui-fluid">   
    <div class="layui-card">
      <div class="layui-form layui-card-header layuiadmin-card-header-auto">

      </div>
      <div class="layui-card-body">
        <table id="LAY-user-back-role" lay-filter="LAY-user-back-role"></table>
        <script type="text/html" id="table-toolbar-toolbarHeader">
            <div class="layui-btn-group">
            <button class="layui-btn layui-btn-sm" lay-event="batchdel">删除</button>
            <button class="layui-btn layui-btn-sm" lay-event="add">添加</button>
            </div>
        </script>

        <script type="text/html" id="table-useradmin-role">
          <div class="layui-btn-group">
          @can('system.permission')
              <a class="layui-btn  layui-btn-xs" lay-event="permission"><i class="layui-icon layui-icon-set-fill"></i>权限</a>
          @endcan
            @can('system.permission.edit')
          <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
            @endcan
            @can('system.permission.destroy')
          <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
            @endcan
          </div>
        </script>
      </div>
    </div>
  </div>

 <script src="/layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: '/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'useradmin', 'table'], function(){
    var $ = layui.$
    ,form = layui.form
    ,table = layui.table;

  });
  </script>
</body>
</html>

