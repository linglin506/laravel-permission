<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>权限管理</title>
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
        <div class="layui-form-item">
          <div class="layui-inline">
            权限筛选
          </div>
          <div class="layui-inline">
            <select name="permissionname" lay-filter="LAY-user-adminpermission-type">
              <option value="-1">全部权限</option>
              <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($p ->id); ?>"><?php echo e($p ->display_name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
      </div>
      <div class="layui-card-body">
        <input type="hidden" id="returnParent1" pid="0"><!--记录PID-->
      
        <table id="LAY-user-back-permission" lay-filter="LAY-user-back-permission"></table>
        <script type="text/html" id="table-toolbar-toolbarHeader">
            <div class="layui-btn-group">
            <button class="layui-btn layui-btn-sm" lay-event="batchdel">删除</button>
            <button class="layui-btn layui-btn-sm" lay-event="add">添加</button>
            <button class="layui-btn layui-btn-sm" id="returnParent" pid="0" lay-event="returnParent">返回上级</button>
            </div>
        </script>
        <script type="text/html" id="buttonTpl">
          {{#  if(d.check == true){ }}
            <button class="layui-btn layui-btn-xs">已审核</button>
          {{#  } else { }}
            <button class="layui-btn layui-btn-primary layui-btn-xs">未审核</button>
          {{#  } }}
        </script>
        <script type="text/html" id="icon">
          <i class="layui-icon {{ d.icon.class }}"></i>
        </script>
        <script type="text/html" id="table-useradmin-admin">
          <div class="layui-btn-group">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system.permission')): ?>
          <a class="layui-btn layui-btn-xs" lay-event="children">子权限</a>
          <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system.permission.edit')): ?>
          <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('system.permission.destroy')): ?>
          <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
            <?php endif; ?>
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
    
    //搜索权限
    form.on('select(LAY-user-adminpermission-type)', function(data){
      //执行重载
      table.reload('LAY-user-back-permission', {
        where: {
            parent_id: data.value
        }
      });
    });

  });
  </script>
</body>
</html>

