<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>重设密码 - <?php echo e(config('app.name', 'TVM')); ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
              <label class="layadmin-user-login-icon layui-icon layui-icon-link" for="LAY-user-login-email"></label>
              <input type="email" name="email" id="LAY-user-login-email" lay-verify="email" placeholder="邮箱" class="layui-input">
            </div>
            <div class="layui-form-item">
              <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
              <input type="password" name="password" id="LAY-user-login-password" lay-verify="pass" placeholder="新密码" class="layui-input">
            </div>
            <div class="layui-form-item">
              <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password_confirmation"></label>
              <input type="password" name="password_confirmation" id="LAY-user-login-password_confirmation" lay-verify="required" placeholder="确认密码" class="layui-input">
            </div>
            <div class="layui-form-item">
              <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-forget-resetpass">重置新密码</button>
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
  }).use(['index', 'user'], function(){
    var $ = layui.$
    ,setter = layui.setter
    ,admin = layui.admin
    ,form = layui.form
    ,router = layui.router();
    form.render();   
    
    //重置密码
    form.on('submit(LAY-user-forget-resetpass)', function(obj){
      var field = obj.field;
      
      //确认密码
      if(field.password !== field.password_confirmation){
        return layer.msg('两次密码输入不一致');
      }

      //请求接口
      admin.req({
        url: "<?php echo e(route('password.request')); ?>",
        data: field,
		type:'POST',
        done: function(res){        
          layer.msg('密码已成功重置', {
            offset: '15px'
            ,icon: 1
            ,time: 1000
          }, function(){
            location.href = '/login'; //跳转到登入页
          });
        }
      });      
      return false;
    });
    
  });
  </script>
</body>
</html>