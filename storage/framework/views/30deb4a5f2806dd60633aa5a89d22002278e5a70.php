<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>登陆 - <?php echo e(config('app.name', 'Win7补丁分发平台')); ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
          <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
          <input type="text" name="name" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
        </div>
        <div class="layui-form-item">
          <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
          <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
        </div>
        <div class="layui-form-item">
          
        </div>
        <div class="layui-form-item" style="margin-bottom: 20px;">
          <input type="checkbox" name="remember" lay-skin="primary" title="记住密码">
          <a href="<?php echo e(route('password.request')); ?>" class="layadmin-user-jump-change layadmin-link" style="margin-top: 7px;">忘记密码？</a>
        </div>
        <div class="layui-form-item">
          <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
        </div>
        <div class="layui-trans layui-form-item layadmin-user-login-other">
          
          
          <a href="<?php echo e(route('register')); ?>" class="layadmin-user-jump-change layadmin-link">注册帐号</a>
        </div>
      </div>
    </div>
    
    <div class="layui-trans layadmin-user-login-footer">
      
      <p>© 2018 <a href="http://www.sccert.org.cn/" target="_blank"><?php echo e(config('app.org', '国家计算机网络与信息安全管理中心四川分中心')); ?></a></p>
      
    </div>
    
   
    
  </div>

  <script src="/layuiadmin/layui/layui.js"></script>  
  <script>
  layui.config({
    base: '/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'user'], function(){
    var $ = layui.$
    ,setter = layui.setter
    ,admin = layui.admin
    ,form = layui.form
    ,router = layui.router()
    ,search = router.search;
    form.render();

    //提交
    form.on('submit(LAY-user-login-submit)', function(obj){    
      //请求登入接口
        $.ajax({
            url: "<?php echo e(route('login')); ?>",
            type: 'POST',
            data: obj.field,
            success: function (data) {
                layer.msg(data.msg);
                location.href = '/home'; //后台主页
            },
            error: function (data) {
                layer.msg('服务器内部错误!');
            }
        });
    });   
    
  });
  </script>
</body>
</html>