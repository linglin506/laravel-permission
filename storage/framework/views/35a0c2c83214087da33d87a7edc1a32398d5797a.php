<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑用户</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>
<body>

<div class="layui-form" lay-filter="layuiadmin-form-admin" id="layuiadmin-form-admin" style="padding: 20px 30px 0 0;">
    <?php echo csrf_field(); ?>
    <div class="layui-form-item">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-inline">
            <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input"
                   value="<?php echo e($user->name); ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">手机</label>
        <div class="layui-input-inline">
            <input type="text" name="phone" lay-verify="phone" autocomplete="off" class="layui-input"
                   value="<?php echo e($user->phone); ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-inline">
            <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input"
                   value="<?php echo e($user->email); ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">角色</label>
        <div class="layui-input-block">
            <select name="role_id">
                <?php $__currentLoopData = $role_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user ->role_id == $role ->id): ?>
                        <option value="<?php echo e($role ->id); ?>" selected><?php echo e($role ->display_name); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($role ->id); ?>"><?php echo e($role ->display_name); ?></option>
                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">审核状态</label>
        <div class="layui-input-inline">
            <?php if($user ->check == 1): ?>
                <input type="checkbox" lay-filter="switch" name="check" lay-skin="switch" lay-text="通过|待审核" checked>
            <?php else: ?>
                <input type="checkbox" lay-filter="switch" name="check" lay-skin="switch" lay-text="通过|待审核">
            <?php endif; ?>
        </div>
    </div>
    <div class="layui-form-item layui-hide">
        <input type="button" lay-submit lay-filter="LAY-user-edit-submit" id="LAY-user-edit-submit" value="确认">
    </div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'form'], function () {
        var $ = layui.$
            , form = layui.form;
    })
</script>
</body>
</html>