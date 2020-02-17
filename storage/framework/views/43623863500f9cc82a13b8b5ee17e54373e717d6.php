<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册 - <?php echo e(config('app.name', 'Win7补丁分发平台')); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/login.css" media="all">
</head>
<body>


<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2><?php echo e(config('app.name', 'Win7补丁分发平台')); ?></h2>
        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
            <?php echo csrf_field(); ?>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-username"
                       for="LAY-user-login-username"></label>
                <input type="text" name="name" id="LAY-user-login-username" lay-verify="required|username"
                       placeholder="用户名" class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-link" for="LAY-user-login-email"></label>
                <input type="text" name="email" id="LAY-user-login-email" lay-verify="required|email" placeholder="邮箱"
                       class="layui-input">
            </div>

            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password"
                       for="LAY-user-login-password"></label>
                <input type="password" name="password" id="LAY-user-login-password" lay-verify="pass" placeholder="密码"
                       class="layui-input">
            </div>
            <div class="layui-form-item">
                <label class="layadmin-user-login-icon layui-icon layui-icon-password"
                       for="LAY-user-login-repass"></label>
                <input type="password" name="password_confirmation" id="LAY-user-login-repass" lay-verify="required"
                       placeholder="确认密码"
                       class="layui-input">
            </div>

            <div class="layui-form-item">
                <input type="checkbox" name="agreement" lay-skin="primary" title="同意用户协议" checked>
            </div>
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-reg-submit">注 册</button>
            </div>

        </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>© 2018 <a href="http://path.sccert.org.cn" target="_blank">SCCERT</a></p>

    </div>

</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: '/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'user'], function () {
        var $ = layui.$
            , setter = layui.setter
            , admin = layui.admin
            , form = layui.form
            , router = layui.router();
        form.render();
        //提交
        form.on('submit(LAY-user-reg-submit)', function (obj) {
            var field = obj.field;

            //确认密码
            if (field.password !== field.password_confirmation) {
                return layer.msg('两次密码输入不一致');
            }

            //是否同意用户协议
            if (!field.agreement) {
                return layer.msg('你必须同意用户协议才能注册');
            }
            $.ajax({//异步请求返回给后台
                url: "<?php echo e(route('register')); ?>",
                type: 'POST',
                data: field,
                success: function (data) {
                    layer.msg(data.msg);
                    location.href = '/login'; //跳转到登入页
                },
                error: function (data) {
                    layer.msg(data.msg);
                }
            });
            return false;
        });
    });
</script>
</body>
</html>