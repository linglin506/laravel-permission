<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>忘记密码 - <?php echo e(config('app.name', 'TVM')); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/layuiadmin/style/login.css" media="all">
</head>

<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
    <div class="layadmin-user-login-main">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2><?php echo e(config('app.name_en', 'TVM')); ?></h2>

        </div>
        <div class="layadmin-user-login-box layadmin-user-login-body layui-form">

            <script type="text/html" template>
                <?php echo csrf_field(); ?>

                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-email"
                           for="LAY-user-login-email"></label>
                    <input type="text" name="email" id="LAY-user-login-email" lay-verify="email" placeholder="请输入邮箱"
                           class="layui-input">
                </div>


                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-forget-submit">发送邮件
                    </button>
                </div>

            </script>

        </div>
    </div>

    <div class="layui-trans layadmin-user-login-footer">

        <p>© 2018 <a href="http://www.sccert.org.cn/" target="_blank"><?php echo e(config('app.org', 'SCCERT')); ?></a></p>

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

        //找回密码下一步
        form.on('submit(LAY-user-forget-submit)', function (obj) {
            var field = obj.field;
            //请求接口
            $.ajax({//异步请求返回给后台
                url: "<?php echo e(route('password.email')); ?>",
                type: 'POST',
                data: field,
                success: function (data) {
                    layer.msg(data.msg);
                },
                error: function (data) {
                    layer.msg('服务器内部错误!');
                }
            });
            return false;
        });

    });
</script>
</body>
</html>