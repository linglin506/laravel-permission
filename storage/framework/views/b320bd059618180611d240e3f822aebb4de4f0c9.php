<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>创建月报任务</title>
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
        <label for="" class="layui-form-label">月报月份</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="laydate-type-month" placeholder="yyyy-MM"
                   name="yuefen">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">扫描对象</label>
        <?php $__currentLoopData = $duixiangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duixiang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input type="checkbox" name="<?php echo e($duixiang ->name); ?>" title="<?php echo e($duixiang ->name); ?>" >
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">扫描范围</label>
        <input type="checkbox" name="host" title="主机">
        <input type="checkbox" name="web" title="WEB">
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">端口范围</label>
        <div class="layui-input-block">
            <input type="text" name="port" value="1-65535" lay-verify="required" class="layui-input" >
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">任务描述</label>
        <div class="layui-input-block">
            <textarea type="text" name="detail" autocomplete="off" class="layui-textarea"></textarea>
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
    }).use(['index', 'form', 'element', 'layer', 'table', 'upload', 'laydate'], function () {
        var $ = layui.$
            , form = layui.form;

        var laydate = layui.laydate;

        //年月选择器
        laydate.render({
            elem: '#laydate-type-month'
            , type: 'month'
        });
    })
</script>


</body>
</html>