<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>对象管理</title>
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
            报告对象
          </div>
          <div class="layui-inline">
            <select name="name" lay-filter="LAY-report-type">
              <option value="0">所有对象</option>
              <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($name ->id); ?>"><?php echo e($name ->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>
      </div>
      <div class="layui-card-body">
        <input type="hidden" id="returnParent1" pid="0"><!--记录PID-->
      
        <table id="LAY-table" lay-filter="LAY-table"></table>
        <script type="text/html" id="table-toolbar-header">
            <div class="layui-btn-group">
            <button class="layui-btn layui-btn-sm" lay-event="batchdel">删除</button>
            <button class="layui-btn layui-btn-sm" lay-event="add">添加</button>
            <button class="layui-btn layui-btn-sm" id="returnParent" pid="0" lay-event="returnParent">返回上级</button>
            </div>
        </script>
        <script type="text/html" id="monitor">
          {{#  if(d.monitor == 1){ }}
          是
          {{#  } else { }}
          否
          {{#  } }}
        </script>
        <script type="text/html" id="table-toolbar-inner">
          <div class="layui-btn-group">

          <a class="layui-btn layui-btn-xs" lay-event="children">子部门</a>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report.duixiang.edit')): ?>
          <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report.duixiang.destroy')): ?>
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
  }).use(['index', 'report_duixiang', 'table'], function(){
    var $ = layui.$
    ,form = layui.form
    ,table = layui.table;
    
    //搜索权限
    form.on('select(LAY-report-type)', function(data){
      //执行重载
      table.reload('LAY-table', {
        where: {
            parent_id: data.value
        }
      });
    });

  });
  </script>
</body>
</html>

