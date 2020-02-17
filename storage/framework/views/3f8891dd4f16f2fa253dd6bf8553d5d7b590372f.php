<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>编辑对象</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
  <style>
    /*图标展示*/
    .site-doc-icon{width: 1050px;background-color: #fff}
    .site-doc-icon li{cursor:pointer;display: inline-block; vertical-align: middle; width: 127px; height: 105px; line-height: 25px; padding: 20px 0; margin-right: -1px; margin-bottom: -1px; border: 1px solid #e2e2e2; font-size: 14px; text-align: center; color: #666; transition: all .3s; -webkit-transition: all .3s;}
    .site-doc-anim li{height: auto;}
    .site-doc-icon li .layui-icon{display: inline-block; font-size: 36px;}
    .site-doc-icon li .doc-icon-name,
    .site-doc-icon li .doc-icon-code{color: #c2c2c2;}
    .site-doc-icon li .doc-icon-code xmp{margin:0}
    .site-doc-icon li .doc-icon-fontclass{height: 40px; line-height: 20px; padding: 0 5px; font-size: 13px; color: #333; }
    .site-doc-icon li:hover{background-color: #f2f2f2; color: #000;}

  </style>
</head>
<body>

  <div class="layui-form" lay-filter="layuiadmin-form" id="layuiadmin-form" style="padding: 20px 30px 0 0;">
    <?php echo e(csrf_field()); ?>

    <div class="layui-form-item">
      <label class="layui-form-label">父级</label>
      <div class="layui-input-block">
        <select name="parent_id">
          <option value="0">顶级组织</option>
          <?php $__empty_1 = true; $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <option value="<?php echo e($org['id']); ?>" <?php echo e(isset($organization->id) && $org['id'] == $organization->parent_id ? 'selected' : ''); ?> ><?php echo e($org['name']); ?></option>
            <?php if(isset($org['_child'])): ?>
              <?php $__currentLoopData = $org['_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($childs['id']); ?>" <?php echo e(isset($organization->id) && $childs['id'] == $organization->parent_id ? 'selected' : ''); ?> >&nbsp;&nbsp;|--<?php echo e($childs['name']); ?></option>
                <?php if(isset($childs['_child'])): ?>
                  <?php $__currentLoopData = $childs['_child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastChilds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($lastChilds['id']); ?>" <?php echo e(isset($organization->id) && $lastChilds['id'] == $organization->parent_id ? 'selected' : ''); ?> >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--<?php echo e($lastChilds['name']); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <?php endif; ?>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label for="" class="layui-form-label">对象名称</label>
      <div class="layui-input-block">
        <input type="text" name="name" value="<?php echo e($organization->name??old('name')); ?>" lay-verify="required" class="layui-input" placeholder="">
      </div>
    </div>
    <div class="layui-form-item">
      <label for="" class="layui-form-label">域名</label>
      <div class="layui-input-block">
        <input type="text" name="domain" value="<?php echo e($organization->domain??old('domain')); ?>"  class="layui-input" placeholder="">
      </div>
    </div>

    <div class="layui-form-item">
      <label for="" class="layui-form-label">IP</label>
      <div class="layui-input-block">
        <input class="layui-input" type="text" name="ip" value="<?php echo e($organization->ip??old('ip')); ?>"  placeholder="" >
      </div>
    </div>

    <div class="layui-form-item">
      <label for="" class="layui-form-label">联系人</label>
      <div class="layui-input-block">
        <input class="layui-input" type="text" name="contact" value="<?php echo e($organization->contact??old('contact')); ?>"  placeholder="" >
      </div>
    </div>

    <div class="layui-form-item">
      <label for="" class="layui-form-label">联系电话</label>
      <div class="layui-input-block">
        <input class="layui-input" type="text" name="contact_phone" value="<?php echo e($organization->contact_phone??old('contact_phone')); ?>"  placeholder="" >
      </div>
    </div>

    <div class="layui-form-item">
      <label for="" class="layui-form-label">联系邮箱</label>
      <div class="layui-input-block">
        <input class="layui-input" type="text"  name="contact_email" value="<?php echo e($organization->contact_email??old('contact_email')); ?>" placeholder="" >
      </div>
    </div>

    <div class="layui-form-item">
      <label for="" class="layui-form-label">有效期</label>
      <div class="layui-input-block">
        <input class="layui-input" type="text" id= 'laydate-type-datetime' name="validity" value="<?php echo e($organization->validity??old('validity')); ?>"  >
      </div>
    </div>

    <div class="layui-form-item">
      <label for="" class="layui-form-label">纳入监测</label>
      <div class="layui-input-block">
        <?php if($organization->monitor == 1): ?>
        <input type="checkbox" checked="" name="monitor" lay-skin="switch" lay-filter="component-form-switchTest" lay-text="ON|OFF" >
        <?php else: ?>
          <input type="checkbox"  name="monitor" lay-skin="switch" lay-filter="component-form-switchTest" lay-text="ON|OFF" >
        <?php endif; ?>
      </div>
    </div>


    <div class="layui-form-item">
      <label class="layui-form-label">详细描述</label>
      <div class="layui-input-block">
        <textarea type="text" name="detail" autocomplete="off" class="layui-textarea" value="<?php echo e($organization->detail??old('detail')); ?>"></textarea>
      </div>
    </div>
    <div class="layui-form-item layui-hide">
      <button class="layui-btn" lay-submit lay-filter="LAY-submit" id="LAY-submit">提交</button>
    </div>
  </div>

  <script src="/layuiadmin/layui/layui.js"></script>
  <script src="/js/jquery.min.js"></script>
  <script>
  layui.config({
    base: '/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form','element','layer','table','upload','laydate'], function(){
    var $ = layui.$
    ,form = layui.form ;

    var laydate = layui.laydate;

      //日期时间选择器
      laydate.render({
          elem: '#laydate-type-datetime'
          ,type: 'datetime'
      });
  })
  </script>


</body>
</html>