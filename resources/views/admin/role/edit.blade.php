<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>编辑角色</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
</head>
<body>

<div class="layui-form" lay-filter="layuiadmin-form-permission" id="layuiadmin-form-permission"
     style="padding: 20px 30px 0 0;">
    {{csrf_field()}}
    <div class="layui-form-item">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input type="text" name="name" value="{{$role->name}}" lay-verify="required" class="layui-input"
                   placeholder="如：system.index">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">显示名称</label>
        <div class="layui-input-block">
            <input type="text" name="display_name" value="{{$role->display_name}}" lay-verify="required"
                   class="layui-input" placeholder="如：系统管理">
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">描述</label>
        <div class="layui-input-block">
            <textarea type="text" name="descr" autocomplete="off" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item layui-hide">
        <button class="layui-btn" lay-submit lay-filter="LAY-user-role-submit" id="LAY-user-role-submit">
            提交
        </button>
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
    })
</script>
</body>
</html>