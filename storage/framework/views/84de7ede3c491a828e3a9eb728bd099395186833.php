<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <style>
        /*图标展示*/
        .site-doc-icon {
            width: 1050px;
            background-color: #fff
        }

        .site-doc-icon li {
            cursor: pointer;
            display: inline-block;
            vertical-align: middle;
            width: 127px;
            height: 105px;
            line-height: 25px;
            padding: 20px 0;
            margin-right: -1px;
            margin-bottom: -1px;
            border: 1px solid #e2e2e2;
            font-size: 14px;
            text-align: center;
            color: #666;
            transition: all .3s;
            -webkit-transition: all .3s;
        }

        .site-doc-anim li {
            height: auto;
        }

        .site-doc-icon li .layui-icon {
            display: inline-block;
            font-size: 36px;
        }

        .site-doc-icon li .doc-icon-name,
        .site-doc-icon li .doc-icon-code {
            color: #c2c2c2;
        }

        .site-doc-icon li .doc-icon-code xmp {
            margin: 0
        }

        .site-doc-icon li .doc-icon-fontclass {
            height: 40px;
            line-height: 20px;
            padding: 0 5px;
            font-size: 13px;
            color: #333;
        }

        .site-doc-icon li:hover {
            background-color: #f2f2f2;
            color: #000;
        }

    </style>
</head>
<body>

<div class="layui-form" lay-filter="layuiadmin-form" id="layuiadmin-form" style="padding: 20px 30px 0 0;">
    <?php echo e(csrf_field()); ?>


    <div class="layui-form-item">
        <label for="" class="layui-form-label">所属用户</label>
        <div class="layui-input-block">
            <select name="uid" lay-filter="LAY-report-type" lay-search>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user ->id); ?>"><?php echo e($user ->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">组织名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" value="" lay-verify="required"
                   class="layui-input" placeholder="">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">组织类别</label>
        <div class="layui-input-block">
            <select name="type_id" lay-filter="LAY-report-type">
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type ->id); ?>"><?php echo e($type ->type); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">行业</label>
        <div class="layui-input-block">
            <select name="industry_id" lay-filter="LAY-report-type">
                <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($industry ->id); ?>"><?php echo e($industry ->industry); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>

    <div class="layui-form-item" id="area-picker">
        <div class="layui-form-label">地区</div>
        <div class="layui-input-block">
            <div class="layui-input-inline" style="width: 200px;">
                <select name="province" class="province-selector" data-value="四川省" lay-filter="province-1">
                    <option value="">请选择省</option>
                </select>
            </div>
            <div class="layui-input-inline" style="width: 200px;">
                <select name="city" class="city-selector" data-value="成都市" lay-filter="city-1">
                    <option value="">请选择市</option>
                </select>
            </div>
            <div class="layui-input-inline" style="width: 200px;">
                <select name="district" class="county-selector" data-value="锦江区" lay-filter="county-1">
                    <option value="">请选择区</option>
                </select>
            </div>
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">地址</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="address" value=""
                   lay-verify="required" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">联系人</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="contact"
                   value="" lay-verify="required" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">电话</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="phone"
                   value="" lay-verify="required" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">手机</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="mobile"
                   value="" placeholder="" lay-verify="phone">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">传真</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" name="fax"
                   value="" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">邮箱</label>
        <div class="layui-input-block">
            <input class="layui-input" type="text" lay-verify="required|email" name="email"
                   value="" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">授权IP</label>
        <div class="layui-input-block">

            <input class="layui-input" type="text" name="ip"
                   value="" placeholder="" lay-verify="ip">

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
    }).use(['index', 'form', 'element', 'layer', 'table', 'upload', 'laydate', 'layarea'], function () {
        var $ = layui.$
            , form = layui.form
            , layarea = layui.layarea;

        form.verify({
            ip: [/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/, 'IP地址不合法！']
        });

        layarea.render({
            elem: '#area-picker',
            change: function (res) {
                //选择结果
                console.log(res);
            }
        });
    })
</script>


</body>
</html>